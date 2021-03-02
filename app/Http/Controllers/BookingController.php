<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Illuminate\Http\Request;
use Config\Data;
use Carbon\Carbon;
use App\Models\Booking;

use Illuminate\Support\Facades\Mail;
use App\Mail\BookingRegistered;

class BookingController extends Controller {

	protected object $data;

	public function __construct() {
		$this->data = Data::get();
	}

	public function view() {
		$hours = [];

		for($i = 0; $i <= ($this->data->end - $this->data->start); $i += $this->data->duration) {
			array_push($hours, [(string) $this->data->start + $i => ($this->data->start + $i . "h00")]);
		}

		return view("booking", [
			"hours" => $hours
		]);
	}

	public function create(Request $request) {

		$request->validate(
		[
			'email' => 'required|email:rfc,strict',
			'date' => ['required', 'date', 'after_or_equal:' . Carbon::now()],
			'hour' => ['required', 'integer', 'between:' .($this->data->start - 1). ',' .($this->data->end + 1)],
		], 
		[
			'hour.between' => "L'horaire sélectionné doit être comprit dans les heures d'ouverture de l'observatoire.",
			'date.after_or_equal' => "Veuillez sélectionner une date valide."
		]);

		$request['date'] = Carbon::parse($request->date)->setUnitNoOverflow('hour', $request->hour, 'day');
		foreach ($this->data->week as $key => $value) {
			if (!$value && strtolower($key) == strtolower((string) $request->date->format("l"))) {
				$request->session()->flash('status', "Vous ne pouvez pas réserver à cette date, nous vous invitons à consulter nos horaires d'ouvertures.");
				return redirect('/réservation')->withInput();
			}
		}


		if (Booking::isBooked($request->date) > $this->data->max_people) {
			$request->session()->flash('status', "Navré mais ce créneau est déjà réservé.");
			return redirect('/réservation')->withInput();
		}

		$answer = Booking::store($request);

		if ($answer[1]) {
			Mail::to($request->email)->send(new BookingRegistered(Booking::getBooking($answer[0])));

			$request->session()->flash('status', "Votre réservation a bien été enregistrée, un mail de confirmation vous a été envoyé.");

			return redirect('/');
		}

		$request->session()->flash('status', "Une erreur est survenue lors de l'enregistrement de votre réservation. Veuillez réessayer.");

		return redirect('/réservation')->withInput();
		
		
	}

	public function cancel($token) {
		$booking = Booking::getBooking($token);

		if (!count($booking)) {
			abort(404, 'Token introuvable.');
		}

		return view("cancel", [
			"booking" => ($booking->first())
		]);
	}

	public function delete(Request $request) {
		$answer = Booking::remove($request->token);

		if ($answer) {
			$request->session()->flash('status', "Votre réservation a bien été supprimée. Nous sommes désolés de l'apprendre.");

			return redirect('/');
		}

		$request->session()->flash('status', "Une erreur est survenue lors de l'annulation de votre réservation, veuillez réessayer");

		return redirect('/réservation/annulation/' . $request->token)->withInput();
	}
}
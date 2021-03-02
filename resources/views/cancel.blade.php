@extends('layout')

@section('content')
	@include('carousel')
	@if (count($errors) || Session::has('status'))
		<div class="position-relative w-100">
			<div class="alert p-0 py-4 alert-dark alert-dismissible fade show rounded-0 position-absolute w-100 border-0" role="alert">
	  			<div class="container">
	  				<div class="row g-0">
			  			<div class="col-md-12 position-relative d-flex align-items-center">
			  				<h5 class="mb-0 text-uppercase fw-light">{{ $errors->first() }}{{ Session::get('status') }}</h5>
			  				<button type="button" class="btn-close p-0 top-50 translate-middle-y" data-bs-dismiss="alert" aria-label="Close"></button>
			  			</div>
			  		</div>
		  		</div>
			</div>
		</div>
	@endif
	<div class="container marketing mt-5">
		<div class="row featurette" id="about">
			<div class="col-md-12">
				<h2 class="featurette-heading">Supprimer votre <span class="text-muted">réservation du {{ $booking->date }}.</span></h2>
				<p class="lead mb-0">Vous ne pouvez pas assurer votre réservation ? Vous avez possibilité de l'annuler dès maintenant.</p>
				<p class="lead">Token de réservation n°<u>{{ $booking->token }}</u></p>
			</div>
		</div>
		<hr class="featurette-divider" id="booking">
		<div class="row featurette">
			<div class="col-md-12 my-5 d-flex justify-content-center align-items-center flex-column">
				<form method="post" action="/réservation/annulation/{{ $booking->token }}" class="w-50">
					@csrf
					<div class="mb-4">
						<label for="token" class="form-label">Veuillez recopier votre token pour valider l'annulation</label>
						<input type="token" class="form-control" name="token" required>
						<div class="form-text">Une fois annulé votre réservation ne pourra être récupéré.</div>
					</div>
					<div class="mb-4 form-check">
						<input type="checkbox" class="form-check-input" name="privacy" required="true">
						<label class="form-check-label" for="privacy">J'ai lu et accepté les <a href="#">conditions d'utilisation</a></label>
					</div>
					<button type="submit" class="btn btn-primary">Annuler votre réservation</button>
				</form>
			</div>
		</div>
		<hr class="featurette-divider">
	</div>
@endsection
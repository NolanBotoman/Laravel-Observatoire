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
				<h2 class="featurette-heading">Réserver votre <span class="text-muted">observation.</span></h2>
				<p class="lead">L’observatoire est disponible sur réservation pour une durée d'une heure. Pour cela veuillez vous inscrire via ce formulaire. Un mail de confirmation vous sera envoyé avec vos informations de réservation.</p>
			</div>
		</div>
		<hr class="featurette-divider" id="booking">
		<div class="row featurette">
			<div class="col-md-12 my-5 d-flex justify-content-center align-items-center flex-column">
				<form method="post" action="/réservation">
					@csrf
					
					<div class="mb-3">
						<label for="date" class="form-label">Date</label>
						<input class="form-select" type="date" id="date" name="date" value="{{ old('date') }}" required>
					</div>
					<div class="mb-3">
						<label for="hour" class="form-label">Heure</label>
						<select name="hour" class="form-select" aria-label="Sélectionnez une heure" required>
							<option value="" selected>Sélectionnez une heure</option>
							@foreach ($hours as $value)
								<option value="{{ key($value) }}">{{ $value[key($value)] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
						<div class="form-text">Votre adresse email sera utilisé pour reconfirmer votre réservation.</div>
					</div>
					<div class="mb-3 form-check">
						<input type="checkbox" class="form-check-input" name="privacy" required="true">
						<label class="form-check-label" for="privacy">J'ai lu et accepté les <a href="#">conditions d'utilisation</a></label>
					</div>
					<button type="submit" class="btn btn-primary">Réserver un créneau</button>
				</form>
			</div>
		</div>
		<hr class="featurette-divider">
	</div>
@endsection
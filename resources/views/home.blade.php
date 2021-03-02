@extends('layout')
	
@section('head')
	<script>
	    function initMap() {
	        const lat = parseFloat("48.847190482406");
	        const lng = parseFloat("2.3457856767753");
	        const address = {
	            lat: lat,
	            lng: lng
	        };
	        const map = new google.maps.Map(document.getElementById("map"), {
	            zoom: 13,
	            center: address,
	        });
	        const marker = new google.maps.Marker({
	            position: address,
	            map: map,
	        });
	    }
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvNWvmesDTbtzTMeBS1ZxC-dvCWPiECsY&callback=initMap" defer></script>
@endsection

@section('content')
	@include('carousel')
	@if (Session::has('status'))
		<div class="position-relative w-100">
			<div class="alert p-0 py-4 alert-dark alert-dismissible fade show rounded-0 position-absolute w-100 border-0" role="alert">
	  			<div class="container">
	  				<div class="row g-0">
			  			<div class="col-md-12 position-relative d-flex align-items-center">
			  				<h5 class="mb-0 text-uppercase fw-light">{{ Session::get('status') }}</h5>
			  				<button type="button" class="btn-close p-0 top-50 translate-middle-y" data-bs-dismiss="alert" aria-label="Close"></button>
			  			</div>
			  		</div>
		  		</div>
			</div>
		</div>
	@endif
	<div class="container marketing">
		<div class="row featurette" id="about">
			<div class="col-md-12">
				<h2 class="featurette-heading">L’observatoire <span class="text-muted">Camille-Flammarion.</span></h2>
				<p class="lead">L’observatoire a été fondé en 1883 par Camille Flammarion. Il est classé monument historique. Son annexe abrite le fonds scientifique privé de Camille Flammarion, le plus important d’Ile-de- France, témoin précieux de l’astronomie et de ses progrès au XIXe et début du XXe siècles. La coupole abrite la lunette de Camille Flammarion de 240 mm de diamètre et 3 600 mm de focale. De monture équatoriale, elle s’inspire d’une de celles de l’Observatoire de Paris.

				À l’exception de la partie haute, de sa coupole et de sa lunette astronomique qui ont été restaurées récemment et sont en activité, le bâtiment principal est très dégradé. L’édifice nécessite une restauration importante afin de pouvoir à nouveau héberger la collection scientifique de Flammarion. C’est le grand projet qu’a entrepris de mener à bien la SAF dans les années qui viennent et qui nécessite le concours de nombreux partenaires, tant publics que privés.

				Pour en savoir plus, vous pouvez lire l’article L’observatoire de Juvisy-sur-Orge, l’« univers d’un chercheur » à sauvegarder, écrit par Colette Aymard et Laurence-Anne Mayeur. Vous pouvez aussi consulter un compte rendu des observations faites à l’observatoire, écrit par nos animateurs, un article écrit par Jean-Baptiste Feldmann, qui témoigne de l’intérêt de nos visiteurs pour l’observatoire de Juvisy et un article paru dans le magazine Télérama.</p>
			</div>
		</div>
		<hr class="featurette-divider" id="social">
		<div class="row featurette justify-content-between">
			<div class="col-md-4 my-5 d-flex justify-content-center align-items-end flex-column">
				<div>
					<h2>Nos horaires <span class="text-muted">d'ouvertures.</span></h2>
					<p class="lead">L’observatoire et sa Tour d’astronomie de la Sorbonne sont ouverts <u>chaque jours</u> de <u>9h à 18h</u> excepté le week-end.</p>
				</div>
			</div>
			<div class="col-md-7 my-5 d-flex justify-content-center align-items-end flex-column">
				<div id="map" style="height: 350px; width: 100%;"></div>
			</div>
		</div>
		<div class="row featurette justify-content-between" id="booking">
			<a href="/réservation" class="col-md-4 d-flex justify-content-start align-items-center">
				<button type="button" class="btn btn-dark btn-lg rounded-0 py-5 px-4 text-start w-100">
					<h4 class="text-uppercase fw-light">Réserver.<br>votre.<br>observation.</h4>
				</button>
			</a>
			<div class="col-md-7 my-5 d-flex justify-content-center align-items-end flex-column">
				<div>
					<h2>La Tour d’astronomie de la <span class="text-muted">Sorbonne.</span></h2>
					<p class="lead">La Tour d’astronomie de la Sorbonne, érigée lors de la reconstruction de la Sorbonne, entre 1885 et 1901, est l’ancien observatoire des étudiants. La coupole principale surplombe la rue Saint-Jacques de 39 mètres et offre une vision du ciel à 360°. Elle abrite depuis 1980 une lunette de 153 mm de diamètre et 2 300 mm de longueur focale, qui appartient à la SAF. Cette lunette date de 1935 et avait été installée antérieurement à l’ancien siège de la SAF, rue Serpente. La seconde coupole de la tour abritait une lunette méridienne. Elle abrite maintenant l’atelier de polissage des miroirs, organisé par la Commission des instruments de la SAF.</p>
				</div>
			</div>
		</div>
		
		<hr class="featurette-divider">
	</div>
@endsection

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Observatoire Camille-Flammarion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/custom.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" defer></script>
    @yield ('head')
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<div class="container-fluid w-75 d-flex align-items-center">
				<h3><a class="navbar-brand p-0 text-uppercase fw-light" href="{{ Request::path() === '/' ? '#' : '/'}}">Observatoire Camille Flammarion</a></h3>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse d-flex justify-content-center" id="navbarCollapse">
					<ul class="navbar-nav me-auto mb-2 mb-md-0">
						<li class="nav-item">
							<a class="nav-link text-uppercase fw-light" href="{{ Request::path() === '/' ? '#about' : '/#about'}}">à propos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-uppercase fw-light" href="{{ Request::path() === '/' ? '#social' : '/#social'}}">où sommes-nous ?</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-uppercase fw-light" href="{{ Request::path() === '/' ? '#social' : '/#social'}}">horaires</a>
						</li>	
						<li class="nav-item">
							<a class="nav-link text-uppercase fw-light" href="{{ Request::path() === '/' ? '#booking' : '/#booking'}}">réserver</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<main>
		@yield ('content')
		<footer class="container">
			<p class="float-end"><a href="#">Retourner en haut</a></p>
			<p>&copy; 1883–2021 Observatoire Camille Flammarion. &middot; <a href="#">Politique de confidentialité</a> &middot; <a href="#">Mentions légales</a></p>
		</footer>
	</main>
</body>
</html>

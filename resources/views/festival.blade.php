<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UAS Digital Heritage</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">

	<style>
		.slide-in {
			opacity: 0;
			transform: translateX(-100%);
			transition: opacity 0.5s ease, transform 0.5s ease;
		}

		.slide-in.active {
			opacity: 1;
			transform: translateX(0);
		}

		.fade-in {
			opacity: 0;
			animation-name: fade-in-animation;
			animation-duration: 2s;
			animation-fill-mode: forwards;
		}

		@keyframes fade-in-animation {
			0% { opacity: 0; }
			100% { opacity: 1; }
		}

		.fade-in-heading {
			opacity: 0;
			animation-name: fade-in;
			animation-duration: 4s;
			animation-fill-mode: forwards;
		}

		@keyframes fade-in {
			0% { opacity: 0; }
			100% { opacity: 1; }
		}

		.navbar {
			transition: background-color 0.3s ease-in-out;
		}

		.navbar-solid {
			background-color: #f8f9fa !important;
		}

		.navbar-transparent {
			background-color: transparent !important;
		}

		.navbar-light .navbar-nav .nav-link:hover {
			color: #eeb862;
		}

		.navbar-light .navbar-nav .nav-link.active {
			border-bottom: 2px solid #eeb862;
		}

		.jumbotron {
			margin-top: 80px;
		}

		.wrap {
			border-radius: 10px;
			background-color: #f8f9fa;
			padding: 20px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}

		.wrap h1 {
			font-size: 24px;
			color: #333;
			margin-bottom: 10px;
		}

		.wrap p {
			font-size: 16px;
			color: #666;
			line-height: 1.5;
		}

		body {
			background-image: url('/bg.jpg');
			background-repeat: no-repeat;
			background-size: cover;
			opacity: 0.9; /* Atur opacity sesuai  */
		}

		.content {
			background-color: rgba(255, 255, 255, 0.8); /* Atur nilai opacity (0-1) dan warna latar belakang  */
			padding: 20px;
		}

		.fade-in-heading {
			font-family: 'Lobster', cursive; /* Menggunakan font 'Lobster' atau font cursive lainnya */
			text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Efek bayangan teks */
		}

		h5.navigasi {
			font-family: "Arial", sans-serif; /* Ganti dengan font  */
			font-size: 20px; /* Atur ukuran font  */
			font-weight: bold; /* Atur ketebalan font  */
			color: #333; /* Atur warna font */
			text-decoration: none; /* Menghapus garis bawah pada teks */
			text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Efek shadow */
		}


	</style>
</head>
<body>
	<header>
		@include('nav')
		<div class="jumbotron fade-in">
			<div class="kotak2 d-flex justify-content-center align-items-center">
				<div>
					<h5 class="text-center">Selamat Datang di desa</h5>
					<h1 class="text-center">Osing Kemiren</h1>
				</div>
			</div>
		</div>
	</header>

	<main class="content">
		<h3 class="mt-5 mb-5 text-center fade-in-heading">Tentang Festival</h3>
		<audio id="myAudio" loop>
			<source src="{{ asset('umbul-umbulblambangan.mp3') }}" type="audio/mpeg">
			Your browser does not support the audio element.
		</audio>
		@foreach($festival as $key => $festival)
		<section class="about pos mt-5 slide-in">
			<div class="container">
				<div class="row">
					@if($key % 2 === 0)
					<div class="col-lg-6">
						<img src="{{ asset('/gambar_festival/' . $festival->gambar_festival) }}" alt="">
					</div>
					<div class="col-lg-6 d-flex align-items-center">
						<div class="wrap ms-5">
							<div>
								<h1>{{ $festival->judul_festival }}</h1>
							</div>
							<p>
								{{ $festival->deskripsi_festival }}
							</p>
						</div>
					</div>
					@else
					<div class="col-lg-6 d-flex align-items-center">
						<div class="wrap ms-5">
							<div>
								<h1>{{ $festival->judul_festival }}</h1>
							</div>
							<p>
								{{ $festival->deskripsi_festival }}
							</p>
						</div>
					</div>
					<div class="col-lg-6">
						<img src="{{ asset('/gambar_festival/' . $festival->gambar_festival) }}" alt="">
					</div>
					@endif
				</div>
			</div>
		</section>
		@endforeach

	</main>

	@include('footer')

	<script>
		function handleScroll() {
			var sections = document.getElementsByClassName('slide-in');
			var windowHeight = window.innerHeight;
			var jumbotronHeight = document.querySelector('.jumbotron').offsetHeight;
			var navbar = document.querySelector('.navbar');

			for (var i = 0; i < sections.length; i++) {
				var section = sections[i];
				var rect = section.getBoundingClientRect();
				var slideInAt = rect.top - windowHeight + 200; // Adjust the offset as needed

				if (slideInAt < 0) {
					section.classList.add('active');
				} else {
					section.classList.remove('active');
				}

				// Toggle the slide-in class based on section index
				if (i % 2 === 0) {
					section.classList.add('slide-in-right');
					section.classList.remove('slide-in-left');
				} else {
					section.classList.add('slide-in-left');
					section.classList.remove('slide-in-right');
				}
			}

			if (window.scrollY >= jumbotronHeight) {
				navbar.classList.remove('navbar-solid');
				navbar.classList.add('navbar-transparent');
			} else {
				navbar.classList.remove('navbar-transparent');
				navbar.classList.add('navbar-solid');
			}
		}

		window.addEventListener('scroll', handleScroll);
		window.addEventListener('resize', handleScroll); // Handle window resize event
		handleScroll(); // Call the function initially to check for visible sections
	</script>
	<script>
		var audio = document.getElementById("myAudio");

		audio.onended = function() {
			audio.currentTime = 0;
			audio.play();
		};

		audio.play();
	</script>

	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

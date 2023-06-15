<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UAS Digital Heritage</title>
	<link rel="stylesheet" href="Style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<style>

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

		body {
			background-image: url('/bg.jpg');
			background-repeat: no-repeat;
			background-size: cover;
			opacity: 0.9; /* Atur opacity sesuai keinginan Anda */
		}

		.content {
			background-color: rgba(255, 255, 255, 0.8); /* Atur nilai opacity (0-1) dan warna latar belakang sesuai keinginan Anda */
			padding: 20px;
			padding-bottom: 50px;
		}

		.whatsapp-link {
			position: fixed;
			bottom: 20px;
			right: 20px;
			width: 40px;
			height: 40px;
		}

		.whatsapp-icon {
			width: 100%;
			height: 100%;
		}

		h5.navigasi {
			font-family: "Arial", sans-serif; /* Ganti dengan font yang Anda inginkan */
			font-size: 20px; /* Atur ukuran font sesuai keinginan */
			font-weight: bold; /* Atur ketebalan font sesuai keinginan */
			color: #333; /* Atur warna font sesuai keinginan */
			text-decoration: none; /* Menghapus garis bawah pada teks */
			text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Efek shadow */
		}
		


	</style>
</head>
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
<section class="content">
	<audio id="myAudio" loop>
		<source src="{{ asset('umbul-umbulblambangan.mp3') }}" type="audio/mpeg">
		Your browser does not support the audio element.
	</audio>
    <div class="container d-flex justify-content-center">
        <div>
		  <h1 class="text-center">Paket yang Kami Tawarkan</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Paket Wisata</th>
                        <th scope="col" class="text-center">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paketWisata as $index => $paket)
                    <tr>
                        <th scope="row" class="text-center">{{ $index + 1 }}</th>
                        <td class="text-center">{{ $paket->nama_paketwisata }}</td>
                        <td class="text-center">Harga Mulai Rp.{{ $paket->harga_paketwisata }}/Hari</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

	<div class="container">
		<h1 class="text-center">Silahkan Hubungi <span class="hijau">Kami</span></h1>
		<form action="{{ route('customer.store') }}" method="POST">
			@csrf
			<div class="mb-3">
				<label for="nama" class="form-label">Masukkan Nama</label>
				<input type="text" class="form-control" id="nama" name="nama_customer" placeholder="Ketik Nama Lengkap">
			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Masukkan Alamat Email</label>
				<input type="email" class="form-control" id="email" name="email_customer" placeholder="nama@gmail.com">
			</div>
			<div class="mb-3">
				<label for="tanggal_booking" class="form-label">Tanggal Booking</label>
				<input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking">
			</div>
			<div class="mb-3">
				<label for="note" class="form-label">Note</label>
				<textarea class="form-control" id="note" name="note_customer" placeholder="Tulis Pesan Disini" rows="3"></textarea>
			</div>
			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button class="btn btn-primary me-md-2" type="submit">Submit</button>
			</div>
		</form>

	</div>
</section>

<a href="https://api.whatsapp.com/send?phone=08973461372" target="_blank" class="whatsapp-link">
    <img src="/wa.png" alt="WhatsApp" class="whatsapp-icon">
</a>

@include('footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
<script>
		function handleScroll() {

			var windowHeight = window.innerHeight;
			var jumbotronHeight = document.querySelector('.jumbotron').offsetHeight;
			var navbar = document.querySelector('.navbar');

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
</html>
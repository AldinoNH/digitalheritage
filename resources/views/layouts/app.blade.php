<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
         <!-- Bootstrap core CSS -->
        <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
      <!-- skrip JavaScript dengan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Pastikan Anda telah memuat library jQuery dan library JavaScript Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('body').on('click', '.btn-delete', function() {
                var beritaId = $(this).data('id_berita');
                var url = '/berita/' + beritaId;

                if (confirm('Apakah Anda yakin ingin menghapus?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            // Menghapus baris data dari tabel (opsional)
                            $(this).closest('tr').remove();
                            
                            // Menampilkan pesan sukses
                            alert('Berita berhasil dihapus');
                            
                            // Melakukan refresh halaman
                            location.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan. Berita tidak dapat dihapus.');
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            $('body').on('click', '.btn-delete-objekwisata', function() {
                var objekWisataId = $(this).data('id_objekwisata');
                var url = '/objekwisata/' + objekWisataId;

                if (confirm('Apakah Anda yakin ingin menghapus?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            // Menghapus baris data dari tabel (opsional)
                            $(this).closest('tr').remove();

                            // Menampilkan pesan sukses
                            alert('Objek Wisata berhasil dihapus');

                            // Melakukan refresh halaman
                            location.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan. Objek Wisata tidak dapat dihapus.');
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            $('body').on('click', '.btn-delete-festival', function() {
                var festivalId = $(this).data('id_festival');
                var url = '/festival/' + festivalId;

                if (confirm('Apakah Anda yakin ingin menghapus?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            // Menghapus baris data dari tabel (opsional)
                            $(this).closest('tr').remove();

                            // Menampilkan pesan sukses
                            alert('Festival berhasil dihapus');

                            // Melakukan refresh halaman
                            location.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan. Festival tidak dapat dihapus.');
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            $('body').on('click', '.btn-delete-customer', function() {
                var customerId = $(this).data('id_customer');
                var url = '/customer/' + customerId;

                if (confirm('Apakah Anda yakin ingin menghapus?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            // Menghapus baris data dari tabel (opsional)
                            $(this).closest('tr').remove();

                            // Menampilkan pesan sukses
                            alert('Customer berhasil dihapus');

                            // Melakukan refresh halaman
                            location.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan. Customer tidak dapat dihapus.');
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            $('body').on('click', '.btn-delete-paketwisata', function() {
                var paketWisataId = $(this).data('id_paketwisata');
                var url = '/paketwisata/' + paketWisataId;

                if (confirm('Apakah Anda yakin ingin menghapus?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            // Menghapus baris data dari tabel (opsional)
                            $(this).closest('tr').remove();

                            // Menampilkan pesan sukses
                            alert('Paket wisata berhasil dihapus');

                            // Melakukan refresh halaman
                            location.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan. Paket wisata tidak dapat dihapus.');
                        }
                    });
                }
            });
        });

    </script>
    </body>
</html>

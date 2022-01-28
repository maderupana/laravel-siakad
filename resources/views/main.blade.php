<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
  <!--plugins-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  {{-- <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" /> --}}
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  {{-- <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" /> --}}
  {{-- <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" /> --}}
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  {{-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" /> --}}
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  {{-- <link href="assets/css/icons.css" rel="stylesheet"> --}}
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	{{-- <link href="assets/css/pace.min.css" rel="stylesheet" /> --}}
  {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>

  @livewireStyles

  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/light-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

  <title>{{$title}}</title>
</head>

<body>

@yield('wrapper')


  <!-- Bootstrap bundle JS -->
  {{-- <script src="assets/js/bootstrap.bundle.min.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!--plugins-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  {{-- <script src="assets/js/jquery.min.js"></script> --}}
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
  {{-- <script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script> --}}
  {{-- <script src="assets/plugins/peity/jquery.peity.min.js"></script> --}}
  {{-- <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script> --}}
  {{-- <script src="assets/js/pace.min.js"></script> --}}
  {{-- <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script> --}}
  {{-- <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script> --}}
  {{-- <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script> --}}
	{{-- <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script> --}}
  <!--app-->
  <script src="assets/js/app.js"></script>
  <script src="assets/js/index.js"></script>
  <script src="assets/js/script.js"></script>

  @livewireScripts
  <script type="text/javascript">
        window.livewire.on('validasiKrs', () => {
            $('#modalAjuanKrs').modal('hide');
        });
    </script>
</body>

</html>
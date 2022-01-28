@extends('main')
@section('wrapper')    
  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
    @include('layout.topbar')
       <!--end top header-->

        <!--start sidebar -->
    @include('layout.sidebar')
       <!--end sidebar -->

       <!--start content-->
          <main class="page-content">
   {{-- @if ($cek_bukti_bayar['validasi'] == 1 || $cek_bukti_bayar['validasi']->isEmpty()) --}}
      @include('layout.content.profile')
   {{-- @else
      @include('errorpage.error404')
   @endif --}}
            
          </main>
       <!--end page main-->

       <!--start switcher-->
       @include('layout.swictcherbody')
      
       <!--end switcher-->

  </div>
  <!--end wrapper-->
@endsection
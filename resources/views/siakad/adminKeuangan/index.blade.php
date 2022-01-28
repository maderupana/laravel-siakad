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
             @if ($data_account['status'] == 'admin_keu')
             <livewire:openaccesskrs/>
             @else
             @include('errorpage.error404')
             @endif
            
          </main>
       <!--end page main-->

       <!--start switcher-->
       @include('layout.swictcherbody')
      
       <!--end switcher-->

  </div>
  <!--end wrapper-->
@endsection
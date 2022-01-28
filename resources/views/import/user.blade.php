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
            
            <!-- Message -->
                @if(Session::has('message'))
                    <p >{{ Session::get('message') }}</p>
                @endif
               @if ($data_account->status == 'super-admin')
               <div class="card radius-15">
                  <div class="card-header">
                    <strong> Export Import Data </strong>
                  </div>
                  <div class="card-body">
                    <form method='post' action='/import-user' enctype='multipart/form-data' >
                            @csrf
                            <label for="import-user">Import User</label>
                            <input type='file' id="import-user" name='file' class="form-control" placeholder="import data User" >
                            <button type="submit" name="submit" class="btn btn-primary mt-2">Import</button>
                            <a href="/import-user/export-user" target="_blank" class="btn btn-warning mt-2">Export</a>
                    </form>
                  </div>
               </div>
                @else
                  @include('errorpage.error404')
                @endif  
                <!-- Form -->
                
            
          </main>
       <!--end page main-->

       <!--start switcher-->
       @include('layout.swictcherbody')
      
       <!--end switcher-->

  </div>
  <!--end wrapper-->
@endsection
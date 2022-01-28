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

        <div class="card shadow rounded-0 overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6 d-flex align-items-center justify-content-center border-end">
                  <img src="assets/images/error/forgot-password-frent-img.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                  <div class="card-body p-4 p-sm-5">
                      @if (session()->has('success'))
                          <div class="alert border-0 bg-success alert-dismissible fade show py-2">
                          <div class="d-flex align-items-center">
                            <div class="fs-3 text-white"><i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="ms-3">
                              <div class="text-white">{{ session('success') }}
                              <form action="/logout" method="POST">
                              @csrf
                              <button type="submit" class="text-white cursor-pointer bg-transparent p-0 border-0">
                                    try to login
                              </button>
                            </form>
                              </div>
                            </div>
                          </div>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif
                       @if (session()->has('LoginErrors'))
                          <div class="alert border-0 bg-danger alert-dismissible fade show py-2">
                          <div class="d-flex align-items-center">
                            <div class="fs-3 text-white"><i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="ms-3">
                              <div class="text-white">{{ session('LoginErrors') }}  
                                
                              </div>
                            </div>
                          </div>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif
                    <h5 class="card-title">Genrate New Password</h5> 
                    <hr>   
                    <form class="form-body" method="POST" action="/changepwd">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="inputOldPassword" class="form-label">Old Password</label>
                                <div class="ms-auto position-relative">
                                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                                    <input type="password" class="form-control radius-30 ps-5" id="inputOldPassword" name="current_password" placeholder="Enter Old Password">
                                </div>
                                @error('current_password')
                                <div class="sticky-sm-top text-danger">{{$message}}</div>
                                @enderror
                          </div>
                          <div class="col-12">
                            <label for="inputNewPassword" class="form-label">New Password</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                              <input type="password" class="form-control radius-30 ps-5" name="password" id="inputNewPassword" placeholder="Enter New Password">
                            </div>
                            @error('password')
                                <div class="sticky-sm-top text-danger">{{$message}}</div>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                              <input type="password" class="form-control radius-30 ps-5" name="confirm_password" id="inputConfirmPassword" placeholder="Confirm Password">
                            </div>
                            @error('confirm_password')
                                <div class="sticky-sm-top text-danger">{{$message}}</div>
                            @enderror
                          </div>
                          <div class="col-12">
                            <div class="d-grid gap-3">
                              <button type="submit" class="btn btn-primary radius-30">Change Password</button>
                            </div>
                          </div>
                        </form>
                    </div>
                 </div>
                </div>
              </div>
            </div>

            
          </main>
       <!--end page main-->

       <!--start switcher-->
       @include('layout.swictcherbody')
      
       <!--end switcher-->

  </div>
  <!--end wrapper-->
@endsection
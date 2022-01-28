@extends('main')
@section('wrapper')
      <!--start wrapper-->
  <div class="wrapper">
    
       <!--start content-->
       <main class="authentication-content">
     
          
        <div class="container-fluid">
         
          <div class="authentication-card">
            
            <div class="card shadow rounded-0 overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center ">
                  <img src="assets/images/error/login-img.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                  <div class="card-body p-4 p-sm-5">
                    <form class="form-body" action="/login" method="POST">
                      @csrf
                      @if (session()->has('success'))
                          <div class="alert border-0 bg-success alert-dismissible fade show py-2">
                          <div class="d-flex align-items-center">
                            <div class="fs-3 text-white"><i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="ms-3">
                              <div class="text-white">{{ session('success') }}</div>
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
                              <div class="text-white">{{ session('LoginErrors') }}</div>
                            </div>
                          </div>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif
                      <div class="login-separater text-center mb-4"> <span>SIGN IN</span>
                        <hr>
                      </div>
                        <div class="row g-3">
                          <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">Email Address/Username</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                              <input type="text" class="form-control radius-30 ps-5 @error('email') is-invalid  @enderror" id="inputEmailAddress" placeholder="Email Address" name="email" autofocus value="{{old('email')}}">
                            </div>
                             @error('email')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="inputChoosePassword" class="form-label">Enter Password</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                              <input type="password" class="form-control radius-30 ps-5" id="inputChoosePassword" placeholder="Enter Password" name="password" required>
                            </div>
                          </div>
                          <div class="col-6">
                            {{-- <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                              <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                            </div> --}}
                          </div>
                          {{-- <div class="col-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a> --}}
                          </div>
                          <div class="col-12">
                            <div class="d-grid">
                              <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                            </div>
                          </div>
                          <div class="col-12">
                            {{-- <p class="mb-0">Don't have an account yet? <a href="register">Sign up here</a></p> --}}
                          </div>
                        </div>
                    </form>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </main>
        
       <!--end page main-->

  </div>
  <!--end wrapper-->
@endsection
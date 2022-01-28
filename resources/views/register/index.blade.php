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
                <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                  <img src="assets/images/error/login-img.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                  <div class="card-body p-4 p-sm-5">
                    <form class="form-body" action="/register" method="POST">
                      @csrf
                      
                        <div class="row g-3">
                          <div class="col-12 ">
                            <label for="inputName" class="form-label">Nama Lengkap</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-circle"></i></div>
                              <input type="text" class="form-control radius-30 ps-5 @error('nama') is-invalid @enderror" id="inputName" placeholder="Isikan Nama Lengkap" name="nama" required value="{{old('nama')}}">
                            </div>
                            @error('nama')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                            @enderror
                          </div>
                          <div class="col-12 ">
                            <label for="inputUsername" class="form-label">Username</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-circle"></i></div>
                              <input type="text" class="form-control radius-30 ps-5 @error('username') is-invalid @enderror" id="inputUsername" placeholder="username" name="username" required value="{{old('username')}}">
                            </div>
                            @error('username')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">Alamat Email</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3 @error('email') is-invalid @enderror"><i class="bi bi-envelope-fill"></i></div>
                              <input type="email" class="form-control radius-30 ps-5" id="inputEmailAddress" placeholder="Alamat Email Aktif" name="email" required value="{{old('email')}}">
                            </div>
                            @error('email')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="inputChoosePassword" class="form-label">Password</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3 @error('password') is-invalid @enderror"><i class="bi bi-lock-fill"></i></div>
                              <input type="password" class="form-control radius-30 ps-5" id="inputChoosePassword" placeholder="Password" name="password" required>
                            </div>
                            @error('password')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                            @enderror

                            
                          </div>
                   
                          <div class="col-12">
                            <div class="d-grid">
                              <button type="submit" class="btn btn-primary radius-30">Sign up</button>
                            </div>
                          </div>
                          <div class="col-12">
                            <p class="mb-0">Already have an account? <a href="login">Sign in here</a></p>
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
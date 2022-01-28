
  <!--start top header-->
      <header class="top-header">        
        <nav class="navbar navbar-expand">
          <div class="mobile-toggle-icon d-xl-none">
              <i class="bi bi-list"></i>
            </div>
            <div class="top-navbar d-none d-xl-block">
            <ul class="navbar-nav align-items-center">
              <li class="nav-item">
              <li class="nav-item d-none d-xxl-block">
              <a class="nav-link" href="javascript:;">Events</a>
              </li>
              <li class="nav-item d-none d-xxl-block">
              <a class="nav-link" href="app-to-do.html">Todo</a>
              </li>
            </ul>
            </div>
           
            <div class="top-navbar-right ms-3 d-xl-flex ms-auto">
              <ul class="navbar-nav align-items-center">
              <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="user-setting d-flex align-items-center gap-1">
                    <img src="assets/images/avatars/{{$data_account->foto}}" class="user-img" alt="">
                    <div class="user-name d-none d-sm-block">{{$data_account->status == 'Dosen' ? '0'.$data_account->username : $data_account->username}}</div>
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                          <img src="assets/images/avatars/{{$data_account->foto}}" alt="" class="rounded-circle" width="60" height="60">
                          <div class="ms-3">
                            <h6 class="mb-0 dropdown-user-name">{{$data_account->nama}}</h6>
                            <small class="mb-0 dropdown-user-designation text-secondary">{{$data_account->status}}</small>
                          </div>
                       </div>
                     </a>
                   </li>
                   <li><hr class="dropdown-divider"></li>
                   <li>
                      <a class="dropdown-item" href="/changepwd">
                         <div class="d-flex align-items-center">
                           <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                           <div class="setting-text ms-3"><span>Change Your Password</span></div>
                         </div>
                       </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                              <div class="d-flex align-items-center">
                                <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                                <div class="setting-text ms-3"><span>Logout</span></div>
                              </div>
                        </button>
                      </form>
                    </li>
                </ul>
              </li>
              </ul>
              </div>
        </nav>
      </header>
       <!--end top header-->
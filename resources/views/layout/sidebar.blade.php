<aside class="sidebar-wrapper" data-simplebar="true">
          <div class="sidebar-header">
            <div>
              <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
              <h4 class="logo-text">PUSHAR</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
            </div>
          </div>
          <!--navigation-->
          <ul class="metismenu mm-show" id="menu">
            <li>
              <a href="/dashboard">
                <div class="parent-icon"><i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title mm-active">Dashboard</div>
              </a>
            </li>
            {{-- <li>
              <a href="/profile">
                <div class="parent-icon"><i class="bi bi-person-check"></i>
                </div>
                <div class="menu-title">User Profile</div>
              </a>
            </li> --}}  
            @if ($data_account['status'] == 'Maru')
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-people"></i>
                </div>
                <div class="menu-title">User Profile</div>
              </a>
              <ul>
                <li> <a href="/profile"><i class="bi bi-person-check"></i>Info Profile</a>
                </li>
                @if (@$data_profile !== 'no data')
                <li> <a href="/wali"><i class="bi bi-file-text"></i>Data Wali</a></li>
                @endif
              </ul>
            </li>
            @endif
            @if ($data_account['status'] == 'Maru')  
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-wallet2"></i>
                </div>
                <div class="menu-title">Pembayaran</div>
              </a>
              <ul>
                <li> <a href="/pembayaran"><i class="bi bi-clipboard-check"></i>pendaftaran</a></li>
                <li> <a href="/pembayaran-daftar-ulang"><i class="bi bi-clipboard-check"></i>daftar ulang</a></li>
              </ul>
            </li>
            @endif
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid"></i>
                </div>
                <div class="menu-title">Application</div>
              </a>
              <ul>
                @if ($data_account['status'] == 'Mahasiswa')  
                <li> <a href="/khs"><i class="bi bi bi-card-checklist"></i>KHS</a>
                </li>
                <li> <a href="/krs"><i class="bi bi-clipboard-check"></i>KRS</a>
                </li>
                @endif
                @if ($data_account['status'] == 'Dosen') 
                <li> 
                  <a href="/ajuan-krs"><i class="bi bi-clipboard-check"></i>KRS Mahasiswa</a>
                </li>
                @endif
                @if ($data_account['status'] == 'admin_keu')
                <li> 
                  <a href="/admin-keu"><i class="bi bi-key"></i>Open Access KRS</a>
                </li>
                @endif
                @if ($data_account['status'] == 'operator')
                <li> <a href="/open-periode-krs"><i class="bi bi-key"></i>Buka Periode KRS</a></li>
                @endif
                {{--
                <li> <a href="#"><i class="bi bi-arrow-right-short"></i>Invoice</a>
                </li>
                <li> <a href="#"><i class="bi bi-arrow-right-short"></i>Calendar</a>
                </li> --}}
              </ul>
            </li>
            @if ($data_account['status'] == 'super-admin')
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-gear"></i>
                </div>
                <div class="menu-title">Manage</div>
              </a>
              <ul>
                <li> <a href="/import-user"><i class="bi bi-server"></i>Export/Import Data</a>
                </li>
              </ul>
            </li>
            @endif
            
          </ul>
          <!--end navigation-->
       </aside>
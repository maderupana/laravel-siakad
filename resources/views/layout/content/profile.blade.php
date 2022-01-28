@if ($data_account->status == 'Maru')

<div class="col py-2">
  <div class="card radius-15">
    <div class="card-body">
      <div class="col-12 col-lg-12">
        <h5 class="mb-0">Akun Anda</h5>
        <hr>
        <div class="alert border-0 bg-warning alert-dismissible fade show py-2">
          <div class="d-flex align-items-center">
            <div class="fs-3 text"><i class="bi bi-exclamation-circle"></i>
            </div>
            <div class="ms-3">
              <div class="text-black">Data anda sudah lengkap? jika belum silahkan isi form berikut.
                semua field wajib diisi
              </div>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="card shadow-none border">
          <div class="card-header">
            <h6 class="mb-0">INFORMASI {{ $data_profile == 'no data' ? 'CALON MARU' : 'MAHASISWA' }}</h6>
          </div>
          <div class="card-body">
            <form class="row g-3" method="POST" action="{{$data_profile !== 'no data' ? '/profile'.'/'.$data_account->id : '/profile'}}">
              @if ($data_profile !== 'no data')
              @method('PUT')
              @endif
              @csrf

              <input type="hidden" value="{{$data_account->id}}" name="id_user">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <div class="card shadow radius-10">
                  @if ($data_account->uploaded == 1)
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTygBkf2pHQXWB0NctiDprZnNHyBNnzalQuGA&usqp=CAU" class="card-img-top p-2" alt="...">
                  <div class="card-body text-center">
                    <input type="file" class="form-control">
                  </div>
                  @endif
                </div>
              </div>
              <div class="col-md-4"></div>
              @if ($data_profile !== 'no data')

              <div class="col-6">
                <label class="form-label">Username / nim</label>
                <h2 class="form-control bg-grey disabled">{{$data_account->username}}</h2>
              </div>
              <div class="col-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{old('email', $data_account->email) }}">
                @error('email')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $data_account->nama) }}" required>
                @error('nama')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>

              @endif
              <div class="col-6">
                <label class="form-label">NIK</label>
                <input type="number" name="nik" class="form-control" value="{{ old('nik', $data_profile !== 'no data' ? $data_profile->nik : '') }}" required>
                @error('nik')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tmpt_lahir" class="form-control @error('tmpt_lahir') is-invalid @enderror" value="{{old('tmpt_lahir', $data_profile !== 'no data' ? $data_profile->tmpt_lahir : '')}}" placeholder="Contoh : Singaraja" required>
                @error('tmpt_lahir')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" required value="{{old('tgl_lahir', $data_profile !== 'no data' ? $data_profile->tgl_lahir : '')}}">
                @error('tgl_lahir')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Agama</label>
                <select class="form-select @error('agama') is-invalid @enderror" aria-label="Default select example" name="agama" required>
                  {{-- <option value="{{old('agama', $data_profile !== 'no data' ? $data_profile->agama : '')}}">
                  {{old('agama', $data_profile !== 'no data' ? $data_profile->agama : '')}}
                  </option> --}}
                  <option value=""></option>
                  <option value="1" {{old('agama', $data_profile !== 'no data' ? $data_profile->agama : '') == 1 ? 'selected' : ''}}>Islam</option>
                  <option value="2" {{old('agama', $data_profile !== 'no data' ? $data_profile->agama : '') == 2 ? 'selected' : ''}}>Kristen</option>
                  <option value="3" {{old('agama', $data_profile !== 'no data' ? $data_profile->agama : '') == 3 ? 'selected' : ''}}>Katolik</option>
                  <option value="4" {{old('agama', $data_profile !== 'no data' ? $data_profile->agama : '') == 4 ? 'selected' : ''}}>Hindu</option>
                  <option value="5" {{old('agama', $data_profile !== 'no data' ? $data_profile->agama : '') == 5 ? 'selected' : ''}}>Budha</option>
                  <option value="6" {{old('agama', $data_profile !== 'no data' ? $data_profile->agama : '') == 6 ? 'selected' : ''}}>Khonghucu</option>
                  <option value="99" {{old('agama', $data_profile !== 'no data' ? $data_profile->agama : '') == 99 ? 'selected' : ''}}>Lainya</option>
                </select>
                @error('agama')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Kewarganegaraan</label>
                <select class="form-select @error('kewarganegaraan') is-invalid @enderror" aria-label="Default select example" name="kewarganegaraan" required>
                  <option value=""></option>
                  <option value="ID" {{old('kewarganegaraan', $data_profile !== 'no data' ? $data_profile->kewarganegaraan : '') == 'ID' ? 'selected' : ''}}>WNI</option>
                  <option value="WNA" {{old('kewarganegaraan', $data_profile !== 'no data' ? $data_profile->kewarganegaraan : '') == 'WNA' ? 'selected' : ''}}>WNA</option>
                </select>
                @error('kewarganegaraan')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-select @error('jk') is-invalid @enderror" aria-label="Default select example" name="jk" required>
                  <option value="{{old('jk', $data_profile !== 'no data' ? $data_profile->jk : '')}}">
                    @if (old('jk') == 'L' || @$data_profile->jk == 'L')
                    Laki - Laki
                    @elseif (old('jk') == 'P' || @$data_profile->jk == 'P')
                    Perempuan
                    @endif
                  </option>
                  <option value="L">Laki - Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
              <div class="col-6">
                <label class="form-label">Alamat</label>
                <textarea id="" cols="10" rows="1" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required placeholder="Contoh : Jl. Yudistira Selatan No 11, Singaraja">{{old('alamat', $data_profile !== 'no data' ? $data_profile->alamat : '')}}</textarea>
                @error('jk')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Pekerjaan</label>
                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" required value="{{old('pekerjaan', $data_profile !== 'no data' ? $data_profile->pekerjaan : '')}}" placeholder="Contoh : Wiraswasta">
                @error('pekerjaan')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">No Tlf Aktif</label>
                <input type="number" class="form-control @error('no_tlf') is-invalid @enderror" name="no_tlf" required value="{{old('no_tlf', $data_profile !== 'no data' ? $data_profile->no_tlf : '')}}" placeholder="Contoh : 6281936101757">
                @error('no_tlf')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              @if ($data_account->status == 'Maru')


              <div class="col-6">
                <label class="form-label">Asal Sekolah</label>
                <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" required value="{{old('asal_sekolah', $data_profile !== 'no data' ? $data_profile->asal_sekolah : '')}}" placeholder="Contoh : SMKN 3 Singaraja">
                @error('asal_sekolah')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Alamat Sekolah</label>
                <textarea id="" cols="10" rows="1" class="form-control @error('alamat_sekolah') is-invalid @enderror" name="alamat_sekolah" required placeholder="Contoh : Jl. Gempol, Banyuning, Singaraja">{{old('alamat_sekolah', $data_profile !== 'no data' ? $data_profile->alamat_sekolah : '')}}</textarea>
                @error('alamat_sekolah')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Tahun Tamat</label>
                <select class="form-select @error('tahun_tamat') is-invalid @enderror" aria-label="Default select example" name="tahun_tamat" required>
                  <option selected="{{old('tahun_tamat', $data_profile !== 'no data' ? $data_profile->tahun_tamat : '')}}">{{old('tahun_tamat', $data_profile !== 'no data' ? $data_profile->tahun_tamat : '')}}</option>
                  <option value="2022">2022</option>
                  <option value="2021">2021</option>
                  <option value="2019">2019</option>
                  <option value="2018">2018</option>
                  <option value="2017">2017</option>
                  <option value="2016">2016</option>
                </select>
                @error('tahun_tamat')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Nilai SKHUN</label>
                <input type="text" class="form-control @error('nilai_skhun') is-invalid @enderror" name="nilai_skhun" required value="{{old('nilai_skhun', $data_profile !== 'no data' ? $data_profile->nilai_skhun : '')}}" placeholder="Contoh : 3,80">
                @error('nilai_skhun')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Jurusan</label>
                <select class="form-select @error('jurusan') is-invalid @enderror" aria-label="Default select example" name="jurusan" required>
                  <option selected="{{old('jurusan', $data_profile !== 'no data' ? $data_profile->jurusan : '')}}">{{old('jurusan', $data_profile !== 'no data' ? $data_profile->jurusan : '')}}</option>
                  <option value="S1 Manajemen">S1 Manajemen</option>
                  <option value="D3 Akuntansi">D3 Akuntansi</option>
                </select>
                @error('jurusan')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Kelas</label>
                <select class="form-select @error('kelas') is-invalid @enderror" aria-label="Default select example" name="kelas" required>
                  <option selected="{{old('kelas', $data_profile !== 'no data' ? $data_profile->kelas : '')}}">{{old('kelas', $data_profile !== 'no data' ? $data_profile->kelas : '')}}</option>
                  <option value="Reg. Pagi">Reg. Pagi</option>
                  <option value="Reg. Sore">Reg. Sore</option>
                </select>
                @error('kelas')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              @endif
              <div class="col-12">
                <button type="submit" class="btn btn-block btn-primary">Next & Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @else
      <div class="row g-0">
        <div class="col col-xl-5">
          <div class="card-body p-4">
            <h1 class="display-1"><span class="text-danger">4</span><span class="text-primary">0</span><span class="text-success">4</span></h1>
            <h2 class="font-weight-bold display-4">Lost in Space</h2>
            <p>You have reached the edge of the universe.
              <br>The page you requested could not be found.
              <br>Dont'worry and return to the previous page.
            </p>
            <div class="mt-5"> <a href="javascript:;" class="btn btn-primary btn-lg px-md-5 radius-30">Go Home</a>
              <a href="/dashboard" class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">Back</a>
            </div>
          </div>
        </div>
        <div class="col-xl-7">
          <img src="assets/images/error/404-error.png" class="img-fluid" alt="">
        </div>
      </div>
      @endif
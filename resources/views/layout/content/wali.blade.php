<div class="col py-2">
  <div class="card radius-15">
    <div class="card-body">
      <div class="col-12 col-lg-12">
        <h5 class="mb-0">Informasi Data Orang Tua/Wali</h5>
        <hr>
        @if (session()->has('success'))
        <div class="alert border-0 bg-info alert-dismissible fade show py-2">
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
        <form method="POST" action="{{$data_wali !== 'no data' ? '/wali'.'/'.$data_account->id : '/wali'}} ">
          @if ($data_wali !== 'no data')
              @method('PUT')
          @endif    
          @csrf
        {{-- form ayah --}}
        <div class="card shadow-none border">
          <div class="card-header">
            <h6 class="mb-0">Ayah</h6>
          </div>
          <div class="card-body">

              <div class="row g-3">
              <input type="hidden" value="{{$data_account->id}}" name="id_user" required>
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <div class="card shadow radius-10">
                </div>
              </div>
              <div class="col-md-4"></div>
              <div class="col-6">
                <label class="form-label">Nama</label>
                <input type="text" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" value="{{old('nama_ayah', $data_wali !== 'no data' ? $data_wali->nama_ayah : '')}}" placeholder="Contoh : Gede Eko">
                @error('nama_ayah')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">NIK</label>
                <input type="text" name="nik_ayah" class="form-control @error('nik_ayah') is-invalid @enderror" value="{{old('nik_ayah', $data_wali !== 'no data' ? $data_wali->nik_ayah : '')}}" placeholder="Contoh : 3505194609960003">
                @error('nik_ayah')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir_ayah" class="form-control @error('tgl_lahir_ayah') is-invalid @enderror" value="{{old('tgl_lahir_ayah', $data_wali !== 'no data' ? $data_wali->tgl_lahir_ayah : '')}}">
                @error('tgl_lahir_ayah')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan_ayah" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" value="{{old('pekerjaan_ayah', $data_wali !== 'no data' ? $data_wali->pekerjaan_ayah : '')}}" placeholder="Contoh : Wiraswasta">
                @error('pekerjaan_ayah')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Pendidikan</label>
                <input type="text" name="pendidikan_ayah" class="form-control @error('pendidikan_ayah') is-invalid @enderror" value="{{old('pendidikan_ayah', $data_wali !== 'no data' ? $data_wali->pendidikan_ayah : '')}}" placeholder="Contoh : S1/SMA/SMP/SD">
                @error('pendidikan_ayah')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Penghasilan</label>
                <input type="number" name="penghasilan_ayah" class="form-control @error('penghasilan_ayah') is-invalid @enderror" value="{{old('penghasilan_ayah', $data_wali !== 'no data' ? $data_wali->penghasilan_ayah : '')}}" placeholder="Contoh : 3000000">
                @error('penghasilan_ayah')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>

          </div>
        </div>
        </div>
        {{-- form ibu --}}
         <div class="card shadow-none border">
          <div class="card-header">
            <h6 class="mb-0">Ibu Kandung</h6>
          </div>
          <div class="card-body">

              <div class="row g-3">
              <input type="hidden" value="{{$data_account->id}}" name="id_user">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <div class="card shadow radius-10">
                </div>
              </div>
              <div class="col-md-4"></div>
              <div class="col-6">
                <label class="form-label">Nama <small class="text-danger">*</small></label>
                <input type="text" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" value="{{old('nama_ibu', $data_wali !== 'no data' ? $data_wali->nama_ibu : '')}}" placeholder="Contoh : Ni Luh Silasmi" required>
                @error('nama_ibu')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">NIK</label>
                <input type="text" name="nik_ibu" class="form-control @error('nik_ibu') is-invalid @enderror" value="{{old('nik_ibu', $data_wali !== 'no data' ? $data_wali->nik_ibu : '')}}" placeholder="Contoh : 3505194609960003">
                @error('nik_ibu')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir_ibu" class="form-control @error('tgl_lahir_ibu') is-invalid @enderror" value="{{old('tgl_lahir_ibu', $data_wali !== 'no data' ? $data_wali->tgl_lahir_ibu : '')}}">
                @error('tgl_lahir_ibu')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan_ibu" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" value="{{old('pekerjaan_ibu', $data_wali !== 'no data' ? $data_wali->pekerjaan_ibu : '')}}" placeholder="Contoh : Wiraswasta">
                @error('pekerjaan_ibu')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Pendidikan</label>
                <input type="text" name="pendidikan_ibu" class="form-control @error('pendidikan_ibu') is-invalid @enderror" value="{{old('pendidikan_ibu', $data_wali !== 'no data' ? $data_wali->pendidikan_ibu : '')}}" placeholder="Contoh : S1/SMA/SMP/SD">
                @error('pendidikan_ibu')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Penghasilan</label>
                <input type="number" name="penghasilan_ibu" class="form-control @error('penghasilan_ibu') is-invalid @enderror" value="{{old('penghasilan_ibu', $data_wali !== 'no data' ? $data_wali->penghasilan_ibu : '')}}" placeholder="Contoh : 3000000">
                @error('penghasilan_ibu')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>

          </div>
        </div>
        </div>
        {{-- wali --}}
        <div class="card shadow-none border">
          <div class="card-header">
            <h6 class="mb-0">Wali</h6>
          </div>
          <div class="card-body">

              <div class="row g-3">
              <input type="hidden" value="{{$data_account->id}}" name="id_user">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <div class="card shadow radius-10">
                </div>
              </div>
              <div class="col-md-4"></div>
              <div class="col-6">
                <label class="form-label">Nama</label>
                <input type="text" name="nama_wali" class="form-control @error('nama_wali') is-invalid @enderror" value="{{old('nama_wali', $data_wali !== 'no data' ? $data_wali->nama_wali : '')}}" placeholder="Contoh : Ni Luh Silasmi">
                @error('nama_wali')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">NIK</label>
                <input type="text" name="nik_wali" class="form-control @error('nik_wali') is-invalid @enderror" value="{{old('nik_wali', $data_wali !== 'no data' ? $data_wali->nik_wali : '')}}" placeholder="Contoh : 3505194609960003">
                @error('nik_wali')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir_wali" class="form-control @error('tgl_lahir_wali') is-invalid @enderror" value="{{old('tgl_lahir_wali', $data_wali !== 'no data' ? $data_wali->tgl_lahir_wali : '')}}">
                @error('tgl_lahir_wali')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan_wali" class="form-control @error('pekerjaan_wali') is-invalid @enderror" value="{{old('pekerjaan_wali', $data_wali !== 'no data' ? $data_wali->pekerjaan_wali : '')}}" placeholder="Contoh : Wiraswasta">
                @error('pekerjaan_wali')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Pendidikan</label>
                <input type="text" name="pendidikan_wali" class="form-control @error('pendidikan_wali') is-invalid @enderror" value="{{old('pendidikan_wali', $data_wali !== 'no data' ? $data_wali->pendidikan_wali : '')}}" placeholder="Contoh : S1/SMA/SMP/SD">
                @error('pendidikan_wali')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-6">
                <label class="form-label">Penghasilan</label>
                <input type="number" name="penghasilan_wali" class="form-control @error('penghasilan_wali') is-invalid @enderror" value="{{old('penghasilan_wali', $data_wali !== 'no data' ? $data_wali->penghasilan_wali : '')}}" placeholder="Contoh : 3000000">
                @error('penghasilan_wali')
                <div class="sticky-sm-top text-danger">{{$message}}</div>
                @enderror
              </div>

          </div>
        </div>
        </div>

        <div class="row">
          <div class="col-6 mt-5">
            <a href="/profile" class="btn btn-block btn-secondary"> <i class="bi bi-arrow-left-circle"></i> kembali</a>
          </div>
          <div class="col-6 mt-5">
            <button type="submit" class="btn btn-block btn-primary d-xl-flex ms-auto">Next & Save</button>
          </div>
          </form>
        </div>
      </div>
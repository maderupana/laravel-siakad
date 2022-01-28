<div>
  @foreach ($test as $item)
  @dump($item->max('username'))
  @endforeach

  <div class="card radius-15">
    <div class="card-header">
      <strong> Daftar Validasi KRS Mahasiswa </strong>
    </div>
    <div class="card-body">
      <div >
      <div class="table-responsive">
        <table id="tableAjuanKrs" class="table table-hover" style="width:100%">
          <thead>
            <tr>
              <td colspan="2">
                 <select wire:model="angkatan" class="form-control cursor-pointer w-50 mb-3" list="datalistOptions">
                          <option value="">Sort by angkatan</option>
                      @foreach ($test as $item)
                          <option value="{{substr($item->pluck('username')->first(), 0,2)}}">{{'20'.substr($item->pluck('username')->first(), 0,2)}}</option>
                      @endforeach
                  </select>
              </td>
              <td colspan="2"></td>
              <td colspan="2"><input wire:model="search" class="form-control ms-auto" placeholder="Cari..."></td>
            </tr>
            <tr>
              <th>#</th>
              <th>NIM</th>
              <th>Nama Mahasiswa</th>
              <th>Periode</th>
              <th>Total SKS</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($test as $item)
            @php
            // $identitas_mhs = $data_mhs->where('id_registrasi_mahasiswa', $item[0]['id_mhs']);
            $totalSKS = collect($item)->pluck('sks')->sum();
            $periode = collect($item)->pluck('periode_semester')->first();
            
            @endphp

            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$item->pluck('username')->first()}}</td>
              <td>{{$item->pluck('nama')->first()}}</td>
              <td>{{ $periode }}</td>
              <td>{{ $totalSKS }}</td>
              <td>
                <p hidden>{{$item[0]['status_validasi'] == '' ? 'Tidak Valid' : $item[0]['status_validasi']}}</p>
                
                @if (collect($item)->pluck('sks')->sum() >= 24)
                <span class="btn btn-danger disabled">Total SKS Tidak Valid</span>
                @else
                <div class="btn-group" role="group">
                  <form wire:submit.prevent="getToken()">
                    <button wire:click="$set('id_mhs_ajuan', '{{$item[0]['id_mhs']}}')" class="btn btn-info btn-sm position-relative text-white" data-bs-toggle="modal" data-bs-target="#modalKHS">KHS</button>
                  </form>
                  <button wire:click="$set('id_mhs_ajuan', '{{$item[0]['id_mhs']}}')" class="btn btn-primary btn-sm position-relative" data-bs-toggle="modal" data-bs-target="#modalAjuanKrs">
                    Cek
                    <span class="position-absolute top-0 start-100 translate-middle p-2 {{$item[0]['status_validasi']== 'Valid' ? 'bg-success' : 'bg-danger'}} border border-light rounded-circle">
                      <span class="visually-hidden">New alerts</span>
                    </span>
                  </button>
                  
                </div>

                @endif
                
              </td>
            </tr>
            
            @endforeach
          </tbody>
          
        </table>
        {{-- {{ $test->links() }} --}}
      </div>
    </div>
  </div>


















  {{-- <div class="card radius-15">
    <div class="card-header">
      <strong> Daftar Validasi KRS Mahasiswa </strong>
    </div>
    <div class="card-body">
      <div >
      <div class="table-responsive">
        <table id="tableAjuanKrs" class="table table-hover" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>NIM</th>
              <th>Nama Mahasiswa</th>
              <th>Periode</th>
              <th>Total SKS</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data_krs_mhs->groupBy('id_mhs') as $item)
            @php
            $identitas_mhs = $data_mhs->where('id_registrasi_mahasiswa', $item[0]['id_mhs']);
            $totalSKS = collect($item)->pluck('sks')->sum();
            $periode = collect($item)->pluck('periode_semester')[0];
            
            @endphp

            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$identitas_mhs->pluck('username')[0]}}</td>
              <td>{{$identitas_mhs->pluck('nama')[0]}}</td>
              <td>{{ $periode }}</td>
              <td>{{ $totalSKS }}</td>
              <td>
                <p hidden>{{$item[0]['status_validasi'] == '' ? 'Tidak Valid' : $item[0]['status_validasi']}}</p>
                
                @if (collect($item)->pluck('sks')->sum() >= 24)
                <span class="btn btn-danger disabled">Total SKS Tidak Valid</span>
                @else
                <div class="btn-group" role="group">
                  <form wire:submit.prevent="getToken()">
                    <button wire:click="$set('id_mhs_ajuan', '{{$item[0]['id_mhs']}}')" class="btn btn-info btn-sm position-relative text-white" data-bs-toggle="modal" data-bs-target="#modalKHS">KHS</button>
                  </form>
                  <button wire:click="$set('id_mhs_ajuan', '{{$item[0]['id_mhs']}}')" class="btn btn-primary btn-sm position-relative" data-bs-toggle="modal" data-bs-target="#modalAjuanKrs">
                    Cek
                    <span class="position-absolute top-0 start-100 translate-middle p-2 {{$item[0]['status_validasi']== 'Valid' ? 'bg-success' : 'bg-danger'}} border border-light rounded-circle">
                      <span class="visually-hidden">New alerts</span>
                    </span>
                  </button>
                  
                </div>

                @endif
                
              </td>
            </tr>
            
            @endforeach
          </tbody>
          
        </table>
      </div>
    </div>
  </div> --}}
  </div>



  <!-- The Modal Validasi KRS-->
  <div wire:ignore.self class="modal fade show" id="modalAjuanKrs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          @php
          $nama_mhs = $data_mhs->where('id_registrasi_mahasiswa', $id_mhs_ajuan)->pluck('nama');
          @endphp
          <h4 class="modal-title">Detail KRS <small wire:loading.remove>{{collect($nama_mhs)->first()}}</small></h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">

          <div class="d-flex justify-content-center">
            <div class="spinner-grow" role="status" wire:loading>
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>

          <div wire:loading.remove class="table-responsive">
            <table class="table table-hover">
              <tr>
                <th>#</th>
                <th>Nama Mata Kuliah</th>
                <th>Semester</th>
                <th>SKS</th>
              </tr>

              @foreach ($data_krs_mhs->where('id_mhs', $id_mhs_ajuan) as $vl)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$vl['nama_matkul']}}</td>
                <td>{{$vl['semester']}}</td>
                <td>{{$vl['sks']}}</td>
              </tr>
              @endforeach
            </table>
          </div>
          
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <form wire:submit.prevent="validasiKRSf()">

            <div class="row ms-auto" wire:loading.remove>
              {{-- <div class="col-sm-7 ms-auto">
                <textarea wire:model="ket_validate_krs" rows="1" placeholder="keterangan anda..." class="form-control"></textarea>
              </div> --}}
              Status Validasi : 
              <div class="col-sm">
                
                <select wire:model="validasi_krs" name="validasi_krs" class="form-control ml-auto cursor-pointer" required>
                  <option selected value="{{$data_krs_mhs->where('id_mhs', $id_mhs_ajuan)->first()['status_validasi']}}">{{$data_krs_mhs->where('id_mhs', $id_mhs_ajuan)->first()['status_validasi']}}</option>
                  <option value="Valid">Valid</option>
                  <option value="Tidak Valid">Tidak Valid</option>
                </select>
              </div>
              <div class="col-sm">
                <button type="submit" class="btn btn-outline-primary">Simpan</button>
              </div>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>



  <!-- The Modal Cek KHS-->
  <div wire:ignore.self class="modal fade show" data-bs-backdrop="static" data-bs-keyboard="false" id="modalKHS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          @php
          $nama_mhs = $data_mhs->where('id_registrasi_mahasiswa', $id_mhs_ajuan)->pluck('nama')
          @endphp
          <h4 class="modal-title">Detail KHS
            <small wire:loading.remove>{{collect($nama_mhs)->first()}}</small>
          </h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="$set('semesterKHS', '0')"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          
          <select wire:model="semesterKHS" class="form-control cursor-pointer">
            <option selected value="0">Pilih Semester</option>
            @for ($i = 1; $i < 15; $i++)
            <option value="{{$i}}">Semester {{$i}}</option>
            @endfor
          </select>
          <hr>
          <div class="d-flex justify-content-center">
            <div class="spinner-grow" role="status" wire:loading>
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>

          <div wire:loading.remove class="table-responsive">
            <table class="table table-hover">
              <tr>
                <th>#</th>
                <th>Nama Mata Kuliah</th>
                <th>Nilai Huruf</th>
                <th>SKS</th>
              </tr>
              @if ($semesterKHS == 0)
                  <tr>
                    <td colspan="4"><i>Pilih Semester untuk melihat Data</i></td> 
                  </tr>
              @endif
              
              @php
              $collection_KHS = collect($GetDataKHS)->where('smt_diambil', $semesterKHS);
              $sum_sks = $collection_KHS->pluck('sks_mata_kuliah')->sum();   
              @endphp
              @foreach ($collection_KHS as $value) 
              @php
                  $sksxindeks = $value['sks_mata_kuliah'] * $value['nilai_indeks'];
                  $totalsksxindeks += $sksxindeks;
              @endphp
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$value['nama_mata_kuliah']}}</td>
                <td>{{$value['nilai_huruf']}}</td>
                <td>{{$value['sks_mata_kuliah']}}</td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <h6>
            <span class="badge bg-light text-dark ml-auto">
              @if ($sum_sks == 0)
              {{'0'}}
              @else
              {{'IPS MAHASISWA : '.number_format(round($totalsksxindeks/$sum_sks, 2),2)}}
              @endif
            </span>
          </h6>
          <button class="btn btn-outline-secondary" data-bs-dismiss="modal" wire:click="$set('semesterKHS', '0')">OK</button>
        </div>
      </div>
    </div>
  </div>
</div>


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


<div class="card radius-15">
  <div class="card-header">
    <h1>Reguler KRS {{$prodi[0]}}</h1>
  </div>
</div>
@if ($cek_nilai_kosong->isNotEmpty())
<div class="card radius-15">
  <div class="card-header">
    <strong> MATA KULIAH TIDAK VALID
      <a class="btn btn-sm btn-outline-info" data-bs-toggle="modal" href="#modal-info-nilai" role="button">kenapa nilai matakuliah saya tidak valid?</a>
    </strong>
  </div>
  <div class="card-body">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kode MK</th>
          <th scope="col">Nama Matakuliah</th>
          <th scope="col">SKS</th>
          <th scope="col">Nilai Matakuliah</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cek_nilai_kosong as $val)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$val['kode_mata_kuliah']}}</td>
          <td>{{$val['nama_mata_kuliah']}}</td>
          <td>{{$val['sks_mata_kuliah']}}</td>
          <td class="bg-danger text-white"><strong>{{$val['nilai_huruf'] == null ? 'Kosong' : ''}}</strong></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@else

{{-- KRS MATA KULIAH --}}


<livewire:krs/>


@endif

{{-- Modal PA --}}
{{-- modal Dosen --}}

<div class="modal fade show" id="modalPA" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Daftar Nama Dosen PA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-responsive table-hover">
          <tr>
            <th>#</th>
            <th>Dosen PA</th>
            <th>Pilih</th>
          </tr>
          <form action="/krs" method="POST">
            @csrf
          @foreach ($userDosenPA as $iPA)
          
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$iPA['nama']}}</td>
              <td><input type="radio" name="pilih_pa" value="{{$iPA['id']}}" class="cursor-pointer" {{$id_pa_saved == $iPA['id'] ? 'checked' :''}}>
              </td>
            </tr>
            @endforeach
          </table>
          {{-- @dump($id_pa_saved) --}}
        </div>
        <div class="modal-footer">
          @error('pilih_pa')
            <div class="sticky-sm-top text-danger">Anda belum memilih Dosen PA</div>
            @enderror
          <button class="btn btn-primary" type="submit">Proses Validasi ke PA</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal Info Nilai Tidak Keluar --}}

<div class="modal fade" id="modal-info-nilai" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Informasi nilai tidak valid/tidak muncul.</h5>
      </div>
      <div class="modal-body" style="text-decoration: none">
        <p>
          1. Pastikan anda menyelesaikan administrasi pada bagian keuangan.
          2. Pastikan dosen pengampu terkonfirmasi memberikan nilai kepada anda.
        </p>
        <hr>
        <small class="mt-3">nb : * jika syarat diatas terpenuhi, maka secara otomatis pengisian KRS dapat anda lakukan.</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">OK</button>
      </div>
    </div>
  </div>
</div>
</div>

@error('pilih_pa')
  <script>
    $(document).ready(function(){
      $('#modalPA').modal('show')
    });
  </script>
@enderror
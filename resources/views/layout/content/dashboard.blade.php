{{-- Maru --}}
@if ($data_account['status'] == 'Maru')

<div class="card radius-15">
  <div class="card-header">
    Selamat {{$salam}}, <i>{{$data_account->nama}}</i>
  </div>

  <div class="card-body">
    <div class="text-center">
      <div class="row">
        <div class="col-12">
          <img src="" class="rounded img-fluid" alt="...">
        </div>
      </div>
    </div>
  </div>
</div>


@endif







{{-- Mahasiswa Dashboard --}}
@if ($data_account['status'] == 'Mahasiswa')

<div class="card radius-15">
  <div class="card-header">
    Selamat {{$salam}}, <i>{{$data_account->nama}}</i>
  </div>

  <div class="card-body">
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Alur KRS Mahasiswa #1
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="row">
              <div class="col-12">
                <img src="/assets/images/error/alur-penyusuanan-krs.jpeg" class="rounded img-fluid" alt="...">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Video Tutorial KRS #2
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="text-center">
              <div class="row">
                <div class="col">
                  <div class="card">
                    <iframe src="https://www.youtube.com/embed/n4XcoNWm5Qc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <iframe src="https://www.youtube.com/embed/ytgtowYHFxs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="text-center">

    </div> -->
  </div>
</div>


@endif


{{-- Dosen Dashboard--}}

@if ($data_account['status'] == 'Dosen')
<div class="card radius-15">
  <div class="card-header">
    Selamat {{$salam}}, <i>{{$data_account->nama}}</i>
  </div>
  <div class="card-body">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-2 row-cols-xxl-6">
      <a href="/ajuan-krs" class=" text-decoration-none">
        <div class="col">
          <div class="card radius-10">
            <div class="card-body text-center">
              <div class="widget-icon mx-auto mb-3 bg-light-danger text-danger">
                <i class="bi bi-hdd-fill"></i>
              </div>
              <p class="mb-0">Ajuan KRS belum tervalidasi</p>
              <h3 class="mt-4 mb-0">{{collect($count_krs)->whereIn('status_validasi', [null, 'Tidak Valid'])->groupBy('id_mhs')->count()}} Mahasiswa</h3>
            </div>
          </div>
        </div>
      </a>
      <a href="/ajuan-krs" class=" text-decoration-none">
        <div class="col">
          <div class="card radius-10">
            <div class="card-body text-center">
              <div class="widget-icon mx-auto mb-3 bg-light-success text-success">
                <i class="bi bi-people-fill"></i>
              </div>
              <p class="mb-0">Ajuan KRS sudah tervalidasi</p>
              <h3 class="mt-4 mb-0">{{collect($count_krs)->where('status_validasi', 'Valid')->groupBy('id_mhs')->count()}} Mahasiswa</h3>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Video Tutorial validasi KRS
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">

            <div class="text-center">
              <div class="card">
                <iframe src="https://www.youtube.com/embed/mmyInvNkZrc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>


</div>
@endif

{{-- admin dan operator keu Dashboard --}}


@if ($data_account['status'] == 'admin_keu' || $data_account['status'] == 'operator')
<div class="card radius-15">
  <div class="card-header">
    Selamat {{$salam}}, <i>{{$data_account->nama}}</i>
  </div>
</div>
@endif
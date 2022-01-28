<div>


  <div class="card radius-15">
    <div class="card-header">
      <strong>KRS Periode {{$namaPeriode[0]}}</strong>
    </div>
    <div class="card-body">

        {{-- Open periode KRS--}}
        @if ($accesOpenPeriode[0] == 1)
        @if ($alreadySaved->pluck('status_validasi')->first() == 'Valid' && $alreadySaved->isNotEmpty())
            <div class="alert bg-success text-white alert-dismissible fade show" role="alert">
                KRS ANDA SUDAH VALID
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <div class="table-responsive">
            <table class="table table-hover">
              <tr>
                <th>#</th>
                <th>Nama Mata Kuliah</th>
                <th>Semester</th>
                <th>SKS</th>
              </tr>

              @foreach ($alreadySaved as $vl)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$vl['nama_matkul']}}</td>
                <td>{{$vl['semester']}}</td>
                <td>{{$vl['sks']}}</td>
              </tr>
              @endforeach
            </table>
          </div>

        @else
            @if($alreadySaved->pluck('status_validasi')->first() == 'Tidak Valid')

                <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
                   KRS Anda Tidak Valid silahkan hubungi dosen PA untuk melakukan bimbingan.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif


              @foreach ($groupingMatkulKurikulum as $idx => $items)

                    @if ($loop->iteration % 2 == $groupEvenOdd)

                        <div class="card radius-15">
                          <div class="card-header">
                            <h3>Semester : {{collect($items)->pluck('semester')[0]}}</h3>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-responsive table-hover">
                                <tr>
                                  <th>#</th>
                                  <th>Nama Matakuliah</th>
                                  <th>Nilai</th>
                                  <th>SKS</th>
                                  <th>Pilih</th>
                                </tr>
                                @php
                                $nilaisum = 0
                                @endphp
                                @foreach ($items as $index => $item)
                                    @php
                                    $nilaiMatkul = $transkrip_sementara->where('nama_mata_kuliah', $item['nama_mata_kuliah'])->pluck('nilai_huruf')
                                    @endphp
                                    <tr>
                                      <td>{{$loop->iteration}}</td>
                                      
                                      <td>{{$item['nama_mata_kuliah']}}</td>
                                      <td>{{$nilaiMatkul->first()}}</td>
                                      <td>{{$item['sks_mata_kuliah']}}</td>
                                      
                                      <td>
                                        <form wire:submit.prevent="{{$alreadySaved->where('id_matkul', $item['id_matkul'])->pluck('id_matkul')->isEmpty() ? 'store()' : 'destroy()'}}">
                                            @if ($alreadySaved->where('id_matkul', $item['id_matkul'])->pluck('id_matkul')->isNotEmpty())
                                                <button wire:click="$set('id_matkul_saved', '{{$alreadySaved->where('id_matkul', $item['id_matkul'])->pluck('id')->first()}}')" class="btn btn-sm bg-transparent cursor-pointer rounded-pill hovering-pan text-danger"><i class="bi bi-trash hovered"></i></button>
                                            @else
                                                <button wire:click="$set('id_matkul', '{{$item['id_matkul']}}')" class="btn bg-transparent btn-sm cursor-pointer rounded-pill text-primary "><i class="bi bi-plus-circle-fill hovered"></i></button>
                                            @endif
                                            {{-- @dump($alreadySaved->where('id_matkul', $item['id_matkul'])->pluck('id')->first()) --}}
                                      </form>
                                      </td>

                                    </tr>
                                    @php $nilaisum += $item['sks_mata_kuliah'] @endphp
                                @endforeach
                                <tr>
                                  <td colspan="3" class="ms-auto"> Total SKS : {{$nilaisum}}</td>
                                </tr>
                              </table>
                              </div>
                            </div>
                        </div>

                    @endif

              @endforeach
              <h5>Total SKS diambil :

                
                @php
                $totalSksDiambil = 0;
                @endphp
                @foreach ($alreadySaved->where('id_mhs', $dataUser['id_registrasi_mahasiswa']) as $vlu)
                      @php $totalSksDiambil += $vlu['sks'] @endphp
                @endforeach
                {{$totalSksDiambil}}
                @if ($totalSksDiambil > 0 && $totalSksDiambil <= 24) <div class="row">
                  <div class="col-sm-12">
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalPA">Pilih Dosen PA</button>
                  </div>
                  </div>
                  @else
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert bg-danger" role="alert">
                        Maksimal SKS yang diambil adalah <strong>24 SKS.</strong>
                      </div>

                    </div>
                  </div>
                @endif
            </h5>
        @endif
        @endif
        
        


        {{-- Open periode KRS--}}
        @if ($accesOpenPeriode[0] == 0)
           <div class="alert bg-warning text-bold text-white" role="alert">
            <h3><i class="bi bi-exclamation-circle-fill"></i> Periode belum dibuka</h3>
          </div>
        @endif
  
    </div>
  </div>


</div>


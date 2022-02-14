{{-- @dd($getTranskrip) --}}
{{-- @dump(collect($getKurikulum)->sortBy('semester'))
@dump($getTranskrip) --}}
    <div class="card radius-15">
        <div class="card-body">
            <div class="card radius-15">
                <div class="card-header">
                    <h6 class="mb-0">Transkrip Mahasiswa</h6>
                </div>
                <div class="card-body" wire:loading.remove>
                    <div class="card shadow-none border">

                        <div class="card-body overflow-scroll">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Matakuliah</th>
                                        <th scope="col">K</th> <!-- sks matkul -->
                                        <th scope="col">N</th> <!-- nilai index matkul  = nilai huruf-->
                                        <th scope="col" class=" text-center">K * N</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $totalsksxindeks = 0; $no = 1;?>
                                    @foreach (collect($getKurikulum)->sortBy('semester') as $key => $data)
                                    @foreach ($getTranskrip as $item)
                                        @if ($item['kode_mata_kuliah'] == $data['kode_mata_kuliah'])
                                             <tr>
                                        @php
                                        $sks = $item['sks_mata_kuliah'];
                                        $indeks = $item['nilai_indeks'];
                                        $sksxindeks = $sks * $indeks;
                                        $totalsksxindeks += $sksxindeks;
                                        @endphp
                                        <th scope="row">{{$no++}}</th>
                                        <td>
                                            {{$item['nama_mata_kuliah']}}
                                        </td>
                                        <td>{{substr($sks,0,1)}}</td>
                                        <td>{{$item['nilai_huruf']}}</td>
                                        <td class=" text-center">{{$sksxindeks}}</td>
                                    </tr>
                                        @endif
                                    @endforeach
                                   
                                    @endforeach
                                    <tr>
                                        <td colspan="2" align="right"><strong>Totol SKS :</strong></td>
                                        <td><strong>{{$total_sks}}</strong></td>
                                        <td colspan="1"></td>
                                        <td class=" text-center"><strong>{{$totalsksxindeks}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right">
                                            <strong>IPK (Indeks Prestasi Komulatif) :</strong>
                                        </td>
                                        <td>
                                            <strong>{{ $totalsksxindeks == 0 ? '0' : number_format(round($totalsksxindeks/$total_sks,2),2)}}</strong>
                                        </td>
                                        <td colspan="3" align="right">
                                             <a target="_blank" href="/cetak-transkrip" class="btn btn-primary btn-sm ms-auto">Cetak Transkrip : <i class="bi bi-printer"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" align="right">
                                            {{-- <a target="_blank" href="/cetak-khs/{{$idsemester}}" class="btn btn-primary btn-sm">Cetak KHS : <i class="bi bi-printer"></i></a> --}}

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

               
            </div>
            
        </div>
        
    </div>
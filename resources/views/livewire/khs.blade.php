<div>


    <div class="card radius-15">
        <div class="card-header">
            <h6 class="mb-0">KHS : {{$getKHS->pluck('nama_program_studi')->isEmpty() ? '' : $getKHS->pluck('nama_program_studi')[0]}}</h6>
        </div>
        <div class="card-body">
            <div class="card shadow-none border">

                <section class="form-control cursor-pointer">
                    <select wire:model="idsemester" class="form-select cursor-pointer" aria-label="Default select example" name="cek_smester" required>
                        <option value="0">{{'Pilih Tahun Akdemik'}}</option>
                        @foreach ($arridSmt as $key => $item)
                        <option value="{{$key}}">{{$item[0]['nama_periode']}}</option>
                        @endforeach
                    </select>
                </section>
            </div>
            <div class="d-flex justify-content-center">
                <div class="spinner-grow" role="status" wire:loading>
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            @if ($idsemester != 0)
            <div class="card radius-15">
                <div class="card-header">
                    <h6 class="mb-0">KHS Mahasiswa Semester : {{ $idsemester == 0 || $idsemester == null  ? '' : $c}}</h6>
                </div>
                <div class="card-body" wire:loading.remove>
                    <div class="card shadow-none border">

                        <div class="card-body overflow-scroll">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode MK</th>
                                        <th scope="col">Nama Matakuliah</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Nilai Huruf</th>
                                        <th scope="col">Nilai Indeks</th>
                                        <th scope="col">SKS * Indeks</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $totalsksxindeks = 0; ?>
                                    @foreach ($getKHS as $key => $data)
                                    <tr>
                                        @php
                                        $sksxindeks = $data['sks_x_indeks'];
                                        $totalsksxindeks += $sksxindeks;
                                        $kodeMK = $listMatkul->where('id_matkul', $data['id_matkul']);
                                        @endphp
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            {{$kodeMK->pluck('kode_mata_kuliah')[0]}}
                                        </td>
                                        <td>{{$data['nama_mata_kuliah']}}</td>
                                        <td>{{ Str::substr($data['sks_mata_kuliah'], 0,1)}}</td>
                                        <td>{{$data['nilai_huruf']}}</td>
                                        <td>{{$data['nilai_indeks']}}</td>
                                        <td>{{ number_format(round($sksxindeks,1),1) }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" align="right"><strong>Totol SKS :</strong></td>
                                        <td><strong>{{$total_sks}}</strong></td>
                                        <td colspan="2"></td>
                                        <td><strong>{{$totalsksxindeks}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" align="right"><strong>IPS (Indeks Prestasi Semester) :</strong></td>

                                        <td>
                                            @if ($total_sks == '')
                                            <strong>{{'0'}}</strong>
                                            @else
                                            <strong>{{number_format(round($totalsksxindeks/$total_sks, 2),2)}}</strong>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" align="right">
                                            <strong>IPK (Indeks Prestasi Komulatif) :</strong>
                                        </td>
                                        <td>
                                            <strong>{{ $b_totalsksxindeks == 0 ? '0' : number_format(round($b_totalsksxindeks/$b_total_sks,2),2)}}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" align="right">
                                            <a target="_blank" href="/cetak-khs/{{$idsemester}}" class="btn btn-primary btn-sm">Cetak KHS : <i class="bi bi-printer"></i></a>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @elseif ($idsemester == 0 )
                <div class="card radius-15 text-center">
                    <h4 class="center">No Data</h4>
                </div>
                @endif
            </div>
            
        </div>
        
    </div>
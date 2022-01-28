<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/page-print.css">
</head>

<body onload="window.print()">
    <page size="A4">

        <div class="row mb-3 mt-2 border border-dark border-bottom-5 border-top-0">
            <div class="col-sm-4 mr-2">
                <img src="/assets/images/logo-icon.png" alt="stie satya dharma" style="width: 15%;" class=" position-fixed">
            </div>
            <div class="col-sm-8 text-center font-12 border-dark">
                <h5 class="mb-0">SEKOLAH TINGGI ILMU EKONOMI SATYA DHARMA</h5>
                <i class="mb-0 text-danger" style="font-size: 22px;">School of Economic with Spiritual Insight</i>
                <p class="mb-0">www.stie-satyadaharma.ac.id | info@stie-satyadaharma.ac.id</p>
                <p>Jl. Yudistira Selatan No 11, Singaraja | Telp. (0362) 22950</p>
            </div>
        </div>
        <div class="row">
            <h5 class=" text-center text-decoration-underline" style="text-decoration-skip-ink: none">
                
                    KARTU HASIL STUDI (KHS)
                
            </h5>
            <div class="d-flex bd-highlight mb-2 mt-2">
                <div class="p-2 bd-highlight">
                    <table>
                        <tr>
                            <th width="130px">
                                Nama Mahasiswa
                            </th>
                            <td>:</td>
                            <td>{{$data_account->nama}}</td>
                        </tr>
                        <tr>
                            <th>
                                Program Studi
                            </th>
                            <td>:</td>
                            <td>{{$prodi[0]}}</td>
                        </tr>
                        <tr>
                            <th>
                                Semester
                            </th>
                            <td>:</td>
                            <td>{{$smt}}</td>
                        </tr>
                    </table>
                </div>
                <div class="ms-auto p-2 bd-highlight">
                    <table>
                        <tr>
                            <th width="70px">
                                NIM
                            </th>
                            <td>:</td>
                            <td>{{$data_account->username}}</td>
                        </tr>
                        <tr>
                            <th>
                                Periode
                            </th>
                            <td>:</td>
                            
                            <td>
                               {{$periode}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>


        <table class="table table-bordered border border-dark">
            <thead>
                <tr>
                    <th rowspan="2" class="center-align">No</th>
                    <th rowspan="2">Kode MK</th>
                    <th rowspan="2">Nama Matakuliah</th>
                    <th rowspan="2" class="center-align">SKS</th>
                    <th colspan="3" class="center-align">Nilai</th>
                    <th rowspan="2" class="max-width center-align">
                        SKS
                        <p class=" mb-0">*</p>
                        Indeks
                    </th>
                </tr>
                <tr>
                    <th class="center-align">Angka</th>
                    <th class="center-align">Huruf</th>
                    <th class="center-align">Indeks</th>
                </tr>
            </thead>
            <tbody>

                <?php $totalsksxindeks = 0; ?>
                @foreach ($data_pddikti as $data)
                <tr>
                    <?php
                    $sksxindeks = $data['sks_x_indeks'];
                    $totalsksxindeks += $sksxindeks;
                    ?>
                    <td align="center">{{$loop->iteration}}</td>
                    <td>{{$listMatkul->where('id_matkul', $data['id_matkul'])->pluck('kode_mata_kuliah')[0]}}</td>
                    <td>{{$data['nama_mata_kuliah']}}</td>
                    <td align="center">{{ Str::substr($data['sks_mata_kuliah'], 0,1)}}</td>
                    <td align="center">{{ $data['nilai_angka']}}</td>
                    <td align="center">{{$data['nilai_huruf']}}</td>
                    <td class="center-align">{{$data['nilai_indeks']}}</td>
                    <td class="center-align">{{ $sksxindeks}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" align="right"><strong>Totol SKS :</strong></td>
                    <td class="center-align"><strong>{{$total_sks}}</strong></td>
                    <td colspan="3"></td>
                    <td class="center-align"><strong>{{$totalsksxindeks}}</strong></td>
                </tr>
                <tr>
                    <td colspan="7" align="right"><strong>IPS (Indeks Prestasi Semester) :</strong></td>

                    <td class="center-align">
                        @if ($total_sks == '')
                        <strong>{{'0'}}</strong>
                        @else
                        <strong>{{number_format(round($totalsksxindeks/$total_sks, 2),2)}}</strong>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right">
                        <strong>IPK (Indeks Prestasi Komulatif) :</strong>
                    </td>
                    <td class="center-align">
                        @php $b_totalsksxindeks = 0; @endphp
                        @foreach ($get_khs_between as $item)
                        @php
                        $b_sksxindeks = $item['sks_mata_kuliah'] * $item['nilai_indeks'];
                        $b_totalsksxindeks += $b_sksxindeks;
                        @endphp

                        @endforeach
                        @if ($b_total_sks == '')
                        <strong>{{'0'}}</strong>
                        @else
                        <strong>{{number_format(round($b_totalsksxindeks/$b_total_sks,2),2)}}</strong>
                        @endif
                    </td>
                </tr>


            </tbody>
        </table>
        <div class="d-flex">
            <div class="ms-auto font-13 text-center mt-4">
                <p class="mb-0"> Buleleng, {{now()->isoFormat('DD MMMM Y')}}</p>
                <p> Ketua Program Studi</p>
                <br>
                <br>
                <p class="mb-0"><strong class=" text-decoration-underline" style="text-decoration-skip-ink: none;">Ni Luh Eka Yudi Prastiwi, S.E.,M.M</strong></p>
                <p>1212121212</p>
            </div>
        </div>
    </page>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="/assets/css/page-print.css"> --}}
    <style>

        table {
            font-family: serif;
            font-size: 11px;
        }
      
        .pr {
            padding-right: 1px !important;
            
        }
        
        .pl {
            padding-left: 1px !important;
            
            
        }

        .tb-ip {
            padding-top: -15px !important;
            margin-top: -15px !important;
        }
      
    </style>
</head>

<body onload="window.print()">
    <page size="A4">
        <div class="row">
            <h5 class=" text-center" style="text-decoration-skip-ink: none;font-family: serif;">

                TRANSKRIP NILAI
                <br> <small>Nomor :</small>

            </h5>
            <div class="d-flex bd-highlight mb-2 mt-2">
                <div class="p-2 bd-highlight">
                    <table>
                        <tr>
                            <th width="180px">
                                NAMA
                            </th>
                            <td>:</td>
                            <td>{{Str::upper($data_account->nama)}}</td>
                        </tr>
                        <tr>
                            <th>
                                TEMPAT TANGGAL LAHIR
                            </th>
                            <td>:</td>
                            <td>{{Str::of($bio_mhs['tempat_lahir'])->title.', '. $tgl_lahir}}</td>
                        </tr>
                        <tr>
                            <th>
                                NOMOR INDUK MAHASISWA
                            </th>
                            <td>:</td>
                            <td>{{$getlistMhs->first()['nim']}}</td>
                        </tr>
                        <tr>
                            <th>
                                TAHUN MASUK
                            </th>
                            <td>:</td>

                            <td>
                                {{substr($riwayatPendidikan->first()['tanggal_daftar'], 0, 4)}}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="ms-auto p-2 bd-highlight">
                    <table>
                        <tr>
                            <th width="150px">
                                JURUSAN
                            </th>
                            <td>:</td>
                            <td>{{substr($getlistMhs->first()['nama_program_studi'], 3)}}</td>
                        </tr>
                        <tr>
                            <th>
                                PROGRAM STUDI
                            </th>
                            <td>:</td>

                            <td>
                                {{$getlistMhs->first()['nama_program_studi']}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                TAHUN LULUS
                            </th>
                            <td>:</td>

                            <td>
                                -
                            </td>
                        </tr>

                    </table>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col pr">
                <table class="table table-bordered border border-dark table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                            <th>K</th>
                            <th>N</th>
                            <th>K * N</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php 
                        $totalsksxindeks = 0;
                        $totalsksxindeks2 = 0;
                        $no = 1; 
                        $no_tb2 = 1;
                        $countloop = count($getTranskrip);
                        $pembagi = 2;
                        $sisabagi = $countloop % $pembagi;
                        $hasilbagi = ($countloop - $sisabagi) / $pembagi;
                        $nilaitb1 = $hasilbagi + $sisabagi;
                        @endphp
                        
                        
                        @foreach (collect($getTranskrip)->sortBy('smt_diambil') as $item)
                        
                        @if($no <= $nilaitb1)
                                @php
                                $sks = $item['sks_mata_kuliah'];
                                $indeks = $item['nilai_indeks'];
                                $sksxindeks = $sks * $indeks;
                                $totalsksxindeks += $sksxindeks;
                                @endphp
                            <tr>
                                <td scope="row">{{$no++}}</td>
                                <td>
                                    {{Str::replace('Ii', 'II', Str::of($item['nama_mata_kuliah'])->title)}}
                                </td>
                                <td>{{substr($sks,0,1)}}</td>
                                <td>{{$item['nilai_huruf']}}</td>
                                <td class=" text-center">{{$sksxindeks}}</td>
                            </tr>
                        @endif
                      
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col pl">
                <table class="table table-bordered border border-dark table-2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                            <th>K</th>
                            <th>N</th>
                            <th>K * N</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $notb2 = $nilaitb1 + 1; @endphp
                        
                        @foreach (collect($getTranskrip)->sortBy('smt_diambil') as $item)
                        
                        @if($no_tb2++ > $nilaitb1)
                                @php
                                $sks = $item['sks_mata_kuliah'];
                                $indeks = $item['nilai_indeks'];
                                $sksxindeks = $sks * $indeks;
                                $totalsksxindeks2 += $sksxindeks;
                                @endphp
                            <tr>
                                <td scope="row">{{$notb2++}}</td>
                                <td>
                                     {{Str::replace('Ii', 'II', Str::of($item['nama_mata_kuliah'])->title)}}
                                </td>
                                <td>{{substr($sks,0,1)}}</td>
                                <td>{{$item['nilai_huruf']}}</td>
                                <td class=" text-center">{{$sksxindeks}}</td>
                            </tr>
                            
                        @endif
                        @endforeach
                            @if($sisabagi == 1)
                                <tr>
                                    <td>&nbsp</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                    </tbody>
                </table>
                
            </div>
        </div>
        <table class="table border border-dark tb-ip">
            <tr>
                <td rowspan="3" width="50%">JUDUL  {{$getlistMhs->first()['nama_program_studi'] == 'S1 Manajemen' ? 'SKRIPSI ' : 'TA '}} : <br>
                </td>

                
                
                <td align="right" class=" border-0">Total Kredit</td>
                <td width="20%" class=" border-0"> : {{collect($getTranskrip)->sum('sks_mata_kuliah')}}</td>
            </tr>
            <tr>
               

                <td align="right" class=" border-0">IP Komulatif</td>
                @php 
                $allsksxindeks =  $totalsksxindeks2 + $totalsksxindeks; 
                $ipk = number_format(round($allsksxindeks/collect($getTranskrip)->sum('sks_mata_kuliah'),2),2);
                @endphp
                <td width="20%" class=" border-0"> : {{$allsksxindeks == 0 ? '0' : $ipk}}</td>
            </tr>
            <tr>
             

                <td align="right" class=" border-0">Predikat</td>
    
                <td width="20%"> : 
                    @if ($ipk >= 3.51) 
                        {{"Dengan Pujian"}}
                    @elseif ($ipk < 2.77) 
                        {{'Memuaskan'}}
                    @elseif ($ipk < 3.51) 
                        {{'Sangat Memuaskan'}}
                    @else 
                        {{'-'}}
                    @endif
                </td>
            </tr>
        </table>
        {{-- @dump($getTranskrip) --}}
        <div class="d-flex" style="font-family: serif">
            <div class="ms-auto font-13 text-center mt-4">
                <p class="mb-0"> Buleleng, {{now()->isoFormat('DD MMMM Y')}}</p>
                <p> Ketua Program Studi {{$getlistMhs->first()['nama_program_studi']}}</p>
                <br>
                <br>
                @if ($getlistMhs->first()['nama_program_studi'] == 'S1 Manajemen')
                <p class="mb-0"><strong style="border-bottom: 1px solid black;">Ni Luh Putu Eka Yudi Prastiwi, S.E.,M.M</strong></p>
                
                @endif

                @if ($getlistMhs->first()['nama_program_studi'] == 'D3 Akuntansi')
                <p class="mb-0"><strong style="border-bottom: 1px solid black;">Gede Widiadnyana Pasek, S.Pd., M.Si</strong></p>
                
                @endif
            </div>
        </div>
    </page>
</body>

</html>
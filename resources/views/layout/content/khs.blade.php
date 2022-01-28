<livewire:khs/>

{{-- 

<div class="card radius-15">
    <div class="card-header">
                <h6 class="mb-0">Data KHS Mahasiswa</h6>
            </div>
    <div class="card-body">
        <div class="card shadow-none border">
               <form method="post" action="khs">
                   @csrf
                     <div class="input-group cursor-pointer">
                        <section class="form-control cursor-pointer">
                            <select class="form-select cursor-pointer @error('cek_smester') is-invalid @enderror" aria-label="Default select example" name="cek_smester" required>
                            <option value="">{{'Pilih Semester'}}</option>
                            @for ($i = 1; $i < 15; $i++)
                            <option value="{{$i}}">Semester {{$i}}</option>
                            @endfor
                            </select>
                        </section>
                        @error('cek_smester')
                        <div class="sticky-sm-top text-danger">{{$message}}</div>
                        @enderror
                        <button type="sumbit" name="cek_khs" class="btn btn-info">Cek</button>
                    </div>
                    
               </form>
            </div>
        </div>
    </div>

@if (isset($_POST['cek_khs']))
    
  
<div class="card radius-15">
    <div class="card-header">
                <h6 class="mb-0">Data KHS Mahasiswa {{' - Semester '.@$_POST['cek_smester']}}</h6>
            </div>
    <div class="card-body">
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
                        @foreach ($data_pddikti as $data)  
                        <tr>
                        <?php 
                        $sksxindeks = $data['sks_mata_kuliah'] * $data['nilai_indeks'];
                        $totalsksxindeks += $sksxindeks;
                        ?>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$data['kode_mata_kuliah']}}</td>
                            <td>{{$data['nama_mata_kuliah']}}</td>
                            <td>{{ Str::substr($data['sks_mata_kuliah'], 0,1)}}</td>
                            <td>{{$data['nilai_huruf']}}</td>
                            <td class="{{$data['nilai_indeks'] == 0.00 ? 'bg-danger' : ''}}">{{$data['nilai_indeks']}}</td>
                            <td>{{ $sksxindeks}}</td>
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
                                @php $b_totalsksxindeks = 0;  @endphp
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
                        <tr>
                            <td colspan="7" align="right">
                                <a target="_blank" href="/cetak-khs/{{Request::input('cek_smester')}}" class="btn btn-primary btn-sm">Cetak KHS : <i class="bi bi-printer"></i></a>
                                
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @elseif ($data_pddikti == 'No Data' && $total_sks == 'No Data')
    <div class="card radius-15">
        <h4 class="center">No Data</h4>
    </div>
    @endif  --}}
@if ($cek_bukti_bayar->isEmpty())
<div class="card radius-15">
  <div class="card-header">
          pembayaran pendaftaran
  </div>
  <div class="card-body">
    <div class="border p-3 rounded w">
        <form action="/pembayaran" method="POST" enctype="multipart/form-data">

            @method('POST')
            @csrf
            <input type="hidden" name="id_user" value="{{$data_account->id}}">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="">
                        upload bukti pembayaran
                    </label>
                    <input type="file" class="form-control" required name="bukti_bayar" accept=".jpg, .jpeg, .png" >
                    @error('bukti_bayar')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="">jumlah bayar</label>
                    <input type="number" class="form-control" placeholder="Jumlah pembayaran..." name="jml_bayar" value="{{old('jml_bayar')}}">
                    @error('jml_bayar')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="">tanggal bayar</label>
                    <input type="date" class="form-control cursor-pointer" placeholder="Tanggal pembayaran..." required name="tgl_bayar" value="{{old('tgl_bayar')}}">
                     @error('tgl_bayar')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3 ">
                    <label for="">BANK</label>
                    <select name="bank" id="" class="form-control cursor-pointer" required>
                        <option value="{{old('bank')}}">{{old('bank')}}</option>
                        <option value="BRI">BRI</option>
                        <option value="BNI">BNI</option>
                        <option value="BPR">BPR</option>
                    </select>
                    @error('bank')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="">rekening atas nama ?</label>
                    <input type="text" class="form-control" placeholder="rekening atas nama...?" required name="an_bank" value="{{old('an_bank')}}">
                     @error('an_bak')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="">direkomendasi oleh / sumber informasi stie satya dharma ?</label>
                    <input type="text" class="form-control" placeholder="Contoh : facebook / made dharma dll" name="recomend" value="{{old('recomend')}}">
                     @error('recomend')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-12 mb-3">
                    <button class="btn btn-primary">simpan</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
@endif

@if ($cek_bukti_bayar->isNotEmpty())
<div class="card radius-15">
  <div class="card-header">
    pembayaran pendaftaran 
    <div class="btn btn-sm {{$cek_bukti_bayar->first()->validasi  == 0 ? 'bg-warning' : 'bg-primary'}}">
        @if ($cek_bukti_bayar->first()->validasi  == 0 )
            <i class="bi bi-clock"></i> pending validasi   
        @endif
        @if ($cek_bukti_bayar->first()->validasi  == 1 )
            <i class="bi bi-check-circle"></i> valid 
        @endif
    </div>
  </div>
  <div class="card-body">
    <div class="border p-3 rounded w">
        <form action="/pembayaran/{{$data_account->id}}" method="POST" enctype="multipart/form-data">
            
            @csrf
            @method('PUT')
            <input type="hidden" name="id_user" value="{{$data_account->id}}">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="">
                        upload bukti pembayaran | <a target="_blank" href="{{asset('storage/images/p_pendaftaran/'.$cek_bukti_bayar->first()->bukti_bayar)}}">cek bukti pembayaran</a> 
                    </label>
                    <input type="file" class="form-control" name="bukti_bayar" accept=".jpg, .jpeg, .png" >
                    @error('bukti_bayar')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="">jumlah bayar</label>
                    <input type="number" class="form-control" placeholder="Jumlah pembayaran..." name="jml_bayar" value="{{$cek_bukti_bayar->first()->jumlah_bayar, old('jml_bayar')}}">
                    @error('jml_bayar')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="">tanggal bayar</label>
                    <input type="date" class="form-control cursor-pointer" placeholder="Tanggal pembayaran..." required name="tgl_bayar" value="{{$cek_bukti_bayar->first()->tgl_bayar, old('tgl_bayar')}}">
                     @error('tgl_bayar')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3 ">
                    <label for="">BANK</label>
                    <select name="bank" id="" class="form-control cursor-pointer" required>
                        <option value="{{$cek_bukti_bayar->first()->nama_bank, old('bank')}}">{{$cek_bukti_bayar->first()->nama_bank, old('bank')}}</option>
                        <option value="BRI">BRI</option>
                        <option value="BNI">BNI</option>
                        <option value="BPR">BPR</option>
                    </select>
                    @error('bank')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="">rekening atas nama ?</label>
                    <input type="text" class="form-control" placeholder="rekening atas nama...?" required name="an_bank" value="{{$cek_bukti_bayar->first()->an_bank, old('an_bank')}}">
                     @error('an_bak')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="">direkomendasi oleh / sumber informasi stie satya dharma ?</label>
                    <input type="text" class="form-control" placeholder="Contoh : facebook / made dharma dll" name="recomend" value="{{$cek_bukti_bayar->first()->recomend, old('recomend')}}">
                     @error('recomend')
                            <div class="sticky-sm-top text-danger">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-primary">simpan</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
@endif
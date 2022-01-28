<div class="card radius-15">
    <div class="card-header">
        <h6 class="mb-0">Data Open Kurikulum</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('open-kurikulum.store') }}">
            @csrf
            <div class="row">
                <div class="col-6">
                <select class="form-select" aria-label="Default select example" name="id_kurikulum" required>
                    <option selected>Pilih Nama Kurikulum</option>
                    @foreach ($data_list_kurikulum['data'] as $item)
                        <option value="{{$item['id_kurikulum']}}">{{$item['nama_kurikulum'].' ('.$item['nama_program_studi'].')'}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" name="untuk_angkatan" required placeholder="Angkatan : 2018,2019,2020">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>


    {{-- TABEL --}}
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Kurikulum</th>
            <th scope="col">Untuk Angkatan</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_db_open_kurikulum as $val)    
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>
                    {{
                    collect($data_list_kurikulum['data'])->where('id_kurikulum', $val->id_kurikulum)->pluck('nama_kurikulum')[0]
                    }}
                </td>
                <td>{{$val->untuk_angkatan}}</td>
                <td>
                    <a href="" class="badge">Edit</a> | <a href="">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
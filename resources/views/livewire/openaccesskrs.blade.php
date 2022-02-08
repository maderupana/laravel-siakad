<div>

    {{-- @foreach ($Data_Mahasiswa as $i)
        @dump($i->status_pembayaran)
    @endforeach --}}
    <div class="card radius-15">
        <div class="card-header">
            <strong>KRS Periode {{$concatValuePeriode}}</strong>
        </div>
    </div>
    <div class="card radius-15">
        <div class="card-header">
            @if (session()->has('success'))
            <div class="alert border-0 bg-success alert-dismissible fade show py-2">
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
            @if (session()->has('importErrors'))
            <div class="alert border-0 bg-danger alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="fs-3 text-white"><i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="ms-3">
                        <div class="text-white">{{ session('importErrors') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            Bulk Update status pembayaran Mahasiswa <a href="https://drive.google.com/uc?export=download&id=1mVTr5uMGf47HMsPwTMgBm4bl_zJoUJRt">download template</a>
            <form action="/admin-keu" enctype='multipart/form-data' method="post">
                @method('POST')
                @csrf
                <div class="input-group input-group-sm mb-3">
                    <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .csv" required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="excel">
                    <button class="btn btn-sm btn-warning" id="inputGroup-sizing-sm">upload & update</button>
                </div>
            </form>
        </div>

        <div class="card-body">

            <div wire:ignore.self class=" p-2">
                <div class="row table-responsive">
                    <div class="col">
                        <label for="numofpage">show of</label>
                        <select wire:model="numOfPaginate" id="numofpage" class="form-control w-50 cursor-pointer" list="datalistOptions">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="ms-auto">
                            <label for="search" class="ms-auto text-white">i</label>
                            <input type="text" id="search" wire:model="search" class="form-control ms-auto" placeholder="cari...">
                        </div>

                    </div>
                </div>
                <hr>
                <div class="table-responsive">

                    <table class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody wire:loading.class="text-muted">
                            @foreach ($data_mhs as $key => $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->nama}}</td>
                                <td>
                                    {{-- <div class="form-check form-switch cursor-pointer">
                                    <input class="form-check-input cursor-pointer" type="checkbox" wire:model="statusValidasi.{{$item->id}}">
                                    <label class="form-check-label cursor-pointer">Open Access</label>
                </div> --}}

                <form wire:submit.prevent="updateStatusPembayaran({{$item->id}})">
                    @if ($validOrNot[$key]['status_pembayaran'] == 1)
                    <button class="btn bg-transparent text-danger" wire:click="$set('statusValidasi', '0')"><i class="bi bi-dash-circle-fill"></i></button> <i>blocked</i>
                    @else
                    <button class="btn bg-transparent text-tiffany" wire:click="$set('statusValidasi', '1')"><i class=" bi bi-check-circle-fill"></i></button> <i>opened</i>
                    @endif
                </form>
                {{-- @dump($validOrNot[$key]['status_pembayaran']) --}}

                </td>
                </tr>
                @endforeach
                </tbody>
                </table>

            </div>
            <div class="row table-responsive p-2 mb-0">
                <div class="col-sm-6">
                    <select wire:model="filterAngkatan" class="form-control cursor-pointer w-50 mb-3" list="datalistOptions">
                        <option value="">Sort by angkatan</option>
                        @for ($i = 14; $i < 24; $i++) <option value="{{$i}}">{{'20'.$i}}</option>
                            @endfor
                    </select>
                </div>
                <div class="col-sm-6">
                    <div class="ms-auto mr-0 mb-3"> {{ $data_mhs->onEachSide(1)->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

</div>
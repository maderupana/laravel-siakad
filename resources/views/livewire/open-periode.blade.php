<div>
    
    <div class="card radius-15">
        <div class="card-header">
            <h6 class="mb-0">Manage Access KRS Periode</h6>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-center">
                <div class="spinner-grow" role="status" wire:loading>
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        <div wire:loading.remove>
           @foreach ($getPeriode as $key => $item)
            @if ($key != $id_periode_saved->first()->id_periode && $id_periode_saved->first()->access == 0)
                    <div class="alert border-0 bg-danger fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="hovered fs-3 text-white cursor-pointer hover" 

                        wire:click="
                        
                        updateAndOpenPeriode({{$key}}, '{{substr($key, 0, 4)}}/{{(int)substr($key, 0, 4) + 1}} {{substr($key,4,5) == 3 ? 'Pendek' : ($key%2 == 0 ? 'Genap' : 'Ganjil')}}', {{1}})
                        
                        ">
                        <i class="bi bi-check-circle-fill"></i></div>
                        <div class="ms-3">

                        <div class="text-white">
                            Periode KRS : {{substr($key, 0, 4)}}/{{(int)substr($key, 0, 4) + 1}} {{substr($key,4,5) == 3 ? 'Pendek' : ($key%2 == 0 ? 'Genap' : 'Ganjil')}} - ditutup
                        </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($key == $id_periode_saved->first()->id_periode && $id_periode_saved->first()->access == 0)
                    <div class="alert border-0 bg-danger fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="hovered fs-3 text-white cursor-pointer hover" 

                        wire:click="
                        
                        updateAndOpenPeriode({{$key}}, '{{substr($key, 0, 4)}}/{{(int)substr($key, 0, 4) + 1}} {{substr($key,4,5) == 3 ? 'Pendek' : ($key%2 == 0 ? 'Genap' : 'Ganjil')}}', {{1}})
                        
                        ">
                        <i class="bi bi-check-circle-fill"></i></div>
                        <div class="ms-3">

                        <div class="text-white">
                            Periode KRS : {{substr($key, 0, 4)}}/{{(int)substr($key, 0, 4) + 1}} {{substr($key,4,5) == 3 ? 'Pendek' : ($key%2 == 0 ? 'Genap' : 'Ganjil')}} - ditutup
                        </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($key == $id_periode_saved->first()->id_periode && $id_periode_saved->first()->access == 1)
                    <div class="alert border-0 bg-success fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="hovered fs-3 text-white cursor-pointer hover" 

                        wire:click="
                        
                        updateAndOpenPeriode({{$key}}, '{{substr($key, 0, 4)}}/{{(int)substr($key, 0, 4) + 1}} {{substr($key,4,5) == 3 ? 'Pendek' : ($key%2 == 0 ? 'Genap' : 'Ganjil')}}', {{0}})
                        
                        ">
                        <i class="bi bi-check-circle-fill"></i></div>
                        <div class="ms-3">

                        <div class="text-white">
                            Periode KRS : {{substr($key, 0, 4)}}/{{(int)substr($key, 0, 4) + 1}} {{substr($key,4,5) == 3 ? 'Pendek' : ($key%2 == 0 ? 'Genap' : 'Ganjil')}} - dibuka
                        </div>
                        </div>
                    </div>
                </div>
            @endif

           @endforeach
        </div>
        </div>    
        
    </div>
    

</div>

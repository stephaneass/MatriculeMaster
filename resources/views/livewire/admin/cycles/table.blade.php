<div>
    <!-- start page title -->
    <x-breadcrumb title="La liste des Cycles"/>
    <!-- end page title -->
    @include('modals/cycles/add')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <h4 class="card-title mb-0 flex-grow-1">{{$title}}</h4>
                    </div>
                    <div class="row ">
                        <div class="col-sm-4">
                            <div class="search-box">
                                <input wire:model='search' type="text" class="form-control" id="search" placeholder="Rechercher en fonction du libel...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-sm-auto ms-auto mt-3 mt-md-0">
                            <div class="list-grid-nav hstack gap-1">
                                {{-- <button type="button" id="grid-view-button" class="btn btn-soft-info nav-link btn-icon fs-14 active filter-button"><i class="ri-grid-fill"></i></button>
                                <button type="button" id="list-view-button" class="btn btn-soft-info nav-link  btn-icon fs-14 filter-button"><i class="ri-list-unordered"></i></button> --}}
                                {{-- <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-soft-info btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <li><button class="dropdown-item bg-info text-white" wire:click="all()" >Tous</button></li>
                                    <li><button class="dropdown-item bg-primary text-white" wire:click="created()">Non à jour</button></li>
                                    <li><button class="dropdown-item bg-warning text-white" wire:click="pending()">En attente</button></li>
                                    <li><button class="dropdown-item bg-success text-white" wire:click="validated()">Validés</button></li>
                                </ul> --}}
                                <button class="btn btn-primary addMembers-modal" data-bs-toggle="modal" data-bs-target="#addCycleModal"><i class="ri-add-fill me-1 align-bottom"></i> Ajouter </button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                </div><!-- end card header -->

                <div class="card-body">

                    <div class="live-preview">
                        <div class="table-responsive table-card">
                            <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                <x-table.header :columns="$this->columns" />
                                <tbody>
                                    @foreach ($cycles as $cycle)
                                        @include('livewire.admin.cycles.item')
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between mt-2">
                                <div> </div>
                                <div class="float-right">{{ $cycles->links() }}</div>
                            </div>
                            
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
</div>
@push('scripts')
    <script>
        Livewire.on('hideAddCycleModal', function(){
            $('#hideAddCycleButton').trigger('click');
        })
    </script>
@endpush
<div>
    <!-- start page title -->
    <x-breadcrumb title="La liste des Etudiants"/>
    <!-- end page title -->
    @include('modals/students/add')
    @include('components.notification')

    <div class="row">
        
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <h4 class="card-title mb-0 flex-grow-1">{{$title}}</h4>
                    </div>
                    <div class="row ">
                        <div class="col-sm-3">
                            <div class="search-box">
                                <input wire:model='search' type="text" class="form-control" id="search" placeholder="Search by label...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <select wire:model="gender" class="form-select" aria-label="Default select example">
                                <option value="">Choississez un genre</option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select wire:model="cycle_id" class="form-select mb-3" aria-label="Default select example">
                                <option value="">Choississez un cycle</option>
                                @foreach ($cycles as $key => $cycle)
                                    <option value="{{$key}}">{{$cycle}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end col-->
                        <div class="col-sm-auto ms-auto mt-3 mt-md-0">
                            <div class="list-grid-nav hstack gap-1">
                                {{-- <button type="button" id="grid-view-button" class="btn btn-soft-info nav-link btn-icon fs-14 active filter-button"><i class="ri-grid-fill"></i></button>
                                <button type="button" id="list-view-button" class="btn btn-soft-info nav-link  btn-icon fs-14 filter-button"><i class="ri-list-unordered"></i></button> --}}
                                {{-- <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-soft-info btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <li><button class="dropdown-item" wire:click="allGender()" >Tous</button></li>
                                    <li><button class="dropdown-item" wire:click="female()">Féminin</button></li>
                                    <li><button class="dropdown-item" wire:click="male()">Masculin</button></li>
                                </ul> --}}
                                
                                <button onclick="showStudentModal('create')" class="btn btn-primary addMembers-modal"><i class="ri-add-fill me-1 align-bottom"></i> Ajouter </button>
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
                                    @foreach ($students as $student)
                                        @include('livewire.admin.students.item')
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between mt-2">
                                <div> </div>
                                <div class="float-right">{{ $students->links() }}</div>
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
        
    </script>
@endpush
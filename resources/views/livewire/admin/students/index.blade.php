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
                        <div class="col-sm-10">
                            <h4 class="card-title mb-0 flex-grow-1">{{$title}}</h4>
                        </div>
                        <div class="col-sm-2">
                            <!-- Buttons Group -->
                            {{-- <button type="button" class="btn btn-outline-secondary waves-effect waves-light">Secondary</button> --}}
                            <a target="_blank" href="{{route('admin.students.excel', ['gender' => $gender, 'cycle_id' => $cycle_id])}}" class="btn btn-outline-primary waves-effect waves-light">
                                <svg width="25" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="#20744a"><path d="m28.781 4.405h-10.13v-2.387l-16.651 2.57v22.527l16.651 2.868v-3.538h10.13a1.162 1.162 0 0 0 1.219-1.096v-19.849a1.162 1.162 0 0 0 -1.219-1.095zm.16 21.126h-10.324l-.017-1.889h2.487v-2.2h-2.506l-.012-1.3h2.518v-2.2h-2.537l-.012-1.3h2.549v-2.2h-2.557v-1.3h2.557v-2.2h-2.557v-1.3h2.557v-2.2h-2.557v-2h10.411z" fill-rule="evenodd"/><path d="m22.487 7.439h4.323v2.2h-4.323z"/><path d="m22.487 10.94h4.323v2.2h-4.323z"/><path d="m22.487 14.441h4.323v2.2h-4.323z"/><path d="m22.487 17.942h4.323v2.2h-4.323z"/><path d="m22.487 21.443h4.323v2.2h-4.323z"/></g><path d="m6.347 10.673 2.146-.123 1.349 3.709 1.594-3.862 2.146-.123-2.606 5.266 2.606 5.279-2.269-.153-1.532-4.024-1.533 3.871-2.085-.184 2.422-4.663z" fill="#fff" fill-rule="evenodd"/></svg>
                            </a>
                            <a target="_blank" href="{{route('admin.students.pdf', ['gender' => $gender, 'cycle_id' => $cycle_id])}}" class="btn btn-outline-primary waves-effect waves-light">
                                <svg width="25" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="m24.1 2.072 5.564 5.8v22.056h-20.785v.072h20.856v-22.055z" fill="#909090"/><path d="m24.031 2h-15.223v27.928h20.856v-22.055l-5.634-5.873" fill="#f4f4f4"/><path d="m8.655 3.5h-6.39v6.827h20.1v-6.827z" fill="#7a7b7c"/><path d="m22.472 10.211h-20.077v-6.832h20.077z" fill="#dd2025"/><g fill="#464648"><path d="m9.052 4.534h-.03-.207-1.07v4.8h1.028v-1.619l.227.013a2.042 2.042 0 0 0 .647-.117 1.427 1.427 0 0 0 .493-.291 1.224 1.224 0 0 0 .335-.454 2.13 2.13 0 0 0 .105-.908 2.237 2.237 0 0 0 -.114-.644 1.173 1.173 0 0 0 -.687-.65 2.149 2.149 0 0 0 -.409-.104 2.232 2.232 0 0 0 -.319-.026m-.189 2.294h-.089v-1.48h.193a.57.57 0 0 1 .459.181.92.92 0 0 1 .183.558c0 .246 0 .469-.222.626a.942.942 0 0 1 -.524.114"/><path d="m12.533 4.521c-.111 0-.219.008-.295.011l-.238.006h-.78v4.8h.918a2.677 2.677 0 0 0 1.028-.175 1.71 1.71 0 0 0 .68-.491 1.939 1.939 0 0 0 .373-.749 3.728 3.728 0 0 0 .114-.949 4.416 4.416 0 0 0 -.087-1.127 1.777 1.777 0 0 0 -.4-.733 1.63 1.63 0 0 0 -.535-.4 2.413 2.413 0 0 0 -.549-.178 1.282 1.282 0 0 0 -.228-.017m-.182 3.937h-.1v-3.064h.013a1.062 1.062 0 0 1 .6.107 1.2 1.2 0 0 1 .324.4 1.3 1.3 0 0 1 .142.526c.009.22 0 .4 0 .549a2.926 2.926 0 0 1 -.033.513 1.756 1.756 0 0 1 -.169.5 1.13 1.13 0 0 1 -.363.36.673.673 0 0 1 -.416.106"/><path d="m17.43 4.538h-2.43v4.8h1.028v-1.904h1.3v-.892h-1.3v-1.112h1.4v-.892"/></g><path d="m21.781 20.255s3.188-.578 3.188.511-1.975.646-3.188-.511zm-2.357.083a7.543 7.543 0 0 0 -1.473.489l.4-.9c.4-.9.815-2.127.815-2.127a14.216 14.216 0 0 0 1.658 2.252 13.033 13.033 0 0 0 -1.4.288zm-1.262-6.5c0-.949.307-1.208.546-1.208s.508.115.517.939a10.787 10.787 0 0 1 -.517 2.434 4.426 4.426 0 0 1 -.547-2.162zm-4.649 10.516c-.978-.585 2.051-2.386 2.6-2.444-.003.001-1.576 3.056-2.6 2.444zm12.387-3.459c-.01-.1-.1-1.207-2.07-1.16a14.228 14.228 0 0 0 -2.453.173 12.542 12.542 0 0 1 -2.012-2.655 11.76 11.76 0 0 0 .623-3.1c-.029-1.2-.316-1.888-1.236-1.878s-1.054.815-.933 2.013a9.309 9.309 0 0 0 .665 2.338s-.425 1.323-.987 2.639-.946 2.006-.946 2.006a9.622 9.622 0 0 0 -2.725 1.4c-.824.767-1.159 1.356-.725 1.945.374.508 1.683.623 2.853-.91a22.549 22.549 0 0 0 1.7-2.492s1.784-.489 2.339-.623 1.226-.24 1.226-.24 1.629 1.639 3.2 1.581 1.495-.939 1.485-1.035" fill="#dd2025"/><path d="m23.954 2.077v5.873h5.633z" fill="#909090"/><path d="m24.031 2v5.873h5.633z" fill="#f4f4f4"/><path d="m8.975 4.457h-.03-.207-1.07v4.8h1.032v-1.618l.228.013a2.042 2.042 0 0 0 .647-.117 1.428 1.428 0 0 0 .493-.291 1.224 1.224 0 0 0 .332-.454 2.13 2.13 0 0 0 .105-.908 2.237 2.237 0 0 0 -.114-.644 1.173 1.173 0 0 0 -.687-.65 2.149 2.149 0 0 0 -.411-.105 2.232 2.232 0 0 0 -.319-.026m-.189 2.294h-.089v-1.48h.194a.57.57 0 0 1 .459.181.92.92 0 0 1 .183.558c0 .246 0 .469-.222.626a.942.942 0 0 1 -.524.114" fill="#fff"/><path d="m12.456 4.444c-.111 0-.219.008-.295.011l-.235.006h-.78v4.8h.918a2.677 2.677 0 0 0 1.028-.175 1.71 1.71 0 0 0 .68-.491 1.939 1.939 0 0 0 .373-.749 3.728 3.728 0 0 0 .114-.949 4.416 4.416 0 0 0 -.087-1.127 1.777 1.777 0 0 0 -.4-.733 1.63 1.63 0 0 0 -.535-.4 2.413 2.413 0 0 0 -.549-.178 1.282 1.282 0 0 0 -.228-.017m-.182 3.937h-.1v-3.064h.013a1.062 1.062 0 0 1 .6.107 1.2 1.2 0 0 1 .324.4 1.3 1.3 0 0 1 .142.526c.009.22 0 .4 0 .549a2.926 2.926 0 0 1 -.033.513 1.756 1.756 0 0 1 -.169.5 1.13 1.13 0 0 1 -.363.36.673.673 0 0 1 -.416.106" fill="#fff"/><path d="m17.353 4.461h-2.43v4.8h1.028v-1.904h1.3v-.892h-1.3v-1.112h1.4v-.892" fill="#fff"/></svg>
                            </a>
                            
                        </div>
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
                                <option value="">Tous les genres</option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select wire:model="cycle_id" class="form-select mb-3" aria-label="Default select example">
                                <option value="">Tous les cycles</option>
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
                            @include('livewire.admin.students.table')
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
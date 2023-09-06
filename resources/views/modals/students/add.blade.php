<!-- Modal -->
<div wire:ignore.self class="modal fade" id="cycleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            
            <div class="modal-body">
                <form autocomplete="off" id="memberlist-form" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="px-1 pt-1">
                                <div class="modal-team-cover position-relative mb-0 mt-n4 mx-n4 rounded-top overflow-hidden">
                                    <img src="{{asset('admin/images/small/img-9.jpg')}}" alt="" id="cover-img" class="img-fluid">

                                    <div class="d-flex position-absolute start-0 end-0 top-0 p-3">
                                        <div class="flex-grow-1">
                                            <h5 class="modal-title text-white" id="createMemberLabel">{{$modalTitle}}</h5>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="d-flex gap-3 align-items-center">
                                                <div>
                                                    {{-- <label for="cover-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Select Cover Image">
                                                        <div class="avatar-xs">
                                                            <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                <i class="ri-image-fill"></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <input class="form-control d-none" value="" id="cover-image-input" type="file" accept="image/png, image/gif, image/jpeg"> --}}
                                                </div>
                                                <button type="button" class="btn-close btn-close-white"  id="createMemberBtn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-4 mt-n5 pt-2">
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute bottom-0 end-0">
                                        {{-- <label for="member-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Member Image">
                                            <div class="avatar-xs">
                                                <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                    <i class="ri-image-fill"></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input class="form-control d-none" value="" id="member-image-input" type="file" accept="image/png, image/gif, image/jpeg"> --}}
                                    </div>
                                    <div class="avatar-lg">
                                        <div class="avatar-title bg-light rounded-circle">
                                            <img src="{{asset('admin/images/users/user-dummy-img.jpg')}}" id="member-img" class="avatar-md rounded-circle h-auto" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <x-input field='data.last_name' libelle='Nom' placeholder="Entrez le nom"/>
                            <x-input field='data.first_name' libelle='Prénom' placeholder="Entrez le prénom"/>
                            <div class="mb-3">
                                <label class="form-label" for="data.gender">Choississez un genre</label>
                                <select wire:model="data.gender" class="form-select mb-3" aria-label="Default select example">
                                    <option value="">Choississez un genre</option>
                                    <option value="M">Masculin</option>
                                    <option value="F">Féminin</option>
                                </select>
                                <x-error field="data.gender" />
                            </div>
                            {{-- <x-input field='data.gender' libelle='Genre' placeholder="Entrez le genre"/> --}}
                            <x-input field='data.birth_date' type="date" libelle='Dare de Naissance' placeholder="Entrez la date de naissance"/>
                            <x-input field='data.registration_date' type="date" libelle="Dare d'inscription" placeholder="Entrez la date d'inscription"/>
                            <div class="mb-3">
                                <label class="form-label" for="data.cycle_id">Choississez un cycle</label>
                                <select wire:model="data.cycle_id" class="form-select mb-3" aria-label="Default select example">
                                    <option value="">Choississez un cycle</option>
                                    @foreach ($cycles as $key => $cycle)
                                        <option value="{{$key}}">{{$cycle}}</option>
                                    @endforeach
                                </select>
                                <x-error field="data.cycle_id" />
                            </div>
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" id="hideAddStudentButton" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                                <button wire:click="{{$buttonAction}}" type="button" class="btn btn-success" id="addNewCycle">{{$buttonTitle}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>
<!--end modal-->
<button style="display: none" id="showAddModal" class="btn btn-success addMembers-modal" data-bs-toggle="modal" data-bs-target="#cycleModal"><i class="ri-add-fill me-1 align-bottom"></i> Ajouter </button>

@push('scripts')
    <script>
        // When the user clicks on the button, open the modal
        function showStudentModal(type='create') {
            
            if (type == 'update') {
                @this.set('modalTitle', "Modification de l'Etudiant");
                @this.set('buttonTitle', "Modifier");
                @this.set('buttonAction', "update");
            } else if (type == 'create') {
                @this.set('modalTitle', "Ajout d'un nouveau Etudiant");
                @this.set('buttonTitle', "Ajouter");
                @this.set('buttonAction', "save");
            }
            
            $("#showAddModal").trigger('click')
        }

        window.addEventListener('hideAddStudentModal', event => {
            
            showNotification(event.detail.message, event.detail.color)
            $('#hideAddStudentButton').trigger('click');
        })
      
    </script>
@endpush
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="cycleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            
            <div class="modal-body">
                <form autocomplete="off" id="memberlist-form" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="flex-grow-1">
                                <h3 class="text-center text-black" id="">{{$modalTitle}}</h3>
                            </div>
                            <x-input field='data.label' libelle='Libellé' placeholder="Entrez le libellé"/>
                            <x-input field='data.description' libelle='Description' placeholder="Entrez la description"/>
                            <x-input field='data.format' libelle='Format' placeholder="Entrez le format"/>
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" id="hideAddCycleButton" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
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
      function showCycleModal(type='create') {
        
          if (type == 'update') {
            @this.set('modalTitle', "Modification de Cycle");
            @this.set('buttonTitle', "Modifier");
            @this.set('buttonAction', "update");
          } else if (type == 'create') {
            @this.set('modalTitle', "Ajout d'un nouveau Cycle");
            @this.set('buttonTitle', "Ajouter");
            @this.set('buttonAction', "save");
          }
          
          $("#showAddModal").trigger('click')
      }

    window.addEventListener('hideAddCycleModal', event => {
        console.log(event.detail, 'p')
        showNotification(event.detail.message, event.detail.color)
        $('#hideAddCycleButton').trigger('click');
    })
    
    

      
    </script>
@endpush
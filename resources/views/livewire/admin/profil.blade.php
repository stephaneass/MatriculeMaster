<div>
    @include('components.notification')
    <div class="col-xxl-9">
        <div class="card mt-xxl-n5">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a wire:ignore.self class="nav-link active" data-bs-toggle="tab" href="#personalInfos" role="tab">
                            <i class="fas fa-home"></i> Information Personnelle
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:ignore.self class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                            <i class="far fa-user"></i> Changer de Mot de Passe
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div wire:ignore.self class="tab-pane active" id="personalInfos" role="tabpanel">
                        <form  action="">
                            <div class="row">
                                <div class="col-lg-12">
                                    @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <x-input field='data.last_name' libelle='Nom' placeholder="Entrez le nom"/>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <x-input field='data.first_name' libelle='Prénom' placeholder="Entrez le prénom"/>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <x-input field='data.email' libelle='E-mail' type="email" placeholder="Entrez l'e-mail"/>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <label class="form-label" for="data.gender">Choississez un genre</label>
                                    <select wire:model="data.gender" class="form-select mb-3" aria-label="Default select example">
                                        <option value="">Choississez un genre</option>
                                        <option value="M">Masculin</option>
                                        <option value="F">Féminin</option>
                                    </select>
                                    <x-error field="data.gender" />
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" wire:click='update()' class="btn btn-primary">Modifier</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <!--end tab-pane-->
                    <div wire:ignore.self class="tab-pane" id="changePassword" role="tabpanel">
                        <form action="javascript:void(0);">
                            <div class="row g-2">
                                <div class="col-12">
                                    <x-alert />
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <x-input type="password" field='password.old' libelle='Ancien Mot de Passe' placeholder="Entrez l'ancien mot de passe"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div>
                                        <x-input type="password" field='password.new' libelle='Nouveau Mot de Passe' placeholder="Entrez le nouveau mot de passe"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <x-input type="password" field='password.confirm' libelle='Confirmer' placeholder="Entrez le nouveau mot de passe à nouveau"/>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button wire:click="changePassword()" type="button" class="btn btn-success">Modifier</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>

@push('scripts')
    <script>
        window.addEventListener('showNotification', event => {
            showNotification(event.detail.message, event.detail.color)
        })
    </script>
@endpush
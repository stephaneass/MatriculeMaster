<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">

            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h1 class="text-primary">Connexion</h1>
                    {{-- <p class="text-muted">Connecter vous pour avoir accès à votre espace admin</p> --}}
                    <x-alert/>
                </div>
                <div class="p-2 mt-4">
                    <form wire:submit.prevent="login">
                        <div class="mb-3">
                            <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                            <input wire:model="email" type="email" class="form-control" id="useremail" placeholder="Entrez otre Email" >
                            <div class="invalid-feedback">
                                Please enter email
                            </div>
                            <x-error field="email" />
                        </div>
                        {{-- <div class="mb-3">
                            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username" >
                            <div class="invalid-feedback">
                                Please enter username
                            </div>
                        </div> --}}

                        <div class="mb-3">
                            <label class="form-label" for="password-input">Mot de passe <span class="text-danger">*</span></label>
                            <div class="position-relative auth-pass-inputgroup">
                                <input id="password" wire:model="password" type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Entrez votre Mot de Passe" aria-describedby="passwordInput">
                                <button id="togglePassword" class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                <x-error field="password" />
                            </div>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-success w-100" >Connexion</button>
                        </div>
                    
                    </form>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        {{-- <div class="mt-4 text-center">
            <p class="mb-0">Already have an account ? <a href="auth-signin-basic.html" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
        </div> --}}

    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#togglePassword').on('click', function() {
                var passwordInput = $('#password');
                var passwordType = passwordInput.attr('type');
                
                if (passwordType === 'password') {
                    passwordInput.attr('type', 'text');
                } else {
                    passwordInput.attr('type', 'password');
                }
            });
        });
    </script>
@endpush
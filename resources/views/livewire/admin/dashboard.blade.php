<div>
    <!-- start page title -->
    <x-breadcrumb title="Tableau de board"/>
    <!-- end page title -->

    <div class="row">
        <div class="col">

            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-16 mb-1">Salut, {{auth()->user()->first_name}}!</h4>
                                <p class="text-muted mb-0">Ici vous avez une vue globale des activités effectuées!!!</p>
                            </div>
                            
                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row">
                    <h4 class="fs-16 mb-1">Etudiants par Genre</h4>
                    @foreach ($users_dash as $item)
                        <x-dashboard.card :title="$item['title']" :number="$item['number']" :color="$item['color']" icon="users" :route="$item['route']"/><!-- end col -->
                    @endforeach
                </div>
                <div class="row">
                    <h4 class="fs-16 mb-1">Etudiants par Cycles</h4>
                    @foreach ($cycles_dash as $item)
                        <x-dashboard.card :title="$item['title']" :number="$item['number']" :color="$item['color']" icon='ri-space-ship-line' :route="$item['route']"/><!-- end col -->
                    @endforeach
                </div>
                {{-- <div class="row">
                    <h4 class="fs-16 mb-1">Opérations</h4>
                    @foreach ($operations_dash as $item)
                        <x-admin.dashboard.card :title="$item['title']" :number="$item['number']" :color="$item['color']" icon='ri-exchange-dollar-fill'>
                            @slot('sub_icon')
                                <div class="flex-shrink-0">
                                    <h5 class="text-{{$item['color']}} fs-14">
                                        <i class="{{$item['sub_icon']}} text-{{$item['color']}} fs-18 float-end align-middle"></i>
                                    </h5>
                                </div>
                            @endslot
                        </x-admin.dashboard.card>
                            <!-- end col -->
                    @endforeach
                </div> --}}
            </div> <!-- end .h-100-->

        </div> <!-- end col -->

    </div>
</div>
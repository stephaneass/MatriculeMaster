@props(['title', 'number', 'color'=>'primary', 'icon'=>'users'])
<div class="col-xl-3 col-md-6">
    <!-- card -->
    <div class="card ribbon-box card-animate">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                    <div class="ribbon ribbon-{{$color}} ribbon-shape">{{$title}}</div>
                </div>
                {!!$sub_icon??""!!}
                
            </div>
            <div class="d-flex align-items-end justify-content-between mt-5">
                <div>
                    <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value" data-target="{{$number}}">0</span> </h4>
                    <a href="#" class="text-decoration-underline">Voir la liste</a>
                </div>
                <div class="avatar-sm flex-shrink-0">
                    <span class="avatar-title bg-soft-{{$color}} rounded fs-2">
                        @if ($icon == 'users')
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users text-{{$color}}"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        @else
                            <i class="{{$icon}} display-6 text-{{$color}}"></i>
                        @endif
                        
                        
                    </span>
                    {{-- <span class="avatar-title bg-soft-{{$color}} rounded fs-3">
                        <i class="bx bx-user-circle text-{{$color}}"></i>
                    </span> --}}
                </div>
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</div>
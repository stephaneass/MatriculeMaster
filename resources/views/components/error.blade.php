@props(['field'])
@if ($errors->has($field))
    <span class="text-danger">{!!$errors->first($field)!!}</span>
@endif
{{-- @if (session('error'))
    <span class="text-danger">{{ session('error') }}</span>
@endif --}}
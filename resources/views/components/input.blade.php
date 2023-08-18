@props(['field', 'libelle', 'placeholder'=>'', 'type'=>'text'])
<div class="mb-3">
    <label class="form-label" for="{{$field}}">{{$libelle}}</label>
    <input type="{{$type}}" id="{{$field}}" wire:model="{{$field}}" class="form-control" placeholder="{{$placeholder}}"  required>
    <x-error :field="$field" />
</div>
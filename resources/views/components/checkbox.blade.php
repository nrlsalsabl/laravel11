
@php
    $name = isset($name) ? $name : strtolower(str_replace(' ', '-', $text));     
@endphp
<div class="form-group form-check mb-1">
    {{-- @if (isset($checked)  )
    @endif --}}
    <input type="checkbox" class="form-check-input {{ $class ?? '' }}"  id="{{ $name }}" {{$checked?'checked':' '}} @if(!isset($iswithoutname)) name="{{ $name }}" @endif >
    {{-- <input type="checkbox" class="form-check-input {{ $class ?? '' }}"  id="{{ $name }}" @if(!isset($iswithoutname)) name="{{ $name }}" @endif > --}}
    <label class="form-check-label" for="{{ $name }}">{{ $text }}</label>
</div>
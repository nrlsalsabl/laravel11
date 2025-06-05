@php
   $slug = createSlug($label) ;
   $name = isset($name)? $name : $slug;
   $id = isset($id)? $id : $slug ;
   $placeholder = isset($placeholder)? $placeholder : "Masukkan $label";
@endphp
<div class="form-group  ">
        <label class="fw-bold text-dark mb-2 " for="{{$id}}">{{$label}}</label>
        <textarea class="form-control" name="{{$name}}" value="{{ $value ?? old($name)}}" id="{{$id}}" rows="3" placeholder="{{ $placeholder }}">{{ $value ?? old($name)}}</textarea>
        @error($name)
        <div class="  text-danger " role="alert">
            {{ $message }} 
        </div>
        @enderror
 </div>
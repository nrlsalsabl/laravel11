@php
   $slug = createSlug($label) ;
   $name = isset($name)? $name : $slug;
   $id = isset($id)? $id : $slug ;
   $placeholder = isset($placeholder)? $placeholder : "Masukkan $label";
@endphp
<div class="form-group">
    <label class="fw-bold text-dark mb-2" for="{{ $id }}">{{ $label }}</label>
    <div class="row">
        <div class="col-md-5">
            <div class="input-group wrap_flatpicker">
        
                <input class="form-control flatpickr_datetime @error($name) is-invalid @enderror" name={{ $name }} id={{ $id }} type="text" placeholder="{{ $placeholder }} " value="{{$value  ?? old($name) }}" >
                
        
                <a class="input-group-text  input-button pointer-event" title="toggle" data-bs-toggle="" href="javascript:void(0)">
                    <svg width="24" class="icon-24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </a>
                
            </div>
        </div>
    </div>

    @error($name)
    <div class="  text-danger " role="alert">
        {{ $message }} 
    </div>
    @enderror
</div>

   
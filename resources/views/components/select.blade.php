@php
   $slug = createSlug($label) ;
   $name = isset($name)? $name : $slug;
   $id = isset($id)? $id : $slug ;
   $class = isset($class)? $class : '' ;
   $delimiter = isset($delimiter)? $delimiter : '|' ;
   $isupdate = isset($isupdate) ;
   $placeholder = isset($placeholder)? $placeholder : "Masukkan $label";
 
@endphp


 <div class="form-group   mt-2 mb-2">
       <label class="fw-bold text-dark pb-3  {{$label =='nolabel'? 'd-none':'' }} " for="{{ $id }}">{{$label }}</label>
        <select class="form-control ml-2 px-2 select select2 {{ $class }}':''}} " name="{{$name}}"  id="{{$id}}">
           
            <option value="">-- {{ $placeholder}} --</option>
            @foreach($options as $option)
                @if($type == 'obj')
                    <option  value="{{ $option->$key1 }}"  {{isset($value) && $value==$option->$key1  || old($name) == $option->$key1 && $isupdate? "selected" :null }}>{{ isset($key3)? $option->$key3 ." $delimiter " : ''}} {{ $option->$key2 }}  {{ isset($key4)? " $delimiter " .$option->$key4  : ''}}  {{ isset($key5)? " $delimiter " .$option->$key5  : ''}}</option>
                @else
                    <option  value="{{ $option[$key1] }}"  {{isset($value)&& $value==$option[$key1] || old($name) == $option[$key1] && $isupdate ? "selected" :null }} >{{ isset($key3)? $option[$key3]: ''}} {{ $option[$key2] }} {{ isset($key4)? " $delimiter " .$option[$key4]: ''}}  {{ isset($key5)? " $delimiter " .$option[$key5]: ''}}</option>
                @endif 
            @endforeach
        </select>
        @error($name)
        <div class="text-danger " role="alert">
            {{ $message }} 
        </div>
        @enderror
        
         {{$slot}}
   </div>
    

   
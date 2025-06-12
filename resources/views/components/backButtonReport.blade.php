@php
    use Illuminate\Support\Facades\Request;
    $param = Request::segment(1); 
    // $first = substr($param, 0, strpos($param, '-'));
    $to = !strpos($param, '-') ? $param : substr($param, 0, strpos($param, '-'));
    // dd($to);
@endphp

<div class="col-md-12">
    <div class="mb-5 ">
        <div class=" ">
            <a class="btn btn-primary" href="{{ route('admin.report.index') }}" > 
               <i class="icon">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                          stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor"
                          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
              </i>                     
               Kembali ke Tabel Data
            </a>                
         </div>
    </div>
</div>
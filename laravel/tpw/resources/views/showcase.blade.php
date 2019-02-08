@section('showcase')
<div class="userboxes">
   <div class="row">
     @foreach ($showcases as $showcase)
     <div class="col-sm-6 col-md-4">
       <div class="userbox">
         <a href="https://umihico.github.io{{ $showcase->gif_path }}"><img src="https://umihico.github.io{{ $showcase->gif_path }}" alt="{{ $showcase->gif_path }}"></a>
       </div>
     </div>
     @endforeach
   </div>
 </div>
@endsection

@section('showcase')
<div class="userboxes">
   <div class="row">
     @foreach ($showcases as $showcase)
     <div class="col-sm-6 col-md-4">
       <div class="userbox">
         <a href="https://umihico.github.io{{ $showcase->gif_path }}"><img src="https://umihico.github.io{{ $showcase->gif_path }}" alt="{{ $showcase->gif_path }}"></a>
         <li>{{ $showcase->username}}</li>
         <li><a href="https://github.com/{{ $showcase->full_name }}">repo: {{ $showcase->reponame }}</a></li>
         <li><a href="{{ $showcase->html_url }}">portfolio website</a></li>
         <li><a href="https://github.com/{{ $showcase->full_name }}/stargazers">{{ $showcase->stargazers_count }}stars</a></li>
         <li><a href="https://github.com/{{ $showcase->full_name }}/members">{{ $showcase->forks }}forks</a></li>
       </div>
     </div>
     @endforeach
   </div>
 </div>
@endsection

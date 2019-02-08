@section('geotags')
<div class="locations">
  @foreach($geotags as $geotag=>$count)
    <a href="/location/{{ $geotag }}/0">{{ $geotag }}({{ $count }})</a>　
  @endforeach
</div>
@endsection

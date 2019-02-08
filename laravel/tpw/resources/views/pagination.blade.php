@section('pagination')


<table>
  <tr>
    @foreach ($pagination_bar as $pagebar_num)
      <td>
        @if (is_numeric($pagebar_num))
            <a href="/{{ $path }}/{{ $pagebar_num }}">{{ $pagebar_num }}</a><div>　</div>
        @else
            <div>...</div>
        @endif
      </td>
    @endforeach
  </tr>
</table>
@endsection

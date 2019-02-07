<html>
<body>
  <h1>Hello World{{ $hoge }}</h1>
  <ul>
    @foreach($portfolios as $pf)
      <li>{{$pf->reponame}}</li>
    @endforeach
  </ul>
  </body>
</html>

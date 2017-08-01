<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="{{ mix('/css/base.css')}}">

  @section('site-title')
      <title>Laravel Learning | @yield('page-title')</title>
  @show
</head>

<body>
  @section('header')
    @include('header')
  @show
  <main>
    @yield('content')
  </main>
</body>

</html>

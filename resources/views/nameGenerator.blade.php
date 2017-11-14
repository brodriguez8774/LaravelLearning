@extends('base')

@section('page-title', '| Hello World')

@section('content')
  @foreach ($names as $name)
    {{ $name->lastName }}&#9;{{ $name->firstName }}<br>
  @endforeach
@endsection

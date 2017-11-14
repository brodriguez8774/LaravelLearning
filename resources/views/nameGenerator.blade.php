@extends('base')

@section('page-title', '| Hello World')

@section('content')
  @foreach ($names as $name)
    <p>{{ $name->firstName }}&#9;{{ $name->lastName}}</p>
  @endforeach
@endsection

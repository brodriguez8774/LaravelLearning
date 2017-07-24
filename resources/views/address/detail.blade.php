@extends('base')

@section('page-title', 'Address | Detail')

@section('content')
  <h1>Address Detail</h1>

  <a href="{{ action('AddressController@edit', [ 'id' => $address->id ]) }}">Edit Address</a>
  <p>Street: {{ $address->street }}</p>
  <p>City: {{ $address->city }}</p>
  <p>Region: {{ $address->region }}</p>
  <p>Zip: {{ $address->zip }}</p>
  <p>Country: {{ $address->country }}</p>
@endsection

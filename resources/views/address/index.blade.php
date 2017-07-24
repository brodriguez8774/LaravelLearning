@extends('base')

@section('page-title', 'Address | Index')

@section('content')
  <h1>Address Index</h1>
  <li>
    <a href="{{ action('AddressController@create') }}">Create New Address</a>
  </li>
  <br>
  @foreach ($addresses as $address)
    <li>
      <a href="{{ action('AddressController@detail', ['id' => $address->id]) }}">
        {{ $address->street }} {{ $address->city }}, {{ $address->region }}, {{ $address->zip }}
      </a>
    </li>
  @endforeach
@endsection

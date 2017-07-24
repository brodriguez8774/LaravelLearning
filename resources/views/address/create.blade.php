@extends('base')

@section('page-title', 'Address | Create')

@section('content')
  <h1>Create New Address</h1>

  @if ($errors->any())
    <div class="error">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ action('AddressController@store') }}">
    {{ csrf_field() }}
    <label for="street">Street: </label>
    <input type="text" id="street" name="street"><br>
    <label for="city">City: </label>
    <input type="text" id="city" name="city"><br>
    <label for="region">Region: </label>
    <input type="text" id="region" name="region"><br>
    <label for="zip">Zip: </label>
    <input type="text" id="zip" name="zip"><br>
    <label for="country">Country: </label>
    <input type="text" id="country" name="country"><br>
    <button type="submit">Submit</button>
  </form>

@endsection

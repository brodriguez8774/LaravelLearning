@extends('base')

@section('page-title', 'Address | Edit')

@section('content')
  <h1>Edit Address</h1>

  @if ($errors->any())
    <div class="error">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ action('AddressController@update', [ 'id' => $address->id ]) }}">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <label for="street">Street: </label>
    <input type="text" id="street" name="street" value="{{ $address->street }}"><br>
    <label for="city">City: </label>
    <input type="text" id="city" name="city" value="{{ $address->city }}"><br>
    <label for="region">Region: </label>
    <input type="text" id="region" name="region" value="{{ $address->region }}"><br>
    <label for="zip">Zip: </label>
    <input type="text" id="zip" name="zip" value="{{ $address->zip }}"><br>
    <label for="country">Country: </label>
    <input type="text" id="country" name="country" value="{{ $address->country }}"><br>
    <button type="submit">Submit</button>
  </form>

  <br>
  <form method="POST" action="{{ action('AddressController@delete', [ 'id' => $address->id ]) }}">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button>Delete</button>
  </form>

@endsection

@extends('vue/base')


@section('page-title', 'Index')


@section('content')
  <h1>Vue Index</h1>

  <div id="root">
    <input type="text" id="input" v-model="message">
    <p>The value of input is {{ message }}.</p>
  </div>
@endsection


@section('extra-scripts')
  <script>

  let data = {
    message: 'Hello World'
  };

  // Create new Vue to do things. Lives with in #root element.
  new Vue({
    el: '#root',
    data: data,
  })

  </script>
@endsection

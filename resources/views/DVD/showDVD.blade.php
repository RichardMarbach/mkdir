@extends('layouts.master')

@section('title')
  Showing
@endsection

@section('content')
  <div class="container">
    <h1>{{}}</h1>

    

    {!! $dvds->render() !!}
  </div>
@endsection
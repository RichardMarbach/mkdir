@extends('layouts.master')

@section('title')
  Listing
@endsection

@section('content')
  <div class="container">
    {{ $dvds }}
  </div>
@endsection
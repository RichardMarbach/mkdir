@extends('layouts.master')

@section('title')
  Listing
@endsection

@section('content')
  <div class="container">
    @each('DVD.partials.dvd_item', $dvds, 'dvd')
  </div>
@endsection
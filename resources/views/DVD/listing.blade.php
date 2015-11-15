@extends('layouts.master')

@section('title')
  Listing
@endsection

@section('content')
  <div class="container">
    <h1>Our DVDs</h1>

    @each('DVD.partials.dvd_item', $dvds, 'dvd', 'common.empty')

    {!! $dvds->render() !!}
  </div>
@endsection
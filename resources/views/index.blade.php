@extends('layouts.master')

@section('title')
  Home
@endsection

@section('content')
<div class="bg-main">
<div class="container">
  @include('partials.main-banner')
</div>


<div class="container container-bottom">
  <div class="row">
    <div class="col-md-6">
      <h4 class="category">MKDIR'S <span class="highlighted">CHOICE </span></h4>
      <div class="row home-row">
        @include('partials.dvd-item')
        @include('partials.dvd-item')
        @include('partials.dvd-item')
        @include('partials.dvd-item')
      </div>
    </div>

    <div class="col-md-6">
      <h4 class="category">MKDIR'S <span class="highlighted">CHOICE </span></h4>
      <div class="row home-row">
        @include('partials.dvd-item')
        @include('partials.dvd-item')
        @include('partials.dvd-item')
        @include('partials.dvd-item')
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <h4 class="category">MKDIR'S <span class="highlighted">CHOICE </span></h4>
      <div class="row home-row">
        @include('partials.dvd-item')
        @include('partials.dvd-item')
        @include('partials.dvd-item')
        @include('partials.dvd-item')
      </div>
    </div>

    <div class="col-md-6">
      <h4 class="category">MKDIR'S <span class="highlighted">CHOICE </span></h4>
      <div class="row home-row">
        @include('partials.dvd-item')
        @include('partials.dvd-item')
        @include('partials.dvd-item')
        @include('partials.dvd-item')
      </div>
    </div>
  </div>

</div>
</div>

@endsection

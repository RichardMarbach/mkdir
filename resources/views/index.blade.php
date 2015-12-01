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
      <h4 class="category">You might like</h4>
      <div class="row">
        @foreach ($dvds->random() as $dvd)
          @include('partials.dvd-item')
        @endforeach
      </div>
    </div>

    <div class="col-md-6">
      <h4 class="category">Popular this week</h4>
      <div class="row">
        @foreach ($dvds->random() as $dvd)
          @include('partials.dvd-item')
        @endforeach
      </div>
    </div>
  </div>

  <div class="row home-row">
    <div class="col-md-6">
      <h4 class="category">What to watch</h4>
      <div class="row">
        @foreach ($dvds->random() as $dvd)
          @include('partials.dvd-item')
        @endforeach
      </div>
    </div>

    <div class="col-md-6">
      <h4 class="category">MKDIR'S <span class="highlighted">CHOICE </span></h4>
      <div class="row">
        @foreach ($dvds->random() as $dvd)
          @include('partials.dvd-item')
        @endforeach
      </div>
    </div>
  </div>

</div>
</div>
@endsection

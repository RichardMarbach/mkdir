@extends('layouts.master')

@section('title')
  {{ $user->customer->name }} Dashbaord
@endsection

@section('content')
  <div class="container">
    <div class="col-md-6 user-rentals">
      @include('user.partials.user-rentals', ['rentals' => $user->customer->rentals])
    </div>
    
    <div class="col-md-6 user-details">
      @include('user.partials.user-details')
    </div>
  </div>
@endsection
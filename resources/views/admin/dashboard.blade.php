@extends('layouts.master')

@section('title')
    Admin dashboard - @yield('admin-title', 'Customers')
@endsection

@section('content')
  <div class="container-fluid">
      @include('admin.partials.tab-nav')
  </div>

  <div class="container-fluid">
    @yield('management-pannel', \View::make('admin.management-pannels.customers'))
  </div>
@endsection

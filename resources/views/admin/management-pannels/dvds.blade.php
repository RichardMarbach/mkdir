@extends('admin.dashboard')

@section('admin-title')
 dvds 
@endsection

@section('management-pannel')
  @include('common.success')
  @include('common.errors')

  <div class="col-sm-10 small-top-buffer">
    @each('admin.partials.dvd-item', $dvds, 'dvd')
  </div>

  <div class="col-sm-2 small-top-buffer">
    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#create-dvd-modal">Add new dvd</button>
  </div>

  @include('admin.partials.confirmation-modal')
  @include('admin.partials.edit-dvd-modal')
@endsection
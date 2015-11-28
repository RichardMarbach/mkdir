@extends('admin.dashboard')

@section('admin-title')
  Rentals
@endsection

@section('management-pannel')
 @include('common.success')

  <div class="col-sm-10 small-top-buffer">
    @each('admin.partials.rental-item', $rentals, 'rental')
  </div>

  <div class="col-sm-2 small-top-buffer">
    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#create-rental-modal">New rental</button>
  </div>

  @include('admin.partials.create-rental-modal')
  @include('admin.partials.edit-rental-modal')
  @include('admin.partials.confirmation-modal')
@endsection
@extends('admin.dashboard')

@section('admin-title')
  Customers
@endsection

@section('management-pannel')
  @include('common.success')
  
  <div class="col-sm-10 small-top-buffer">
    @each('admin.partials.customer-item', $customers, 'customer')
  </div>
  <div class="col-sm-2 small-top-buffer">
    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#create-customer-modal">Add new Customer</button>
  </div>

  @include('admin.partials.edit-customer-modal')
  @include('admin.partials.confirmation-modal')
  @include('admin.partials.create-customer-modal')
@endsection
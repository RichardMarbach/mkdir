@extends('layouts.master')

@section('title')
  Showing
@endsection

@section('content')
@include('common.success')

<div class="container">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">{{ $dvd->title }}
              <small>{{ $dvd->getPrice() }} euros</small>
          </h1>
      </div>
  </div>

  <div class="row">

      <div class="col-md-3">
          <img class="img-responsive" src="{{ empty($dvd->cover_image)
      ? 'https://placeholdit.imgix.net/~text?txtsize=14&txt=150%C3%97200&w=150&h=200'
      : '/images/' . $dvd->cover_image }} " alt="{{ $dvd->title }}">
      </div>

      <div class="col-md-8">
          <h3>Product Details</h3>

        <table class="table table-striped">
          <tr>
              <th class="a-span2">
                  Genres
              </th>
              <td>
                @foreach ($dvd->genres as $genre)
                {{ $genre->genre }}
                @endforeach
              </td>
          </tr>
          <tr>
              <th class="a-span2">
                  Running Time
              </th>
              <td>
              {{ $dvd->length }} min
              </td>
          </tr>
          <tr>
              <th class="a-span2">
                Producer
              </th>
              <td>
                @foreach ($dvd->producers as $producer)
                    {{ $producer->name }}
                @endforeach
              </td>
          </tr>
          <tr>
              <th class="a-span2">
                Actors
              </th>
              <td>
                @foreach ($dvd->actors as $actor)
                    {{ $actor->name }}
                @endforeach
              </td>
          </tr>
          <tr>
              <th class="a-span2">
                Age restriction
              </th>
              <td>
                {{ $dvd->getAgeRestriction() }}
              </td>
          </tr>
          <tr>
              <th class="a-span2">
                Description
              </th>
              <td>
                <p>{{ $dvd->description }}</p>
              </td>
          </tr>

        </table>
      </div>

      <div class="clearfix"></div>
      <div class="col-sm-offset-10">
        <button class="btn btn-primary" data-toggle="modal" data-target="#rent-dvd-modal">Rent</button>
      </div>
  </div>
</div>
@include('DVD.partials.rent-modal')
@endsection

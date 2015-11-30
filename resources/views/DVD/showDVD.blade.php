@extends('layouts.master')

@section('title')
  Showing
@endsection

@section('content')
<div class="container">
    {!! Form::open(['route' => 'rentals.store', 'method' => 'post']) !!}
      {!! Form::hidden('name', dvd->dvds->rentals->customer->name) !!}
      {!! Form::hidden('address', dvd->dvds->rentals->customer->address) !!}
      {!! Form::hidden('phone_number', dvd->dvds->rentals->customer->phone_number) !!}
      {!! Form::hidden('dvd_id', dvd->dvds->id) !!}
      {!! Form::hidden('start_date', \Carbon\Carbon::now()) !!}
      {!! Form::hidden('due_date', \Carbon\Carbon::now()->addDays(7)) !!}

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
      </div>

      <hr>

      <div>
        {!! Form::submit('Rent') !!}
      </div>
    {!! Form::close()!!}
</body>
@endsection

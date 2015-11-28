@extends('layouts.master')

@section('title')
  Showing
@endsection

@section('content')
  <div class="container">
	<div>
    	<img
        src="{{ empty($dvd->cover_image)
            ? 'https://placeholdit.imgix.net/~text?txtsize=14&txt=150%C3%97200&w=150&h=200'
            : '/images/' . $dvd->cover_image }} "
        alt="{{ $dvd->title }}" />
    </div>
    <div>
    	<h4> Genres:
            <span>
            @foreach ($dvd->genres as $genre)
                {{ $genre->genre }} 
            @endforeach
            </span>
        </h4>
    	<h4>Running time: <span>{{ $dvd->length }} min</span></h4>
    	<h4>Producers: <span>
            @foreach ($dvd->producers as $producer)
                {{ $producer->name }} 
            @endforeach
            </span>
        </h4>
    	<h4>Actors:
            <span>
            @foreach ($dvd->actors as $actor)
                {{ $producer->name }} 
            @endforeach
            </span>
        </h4>
    	<h4>Age restriction: <span>{{ $dvd->getAgeRestriction() }}</span></h4>
    	<h4>Description</h4>
    	<p>{{ $dvd->description }}</p>
    </div>
  </div>
@endsection
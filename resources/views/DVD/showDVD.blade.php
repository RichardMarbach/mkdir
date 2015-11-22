@extends('layouts.master')

@section('title')
  Showing
@endsection

@section('content')
  <div class="container">
    <h1>{{ $dvd->dvd_info->title }}</h1>

	<div>
    	<img
        src="{{ $dvd->cover_image or 'https://placeholdit.imgix.net/~text?txtsize=14&txt=150%C3%97200&w=150&h=200' }}" 
        alt="{{ $dvd->dvd_info->title }}" />
    </div>
    <div>
    	<h2>Genre <span>{{ $dvd->dvd_info->genres->genre }}</span></h2>
    	<h2>Running time <span>{{ $dvd->dvd_info->length != '' ? $dvd->dvd_info->length : '90 minutes' }}</span></h2>
    	<h2>Producers <span>{{ $dvd->dvd_info->producers->name }}</span></h2>
    	<h2>Actors <span>{{ $dvd->dvd_info->actors->name }}</span></h2>
    	<h2>Age restriction <span>{{ $dvd->age_restriction }}</span></h2>
    	<h2>Description</h2>
    	<p>{{ $dvd->dvd_info->description }}</p>
    </div>
  </div>
@endsection
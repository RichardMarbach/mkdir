@extends('layouts.master')

@section('title')
    Add DVDs
@endsection

<h1>Add DVD</h1>

@section('content')
    @include('common.errors')

    {!! Form::open(['url' => '/create', 'method' => 'post']) !!}

    <h3>DVD Info</h3>

    <div>
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title') !!}
    </div>

    <div>
        {!! Form::label('genre[]', 'Genre') !!}
        {!! Form::select('genre[]', [
            'Action' => 'Action',
            'Adventure' => 'Adventure',
            'Comedy' => 'Comedy',
            'Crime' => 'Crime',
            'Fantasy' => 'Fantasy',
            'Horror' => 'Horror',
            'Drama' => 'Darma',
            'Sci-Fi' => 'Sci-Fi',
            'Thriller' => 'Thriller']) !!}
    </div>

    <div>
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description') !!}
    </div>

    <div>
        {!! Form::label('length', 'Length') !!}
        {!! Form::number('length') !!} minutes
    </div>

    <div>
        {!! Form::label('cover_image', 'Cover') !!}
        {!! Form::file('cover_image') !!}
    </div>

    <div>
        {!! Form::label('producer_name[]', 'Producer') !!}
        {!! Form::text('producer_name[]') !!}
    </div>

    <div>
        {!! Form::button('Add producer')!!}
    </div>

    <div>
        {!! Form::label('age_restriction', 'Age restriction') !!}
        {!! Form::number('age_restriction', null) !!}
        {!! Form::label('age_restriction', 'years') !!}
    </div>

    <h3> Cast </h3>

    <div>
        {!! Form::label('actor_name[]', 'Actor') !!}
        {!! Form::text('actor_name[]') !!}
        {!! Form::label('character_name[]', 'Character') !!}
        {!! Form::text('character_name[]') !!}
    </div>

    <div>
        {!! Form::button('Add actor')!!}
    </div>

    <h3> Language </h3>

    <div>
        {!! Form::label('language_name[]', 'Language') !!}
        {!! Form::text('language_name[]') !!}
    </div>

    <div>
        {!! Form::label('subtitle_name[]', 'Subtitles') !!}
        {!! Form::text('subtitle_name[]') !!}
    </div>

    <h3> Price </h3>

    <div>
        {!! Form::label('Price') !!}
        {!! Form::number('price_whole', null) !!}, {!! Form::number('price_cents', null) !!}
    </div>

    <div>
        {!! Form::label('Late Fee') !!}
        {!! Form::number('late_fee_whole', null) !!}, {!! Form::number('late_fee_cents', null) !!} $
    </div>

    <div>
        {!! Form::label('discount', 'Discount') !!}
        {!! Form::number('discount', null) !!}
        {!! Form::label('discount', '%') !!}
    </div>

    <div>
        {!! Form::label('points', 'Points') !!}
        {!! Form::number('points') !!}
    </div>
    <div>
        {!! Form::label('stock', 'Stock') !!}
        {!! Form::number('stock') !!}
    </div>

    <div>
        <br>
        {!! Form::submit('Add') !!}
    </div>
    {!! Form::close() !!}
@endsection
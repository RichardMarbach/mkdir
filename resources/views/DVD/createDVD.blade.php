@extends('layouts.master')

@section('title')
    Add DVDs
@endsection

<h1>Add DVD</h1>

@section('content')
    @include('common.errors')

{!! Form::open(['url' => '/createDVD', 'method' => 'post']) !!}

<h3>DVD Info</h3>

<div>
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title') !!}
</div>

<div>
    {!! Form::label('genre', 'Genre') !!}
    {!! Form::select('genre', array('Action','Adventure','Comedy','Crime','Fantasy','Horror','Drama','Sci-Fi','Thriller',)) !!}
</div>

<div>
    {!! Form::label('description', 'Description') !!}
</div>

<div>
    {!! Form::textarea('description') !!}
</div>

<div>
    {!! Form::label('length', 'Length') !!}
    {!! Form::text('length') !!}
</div>

<div>
    {!! Form::label('cover_image', 'Cover') !!}
    {!! Form::file('cover_image') !!}
</div>

<div>
    {!! Form::label('producer_name', 'Producer') !!}
    {!! Form::select('producer_name', array('')) !!}
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
    {!! Form::label('actor_name', 'Cast') !!}
    {!! Form::text('actor_name') !!}
</div>

<div>
    {!! Form::button('Add actor')!!}
</div>

<h3> Language </h3>

<div>
    {!! Form::label('language_name', 'Language') !!}
    {!! Form::text('language_name') !!}
</div>

<div>
    {!! Form::label('language_name', 'Subtitles') !!}
    {!! Form::text('language_name') !!}
</div>

<h3> Price </h3>

<div>
    {!! Form::label('Price') !!}
    {!! Form::number('price_whole', null) !!}
    {!! Form::label('price_whole', ' $') !!}
    {!! Form::number('price_cents', null) !!}
    {!! Form::label('price_cents', 'c') !!}
</div>

<div>
    {!! Form::label('Late Fee') !!}
    {!! Form::number('late_fee', null) !!}
    {!! Form::label('late_fee', '$') !!}
</div>

<div>
    {!! Form::label('discount', 'Discount') !!}
    {!! Form::number('discount', null) !!}
    {!! Form::label('discount', '%') !!}
</div>
<div>
    <br>
    {!! Form::submit('Add') !!}
</div>
{!! Form::close() !!}
@endsection
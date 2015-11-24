@extends('layouts.master')

@section('title')
    Add DVDs
@endsection

@section('content')
    <div class="container-fluid">
        {!! Form::open(['url' => '/create', 'method' => 'post', 'class' => 'form-horizontal']) !!}
            @include('common.errors')
            <div class="form-group row">
                {!! Form::label('title', 'Title', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}    
                </div>

                {!! Form::label('genre[]', 'Genre', ['class' => 'control-label col-sm-1'] ) !!}
                <div class="col-sm-2">
                    {!! Form::select('genre[]', [
                        'Action' => 'Action',
                        'Adventure' => 'Adventure',
                        'Comedy' => 'Comedy',
                        'Crime' => 'Crime',
                        'Fantasy' => 'Fantasy',
                        'Horror' => 'Horror',
                        'Drama' => 'Darma',
                        'Sci-Fi' => 'Sci-Fi',
                        'Thriller' => 'Thriller'], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('description', 'Description', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}    
                </div>

                {!! Form::label('length', 'Length', ['class' => 'control-label col-sm-1']) !!}
                <div class="col-sm-1 small-input">
                    {!! Form::number('length', null, ['class' => 'form-control', 'min' => 0]) !!}    
                </div>
                <label for="length" class="control-label">min</label>
            </div>

            <div class="form-group">
                {!! Form::label('cover_image', 'Cover', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    {!! Form::file('cover_image', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('producer_name[]', 'Producer', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    {!! Form::text('producer_name[]', null, ['class' => 'form-control']) !!}        
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('actor_name[]', 'Actor', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    {!! Form::text('actor_name[]', null, ['class' => 'form-control']) !!}    
                </div>
                {!! Form::label('character_name[]', 'Character', ['class' => 'control-label col-sm-1']) !!}
                <div class="col-sm-3">
                    {!! Form::text('character_name[]', null, ['class' => 'form-control']) !!}        
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('language_name[]', 'Language', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    {!! Form::text('language_name[]', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('subtitle_name[]', 'Subtitles', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    {!! Form::text('subtitle_name[]', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('price_whole', 'Price', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    <div class="form-group row">
                        <div class="col-sm-1 tiny-input">
                            {!! Form::number('price_whole', null, ['class' => 'form-control', 'min' => 0]) !!}
                        </div>
                        <div class="col-sm-1  tiny-input">
                             {!! Form::number('price_cents', null, ['class' => 'form-control', 'min' => 0, 'max' => 99]) !!}
                        </div>
                        <label for="price_whole" class="control-label col-sm-1 currency-delimiter"><span class="pull-left">$</span></label>
                    </div>
                </div>

                {!! Form::label('discount', 'Discount', ['class' => 'control-label col-sm-1']) !!}
                <div class="form-group row">
                    <div class="col-sm-1  tiny-input">
                        {!! Form::number('discount', null, ['class' => 'form-control', 'min' => 0]) !!}
                    </div>
                    <label for="discount" class="control-label col-sm-1 currency-delimiter"><span class="pull-left">%</span></label>
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('late_fee_whole', 'Late Fee', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    <div class="form-group row">
                        <div class="col-sm-1  tiny-input">
                            {!! Form::number('late_fee_whole', null, ['class' => 'form-control', 'min' => 0]) !!}
                        </div>
                        <div class="col-sm-1  tiny-input">
                             {!! Form::number('late_fee_cents', null, ['class' => 'form-control', 'min' => 0, 'max' => 99]) !!}
                        </div>
                        <label for="late_fee_whole" class="control-label col-sm-1 currency-delimiter"><span class="pull-left">$</span></label>
                    </div>
                </div>

                {!! Form::label('points', 'Points', ['class' => 'control-label col-sm-1']) !!}
                <div class="col-sm-1 tiny-input">
                    {!! Form::number('points', null, ['class' => 'form-control', 'min' => 0]) !!} 
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('stock', 'Stock', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    <div class="tiny-input">
                        {!! Form::number('stock', null, ['class' => 'form-control', 'min' => 0]) !!}
                    </div>
                </div>

                {!! Form::label('age_restriction', 'PG', ['class' => 'control-label col-sm-1']) !!}
                <div class="col-sm-1 tiny-input">
                    {!! Form::number('age_restriction', null, ['class' => 'form-control', 'min' => 0]) !!}    
                </div>
                <label for="age_restriction" class="control-label col-sm-1 currency-delimiter">
                    <span class="pull-left">years</span>
                </label>
            </div>

            <div>
                <br>
                {!! Form::submit('Add') !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
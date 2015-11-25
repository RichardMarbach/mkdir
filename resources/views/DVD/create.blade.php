@extends('layouts.master')

@section('title')
    Add DVDs
@endsection

@section('content')
    <div class="container-fluid">
        {!! Form::open(['url' => '/create', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true]) !!}
            @include('common.errors')
            @include('common.success')

            <div class="form-group row">
                {!! Form::label('title', 'Title', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}    
                </div>

                {!! Form::label('length', 'Length', ['class' => 'control-label col-sm-1']) !!}
                <div class="col-sm-1 small-input">
                    {!! Form::number('length', 60, ['class' => 'form-control', 'min' => 0]) !!}    
                </div>
                <label for="length" class="control-label">min</label>
            </div>

            <div class="form-group row">
                {!! Form::label('description', 'Description', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5]) !!}    
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('cover_image', 'Cover', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    {!! Form::file('cover_image', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('genre[]', 'Genre', ['class' => 'control-label col-sm-2'] ) !!}
                <div class="col-sm-3">
                    <select class="form-control" id="genre[]" name="genre[]">
                        <option value="Action">Action</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Crime">Crime</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Horror">Horror</option>
                        <option value="Drama">Darma</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Thriller">Thriller</option>
                    </select>                    
                </div>

                <div class="col-sm-1 col-sm-offset-4">
                    <button class="btn btn-primary" id="addGenre">Add Genre</button>
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('producer_name[]', 'Producer', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    <input class="form-control" name="producer_name[]" type="text" id="producer_name[]">
                </div>

                <div class="col-sm-1 col-sm-offset-4">
                    <button class="btn btn-primary" id="addActor">Add Producer</button>
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('actor_name[]', 'Actor', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    <input class="form-control" name="actor_name[]" type="text" id="actor_name[]">
                </div>
                {!! Form::label('character_name[]', 'as', ['class' => 'control-label col-sm-1']) !!}
                <div class="col-sm-3">
                    <input class="form-control" name="character_name[]" type="text" id="character_name[]">
                </div>

                <div class="col-sm-1">
                    <button class="btn btn-primary" id="addProducer">Add Actor</button>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('language_name[]', 'Language', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    <input class="form-control" name="language_name[]" type="text" id="language_name[]">
                </div>

                <div class="col-sm-1 col-sm-offset-4">
                    <button class="btn btn-primary" id="addLanguage">Add Language</button>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('subtitle_name[]', 'Subtitles', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    <input class="form-control" name="subtitle_name[]" type="text" id="subtitle_name[]">
                </div>

                <div class="col-sm-1 col-sm-offset-4">
                    <button class="btn btn-primary" id="addSubtitle">Add Subtitle</button>
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('price_whole', 'Price', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    <div class="form-group row">
                        <div class="col-sm-1 tiny-input">
                            {!! Form::number('price_whole', 0, ['class' => 'form-control', 'min' => 0]) !!}
                        </div>
                        <div class="col-sm-1  tiny-input">
                             {!! Form::number('price_cents', 0, ['class' => 'form-control', 'min' => 0, 'max' => 99]) !!}
                        </div>
                        <label for="price_whole" class="control-label col-sm-1 currency-delimiter"><span class="pull-left">$</span></label>
                    </div>
                </div>

                {!! Form::label('discount', 'Discount', ['class' => 'control-label col-sm-1']) !!}
                <div class="form-group row">
                    <div class="col-sm-1  tiny-input">
                        {!! Form::number('discount', 0, ['class' => 'form-control', 'min' => 0, 'max' => 100]) !!}
                    </div>
                    <label for="discount" class="control-label col-sm-1 currency-delimiter"><span class="pull-left">%</span></label>
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('late_fee_whole', 'Late Fee', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    <div class="form-group row">
                        <div class="col-sm-1  tiny-input">
                            {!! Form::number('late_fee_whole', 0, ['class' => 'form-control', 'min' => 0]) !!}
                        </div>
                        <div class="col-sm-1  tiny-input">
                             {!! Form::number('late_fee_cents', 0, ['class' => 'form-control', 'min' => 0, 'max' => 99]) !!}
                        </div>
                        <label for="late_fee_whole" class="control-label col-sm-1 currency-delimiter"><span class="pull-left">$</span></label>
                    </div>
                </div>

                {!! Form::label('points', 'Points', ['class' => 'control-label col-sm-1']) !!}
                <div class="col-sm-3">
                    <div class="small-input">
                        {!! Form::number('points', 0, ['class' => 'form-control', 'min' => 0]) !!} 
                    </div>    
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('age_restriction', 'PG', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-3">
                    <div class="form-group col-sm-1 tiny-input">
                        {!! Form::number('age_restriction', 0, ['class' => 'form-control', 'min' => 0]) !!}    
                    </div>
                </div>
                

                {!! Form::label('stock', 'Stock', ['class' => 'control-label col-sm-1']) !!}
                <div class="col-sm-3">
                    <div class="small-input">
                        {!! Form::number('stock', 1, ['class' => 'form-control', 'min' => 0]) !!}    
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2">
                    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
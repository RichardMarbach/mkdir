{!! Form::open(['route' => 'dvds.update', 'method' => 'put', 'id' => 'dvd-edit-form','class' => 'form-horizontal', 'files' => true]) !!}

  <div class="form-group row">
    {!! Form::label('title', 'Title', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-4">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}    
    </div>

    {!! Form::label('length', 'Length', ['class' => 'control-label col-sm-2 col-sm-offset-1']) !!}
    <div class="col-sm-1 small-input">
        {!! Form::number('length', 60, ['class' => 'form-control', 'min' => 0]) !!}    
    </div>
    <label for="length" class="control-label">min</label>
  </div>

  <div class="form-group row">
      {!! Form::label('description', 'Description', ['class' => 'control-label col-sm-2']) !!}
      <div class="col-sm-7">
          {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5]) !!}    
      </div>
  </div>

  <div class="form-group">
      {!! Form::label('cover_image', 'Cover', ['class' => 'control-label col-sm-2']) !!}
      <div class="col-sm-3">
          {!! Form::file('cover_image', null, ['class' => 'form-control']) !!}
      </div>
  </div>

{!! Form::close() !!}
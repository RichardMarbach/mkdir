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

  <div class="row">
    {!! Form::label('price_whole', 'Price', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-5">
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

    {!! Form::label('discount', 'Discount', ['class' => 'control-label col-sm-2']) !!}
    <div class="form-group">
        <div class="col-sm-1  tiny-input">
            {!! Form::number('discount', 0, ['class' => 'form-control', 'min' => 0, 'max' => 100]) !!}
        </div>
        <label for="discount" class="control-label col-sm-1 currency-delimiter"><span class="pull-left">%</span></label>
    </div>
  </div>

  <div class="row">
    {!! Form::label('late_fee_whole', 'Late Fee', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-5">
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

    {!! Form::label('points', 'Points', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-3">
        <div class="small-input">
            {!! Form::number('points', 0, ['class' => 'form-control', 'min' => 0]) !!} 
        </div>    
    </div>
  </div>

  <div class="row">
    {!! Form::label('stock', 'Stock', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-5">
        <div class="small-input">
            {!! Form::number('stock', 1, ['class' => 'form-control', 'min' => 0]) !!}    
        </div>
    </div>
    
    {!! Form::label('age_restriction', 'PG', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-3">
        <div class="form-group col-sm-1 tiny-input">
            {!! Form::number('age_restriction', 0, ['class' => 'form-control', 'min' => 0]) !!}    
        </div>
    </div>
  </div>

{!! Form::close() !!}
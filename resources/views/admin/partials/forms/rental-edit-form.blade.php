{!! Form::open(['route' => 'rentals.update', 'method' => 'put', 'id' => 'rental-edit-form','class' => 'form-horizontal']) !!}
  <div class="form-group">
    {!! Form::label('start_date', 'Start Date', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
      {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('due_date', 'Due Date', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
      {!! Form::date('due_date', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="returned" id="returned"> Returned
        </label>
      </div>
    </div>
  </div>
{!! Form::close()!!}
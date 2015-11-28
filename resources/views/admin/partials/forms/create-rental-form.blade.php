{!! Form::open(['route' => 'rentals.store', 'method' => 'post', 'id' => 'create-rental-form','class' => 'form-horizontal']) !!}

  <div class="form-group">
    {!! Form::label('dvd_id', 'Dvd', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
      <select name="dvd_id" id="dvd_id" class="form-control">
        @foreach($dvds as $dvd)
          <option value="{{ $dvd->id }}"> {{ $dvd->title }}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('start_date', 'Start Date', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
      {!! Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('due_date', 'Due Date', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
      {!! Form::date('due_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
    </div>
  </div>

  <h4 class="text-center">Customer</h4>
  <div class="form-group">
    {!! Form::label('name', 'Name', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
      {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('address', 'Address', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
      {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('phone_number', 'Phone', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-8">
      {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
    </div>
  </div>
{!! Form::close()!!}
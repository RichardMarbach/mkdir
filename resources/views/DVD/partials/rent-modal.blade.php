<div class="modal fade" id="rent-dvd-modal" tabindex="-1" role="dialog" aria-labelledby="rent-dvd-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="rent-dvd-label">Rent {{ $dvd->title }}</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => ['dvds.rent', 'id' => $dvd->id], 'method' => 'post', 'id' => 'rent-dvd-form','class' => 'form-horizontal']) !!}
          <div class="form-group">
            {!! Form::label('start_date', 'From', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-8">
              {!! Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('due_date', 'Until', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-8">
              {!! Form::date('due_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            </div>
          </div>
        {!! Form::close()!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="rent-dvd-submit">Rent</button>
      </div>
    </div>
  </div>
</div>
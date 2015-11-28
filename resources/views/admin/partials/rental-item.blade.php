<div class="col-sm-4">
  <div class="thumbnail" data-id="{{$rental->id}}">

    <h4> Dvd: {{ $rental->dvd->dvd_info->title }}</h4>
    <h4>To: {{ $rental->customer->name }}</h4>

    <h5 data-start="{{ $rental->start_date }}">Rented on: {{ Helper::prettifyDate($rental->start_date) }}</h5>
    <h5 data-due="{{ $rental->due_date }}">Due: {{ Helper::prettifyDate($rental->due_date) }}</h5>

    <div class="clearfix"></div>
  
    <button class="btn btn-default" data-toggle="modal" data-target="#rental-edit-modal">Edit</button>
    <button id="confirm-delete" class="btn btn-default" 
      data-toggle="modal" data-target="#delete-modal" 
      data-type="rentals" data-id="{{ $rental->id }}">
      Delete
    </button>
  </div>
</div>
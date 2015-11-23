<div class="col-sm-5">
  <div class="thumbnail" data-id="{{$customer->id}}">
    <h4 data-name="{{ $customer->name }}"> {{ $customer->name }} </h4>
    <h5 data-email="{{ $customer->user ? $customer->user->email : '' }}">Email: 
      <span>{{ $customer->user ? $customer->user->email : '' }}</span>
    </h5>
    <h5 data-address="{{ $customer->address }}">Address: <span>{{ $customer->address }}</span></h5>
    <h5 data-phone="{{ $customer->phone_number }}">Phone: <span>{{ $customer->phone_number }}</span></h5>
    <h5 data-points="{{ $customer->points }}">Points: <span>{{ $customer->points }}</span></h5>
    <h5>Birthdate: 
      <span>{{ Helper::prettifyDate($customer->user ? $customer->user->birthdate : '') }}</span>
    </h5>
    <h5 data-admin="{{ $customer->user ? Helper::isAdmin($customer->user->roles) : 0 }}">
      Roles: 
      <span>
        @if ($customer->user)
          @foreach($customer->user->roles as $role)
            {{ $role->name }}
          @endforeach
        @else
          None
        @endif
      </span>
    </h5>
    <h5>Created on: <span>{{ Helper::prettifyDate($customer->created_at) }}</span></h5>
    <h5>Updated on: <span>{{ Helper::prettifyDate($customer->updated_at) }}</span></h5>

    <button class="btn btn-default" data-toggle="modal" data-target="#customer-edit-modal">Edit</button>
    <button class="btn btn-default" data-toggle="modal" data-target="#delete-modal">Delete</button>
  </div>
</div>
<div class="col-sm-4">
  <div class="thumbnail" data-id="{{$dvd->id}}">
    <div class="col-sm-8">
      <h4 data-title="{{ $dvd->title }}"> {{ $dvd->title }} 
        <span data-length="{{ $dvd->length }}" class="pull-right">{{ $dvd->length }} min</span>
      </h4>
      <p data-description="{{ $dvd->description }}"> {{ $dvd->description }}</p>  
    </div>
    <div class="col-sm-4" data-cover="{{ $dvd->cover_image }}">
      <img class="img-responsive" src="{{ $dvd->getCoverImage() }}" alt="">
    </div>
    <h5>Stock: {{ $dvd->stock() }} / <span data-stock="{{ $dvd->totalStock() }}"> {{ $dvd->totalStock() }}</span></h5>
    <h5>Price: <span data-price-whole="{{ $dvd->wholePrice() }}" data-price-cents="{{ $dvd->centPrice() }}"> {{ $dvd->getPrice() }}</span> $</h5>
    <h5>Late fee: <span data-fee-whole="{{ $dvd->feeWhole() }}" data-fee-cents="{{ $dvd->feeCents() }}">{{ $dvd->getLateFee() }}</span> $</h5>
    <h5>Discount: <span data-discount="{{ $dvd->getDiscount() }}">{{ $dvd->getDiscount() }}</span> %</h5>
    <h5>Points: <span data-points="{{ $dvd->getPoints() }}">{{ $dvd->getPoints() }} </span></h5>
    <h5>PG: <span data-age-restriction="{{ $dvd->getAgeRestriction() }}">{{ $dvd->getAgeRestriction() }}</span></h5>

    <button class="btn btn-default" data-toggle="modal" data-target="#dvd-edit-modal">Edit</button>
    <button id="confirm-delete" class="btn btn-default" 
      data-toggle="modal" data-target="#delete-modal" 
      data-type="dvds" data-id="{{ $dvd->id }}">
      Delete
    </button>
  </div>
</div>
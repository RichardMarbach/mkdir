<div class="col-sm-4">
  <div class="thumbnail row" data-id="{{$dvd->id}}">
    <div class="col-sm-8">
      <h4 data-name="{{ $dvd->name }}"> {{ $dvd->title }} 
        <span data-length="{{ $dvd->length }}" class="pull-right">{{ $dvd->length }} min</span>
      </h4>
      <p data-description="{{ $dvd->description }}"> {{ $dvd->description }}</p>  
    </div>
    <div class="col-sm-4" data-cover="{{ $dvd->cover_image }}">
      <img class="img-responsive" src="{{ $dvd->getCoverImage() }}" alt="">
    </div>
    <h5 data-stock="{{ $dvd->totalStock() }}">{{ $dvd->stock() }} / {{ $dvd->totalStock() }}</h5>
  </div>
</div>
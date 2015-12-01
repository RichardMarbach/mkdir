<div id="my-slider" class="carousel slide" data-ride="carousel">
  <!-- indicators dot nov -->
  <ol class="carousel-indicators">
    <li data-target="#my-slider" data-slider-to="0" class="active"></li>
    <li data-target="#my-slider" data-slider-to="1"></li>
    <li data-target="#my-slider" data-slider-to="2"></li>
    <li data-target="#my-slider" data-slider-to="3"></li>
    <li data-target="#my-slider" data-slider-to="4"></li>
  </ol>
  <!-- wrapper for slides -->
  <div class="carousel-inner" role="lisbox">
    @foreach ($dvds->random(1) as $dvd)
      <div class="item active">
        <a href="{{ route('dvds.show', ['id' => $dvd->id]) }}">
          <img src="{{ empty($dvd->cover_image) 
              ? 'https://placeholdit.imgix.net/~text?txtsize=24&txt=1920%C3%971080&w=1920&h=1080'
              : '/images/' . $dvd->cover_image }}" alt="" />
          <div class="carousel-caption">
            <h1>{{ $dvd->title}}</h1>
          </div>
        </a>
      </div>
    @endforeach

    @foreach ($dvds->random(4) as $dvd)
      <div class="item">
        <a href="{{ route('dvds.show', ['id' => $dvd->id]) }}">
          <img src="{{ empty($dvd->cover_image) 
              ? 'https://placeholdit.imgix.net/~text?txtsize=24&txt=1920%C3%971080&w=1920&h=1080'
              : '/images/' . $dvd->cover_image }}" alt="" />
          <div class="carousel-caption">
            <h1>{{ $dvd->title}}</h1>
          </div>
        </a>
      </div>
    @endforeach
  </div>
  <!-- controls or next and prev buttons -->
  <a class="left carousel-control" href="#my-slider" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
  </a>

  <a class="right carousel-control" href="#my-slider" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
  </a>
</div>
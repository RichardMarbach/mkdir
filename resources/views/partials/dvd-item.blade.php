<a href="{{ route('dvds.show', ['id' => $dvd->id]) }}">
  <div class="col-md-3">
    <a class="img">
        <img class="img-responsive"
          src="{{ empty($dvd->cover_image) 
            ? 'https://placeholdit.imgix.net/~text?txtsize=14&txt=150%C3%97200&w=150&h=200'
            : '/images/' . $dvd->cover_image }}"
          alt="{{ $dvd->title }}">
    </a>
    <div class="info">
      <div class="dvd-title">
        <p>{{ $dvd->title }}</p>
      </div>
      <div class="dvd-price">
        <p>&euro; {{ $dvd->getPrice() }}</p>
      </div>
    </div>
  </div>
</a>
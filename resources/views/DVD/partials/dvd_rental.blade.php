<a href="{{ route('dvds.show', ['id' => $rental->dvd->dvd_info->id]) }}">
  <div class="rental-item">
    <div class="row">
      <div class="col-md-8">
        <h3>{{ $rental->dvd->dvd_info->title }} 
          <span class="pull-right
            {{ $rental->isReturned() ? 'alert-return' : '' }}
            {{ $rental->isLate() ? 'alert-late' : '' }}
            ">
            {{ $rental->isReturned() ? 'Returned' : '' }}
            {{ $rental->isLate() ? 'This dvd is late' : ''}}
          </span>
        </h3>
        <p>{{ $rental->dvd->dvd_info->description }}</p>
      </div>
      <div class="col-sm-4">
        <img class="img-responsive"
          src="{{ empty($rental->dvd->dvd_info->cover_image) 
            ? 'https://placeholdit.imgix.net/~text?txtsize=14&txt=150%C3%97200&w=150&h=200'
            : '/images/' . $rental->dvd->dvd_info->cover_image }}"
          alt="{{ $rental->dvd->dvd_info->title }}">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <h5 class="non-link">Due Date: {{ Helper::prettifyDate($rental->due_date) }}</h5>
      </div>
    </div>
  </div>
</a>
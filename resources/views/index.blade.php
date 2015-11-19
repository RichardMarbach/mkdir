@extends('layouts.master')

@section('title')
  Home
@endsection

    .img-thumbnail {
      width:100px;
      height: 148px;
      min-width: 50px;
    }

    .table td{
      align-content: center;
      text-align: center;
    }

    .txt01 {

    }


    .modal-footer {
        background-color: #f9f9f9;
    }

    </style>
  </head>
  <body>

@section('content')
<div class="container-main">

  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <hr>
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
            <div class="item active">
              <img src="http://wallpaperspal.com/wp-content/uploads/2014-Interstellar-Movie-Poster-Wallpaper.jpg" alt="" />
              <div class="carousel-caption">
                <h1>Interstellar</h1>
              </div>
            </div>
            <div class="item">
              <img src="http://freshwallpapers.net/download/7794/1920x1080/download/inside-out-2015-movie-poster.jpg" alt="" />
              <div class="carousel-caption">
                <h1>Inside Out</h1>
              </div>
            </div>
            <div class="item">
              <img src="http://epicwallpaperhd.com/wp-content/uploads/2014/10/Guardians-Of-The-Galaxy-2014-Movie-Poster-Cover.jpg" alt="" />
              <div class="carousel-caption">
                <h1>Guardians of the Galaxy</h1>
              </div>
            </div>
            <div class="item">
              <img src="http://stylishhdwallpapers.com/wp-content/uploads/2014/09/The-Hobbit-The-Battle-of-The-Five-Armies-2014-Movie-hd-wallpaper-4.jpg" alt="" />
              <div class="carousel-caption">
                <h1>The Hobbit</h1>
                <h4>The battle of the five armies</h4>
              </div>
            </div>
            <div class="item">
              <img src="http://nukethefridge.com/wp-content/uploads/2015/04/Marvel-Ant-Man-2015-Movie-Poster-HD-Wallpaper.jpg" alt="" />
              <div class="carousel-caption">
                <h1>Antman</h1>

              </div>
            </div>
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

    </div>
    <div class="col-md-2"></div>
  </div>
</div>

<div class="container-bottom" style="margin-top:5%;">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <div class="row">
        <div class="col-sm-6">
          <h4>MKDIR'S <span style="color:red;">CHOICE </span></h4>
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <a class="img" href="#">
                      <img class="img-thumbnail" src="http://www.dvdsreleasedates.com/posters/800/I/Inside-Out-2015-movie-poster.jpg" alt="">
                  </a>
                  <div class="info">
                    <div class="txt01">
                      <p>Inside Out Combo</p>
                    </div>
                    <div class="txt02">
                      <p>&euro; 11,90</p>
                    </div>
                  </div>
                </td>

                <td>
                  <a class="img" href="#">
                      <img class="img-thumbnail" src="http://www.dvdsreleasedates.com/posters/800/I/Inside-Out-2015-movie-poster.jpg" alt="">
                  </a>
                  <div class="info">
                    <div class="txt01">
                      <p>Inside Out Combo</p>
                    </div>
                    <div class="txt02">
                      <p>&euro; 11,90</p>
                    </div>
                  </div>
                </td>

                <td>
                  <a class="img" href="#">
                      <img class="img-thumbnail" src="http://www.dvdsreleasedates.com/posters/800/I/Inside-Out-2015-movie-poster.jpg" alt="">
                  </a>
                  <div class="info">
                    <div class="txt01">
                      <p>Inside Out Combo</p>
                    </div>
                    <div class="txt02">
                      <p>&euro; 11,90</p>
                    </div>
                  </div>
                </td>

              </tr>
            </tbody>
          </table>

        </div>
        <div class="col-sm-6">
          <h4>MKDIR'S <span style="color:red;">CHOICE </span></h4>
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <a class="img" href="#">
                      <img class="img-thumbnail" src="http://www.dvdsreleasedates.com/posters/800/I/Inside-Out-2015-movie-poster.jpg" alt="">
                  </a>
                  <div class="info">
                    <div class="txt01">
                      <p>Inside Out Combo</p>
                    </div>
                    <div class="txt02">
                      <p>&euro; 11,90</p>
                    </div>
                  </div>
                </td>

                <td>
                  <a class="img" href="#">
                      <img class="img-thumbnail" src="http://www.dvdsreleasedates.com/posters/800/I/Inside-Out-2015-movie-poster.jpg" alt="">
                  </a>
                  <div class="info">
                    <div class="txt01">
                      <p>Inside Out Combo</p>
                    </div>
                    <div class="txt02">
                      <p>&euro; 11,90</p>
                    </div>
                  </div>
                </td>

                <td>
                  <a class="img" href="#">
                      <img class="img-thumbnail" src="http://www.dvdsreleasedates.com/posters/800/I/Inside-Out-2015-movie-poster.jpg" alt="">
                  </a>
                  <div class="info">
                    <div class="txt01">
                      <p>Inside Out Combo</p>
                    </div>
                    <div class="txt02">
                      <p>&euro; 11,90</p>
                    </div>
                  </div>
                </td>

              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
    <div class="col-sm-2"></div>
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <div class="row">
        <div class="col-sm-6">
          <h4>MKDIR'S <span style="color:red;">CHOICE </span></h4>
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <a class="img" href="#">
                      <img class="img-thumbnail" src="http://www.dvdsreleasedates.com/posters/800/I/Inside-Out-2015-movie-poster.jpg" alt="">
                  </a>
                  <div class="info">
                    <div class="txt01">
                      <p>Inside Out Combo</p>
                    </div>
                    <div class="txt02">
                      <p>&euro; 11,90</p>
                    </div>
                  </div>
                </td>

                <td>
                  <a class="img" href="#">
                      <img class="img-thumbnail" src="http://www.dvdsreleasedates.com/posters/800/I/Inside-Out-2015-movie-poster.jpg" alt="">
                  </a>
                  <div class="info">
                    <div class="txt01">
                      <p>Inside Out Combo</p>
                    </div>
                    <div class="txt02">
                      <p>&euro; 11,90</p>
                    </div>
                  </div>
                </td>

                <td>
                  <a class="img" href="#">
                      <img class="img-thumbnail" src="http://www.dvdsreleasedates.com/posters/800/I/Inside-Out-2015-movie-poster.jpg" alt="">
                  </a>
                  <div class="info">
                    <div class="txt01">
                      <p>Inside Out Combo</p>
                    </div>
                    <div class="txt02">
                      <p>&euro; 11,90</p>
                    </div>
                  </div>
                </td>

              </tr>
            </tbody>
          </table>

        </div>
        <div class="col-sm-6">
          <h4>MKDIR'S <span style="color:red;">CHOICE </span></h4>
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <a class="img" href="#">
                      <img class="img-thumbnail" src="http://www.dvdsreleasedates.com/posters/800/I/Inside-Out-2015-movie-poster.jpg" alt="">
                  </a>
                  <div class="info">
                    <div class="txt01">
                      <p>Inside Out Combo</p>
                    </div>
                    <div class="txt02">
                      <p>&euro; 11,90</p>
                    </div>
                  </div>
                </td>

                <td>
                  <a class="img" href="#">
                      <img class="img-thumbnail" src="http://www.dvdsreleasedates.com/posters/800/I/Inside-Out-2015-movie-poster.jpg" alt="">
                  </a>
                  <div class="info">
                    <div class="txt01">
                      <p>Inside Out Combo</p>
                    </div>
                    <div class="txt02">
                      <p>&euro; 11,90</p>
                    </div>
                  </div>
                </td>

                <td>
                  <a class="img" href="#">
                      <img class="img-thumbnail" src="http://www.dvdsreleasedates.com/posters/800/I/Inside-Out-2015-movie-poster.jpg" alt="">
                  </a>
                  <div class="info">
                    <div class="txt01">
                      <p>Inside Out Combo</p>
                    </div>
                    <div class="txt02">
                      <p>&euro; 11,90</p>
                    </div>
                  </div>
                </td>

              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>
@endsection

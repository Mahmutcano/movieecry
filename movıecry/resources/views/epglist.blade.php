<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>EPG</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/slick.css" type="text/css" />
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/cleander.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet"  href="scss/cleander.scss">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/polyfills.js"></script>
    <![endif]-->
</head>
<body>
    <video autoplay muted loop id="bg-video">
        <source src="video/gfp-astro-timelapse.mp4" type="video/mp4">
    </video>
    <div class="page-container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="cd-slider-nav">
              <nav class="navbar navbar-expand-lg" id="tm-nav">
                <a class="navbar-brand" href="#" ><img src="img/CryptoGuard.png" alt="" style="width: 90%"></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-supported-content" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbar-supported-content" >
                    <ul class="navbar-nav mb-2 mb-lg-0">
                      <li class="nav-item selected">
                        <a class="nav-link"  href="{{ asset('welcome') }}" data-no="1">Home</a>

                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ asset('channelview') }}" data-no="2">Channels</a>

                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ asset('epglist') }}" data-no="3">Program</a>

                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ asset('movieplay') }}" data-no="4">Movies</a>

                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" data-no="5">Login</a>

                      </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}" data-no="6">Register</a>

                      </li>
                    </ul>
                  </div>
              </nav>
            </div>
          </div>
        </div>
      </div>


<ul class="menu">
               @foreach($epgs as $epg)
      <li data-card="card-martin" class="martin selected"><img src="{{ asset('images') }}/{{ $epg->eimg }}" alt="image"></li>
              @endforeach
    </ul>


    <ul id="box_area" class="start">
                       @foreach($epgs as $epg)
      <li class="block"></li>
                    @endforeach
    </ul>

    <section>
      <article id="card-martin" class="card show-card">
        <div class="card__inner">
          <div class="card__photo"><img src="{{ asset('images') }}/{{ $epg->eimg }}" alt="image"></div>
          <h1 class="card__name">{{ $epg->ename }}</h1>
<div class="timeline-wrapper clearfix">
    <div class="timeline-content-day">
        <div class="timeline-line"></div>
        <div class="timeline-content-item active" data-timeline="hour-8">
            <span>8 AM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-9">
            <span>9 AM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-10">
            <span>10 AM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-11">
            <span>11 AM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-12">
            <span>12 PM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-13">
            <span>1 PM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-14">
            <span>2 PM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-15">
            <span>3 PM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-16">
            <span>4 PM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-17">
            <span>5 PM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-18">
            <span>6 PM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-19">
            <span>7 PM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-20">
            <span>8 PM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-21">
            <span>9 PM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-22">
            <span>10 PM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>

        <div class="timeline-content-item" data-timeline="hour-23">
            <span>11 PM</span>
            <div class="timeline-content-item-reveal">
                <a href="#">
                    <img src="https://picsum.photos/g/300/300">
                    <span>Lorem Ipsum</span>
                </a>
            </div>
        </div>
    </div>
</div>

        </div>
      </div>
        </div>
      </article>
    </section>

    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <script>main.init();</script>
      <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/slick.js"></script>
  <script src="js/templatemo-script.js"></script>
   <script src="js/swiper.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script  src="js/script.js"></script>
    <script  src="js/cleander.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>

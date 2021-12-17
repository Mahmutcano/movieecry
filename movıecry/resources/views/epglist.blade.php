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

    <main role="main" style="padding: 4%" style="padding-bottom: 100%">
        <div class="epg mt-3" data-component="epg" data-start="128">
            <div class="epg-header">
                <div class="wrapper" >
                    <h1 class="title" style="color: rgb(201, 201, 0)" >Channel Guide</h1>

                </div><!-- // Wrapper -->
            </div><!-- // Header -->

            <div class="epg-nav">
                <div class="wrapper" >

                    <form class="form form-search" style="background-color: transparent" >

                    </form>

                            <label for="search" class="label" style="background-color: transparent">
                            <input style="background-color: transparent" id="search" name="search" class="input" placeholder="Search&hellip;" />
                        </label>
                        <button type="submit" class="btn"><span aria-hidden="true"></span></button>
                    </form><!-- // Filters -->

                    <div class="epg-nav-dates">

                        <ol class="list list-dates" data-component="dates">
                            <li class="today"><a href="index.html">Today</a><a href="index.html" class="toggle" data-action="toggle"><span class="icon fa fa-angle-down" aria-hidden="true"></span></a></li>
                            <li><a href="index.html">Fri<span class="date">04/04</span></a></li>
                            <li><a href="index.html">Sat<span class="date">05/04</span></a></li>
                            <li><a href="index.html">Sun<span class="date">06/04</span></a></li>
                            <li><a href="index.html">Mon<span class="date">07/04</span></a></li>
                            <li><a href="index.html">Tue<span class="date">08/04</span></a></li>
                            <li><a href="index.html">Wed<span class="date">09/04</span></a></li>
                        </ol>
                    </div><!-- // Dates -->
                </div><!-- // Wrapper -->
            </div><!-- // Nav -->

            <div class="epg-contents" style="height: 20%">
                <a href="index.html" class="control control-prev" style="height: 1100px" data-action="prev"><span class="icon fa fa-chevron-left" aria-hidden="true"></span></a>
                <a href="index.html" class="control control-next" style="height: 1100px" data-action="next"><span class="icon fa fa-chevron-right" aria-hidden="true"></span></a>

                <div class="epg-grid">
                    <div class="epg-timeline">
                        <ol class="list list-timeline">
                            <li>00:00</li>
                            <li>01:00</li>
                            <li>02:00</li>
                            <li>03:00</li>
                            <li>04:00</li>
                            <li>05:00</li>
                            <li>06:00</li>
                            <li>07:00</li>
                            <li>08:00</li>
                            <li>09:00</li>
                            <li>10:00</li>
                            <li>11:00</li>
                            <li>12:00</li>
                            <li>13:00</li>
                            <li>14:00</li>
                            <li>15:00</li>
                            <li>16:00</li>
                            <li>17:00</li>
                            <li>18:00</li>
                            <li>19:00</li>
                            <li>20:00</li>
                            <li>21:00</li>
                            <li>22:00</li>
                            <li>23:00</li>
                        </ol>
                    </div><!-- // Timeline -->

                    <div class="epg-channels p-4" style="background-color: black">
                                     @foreach ($epgs as $epg)
                        <ol class="list list-channels" style="background-color: black">

                            <li style="background-color: black">

                                <a href="index.html" title="Channel 101" style="background-color: black">

                                    <img style="background-color: black" src="{{asset('images')}}/{{ $epg->eimg }}" /><br><br>

                                </a><br>



                            </li>

                        </ol>
                                @endforeach
                    </div><!-- // Channels -->

                                                                            @foreach ($epgs as $epg)
                    <div class="epg-programmes" style="height: 90%">

                        <span class="epg-marker" title="01:47" style="left: 428px"></span>
                        <!-- // Marker -->

                        <ol class="list list-programmes" style="height: 10%">

                            <li>
                                <div class="programme">

                                    <a href="index.html">

                                        <h6 class="title">{{ $epg->etitle }}</h6>
                                        <p class="description">{{ $epg->etime }}</p>

                                    </a>

                                </div>

                            </li>

                            <!-- // Channel -->
                        </ol>

                    </div><!-- // Programmes -->
@endforeach
                </div><!-- // Grid -->

            </div><!-- // Contents -->

        </div><!-- // EPG -->

    </main>

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

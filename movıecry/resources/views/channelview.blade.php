
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CryptoGuard</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/slick.css" type="text/css" />
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/cleander.css">
    <link rel="stylesheet" type="text/css" href="css/card.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet"  href="scss/cleander.scss">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
<!--

TemplateMo 560 Astro Motion

https://templatemo.com/tm-560-astro-motion

-->
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
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ asset('/') }}" data-no="1">Home</a>

                      </li>
                      <li class="nav-item selected">
                        <a class="nav-link" href="{{ asset('channelview') }}" data-no="2">Channels</a>

                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ asset('program') }}" data-no="3">Program</a>

                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ asset('movies') }}" data-no="4">Movies</a>

                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" data-no="4">Login</a>

                      </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}" data-no="4">Register</a>

                      </li>
                    </ul>
                  </div>
              </nav>
            </div>
          </div>
        </div>
      </div>



<div id="MyClockDisplay" class="clock" onload="showTime()"></div>

@foreach ($channels as $channel)

	<div class="container">
	   <div class="Box" >
	   	<div class="FlipBox">

 <li>
	   		<div class="Front" >
	   			<img src="{{asset('images')}}/{{ $channel->cimg }}" alt="">
	   		</div>
</li>




<div class="Back">
<div class="leaderboard">
  <h1>
    {{ $channel->ctitle }}
  </h1>
  <ol>
    <li class="channelli">
      <mark>{{ $channel->cname }}</mark>
      <small>{{ $channel->ctime }}</small>
    </li>
    <li class="channelli">
      <mark>{{ $channel->cname }}</mark>
      <small>{{ $channel->ctime }}</small>
    </li>
    <li class="channelli">
      <mark>{{ $channel->cname }}</mark>
      <small>{{ $channel->ctime }}</small>
    </li>
    <li class="channelli">
      <mark>{{ $channel->cname }}</mark>
      <small>{{ $channel->ctime }}</small>
    </li>
    <li class="channelli">
      <mark>{{ $channel->cname }}</mark>
      <small>{{ $channel->ctime }}</small>
    </li>
  </ol>
</div>
	   			</div>
	   		</div>
	   	</div>
	   </div>

           @endforeach
	   </div>



        <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/slick.js"></script>
  <script src="js/templatemo-script.js"></script>
   <script src="js/swiper.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script  src="js/script.js"></script>
    <script  src="js/cleander.js"></script>
        <script  src="js/card.js"></script>
</body>
</html>


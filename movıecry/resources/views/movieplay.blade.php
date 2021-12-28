<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astro Motion by TemplateMo</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/slick.css" type="text/css" />
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/cleander.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/movie.css">
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
                      <li class="nav-item selected">
                        <a class="nav-link"  href="{{ asset('/') }}" data-no="1">Home</a>

                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ asset('channelview') }}" data-no="2">Channels</a>

                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ asset('channelview') }}" data-no="3">Program</a>

                      </li>
                      <li class="nav-item">
                        <a class="nav-link selected" href="{{ asset('movieplay') }}" data-no="4">Movies</a>

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


      <div class="container-fluid tm-content-container" style="width: 100%">


  <div class="netflix-slider">

    <h2>Recently</h2>

    <div class="swiper-container">
      <div class="swiper-wrapper">
          @foreach ($movies as $movie)
        <div class="swiper-slide">
           <img src="{{asset('images')}}/{{ $movie->mimg }}" />
          <video class="video"  src="{{asset('videos')}}/{{ $movie->mvideo}}" autoplay="autoplay"></video>


          <!--Hover Content-->
           <div class="video_content ">
              <div class="left_con">
                 <div class="vid_name">{{ $movie->mname }}</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">{{ $movie->mold }}</li>
                      <li>{{ $movie->mtime }}</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>{{ $movie->mcategory }}</li>
                    </ul>
                 </div>
                 <div class="down_arrow">
                   <i onclick="myFunction()" class="fa fa-chevron-down"></i>
                 </div>
              </div>
              <div class="right_con">
                <i id="mute-video" class="fa fa-play" aria-hidden="true"></i>
              </div>
           </div>
           <!--End Hover Content-->

        </div>
                    @endforeach
      </div>
      <!-- Add Pagination -->
      <!-- <div class="swiper-pagination"></div> -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

  </div>

  </div>


  <!--Video Detail Content-->

              @foreach ($movies as $movie)
    <div id="d_container" class="detail_container mt-5 mx-5">

      <div class="detail_left" style="background-color: transparent" >
        <div class="left_detail_container">
           <div class="p_logo" style="width: 50%" style="border-radius: 30px"><img src="{{asset('images')}}/{{ $movie->mimg }}" /></div>
           <div class="other_detail mt-2">
              <ul>
                <li class="c_green">98% Match</li>
                <li>{{ $movie->myear }}</li>
                <li class="br_round1">{{ $movie->mold }}</li>
                <li>{{ $movie->mseason }}</li>
                <li class="br_round2">AD</li>
              </ul>
           </div>
           <h3>{{ $movie->alttitle }}</h3>
           <p><span>{{ $movie->mtime }}<span> "{{ $movie->mname }}"</p>
           <p class="video_text">{{ $movie->altdesc }}</p>
           <div class="other_links">
             <span class="play"><i class="fa fa-play"></i> <a href="#">PLAY</a></span>
             <span class="mylist"><i class="fa fa-check"></i> <a href="#">Follow</a></span>
           </div>
        </div>
      </div>
      <div class="detail_right">
          <div id="close">X</div>
          <div class="vid_bg"></div>
          <video width="100%" height="100%" src="{{asset('videos')}}/{{ $movie->mvideo }}" autoplay="autoplay"></video>
        </div>
      <div style="clear:both"></div>
    </div>
    </div>
    </div>
    </div>

 @endforeach


  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/slick.js"></script>
  <script src="js/templatemo-script.js"></script>
   <script src="js/swiper.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script  src="js/script.js"></script>
    <script  src="js/cleander.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script>
     function myFunction() {
        var x = document.getElementById("d_container");
         {
            x.style.display = "block";
         }
    }

    function myFunction1() {
        var x = document.getElementById("Demodiv");
        {
            x.style.display = "block";
        }
    }
  </script>


  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 4,
      spaceBetween: 4,
      slidesPerGroup: 2,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>

</body>
</html>

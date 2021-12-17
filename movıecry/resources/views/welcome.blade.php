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

<div class="slider">

		<ul>
  @foreach ($posts as $post)
            <li> <img src="{{asset('images')}}/{{ $post->image_path }}" alt=""></li>
  @endforeach
        </ul>

	</div>
	<div class="sliderControl"></div>
	<div class="timer">
		<div class="percentage">
		</div>

  </div>



      <div class="container-fluid tm-content-container">

  <div class="netflix-slider p-4">
    <h2>Recently Movies</h2>
    <div class="swiper-container p-2">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
           <img src="img/1.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay"></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
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



       <div class="swiper-slide">
           <img src="img/2.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay"></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe1</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
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




        <div class="swiper-slide">
           <img src="img/3.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
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


        <div class="swiper-slide">
           <img src="img/4.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
                    </ul>
                 </div>
                 <div class="down_arrow">
                   <i onclick="myFunction()" class="fa fa-chevron-down"></i>
                 </div>
              </div>
              <div class="right_con">
                <i class="fa fa-play" aria-hidden="true"></i>
              </div>
           </div>
           <!--End Hover Content-->
        </div>


        <div class="swiper-slide">
           <img src="img/5.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
                    </ul>
                 </div>
                <div class="down_arrow">
                   <i onclick="myFunction()" class="fa fa-chevron-down"></i>
                 </div>
              </div>
              <div class="right_con">
                <i class="fa fa-play" aria-hidden="true"></i>
              </div>
           </div>
           <!--End Hover Content-->
        </div>


        <div class="swiper-slide">
           <img src="img/6.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
                    </ul>
                 </div>
                 <div class="down_arrow">
                   <i onclick="myFunction()" class="fa fa-chevron-down"></i>
                 </div>
              </div>
              <div class="right_con">
                <i class="fa fa-play" aria-hidden="true"></i>
              </div>
           </div>
           <!--End Hover Content-->
        </div>


        <div class="swiper-slide">
           <img src="img/7.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
                    </ul>
                 </div>
                <div class="down_arrow">
                   <i onclick="myFunction()" class="fa fa-chevron-down"></i>
                 </div>
              </div>
              <div class="right_con">
                <i class="fa fa-play" aria-hidden="true"></i>
              </div>
           </div>
           <!--End Hover Content-->
        </div>


        <div class="swiper-slide">
           <img src="img/8.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
                    </ul>
                 </div>
                 <div class="down_arrow">
                   <i onclick="myFunction()" class="fa fa-chevron-down"></i>
                 </div>
              </div>
              <div class="right_con">
                <i class="fa fa-play" aria-hidden="true"></i>
              </div>
           </div>
           <!--End Hover Content-->
        </div>


        <div class="swiper-slide">
           <img src="img/9.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
                    </ul>
                 </div>
                 <div class="down_arrow">
                   <i onclick="myFunction()" class="fa fa-chevron-down"></i>
                 </div>
              </div>
              <div class="right_con">
                <i class="fa fa-play" aria-hidden="true"></i>
              </div>
           </div>
           <!--End Hover Content-->
        </div>


        <div class="swiper-slide">
           <img src="img/10.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
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





      </div>
      <!-- Add Pagination -->
      <!-- <div class="swiper-pagination"></div> -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>




  <!--Video Detail Content-->

    <div id="d_container" class="detail_container">
      <div class="detail_left">
        <div class="left_detail_container">
           <div class="c_logo" style="50%"><img style="width: 20%" src="img/CryptoGuard.png" /></div>
           <div class="p_logo"><img src="img/logo.png" /></div>
           <div class="other_detail">
              <ul>
                <li class="c_green">98% Match</li>
                <li>2020</li>
                <li class="br_round1">18+</li>
                <li>3 Seasons</li>
                <li class="br_round2">AD</li>
              </ul>
           </div>
           <h3>Watch Season 3 Now</h3>
           <p><span>S1:E9<span> "Cofee,Black"</p>
           <p class="video_text">Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

           <div class="other_links">
             <span class="play"><i class="fa fa-play"></i> <a href="#">PLAY</a></span>
             <span class="mylist"><i class="fa fa-check"></i> <a href="#">MY LIST</a></span>
             <span class="thumbs"><i class="fa fa-thumbs-up"></i></span>
             <span class="thumbs"><i class="fa fa-thumbs-down"></i></span>
           </div>

        </div>
      </div>

      <div class="detail_right">
          <div id="close">X</div>
          <div class="vid_bg"></div>
          <video width="100%" height="100%" src="https://vjs.zencdn.net/v/oceans.mp4" autoplay="autoplay"></video>
      </div>
      <div style="clear:both"></div>
    </div>
</div>

     <div class="container-fluid tm-content-container">

  <div class="netflix-slider p-4">
    <h2>Popular Movies</h2>
    <div class="swiper-container p-2">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
           <img src="img/1.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay"></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
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



       <div class="swiper-slide">
           <img src="img/2.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay"></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe1</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
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




        <div class="swiper-slide">
           <img src="img/3.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
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


        <div class="swiper-slide">
           <img src="img/4.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
                    </ul>
                 </div>
                 <div class="down_arrow">
                   <i onclick="myFunction()" class="fa fa-chevron-down"></i>
                 </div>
              </div>
              <div class="right_con">
                <i class="fa fa-play" aria-hidden="true"></i>
              </div>
           </div>
           <!--End Hover Content-->
        </div>


        <div class="swiper-slide">
           <img src="img/5.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
                    </ul>
                 </div>
                <div class="down_arrow">
                   <i onclick="myFunction()" class="fa fa-chevron-down"></i>
                 </div>
              </div>
              <div class="right_con">
                <i class="fa fa-play" aria-hidden="true"></i>
              </div>
           </div>
           <!--End Hover Content-->
        </div>


        <div class="swiper-slide">
           <img src="img/6.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
                    </ul>
                 </div>
                 <div class="down_arrow">
                   <i onclick="myFunction()" class="fa fa-chevron-down"></i>
                 </div>
              </div>
              <div class="right_con">
                <i class="fa fa-play" aria-hidden="true"></i>
              </div>
           </div>
           <!--End Hover Content-->
        </div>


        <div class="swiper-slide">
           <img src="img/7.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
                    </ul>
                 </div>
                <div class="down_arrow">
                   <i onclick="myFunction()" class="fa fa-chevron-down"></i>
                 </div>
              </div>
              <div class="right_con">
                <i class="fa fa-play" aria-hidden="true"></i>
              </div>
           </div>
           <!--End Hover Content-->
        </div>


        <div class="swiper-slide">
           <img src="img/8.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
                    </ul>
                 </div>
                 <div class="down_arrow">
                   <i onclick="myFunction()" class="fa fa-chevron-down"></i>
                 </div>
              </div>
              <div class="right_con">
                <i class="fa fa-play" aria-hidden="true"></i>
              </div>
           </div>
           <!--End Hover Content-->
        </div>


        <div class="swiper-slide">
           <img src="img/9.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
                    </ul>
                 </div>
                 <div class="down_arrow">
                   <i onclick="myFunction()" class="fa fa-chevron-down"></i>
                 </div>
              </div>
              <div class="right_con">
                <i class="fa fa-play" aria-hidden="true"></i>
              </div>
           </div>
           <!--End Hover Content-->
        </div>


        <div class="swiper-slide">
           <img src="img/10.jpg" />
          <video class="video" width="100%" height="100%" src="http://www.schauhan.in/wp-content/uploads/2020/04/Video.mp4" autoplay="autoplay" ></video>

          <!--Hover Content-->
           <div class="video_content">
              <div class="left_con">
                 <div class="vid_name">Radhe</div>
                 <div class="vid_detail">
                    <ul class="vid_list">
                      <li class="c_green">99% Match</li>
                      <li class="br_round">13+</li>
                      <li>2h:33m</li>
                    </ul>
                 </div>
                 <div class="vid_category">
                   <ul class="vid_list">
                      <li>Action</li>
                      <li>Drama</li>
                      <li>Comedy</li>
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





      </div>
      <!-- Add Pagination -->
      <!-- <div class="swiper-pagination"></div> -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>




  <!--Video Detail Content-->

    <div id="d_container" class="detail_container">
      <div class="detail_left">
        <div class="left_detail_container">
           <div class="c_logo" style="50%"><img style="width: 20%" src="img/CryptoGuard.png" /></div>
           <div class="p_logo"><img src="img/logo.png" /></div>
           <div class="other_detail">
              <ul>
                <li class="c_green">98% Match</li>
                <li>2020</li>
                <li class="br_round1">18+</li>
                <li>3 Seasons</li>
                <li class="br_round2">AD</li>
              </ul>
           </div>
           <h3>Watch Season 3 Now</h3>
           <p><span>S1:E9<span> "Cofee,Black"</p>
           <p class="video_text">Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

           <div class="other_links">
             <span class="play"><i class="fa fa-play"></i> <a href="#">PLAY</a></span>
             <span class="mylist"><i class="fa fa-check"></i> <a href="#">MY LIST</a></span>
             <span class="thumbs"><i class="fa fa-thumbs-up"></i></span>
             <span class="thumbs"><i class="fa fa-thumbs-down"></i></span>
           </div>

        </div>
      </div>

      <div class="detail_right">
          <div id="close">X</div>
          <div class="vid_bg"></div>
          <video width="100%" height="100%" src="https://vjs.zencdn.net/v/oceans.mp4" autoplay="autoplay"></video>
      </div>
      <div style="clear:both"></div>
    </div>
    </div>

    <div class="container-fluid">
      <footer class="row mx-auto tm-footer">
        <div class="col-md-6 px-0">
          Copyright 2021 Astro Motion Company Limited. All rights reserved.
        </div>
        <div class="col-md-6 px-0 tm-footer-right">
          Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank" class="tm-link-white">TemplateMo</a>
        </div>
      </footer>
    </div>
  </div>
  <!-- Preloader, https://ihatetomatoes.net/create-custom-preloading-screen/ -->
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
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

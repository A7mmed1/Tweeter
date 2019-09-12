<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Blog">
        <meta name="keywords" content="info about the blogSite">
        <meta name="author" content="Ahmmed">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
        <title>Who We are</title>
        <!-- Fonts -->
        <script src="https://kit.fontawesome.com/258c9e9fd8.js"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/markiting.css">
        <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.0.2/dist/simpleParallax.min.js"></script>





    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar navbar-dark bg-primary">
            <div class="container">
                    <a class="navbar-brand" href="#">
                        <i class="fab fa-twitter icon-5x"> Tweeter </i>
                    </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span style="font-size:  color:green; ">    <i class="fab fa-signal-1"></span>   {{ Auth::user()->name }}    </i>         <img src="/storage/profile_image/{{Auth::user()->profile->profileimage}}" width="40px;"  class="rounded-circle" alt="profile-image">
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span style="font-size: 1em; color:black; ">    {{ __('Logout') }} </span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!--end the navBar-->
        <!-- start feature -->

        <div class="parallax">
            <div class="text-left ml-3 sen">
                <br>
                <br>
                <p>It's Free , and forever will be Free</p>
                <p>Sign Up Now and Keep in touch </p>

                <button  class="btn btn-primary"type="button" name="button"><a href="{{ route('register') }}"><i class="fas fa-sign-in-alt"> Sign Up </i></a></button>
            </div>
        </div>
        <section class="feature text-center" >
            <div class="container">
                <div class="row">
                    <article class="col-sm-6 col-md-3">
                        <span> <i class="fas fa-share-alt"> <br>Share Momements </i></span>

                        <a href="{{ asset('share.png') }}">
                        <img class="rounded-circle"src="{{ asset('share.png') }}" width="100%"  alt="img">
                        </a>
                        <p>Enjoy posting all your activity with the ability of uploading files like images and vedios  </p>
                    </article>
                    <article class="col-sm-6 col-lg-3">
                        <span> <i class="fas fa-check-circle"> <br>Be Active </i>  </span>
                        <a href="{{ asset('active.png') }}">
                        <img class="second text-center rounded-circle"src="{{ asset('active.png') }}" width="100%" alt="img">
                        </a>
                        <p>
                            Communication is easier than you think , comment on your friends posts and even you can comment a Giphy and images ^_^
                        </p>
                    </article>
                    <article class="col-sm-6 col-lg-3">
                        <span> <i class="fas fa-users"> <br>Connection </i></span>
                        <a href="{{ asset('connect.png') }}">
                        <img class="second text-center rounded-circle"src="{{ asset('connect.png') }}" width="100%" alt="img">
                        </a>
                        <p>
                            Stay Connect with people who might have same hobbies and interests ,Globally
                        </p>
                    </article>
                    <article class="col-sm-6 col-lg-3">
                        <span> <i class="fas fa-gem"> <br>Fancy Profile</i></span>
                        <a href="{{ asset('fancy.png') }}">
                        <img class="second text-center rounded-circle"src="{{ asset('fancy.png') }}" width="100%" alt="img">
                        </a>
                        <p>
                            Organize your Information and sorted down under our amazing design
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="over text-center">
                <div class="container">
                    <!-- <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p> -->
                    <!-- <button type="button" name="view more"> View More</button> -->
                </div>
                <br>
        </section>
            <div  class="ppl" >
                <div class="container text-center clearfix m-6  change" id="temp">
                    <div class="row ">
                        <div class="col-sm-12 col-md-12">
                            <p>Join Them Today </p>
                            <p>Let's get Started </p>
                        </div>
                    </div>
                     <div class="row ">
                         <div class="col-sm-6 col-md-2">
                             <img src="{{ asset('p1.jpg') }}" width="150px;"  class="rounded-circle" alt="ppl-image">
                             <b> <i class="fal fa-badge-check">Willie Dom </i></b>
                         </div>
                         <div class="col-sm-1 col-lg-2">
                             <img src="{{ asset('p2.jpg') }}" width="150px;"  class="rounded-circle" alt="ppl-image">
                             <b> <i class="fal fa-badge-check">Ainsley Kim </i></b>
                         </div>
                         <div class="col-sm-1 col-lg-2">
                             <img src="{{ asset('p3.jpeg') }}" width="150px;"  class="rounded-circle" alt="ppl-image">
                             <b> <i class="fal fa-badge-check">Abel Stark </i></b>
                         </div>
                         <div class="col-sm-1 col-lg-2">
                             <img src="{{ asset('p4.jpg') }}" width="150px;"  class="rounded-circle" alt="ppl-image">
                             <b> <i class="fal fa-badge-check">Karen Smith </i></b>
                         </div><div class="col-sm-1 col-lg-2">
                             <img src="{{ asset('p5.jpeg') }}" width="150px;"  class="rounded-circle" alt="ppl-image">
                             <b> <i class="fal fa-badge-check">Taylor Owen </i></b>
                         </div><div class="col-sm-1 col-lg-2">
                             <img src="{{ asset('p6.jpg') }}" width="150px;"  class="rounded-circle" alt="ppl-image">
                             <b> <i class="fal fa-badge-check">Pedro Rodrices </i></b>
                         </div>
                     </div>
                 </div>
                    <br>

                <!-- <main class="slider">
                   <section id="main-slider" class="carousel slide" data-ride="carousel">
                       <ol class="carousel-indicators">
                           <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                           <li data-target="#main-slider" data-slide-to="1"></li>
                           </ol>
                           <div class="carousel-inner text-center" id="scene"> -->

                               <div class="overlay"></div>
                               <section class="carousel-item active" data-depth="0.6">
                                      <img  class="d-block w-100 scroll" src="{{ asset('1.jpeg') }}"/800x400?auto=yes&bg=777&fg=555&text="First slide" alt="First slide">
                               </section>
                               <!-- <section class="carousel-item" data-depth="0.2" >
                                      <img class="d-block w-100 scroll" src="{{ asset('3.jpg') }}"/800x400?auto=yes&bg=777&fg=555& text="First slide" alt="First slide">
                              </section> -->
                          <!-- </div>
                  </section>
              </main> -->
              <section  class="about text-center">
                  <div class="container">
                      <div class="jumbotron ">
                          <h6 class="display-4"><i class="fas fa-info-circle">About Us</i></h6>
                              <p class="lead"></p>
                              <hr class="my-4">
                              <p>Find out about breaking news, entertainment, sports, politics, and everyday interests
                                  Share photos, videos, GIFs, memes and more
                                  Retweet, Like, Share or Reply to Tweets in your timeline
                                  Let the world know what’s happening with you with a Tweet of your own</p>
                              <p class="lead">
                                <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">
                                    <i class="fas fa-book-open"> Learn more</i></a>

                              </p>
                      </div>
                  </section>
                  <br>
                  <hr>
                  <section class="over text-center">
                          <div class="container">
                              <!-- <h2>About Us</h2>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                              </p> -->
                              <!-- <button type="button" name="view more"> View More</button> -->
                          </div>


                  </section>

                <!-- Footer -->
                  <footer class="deel">
                      <div class="container">
                          <div class="row">
                            <article class="col-md-4">
                                <div class="info">
                                    <span>More Info</span>
                                    <h5>Our talented and diverse employees work together across 35+ offices worldwide.
                                    Find a bunch of things you love. And then find people to follow. That’s all you need to do to see and talk about what’s happening. Congratulations! You’ve just mastered Twitter. So let’s get started.</h5>
                                </div>
                            </article>
                            <article class="col-md-4">
                                <article class="help">
                                        <span> Business</span>
                                    <div class="row">
                                        <div class="col">
                                            <ul class="list-unstyled">
                                                <li>Ads</li>
                                                <li>Targeting</li>
                                                <li>Terms</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul class="list-unstyled">
                                                <li>FAQ</li>
                                                <li>Privacy</li>
                                                <li>Career</li>
                                            </ul>

                                        </div>
                                     </div>

                                </article>
                            </article>
                            <div class="col-md-4">
                                <div class="email">
                                    <span>Email</span>
                                    <p> info@Tweeter.ca</p>
                                    <a href="mailto:info@innotech.com">Contact us now </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                </footer>
            <article class="col text-center text-uppercase foot">
                Copyright 2019 <i class="fab fa-twitter icon-5x"> Tweeter </i>&copy; All rights reserved
            </article>
            <script>

            // var image = document.getElementsByClassName('scroll');
            // new simpleParallax(image);
             var image = document.getElementsByClassName('scroll');
             new simpleParallax(image,{

                delay: .9,
                transition: 'cubic-bezier(1,1,1,1)',
                // orientation: 'up',
                // overflow: true


            });

            // var controller = new ScrollMagic.Controller();
            //
            // // create a scene
            // var ourScene =   new ScrollMagic.Scene({
            // triggerElement: "#my-sticky-element"
            // // duration: 100,	// the scene should last for a scroll distance of 100px
            // // offset: 50	// start this scene after scrolling for 50px
            // })
            // .setClassToggle("#my-sticky-element", "fade-in") // pins the element for the the scene's duration
            // .addTo(controller); // assign the scene to the controller


            </script>
            <!-- <script>

            </script> -->

                <script
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>



                <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script> -->

                <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.0.2/dist/simpleParallax.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>

                <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

    </body>
</html>

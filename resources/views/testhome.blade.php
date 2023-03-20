 @extends('test')

 @section('section1')
    
 
    <!-- LOADER -->
    <div id="preloader">
            <div class="cube-wrapper">
            <div class="cube-folding">
                <span class="leaf1"></span>
                <span class="leaf2"></span>
                <span class="leaf3"></span>
                <span class="leaf4"></span>
            </div>
            <div class="mus">
                <img src="{{asset('assets/images/lode-img.png')}}" alt="" />
                
            </div>
            <span class="loading" data-name="Loading">StyleBarber Loading</span>
            </div>
        </div><!-- end loader -->
        <!-- END LOADER -->

        <!-- <div class="top-add alert alert-light alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> This alert box could indicate a successful or positive action.
        </div> -->
        @include('home.homenavbar')

        <div id="home" class="parallax">
            <div id="full-width" class="owl-carousel owl-theme home-hero">
                <div class="text-center item slider-01 display-table overlay">
                    <div class="display-table-cell">
                        <div class="big-tagline text-center">
                            <h2><strong>Clique Barbershop</strong><br>
                            Pantai Dalam</h2>
                            <p class="lead">Precision<br> All our gear are from the best<br>We guarantee that our services also will be the  best</p>
                            <!-- <a href="#" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">Contact US</a> -->
                        </div>
                    </div>
                </div>
                <div class="text-center item slider-02 display-table overlay">
                    <div class="display-table-cell">
                        <div class="big-tagline text-center">
                            <h2><strong>Clique Barbershop</strong><br>
                            Pantai Dalam</h2>
                            <p class="lead">Fast, <br>Throw any style you want and you will get it.<br> Don't worry our staff is all advancedly skilled. You didn't too wait long at the store</p>
                            <!-- <a href="#" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">Contact US</a> -->
                        </div>
                    </div>
                </div>
                <div class="text-center item slider-03 display-table overlay">
                    <div class="display-table-cell">
                        <div class="big-tagline text-center">
                            <h2><strong>Clique Barbershop</strong><br>
                            Pantai Dalam</h2>
                            <p class="lead">Versatile<br>We guarantee that our services are the best!</p>
                            <!-- <a href="#" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">Contact US</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end section -->
            
        <!-- Page Content -->
        <div id="page-content-wrapper">			
            <div class="section wb">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-left">
                            <div class="message-box">
                                <h4>About</h4>
                                <h2>Welcome to Clique Barbershop</h2>
                                <p class="lead">THE EXPERIENCE</p>

                                <p> Grab a cold one, have a seat and get comfortable. You just found your happy place. A place where we believe we can make real connections and positively impact the lives of anyone that walks through our doors. From the industry's signature service, The Benchmark, to a variety of cuts and shaves, real transformation is here. </p>

                               
                            </div><!-- end messagebox -->
                        </div><!-- end col -->
                        <div class="col-md-6 text-center">
                            <div class="right-box">
                                <img class="img-fluid" src="{{asset('assets/uploads/about-img.jpg')}}" alt="" />
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                    
                    <hr class="hr1"> 
                    
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="about-tab">
                                <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" href="#tab_a" data-toggle="tab">Our Mission</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_b" data-toggle="tab">Why Us?</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_c" data-toggle="tab">About Us</a></li>								
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab_a">
                                        <p>At the end of the day, it's all about style. And we know style. From the top stylist teams in the industry, to the top styles trending, to the classics that never go out of style. </p>
                                        <p>Are you ready to find your happy place?  A place where we believe we can make real connections and positively impact the lives of anyone that walks through our doors, including you.

We offer the best in mens styling and grooming by the best stylists in the industry. Our door is open, are you ready to step in? </p>
                                    </div>
                                    <div class="tab-pane fade" id="tab_b">
                                        <p>We have created a connected space in a relaxing environment where you can grab a beer, sit back and let our expert stylists help you express your personal style or create an entire new one that goes beyond your expectations.</p>
                                        <ul>
                                            <li><i class="fa fa-circle-o" aria-hidden="true"></i> Best User Experince</li>
                                            <li><i class="fa fa-circle-o" aria-hidden="true"></i>Wide variety for style</li>
                                            <li><i class="fa fa-circle-o" aria-hidden="true"></i>Skillful Barber</li>
                                            <li><i class="fa fa-circle-o" aria-hidden="true"></i>Reasonable and affordable</li>
                                            <li><i class="fa fa-circle-o" aria-hidden="true"></i>Cozy Place</li>
                                 
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="tab_c">
                                        <p>Established in 2020, Clique Barbershop is the leader in men's grooming for the past year. While many have tried to follow, none have matched Clique Barbershop that goes beyond the chair. </p>
                                    </div>
                                </div><!-- tab content -->
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                    
                    <hr class="hr1"  > 

                    <div class="row text-center" >
                        <div class="col-lg-12">
                            <div class="owl-services owl-carousel owl-theme">
                                
                            <div class="service-widget">
                                    <div class="post-media wow fadeIn">
                                        <a href="{{asset('assets/uploads/barber_01.jpg')}}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                                        <img src="{{asset('assets/uploads/barber_01.jpg')}}" alt="" class="img-responsive img-rounded">
                                    </div>
                                    <div class="dit-box">
                                        <h3>Show us Your Graft Style</h3>
                                        <p>The Boardroom Experience goes beyond any one element or service.

                                           

                                            .</p>
                                    </div>
                                </div><!-- end service -->
                                
                                <div class="service-widget">
                                    <div class="post-media wow fadeIn">
                                        <a href="{{asset('assets/uploads/barber_02.jpg	')}}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                                        <img src="{{asset('assets/uploads/barber_02.jpg	')}}" alt="" class="img-responsive img-rounded">
                                    </div>
                                    <div class="dit-box">
                                        <h3>Outstanding Barber Shop</h3>
                                        <p> Our team of professionals delivers the highest quality styling and grooming services in a relaxed, sophisticated environment.</p>
                                    </div>
                                </div><!-- end service -->
                                
                                <div class="service-widget">
                                    <div class="post-media wow fadeIn">
                                        <a href="{{asset('assets/uploads/barber_03.jpg	')}}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                                        <img src="{{asset('assets/uploads/barber_03.jpg	')}}" alt="" class="img-responsive img-rounded">
                                    </div>
                                    <div class="dit-box">
                                        <h3>The Barber Materials</h3>
                                        <p>Don know what style that fit you well, rest assured and sit back and relax, our staff will make your hair stylish than ever</p>
                                    </div>
                                </div><!-- end service -->
                                
                                <div class="service-widget">
                                    <div class="post-media wow fadeIn">
                                        <a href="{{asset('assets/uploads/barber_04.jpg	')}}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                                        <img src="{{asset('assets/uploads/barber_04.jpg	')}}" alt="" class="img-responsive img-rounded">
                                    </div>
                                    <div class="dit-box">
                                        <h3>Local Favorite</h3>
                                        <p>We have the support from our establishment from 2 years ago, If you ever doubt us, ask the locals our reputation</p>
                                    </div>
                                </div><!-- end service -->
                                
                               
                                
                            </div>
                        </div>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

            <div id="pricing" class="section lb">
                    <div class="container">
                        <div class="section-title row text-center">
                            <div class="col-md-8 offset-md-2">
                            <small>OUR BABRER PRICING</small>
                            <h3>BABRER PRICING</h3>
                            </div>
                        </div><!-- end title -->
                        <div class="row flex-items-xs-middle flex-items-xs-center">

                            <!-- Table #1  -->
                            <div class="col-xs-12 col-lg-4">
                            <div class="card text-center">
                                <div class="card-block">
                                <h4 class="card-title pricing-ti"> 
                                    Shaving
                                </h4>
                                <div class="line-pricing">
                                    <h5>Standard Shaving</h5>
                                    <p>Need an expert shave in a pinch? Our Standard Shave goes with the grain and includes a skin consultation </p>
                                    <a href="#">RM 7</a>
                                </div>
                                <div class="line-pricing">
                                    <h5>Traditional Shave</h5>
                                    <p>This classic shave goes with and against the grain, so your skin is as smooth as marble.</p>
                                    <a href="#">RM 8</a>
                                </div>
                               
                                </div>
                            </div>
                            </div>

                            <!-- Table #1  -->
                            <div class="col-xs-12 col-lg-4">
                            <div class="card text-center">
                                <div class="card-block">
                                <h4 class="card-title pricing-ti"> 
                                    Haircut
                                </h4>
                                <div class="line-pricing">
                                    <h5>Kids</h5>
                                    <p>For the young gentlemen out there, our Kid Cut is a tailored cut, wash & style.</p>
                                    <a href="#">RM 7</a>
                                </div>
                                <div class="line-pricing">
                                    <h5>Standard Cut</h5>
                                    <p>When life is moving a bit too fast for you, our Standard haircut keep ur hair neat and refreshing </p>
                                    <a href="#">RM 12</a>
                                </div>
                                <div class="line-pricing">
                                    <h5>Style Cut</h5>
                                    <p>For the aspiring youth who want to stand out with style, confidence and masculine</p>
                                    <a href="#">RM 15</a>
                                </div>
                                </div>
                            </div>
                            </div>

                            <!-- Table #1  -->
                            <div class="col-xs-12 col-lg-4">
                            <div class="card text-center">
                                <div class="card-block">
                                <h4 class="card-title pricing-ti"> 
                                    Hair Products
                                </h4>
                                <div class="line-pricing">
                                    <h5>Hair Pomade</h5>
                                    <p>For those who prefer hard and shiny hair. This pomade will make you stand out like an artist</p>
                                    <a href="#">RM 13</a>
                                </div>
                                <div class="line-pricing">
                                    <h5>Hair Spray</h5>
                                    <p>Not a pomade fan? Don't worry we got you covered. We also sell hairspray fo those who love to spray</p>
                                    <a href="#">RM 12</a>
                                </div>
                                <div class="line-pricing">
                                    <h5>Hair Dye</h5>
                                    <p>Need a color change once for while?. Our store sell various kind of dye and hena for you </p>
                                    <a href="#">RM 8</a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
            </div>
            
            
            <div id="barbers" class="section lb">
                <div class="container">
                    <div class="section-title row text-center">
                        <div class="col-md-8 offset-md-2">
                        <small>MEET OUR BABRER TEAM</small>
                        <h3>OUR BARBERS</h3>
                        </div>
                    </div><!-- end title -->

                    <div class="row dev-list text-center">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <div class="widget our-inner-taem clearfix">
                                <div class="t-top"></div>
                                <div class="hover-br">
                                    <img src="{{asset('assets/uploads/barber_team_01.jpg')}}" alt="" class="img-responsive">
                                    <!-- <div class="social-up-hover">
                                        <div class="footer-social">
                                            <a href="#" class="btn grd1"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="btn grd1"><i class="fa fa-github"></i></a>
                                            <a href="#" class="btn grd1"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="btn grd1"><i class="fa fa-linkedin"></i></a>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="team-box">
                                    <div class="widget-title">
                                        <h3>Hafiz</h3>
                                        <small>The Founder</small>
                                    </div>
                                    <!-- end title -->
                                    <p>Hello guys, I am Hafiz. I am director and founder of Clique Barbershop Company.</p>
                                </div>
                                <div class="t-bottom"></div>
                            </div><!--widget -->
                        </div><!-- end col -->

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                            <div class="widget our-inner-taem clearfix">
                                <div class="t-top"></div>
                                <div class="hover-br">
                                    <img src="{{asset('assets/uploads/barber_team_03.jpg')}}" alt="" class="img-responsive">
                                    <!-- <div class="social-up-hover">
                                        <div class="footer-social">
                                            <a href="#" class="btn grd1"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="btn grd1"><i class="fa fa-github"></i></a>
                                            <a href="#" class="btn grd1"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="btn grd1"><i class="fa fa-linkedin"></i></a>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="team-box">
                                    <div class="widget-title">
                                        <h3>Zharif</h3>
                                        <small>The Barber</small>
                                    </div>
                                    <!-- end title -->
                                    <p>Hello guys, I am Zharif. I am senior  barber of Clique Barbershop </p>
                                </div>
                                <div class="t-bottom"></div>
                            </div><!--widget -->
                        </div><!-- end col -->

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="widget our-inner-taem clearfix">
                                <div class="t-top"></div>
                                <div class="hover-br">
                                    <img src="{{asset('assets/uploads/barber_team_02.jpg')}}" alt="" class="img-responsive">
                                    <!-- <div class="social-up-hover">
                                        <div class="footer-social">
                                            <a href="#" class="btn grd1"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="btn grd1"><i class="fa fa-github"></i></a>
                                            <a href="#" class="btn grd1"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="btn grd1"><i class="fa fa-linkedin"></i></a>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="team-box">
                                    <div class="widget-title">
                                        <h3>Shazmie</h3>
                                        <small>The Barber</small>
                                    </div>
                                    <!-- end title -->
                                    <p>Hello guys, I am Shazmie. I am senior barber and admin of Clique Barbershop website </p>
                                </div>
                                <div class="t-bottom"></div>
                            </div><!--widget -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

          
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

           @include('home.homefooter')
        
@endsection
@section('script1')
    <!-- ALL JS FILES -->
    <script src="{{asset('assets/js/all.js')}}"></script>
    <script src="{{asset('assets/js/responsive-tabs.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('assets/js/custom.js')}}"></script>



@endsection
<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home || DhangadhiStore</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon
		============================================ -->
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"> 

        <!-- Fonts  -->
        <link href='https://fonts.googleapis.com/css?family=Khula:400,800,700,600,300' rel='stylesheet' type='text/css'>
        
        <!-- style CSS
		============================================ -->          
        <link rel="stylesheet" href="{{asset('style.css')}}">
    
        
        <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body class="home-1">
     <div class="main-area">
                     <!-- Start header -->
            <header>
                <!-- Start top call-to acction -->

                <!-- End top call-to acction -->
                <!-- Start logo and search area -->
                <div class="logo-and-search-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="logo">
                                    <a href="{{route('product.sidebar')}}">
                                        <h1 class="banner-logo" style="color: #4e1472;">Dhangadhi <span class="text-center" style="color: #b000a5;">Store</span></h1></a>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <!-- Start user info adn search -->
                                <div class="user-info-adn-search">
                                    <div class="user-info">
                                        <p>

@guest
                                 
                                  
                                     <a href="{{ route('login') }}"><i class="fa fa-key"></i> Login</a>
                                     <a href="{{ route('register') }}"><i class="fa fa-user"></i>Register</a>

                                          @else

                                            <a href="#"><i class="fa fa-user"></i> {{ Auth::user()->email }}</a>
                                            <a href="wishlists.html"><i class="fa fa-heart-o"></i> Wishlist</a>
                                            <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-key"></i> Sign out</a>

                                            <a href="#"><i class="fa fa-signal"></i> Compare</a>
                                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                                @endguest
                                       
                                  
                                        </p>
                                    </div>
                                    <div class="search-and-cart">
                                        <div class="search-categori">
                                            <div class="categori">
                                                <form id="select-categoris" method="post" class="form-horizontal">
                                                    <select name="language">
                                                        <option value="">Categories</option>
                                                        <option value="12">IOT</option>
                                                        <option value="21">Hardware </option>
                                                        <option value="25">Camera</option>
                                                        <option value="26">Electronic </option>
                                                        <option value="27">Cosmetic </option>
                                                        <option value="28">Medical</option>
                                                       
                                                    </select>
                                                </form>
                                            </div>
                                            <form action="{{route('product.search')}}" method="get">
                                            <div class="search-box">
                                                <input type="text" class="form-control input-sm" maxlength="64" placeholder="Enter your search key ... " / name="tittle">
                                                <button type="submit">Search</button>
                                            </div>
                                        </form>
                                        </div>


                                        <div class="shoping-cart">
                                            <a href="{{route('cart.view')}}"><span>My Cart<i style="    /* height: 19px; */
    /* width: 75px; */
    /* margin-bottom: 46px; */
    /* margin-top: -44px; */
    /* padding: 7px; */
background: #b000a5;
color: white;
border-radius: 16px;
padding-top: 5px;
padding-bottom: 1px;
padding-left: 17px;
padding-right: 17px;
margin-left: 10px;
border: 1px solid white;">
                                             @if(isset($cart) && $cart->getContents())
                                             @foreach($cart->getContents() as $slug => $product)
                                             {{$cart->getTotalQty()}}
                                             @endforeach
                                             @else
                                                @endif
                                            </i>
     

                                             </span></a>
                                     
                                        </div>
                                    </div>
                                </div>
                                <!-- End user info adn search -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End logo and search area -->
                <!-- Start mainmenu-area -->
                <div class="mainmenu-area">
                    <div class="container">
                        <div class="row">
                            <div class="mainmenu">
                                <nav>
                                    <ul>
                                        <li><a class="home" href="{{route('product.sidebar')}}">Home</a>
                                            
                                        </li>
                                        <li><a href="about-us.html">About us</a></li>
                                        <li><a href="shop-grid.html">shop</a></li>
                                        <li><a href="#">Delivery</a></li>
                                        <li><a href="blog.html">Blog</a>
                                            <ul>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-non-sidebar.html">Blog non sidebar</a></li>
                                                <li><a href="single-blog.html">Single blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Pages</a>
                                            <ul>
                                                <li><a href="about-us.html"><span>About us</span></a></li>
                                                <li><a href="blog.html"><span>Blog</span></a></li>
                                                <li><a href="blog-non-sidebar.html"><span>blog non sidebar</span></a></li>
                                                <li><a href="single-blog.html"><span>single blog</span></a></li>
                                                <li><a href="shop-grid.html"><span>shop grid</span></a></li>
                                                <li><a href="shop-list.html"><span>shop list</span></a></li>
                                                <li><a href="single-product.html"><span>single product</span></a></li>
                                                <li><a href="cart.html"><span>cart</span></a></li>
                                                <li><a href="wishlists.html"><span>wishlists</span></a></li>
                                                <li><a href="checkout.html"><span>checkout</span></a></li>
                                                <li><a href="login.html"><span>Login</span></a></li>
                                                <li><a href="contact-us.html"><span>contact us</span></a></li>
                                                <li><a href="404.html"><span>404</span></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact-us.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End mainmenu-area -->
                <!-- Start mobile menu -->
                <div class="mobile-menu-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 np">
                                <div class="mobile-menu">
                                    <nav id="dropdown">
                                        <ul class="nav">
                                       
                                            <li><a href="about-us.html">About us</a></li>
                                            <li><a href="shop-grid.html">shop</a></li>
                                            <li><a href="#">Delivery</a></li>
                                            <li><a href="blog.html">Blog</a>
                                                <ul>
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog-non-sidebar.html">Blog non sidebar</a></li>
                                                    <li><a href="single-blog.html">Single blog</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Pages</a>
                                                <ul>
                                                    <li><a href="about-us.html"><span>About us</span></a></li>
                                                    <li><a href="blog.html"><span>Blog</span></a></li>
                                                    <li><a href="blog-non-sidebar.html"><span>blog non sidebar</span></a></li>
                                                    <li><a href="single-blog.html"><span>single blog</span></a></li>
                                                    <li><a href="shop-grid.html"><span>shop grid</span></a></li>
                                                    <li><a href="shop-list.html"><span>shop list</span></a></li>
                                                    <li><a href="single-product.html"><span>single product</span></a></li>
                                                    <li><a href="cart.html"><span>cart</span></a></li>
                                                    <li><a href="wishlists.html"><span>wishlists</span></a></li>
                                                    <li><a href="checkout.html"><span>checkout</span></a></li>
                                                    <li><a href="contact-us.html"><span>contact us</span></a></li>
                                                    <li><a href="404.html"><span>404</span></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact-us.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End mobile menu -->
            </header>
            
                       @if(session()->has('message'))
                        <p class="alert alert-success">
                            {{ session()->get('message') }}
                        </p
                        @endif
@yield('view')
@yield('home-main')
@yield('sub-home')
@yield('search')
@yield('allview')




            <footer>
              <div class="container">
                <div class="">
                 <div class=" row card-footer ">
                    <div class="card-address card-col col-md-4">
                        <h2>Address</h2>
                         <div class="card-body">
                             <p>Dhangadhi</p>
                              <p>Buddha chowk</p>
                         </div>
                    </div>
                  <div class="card-phone card-col col-md-4">
                        <h2>Phone Number</h2>
                         <div class="card-body">
                             <p>xxxxxx</p>
                              <p>xxxxxx</p>
                         </div>
                    </div>
                <div class="card-banner card-col col-md-4">
                        <h2>Developed by Projectsaathi</h2>
                    </div>

                </div>
                </div>
                  
              </div>
                
                <!-- End footer copyright -->
            </footer>
     </div>

        <!-- End main area -->
        <!-- JS -->
        
        <!-- jquery-1.11.3.min js
        ============================================ -->         
        <script src="{{asset('js/vendor/jquery-1.11.3.min.js')}}"></script>
        
        <!-- bootstrap js
        ============================================ -->         
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        
        <!-- owl.carousel.min js
        ============================================ -->       
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        
        <!-- jquery.nivo.slider.pack js
        ============================================ -->       
        <script src="{{asset('js/jquery.nivo.slider.pack.js')}}"></script>

        <!-- jqueryui js
        ============================================ -->       
        <script src="{{asset('js/jquery.fancybox.js')}}"></script>

        <!-- jquery.scrollUp.min js
        ============================================ -->       
        <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>

        <!-- wow js
        ============================================ -->       
        <script src="{{asset('js/wow.js')}}"></script>

        <!-- jquery.meanmenu js
        ============================================ -->       
        <script src="{{asset('js/jquery.meanmenu.js')}}"></script>
        
        <!-- plugins js
        ============================================ -->         
        <script src="{{asset('js/plugins.js')}}"></script>
        
        <!-- main js
        ============================================ -->           
        <script src="{{asset('js/main.js')}}"></script>
    </body>
</html>
    
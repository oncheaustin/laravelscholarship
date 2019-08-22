<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $site_title }} | {{ $page_title }}</title>
    <!--Favicon add-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!--bootstrap Css-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--font-awesome Css-->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <!--owl.carousel Css-->
    <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
    <!--Slick Nav Css-->
    <link href="{{ asset('assets/css/slicknav.min.css') }}" rel="stylesheet">
    <!-- rangeslider Css-->
    <link href="{{ asset('assets/css/asRange.css') }}" rel="stylesheet">
    <!--Style Css-->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!--Responsive Css-->
    <link href="{{ asset('assets/css/color.php?color='.$basic->color) }}" rel="stylesheet">
    <!--Responsive Css-->

    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

    @yield('style')
    
    <script type="text/javascript"> //<![CDATA[ 
var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>
<script type="text/javascript">
        * { box-sizing: border-box; }
.video-background {
  background: #000;
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
   -ms-transform: translateX(-50%) translateY(-50%);
    -moz-transform: translateX(-50%) translateY(-50%);
    -webkit-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
  z-index: -9999999;
}
.video-foreground,
.video-background iframe {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  min-width: 100%;
  pointer-events: none;
z-index: -99;
}
#gkHeader {
position: relative;
background: transparent!important;
}

</script>

<script type="text/javascript">

@import url('https://fonts.googleapis.com/css?family=Tajawal');
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
a,
a:visited {
    color: #ffffff !important;
    webkit-transition: color 0.5s;
    /* Safari */
    
    transition: color 0.5s;
    text-decoration: none;
}
a:hover,
a:focus {
    webkit-transition: color 0.5s;
    /* Safari */
    
    transition: color 0.5s;
    text-decoration: none;
}
#hero {
    font-family: 'Tajawal', sans-serif;
    background: #73797f;
    padding: 20px 50px 41px;
    color: #ffffff;
    font-size:1.4rem;
}

#hero .navbar, #search{
    margin-bottom:70px;
}

#hero .navbar .navbar-nav .nav-item .nav-link {
    text-decoration: none;
    font-size: 20px;
    padding: 0 20px;
}

#hero .hero-heading {
    margin-bottom: 50px;
    max-width: 1100px;
}

#hero .hero-heading h1 {
    font-size: 60px;
}

#hero .mgmt-links-wrapper .link-box {
    background: #323335;
    padding: 34px 10px;
    text-align: center;
    min-height: 150px;
    margin-bottom: 10px;
    -webkit-transition: .5s all ease;
    -moz-transition: .5s all ease;
    transition: .5s all ease;
}

#hero .mgmt-links-wrapper a {
    color: #ffffff !important;
}

#hero .mgmt-links-wrapper .link-box:hover {
    background: #3190dc;
    -webkit-box-shadow: 0px 5px 8px 0px rgb(79, 91, 97);
    -moz-box-shadow: 0px 5px 8px 0px rgb(79, 91, 97);
    box-shadow: 0px 5px 8px 0px rgb(79, 91, 97);
}

#hero .mgmt-links-wrapper .link-box i {
    font-size: 40px;
    margin-bottom: 12px;
}

#hero .mgmt-links-wrapper .link-box p {
    font-size: 20px;
    margin-bottom: 0;
}
.navbar-toggler {
    background-color: white;
    border: 1px solid white;
}
#hero .search-from{
	height: 85px;
    font-size: 35px;
}

.slideDown{
	animation-name: slideDown;
	-webkit-animation-name: slideDown;	

	animation-duration: 1s;	
	-webkit-animation-duration: 1s;

	animation-timing-function: ease;	
	-webkit-animation-timing-function: ease;	

	visibility: visible !important;						
}

@keyframes slideDown {
	0% {
		transform: translateY(-100%);
	}
	50%{
		transform: translateY(8%);
	}
	65%{
		transform: translateY(-4%);
	}
	80%{
		transform: translateY(4%);
	}
	95%{
		transform: translateY(-2%);
	}			
	100% {
		transform: translateY(0%);
	}		
}

@-webkit-keyframes slideDown {
	0% {
		-webkit-transform: translateY(-100%);
	}
	50%{
		-webkit-transform: translateY(8%);
	}
	65%{
		-webkit-transform: translateY(-4%);
	}
	80%{
		-webkit-transform: translateY(4%);
	}
	95%{
		-webkit-transform: translateY(-2%);
	}			
	100% {
		-webkit-transform: translateY(0%);
	}	
}
.modal-img{
	    margin-top: -85px;
    width: 33%;
    border: 5px solid white;
    border-radius: 50%;
    padding: 5px;
    background: #6c757d;
}
@media (max-width: 767px) {
	#hero{
		padding:20px 20px 40px
	}
	#hero .hero-heading h1{
		font-size:30px;
	}
}

</script>

</head>
<body >
<!--Preloader start-->
<div class="preloader">
    <div class="spinner">
        <div class="cube1"></div>
        <div class="cube2"></div>
    </div>
</div>
<!--Preloader end-->
<div class="site"><!--for boxed Layout start-->

    <!--Scroll to top start-->
    <div class="scroll-to-top">
        <a href=""><i class="fa fa-caret-up"></i></a>
    </div><!--Scroll to top end-->
    
    <!-- Topbar v3 -->
<div class="topbar-v3">
<div class="container">
<div class="row">


</div>
</div>
</div>
<!-- End Topbar v3 -->
    <!--mobile logo -->
    <div class="mobile-logo">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo"></a>
    </div>

    <!--main menu start-->
    <nav class="main-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="60px"></a>
                    </div>
                </div>
                <div class="col-md-10 text-right">
                    <ul id="menu-bar">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="https://www.tamalanescholarship.com/blog">News</a></li>
                         @foreach($menu as $m)
                            <li><a href="{{ url('menu') }}/{{ $m->id }}/{{ urldecode(strtolower(str_slug($m->name))) }}">{{ $m->name }}</a></li>
                        @endforeach


                         <li><a href="{{ route('faqs') }}">Faq</a></li>
                       <li><a href="{{ route('contact') }}">Contact</a></li>
                        @if(Auth::check())
                            <li><a href="#">Hi. {{ Auth::user()->name }} <i class="fa fa-caret-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('deposit-fund') }}">Dashboard</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="">Log Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                        <li><a href="{{ route('register') }}">Sign Up</a>
                            <li><a href="{{ route('login') }}">Login</a></li>
                                    
                               <!-- <ul class="sub-menu">
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                </ul>-->
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav><!--main menu end-->

    
    
    


@yield('content')


<!--pament method section start-->
    <section class="section-padding payment-method">
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>payment method we accept</h2>
                    </div>
                </div>
                
            </div>
            
            
          
            <div class="row" align="center">
                  

              
                    <div class="col-xs-12 ">
                        <div class="payment-logo">
                            
                            <img style="width: 600px" src="{{ asset('assets/images/5c5413d01bbf5.png') }}"  >
                        </div>
                        
                    </div>
                    

              </div>
        </div>
    </section><!--pament method section end-->
<!--footer section start-->
    <footer class="footer-section section-padding padding-bottom-0 text-center">
        <div class="container">
            

            <div class="row ">
   

                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="footer-social-link">
                        <h3>Follow Us on</h3>
                        <div class="social-link">
                            @foreach($social as $s)
                                <a href="{{ $s->link }}">{!!  $s->code  !!}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <p>{!! $basic->copy_text !!}</p>
        </div>
    </footer><!--footer section end-->
</div><!--for boxed Layout end-->

<!--jquery script load-->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<!--Owl carousel script load-->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!--Bootstrap v3 script load here-->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!--Slick Nav Js File Load-->
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<!-- rangeslider Js File Load-->
<script src="{{ asset('assets/js/jquery-asRange.min.js') }}"></script>
<!--Main js file load-->
<script src="{{ asset('assets/js/main.js') }}"></script>
@yield('script')

<script type="text/javascript">
$(window).on('load', function() {
    $('#thanksModal').modal('show');
});
$(function() {
    $("#search").addClass("d-none");
});
$(".toggle-search").click(function() {
    $("#search").removeClass("d-none");
    $("#search").addClass("d-block slideDown");
    $(".navbar").removeClass("d-flex slideDown");
    $(".navbar").addClass("d-none");
});
$(".hide-search").click(function() {
    $("#search").removeClass("d-block slideDown");
    $(".navbar").addClass("d-flex slideDown");
    $("#search").addClass("d-none");
});

</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5cd6cafd2846b90c57adfe7f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
</html>

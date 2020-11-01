@php
    $setting=DB::table('websettings')->first();
    $category=DB::table('categories')->get();
    $mens_one=DB::table('sliders')->where('mens_slider_one',1)->orderBy('id','DESC')->first();
    $fotter=DB::table('sliders')->where('fotter_slider',1)->where('status',1)->orderBy('id','DESC')->get();
@endphp
<!DOCTYPE html>
<html> 
<head>
<title>Ecommerce</title>
<!-- for-mobile-apps -->
<meta name="csrf" value="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{asset('fontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />

<!-- single -->
<link rel="stylesheet" href="{{asset('fontend/css/flexslider.css')}}" type="text/css" media="screen" />
<!-- pignose css -->
<link href="{{asset('fontend/css/pignose.layerslider.css')}}" rel="stylesheet" type="text/css" media="all" />


<!-- //pignose css -->
<link href="{{asset('fontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="{{asset('fontend/js/jquery-2.1.4.min.js')}}"></script>
<!-- //js -->
<!-- cart -->
<script src="{{asset('fontend/js/simpleCart.min.js')}}"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="{{asset('fontend/js/bootstrap-3.1.1.min.js')}}"></script>
<!-- single -->
<script src="{{asset('fontend/js/imagezoom.js')}}"></script>
<script src="{{asset('fontend/js/jquery.flexslider.js')}}"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="{{asset('fontend/js/jquery.easing.min.js')}}"></script>
<script src="https://js.stripe.com/v3/"></script>

</head>
<body>
<!-- header -->


<div class="header">
    <div class="container">
        <ul> 
            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">{{$setting->email}}</a></li>
           <li><a href="#" data-toggle="modal" data-target="#exampleModal">My Order Traking</a></li>
            @php 
             $wishlist=DB::table('wishlists')->where('user_id',Auth::id())->get();
            @endphp
             @guest
             @else
           <li>
           <a href="#" class="wishlist_count">{{ count($wishlist) }}</a>
            <a href="{{ route('user.wishlist') }}" style="margin-right:20px;">Wishlist</a>
              @endguest
           </li>

          
        </ul>
    </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="container">
        <div class="col-md-3 header-left">
            <h1><a href="{{url('/')}}"><img src="{{ $setting->logo}}" style="width: 150px; height: 60px"></a></h1>
        </div>
        <div class="col-md-6 header-middle">
           <form action="{{ route('product.search') }}" method="post">
             @csrf
                <div class="search">
                    <input type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="" name="search">
                </div>
                <div class="section_room">
                    <select id="country" onchange="change_country(this.value)" class="frm-field required">
                        <option value="null">Show By Langues</option>
                         @foreach( $category as $cat)                       
                        <option value="null">{{ $cat->category_name }}</option>
                         @endforeach 
                    </select>
                </div>
                <div class="sear-sub">
                    <input type="submit" value=" ">
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="col-md-3 header-right footer-bottom">
            <ul>
                <li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a>
                    
                </li>
                <li><a class="fb" href="#"></a></li>
                <li><a class="twi" href="#"></a></li>
                <li><a class="insta" href="#"></a></li>
                <li><a class="you" href="#"></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header-bot -->

<!-- banner -->
<div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav menu__list">
                    <li class="active menu__item menu__item--current"><a class="menu__link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a></li>
                 @foreach( $category as $cat) 
                    <li class="dropdown menu__item">
                        <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" >{{ $cat->category_name }}<span class="caret"></span></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                        <a href="mens.html"><img style="height: 240px;" src="{{asset($mens_one->image_one)}}" alt=" "/></a>
                                    </div>
                                    <div class="col-sm-3 multi-gd-img">
                                        <li><a href="mens.html">Sub cat:1</a></li>
                                        <ul class="multi-column-dropdown">
                                             @php  
                                                $subcat_one=DB::table('subcategories')->where('category_id',$cat->id)->where('subcat_1',1)->get();

                                                 $subcat_two=DB::table('subcategories')->where('category_id',$cat->id)->where('subcat_2',1)->get();
                                            @endphp
                                           @foreach($subcat_one as $row)
                                            <li><a href="{{ url('pages/'.$row->id) }}">{{  $row->subcategory_name }}</a></li>
                                           @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 multi-gd-img">
                                        <li><a href="mens.html">Sub cat:2</a></li>
                                        <ul class="multi-column-dropdown">
                                          @foreach($subcat_two as $row)
                                            <li><a href="{{ url('pages/'.$row->id) }}">{{  $row->subcategory_name }}</a></li>
                                          @endforeach
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </ul>                          
                      </li>
                       @endforeach 
                    <li class=" menu__item"><a class="menu__link" href="{{route('product.electronics')}}">Electronics</a></li>
                    <li class=" menu__item"><a class="menu__link" href="{{ route('page.contact') }}">contact</a></li>
                  </ul>
                </div>
              </div>
            </nav>  
        </div>
        <div class="top_nav_right">
            <div class="cart box_1">
                        <a href="{{ route('show.cart') }}">
                            <h3> <div class="total">
                                <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                                </span> (<span class="">{{ Cart::count() }}</span> items)
                                </div>
                                
                            </h3>
                        </a>
                         @if(Session::has('coupon'))
                        <p><a href="#" class="simpleCart_empty"> $ {{ Session::get('coupon')['balance'] }}</a></p>
                        @else
                        <p><a href="#" class="simpleCart_empty">{{ Cart::Subtotal() }}</a></p>
                        @endif
            </div>  
        </div>
        
        <div class="clearfix"></div>
    </div>
</div>
<!-- //banner-top -->


@yield('content')

<div class="coupons">
    <div class="container">
        <div class="coupons-grids text-center">
            <div class="col-md-3 coupons-gd">
                <h3>Buy your product in a simple way</h3>
            </div>
            <div class="col-md-3 coupons-gd">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <h4>LOGIN TO YOUR ACCOUNT</h4>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
            sit amet, consectetur.</p>
            </div>
            <div class="col-md-3 coupons-gd">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                <h4>SELECT YOUR ITEM</h4>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
            sit amet, consectetur.</p>
            </div>
            <div class="col-md-3 coupons-gd">
                <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
                <h4>MAKE PAYMENT</h4>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
            sit amet, consectetur.</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="col-md-3 footer-left">
            <h2><a href="{{url('/')}}"><img src="{{ $setting->logo}}" style="width: 150px; height: 60px" alt=" " /></a></h2>
            <p>{!!$setting->description!!}</p>
        </div>
        <div class="col-md-9 footer-right">
            <div class="col-sm-6 newsleft">
                <h3>SIGN UP FOR NEWSLETTER !</h3>
            </div>
            <div class="col-sm-6 newsright">
                <form>
                    <input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                    <input type="submit" value="Submit">
                </form>
            </div>
            <div class="clearfix"></div>
            <div class="sign-grds">
                <div class="col-md-4 sign-gd">
                    <h4>Information</h4>
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        @foreach( $category as $cat) 
                        <li><a href="contact.html">{{ $cat->category_name }}</a></li>
                        @endforeach
                        <li><a href="{{route('product.electronics')}}">Electronics</a></li>
                        <li><a href="{{ route('page.contact') }}">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-md-4 sign-gd-two">
                    <h4>Store Information</h4>
                    <ul>

                        <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>{{$setting->company_address}}</span></li>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email : <a href="mailto:info@example.com">{{ $setting->email}}</a></li>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>{{ $setting->phone_one}}</li>
                    </ul>
                </div>
                <div class="col-md-4 sign-gd flickr-post">
                    <h4>Flickr Posts</h4>
                    <ul>
                        @foreach($fotter as $row)
                        <li><a href="single.html"><img src="{{asset($row->image_one)}}" alt=" " style="height: 40px; width: 70px;" class="img-responsive" /></a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <p class="copy-right">&copy 2016 Smart Shop. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
    </div>
</div>
<!-- //footer -->
<!-- login -->
            <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-info">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                        </div>
                        <div class="modal-body modal-spa">
                            <div class="login-grids">
                                <div class="login">
                                    <div class="login-bottom">
                                        <h3>Sign up for free</h3>
                                        <form action="{{ route('register') }}" method="post">
                                            @csrf
                                            <div class="sign-up">
                                                <h4>FullName :</h4>
                                                <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" name="name" required="">
                                            </div>
                                            <div class="sign-up">
                                                <h4>Phone :</h4>
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required=""> 
                                            </div>
                                            <div class="sign-up">
                                                <h4>Email :</h4>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required=""> 
                                            </div>
                                            <div class="sign-up">
                                                <h4>Password :</h4>
                                                <input type="password"  value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="password" required="">
                                                
                                            </div>
                                            <div class="sign-up">
                                                <h4>Re-type Password :</h4>
                                                <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="password_confirmation" required="">
                                                
                                            </div>
                                            <div class="sign-up">
                                                <input type="submit" value="Register Now" >
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="login-right">
                                        <h3>Sign in with your account</h3>

                                         <form action="{{ route('login') }}" method="post">
                                            @csrf
                                            
                                            <div class="sign-in">
                                                <h4>Email :</h4>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required=""> 
                                             @error('email')
                                              <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                            </div>

                                            <div class="sign-in">
                                                <h4>Password :</h4>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required="" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                                                @error('password')
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                                 </span>
                                                @enderror
                                               <a href="{{ route('password.request') }}">Forgot password?</a>
                                                
                                            </div>
                                            <div class="single-bottom">
                                                <input type="checkbox"  id="brand" value="">
                                                <label for="brand"><span></span>Remember Me.</label>

                                            </div>
                                            <div class="sign-in">
                                                <input type="submit" value="Sign in" >
                                            </div>
                                        </form>
                                        <br>
                                        <div class="sign-in">
                                                <input type="submit" value="Log in with google" >
                                        </div>
                                        <br>
                                        <div class="sign-in">
                                                <input type="submit" value="Log in with facebook" >
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- //login -->
 <!-- Order Tracking Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Your Status Code</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                     <form method="post" action="{{ route('order.tracking') }}">
                                       @csrf
                                         <div class="form-row">
                                              <label>Status Code</label>
                                               <input type="text" name="code" required="" class="form-control" placeholder="Your Order Status Code">
                                         </div><br>
                                         <button class="btn btn-danger" type="submit">Track Now</button>                 
                    </form>
                </div>
            </div>
            </div>
        </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

<script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script> 

      <script>  
         $(document).on("click", "#return", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Return?",
                  text: "Once Return,You will return your money!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Cancel");
                  }
                });
            });
    </script>



</body>
</html>

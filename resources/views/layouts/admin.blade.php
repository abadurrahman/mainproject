<!DOCTYPE html>
 <html> 

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
   <meta name="author" content="Creative Tim">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>BanglaMap24</title>
   <!-- Favicon -->
   <link rel="icon" href="{{ asset('backend/assets/img/brand/favicon.png') }}" type="image/png">
   <!-- Fonts -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
   <!-- Icons -->
   <link rel="stylesheet" href="{{ asset('backend/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
   <!-- Page plugins -->
   <link rel="stylesheet" href="{{ asset('backend/assets/vendor/select2/dist/css/select2.min.css')}}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendor/quill/dist/quill.core.css')}}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
   <!-- Argon CSS -->
   <link rel="stylesheet" href="{{ asset('backend/assets/css/argon.css?v=1.1.0') }}" type="text/css">

   <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/starlight.css') }}">
    <!-- Ajax CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <!-- sweet alerts -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/sweet-alert.min.css') }}">
    <!-- Toastr Css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/toastr.css') }}">
    <!-- Ck Editor Css -->
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    @stack('css')
 </head>

 <body>

  @guest

  @else
   <!-- Sidenav -->
   <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
     <div class="scrollbar-inner">
       <!-- Brand -->
       <div class="sidenav-header d-flex align-items-center">
         <a class="navbar-brand" href="/pages/dashboards/dashboard.html">
           <img src="{{ asset('backend/assets/img/brand/logo.jpg') }}" class="navbar-brand-img" alt="...">
         </a>
         <div class="ml-auto">
           <!-- Sidenav toggler -->
           <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
             <div class="sidenav-toggler-inner">
               <i class="sidenav-toggler-line"></i>
               <i class="sidenav-toggler-line"></i>
               <i class="sidenav-toggler-line"></i>
             </div>
           </div>
         </div>
       </div>
       <div class="navbar-inner">
         <!-- Collapse -->
         <div class="collapse navbar-collapse" id="sidenav-collapse-main">
           <!-- Nav items -->
           <ul class="navbar-nav">
             <li class="nav-item">
               <a class="nav-link" href="{{ url('admin/home') }}">
                 <i class="ni ni-shop text-primary"></i>
                 <span class="nav-link-text">Dashboard</span>
               </a>
             </li>
           @if(Auth::user()->category == 1)
           <li class="nav-item">
                <a class="nav-link" href="#cat" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="cat">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Category</span>
                </a>
                <div class="collapse" id="cat">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('add.category') }}" class="nav-link ">Add Category</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.category') }}" class="nav-link ">All Category</a>

                        </li>
                    </ul>
                </div>
            </li>
             @else
            @endif
           
           @if(Auth::user()->subcategory == 1)
            <li class="nav-item">
                <a class="nav-link" href="#subcategory" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="subcategory">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">SubCategory</span>
                </a>
                <div class="collapse" id="subcategory">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('add.subcategory') }}" class="nav-link ">Add SubCategory</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.subcategory') }}" class="nav-link ">All SubCategory</a>

                        </li>
                    </ul>
                </div>
            </li>
             @else
            @endif
             
          @if(Auth::user()->tag == 1)
            <li class="nav-item">
                <a class="nav-link" href="#tag" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="tag">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Tag</span>
                </a>
                <div class="collapse" id="tag">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('add.tag') }}" class="nav-link ">Add Tag</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.tag') }}" class="nav-link ">All Tag</a>

                        </li>
                    </ul>
                </div>
            </li>
            @else
            @endif

            @if(Auth::user()->coupon == 1)
             <li class="nav-item">
                <a class="nav-link" href="#coupon" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="coupon">
                    <i class="ni ni-badge text-info"></i>
                    <span class="nav-link-text">Coupon</span>
                </a>
                <div class="collapse" id="coupon">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('add.coupon') }}" class="nav-link ">Add Coupon</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.coupon') }}" class="nav-link ">All Coupon</a>

                        </li>
                    </ul>
                </div>
            </li>
            @else
            @endif

           @if(Auth::user()->slider == 1)
            <li class="nav-item">
                <a class="nav-link" href="#slider" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="slider">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Slider Image</span>
                </a>
                <div class="collapse" id="slider">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('add.slider') }}" class="nav-link ">Add Slider</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.slider') }}" class="nav-link ">All Slider</a>

                        </li>
                    </ul>
                </div>
            </li>
            @else
            @endif

            @if(Auth::user()->brand == 1)
            <li class="nav-item">
                <a class="nav-link" href="#brand" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="brand">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Brand</span>
                </a>
                <div class="collapse" id="brand">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('add.brand') }}" class="nav-link ">Add Brand</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.brand') }}" class="nav-link ">All Brand</a>

                        </li>
                    </ul>
                </div>
            </li>
            @else
            @endif

            @if(Auth::user()->blog == 1)
            <li class="nav-item">
                <a class="nav-link" href="#blog" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="blog">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Blog</span>
                </a>
                <div class="collapse" id="blog">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('add.blog') }}" class="nav-link ">Add Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.blogcategory') }}" class="nav-link ">Add Blogcategory</a>

                        </li>
                    </ul>
                </div>
            </li>
            @else
            @endif

           @if(Auth::user()->product == 1)
            <li class="nav-item">
                <a class="nav-link" href="#product" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="product">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Product</span>
                </a>
                <div class="collapse" id="product">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('add.product') }}" class="nav-link ">Add Product</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.product') }}" class="nav-link ">All Product</a>

                        </li>
                        <!-- <li class="nav-item">
                            <a href="{{ route('add.color') }}" class="nav-link ">Color</a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.size') }}" class="nav-link ">Size</a>

                        </li> -->
                    </ul>
                </div>
            </li>
            @else
            @endif

           @if(Auth::user()->categorypages == 1)
            <li class="nav-item">
                <a class="nav-link" href="#categorypages" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="categorypages">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Category with page</span>
                </a>
                <div class="collapse" id="categorypages">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('add.categorypages') }}" class="nav-link ">Add Category Pages</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.categorypages') }}" class="nav-link ">All Category Pages</a>

                        </li>
                    </ul>
                </div>
            </li>
            @else
            @endif

           @if(Auth::user()->subcategorypages == 1)
            <li class="nav-item">
                <a class="nav-link" href="#subcategorypages" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="subcategorypages">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Subcategory with page</span>
                </a>
                <div class="collapse" id="subcategorypages">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('add.subcategorypages') }}" class="nav-link ">Add SubCategoryPages</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.subcategorypages') }}" class="nav-link ">All SubCategoryPages</a>

                        </li>
                    </ul>
                </div>
            </li>
            @else
            @endif

               @if(Auth::user()->order == 1)
              <li class="nav-item">
                <a class="nav-link" href="#Order" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="Order">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Orders</span>
                </a>
                <div class="collapse" id="Order">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.neworder') }}" class="nav-link ">New Pending Order</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.accept.payment') }}" class="nav-link ">Accept Payments</a>

                        </li>
                         <li class="nav-item">
                            <a href="{{ route('admin.progress.payment') }}" class="nav-link ">Progress Delevery</a>

                        </li>
                         <li class="nav-item">
                            <a href="{{ route('admin.success.payment') }}" class="nav-link ">Delevery Success</a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.cancel.order') }}" class="nav-link ">Cancel Orders</a>

                        </li>
                    </ul>
                </div>
            </li>
            @else
            @endif

            @if(Auth::user()->report == 1)
            <li class="nav-item">
                <a class="nav-link" href="#Report" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="Report">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Reports</span>
                </a>
                <div class="collapse" id="Report">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('today.order') }}" class="nav-link ">Today Order</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('today.delevered') }}" class="nav-link ">Today Delevered</a>

                        </li>
                         <li class="nav-item">
                            <a href="{{ route('this.month') }}" class="nav-link ">This Month</a>

                        </li>
                         <li class="nav-item">
                            <a href="{{ route('search.report') }}" class="nav-link ">Search Report</a>

                        </li>
                    </ul>
                </div>
            </li>
            @else
            @endif

           @if(Auth::user()->return == 1)
            <li class="nav-item">
                <a class="nav-link" href="#Return" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="Return">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Return Order</span>
                </a>
                <div class="collapse" id="Return">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.return.request') }}" class="nav-link ">Return Request</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.all.return') }}" class="nav-link ">All Return</a>

                        </li>
                        
                    </ul>
                </div>
            </li>
            @else
            @endif


          @if(Auth::user()->contact == 1)
            <li class="nav-item">
                <a class="nav-link" href="#Contact" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="Contact">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Contact Message</span>
                </a>
                <div class="collapse" id="Contact">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link ">New Message</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">All Message</a>

                        </li>
                        
                    </ul>
                </div>
            </li>
            @else
            @endif

             @if(Auth::user()->comment == 1)
            <li class="nav-item">
                <a class="nav-link" href="#Comment" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="Comment">
                    <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Product Comment</span>
                </a>
                <div class="collapse" id="Comment">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link ">New Comment</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">All Comment</a>

                        </li>
                        
                    </ul>
                </div>
            </li>
            @else
            @endif
   
           @if(Auth::user()->role == 1)      
            <li class="nav-item">
                <a class="nav-link" href="#user" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="user">
                    <i class="ni ni-single-02 text-pink"></i>
                    <span class="nav-link-text">User Role</span>
                </a>
                <div class="collapse" id="user">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('create.admin') }}" class="nav-link ">Create User</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create.user.role') }}" class="nav-link ">All User</a>

                        </li>
                    </ul>
                </div>
            </li>
            @else
            @endif

            @if(Auth::user()->advertise == 1)
             <li class="nav-item">
               <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                 <i class="ni ni-app text-info"></i>
                 <span class="nav-link-text">Advertise</span>
               </a>
               <div class="collapse" id="navbar-components">
                 <ul class="nav nav-sm flex-column">
                   <li class="nav-item">
                     <a href="{{ route('header-advertise.index') }}" class="nav-link">Header Ads </a>
                   </li>
                   <li class="nav-item">
                     <a href="/pages/tables/Orders.html" class="nav-link">All Products</a>
                   </li>
                   <li class="nav-item">
                     <a href="/pages/tables/Orders.html" class="nav-link">Deactivated Products</a>
                   </li>
                 </ul>
               </div>
             </li> 
             @else
            @endif

             @if(Auth::user()->seo == 1)
              <li class="nav-item">
               <a class="nav-link" href="{{ route('admin.seo') }}">
                  <i class="ni ni-archive-2 text-green"></i>
                 <span class="nav-link-text">SEO</span>
               </a>
             </li>
             @else
            @endif

            @if(Auth::user()->stock == 1)
              <li class="nav-item">
               <a class="nav-link" href="{{ route('admin.product.stock') }}">
                  <i class="ni ni-archive-2 text-green"></i>
                 <span class="nav-link-text">Stock</span>
               </a>
             </li>
             @else
            @endif
             

             @if(Auth::user()->newslater == 1)
             <li class="nav-item">
               <a class="nav-link" href="{{ route('admin.newslater') }}">
                 <i class="ni ni-bell-55 text-red"></i>
                 <span class="nav-link-text">Subscriber</span>
               </a>
             </li>
             @else
            @endif

             @if(Auth::user()->websetting == 1)
            <li class="nav-item">
                <a class="nav-link" href="#setting" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="setting">
                      <i class="ni ni-archive-2 text-green"></i>
                    <span class="nav-link-text">Web Settings</span>
                </a>
                <div class="collapse" id="setting">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('add.websetting') }}" class="nav-link ">Add Settings</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.websetting') }}" class="nav-link ">All Settings</a>
                        </li>
                    </ul>
                </div>
            </li>
            @else
            @endif
           </ul>

         </div>
       </div>
     </div>
   </nav>
   <!-- Main content -->
   <div class="main-content" id="panel">
     <!-- Topnav -->
     <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
       <div class="container-fluid">
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <!-- Search form -->
           <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
             <div class="form-group mb-0">
               <div class="input-group input-group-alternative input-group-merge">
                 <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fas fa-search"></i></span>
                 </div>
                 <input class="form-control" placeholder="Search" type="text">
               </div>
             </div>
             <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
               <span aria-hidden="true">×</span>
             </button>
           </form>
           <div style="padding-left: 385px;">
            <a href="#" class="btn btn-secondary">View Website</a>
           </div>
           <!-- Navbar links -->
           <ul class="navbar-nav align-items-center ml-md-auto">
             <li class="nav-item d-xl-none">
               <!-- Sidenav toggler -->
               <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                 <div class="sidenav-toggler-inner">
                   <i class="sidenav-toggler-line"></i>
                   <i class="sidenav-toggler-line"></i>
                   <i class="sidenav-toggler-line"></i>
                 </div>
               </div>
             </li>
             <li class="nav-item d-sm-none">
               <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                 <i class="ni ni-zoom-split-in"></i>
               </a>
             </li>
             <li class="nav-item dropdown">
               <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="ni ni-bell-55"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                 <!-- Dropdown header -->
                 <div class="px-3 py-3">
                   <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                 </div>
               </div>
             </li>
             <li class="nav-item dropdown">
               <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="ni ni-ungroup"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
                 <div class="row shortcuts px-4">
                   <a href="#!" class="col-4 shortcut-item">
                     <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                       <i class="ni ni-calendar-grid-58"></i>
                     </span>
                     <small>Calendar</small>
                   </a>
                   <a href="#!" class="col-4 shortcut-item">
                     <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                       <i class="ni ni-email-83"></i>
                     </span>
                     <small>Email</small>
                   </a>
                   <a href="#!" class="col-4 shortcut-item">
                     <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                       <i class="ni ni-credit-card"></i>
                     </span>
                     <small>Payments</small>
                   </a>
                   <a href="#!" class="col-4 shortcut-item">
                     <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                       <i class="ni ni-books"></i>
                     </span>
                     <small>Reports</small>
                   </a>
                   <a href="#!" class="col-4 shortcut-item">
                     <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                       <i class="ni ni-pin-3"></i>
                     </span>
                     <small>Maps</small>
                   </a>
                   <a href="#!" class="col-4 shortcut-item">
                     <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                       <i class="ni ni-basket"></i>
                     </span>
                     <small>Shop</small>
                   </a>
                 </div>
               </div>
             </li>
           </ul>
           <ul class="navbar-nav align-items-center ml-auto ml-md-0">
             <li class="nav-item dropdown">
               <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <div class="media align-items-center">
                   <span class="avatar avatar-sm rounded-circle">
                     <img alt="Image placeholder" src="{{ asset('backend/assets/img/theme/team-4.jpg') }}">
                   </span>
                   <div class="media-body ml-2 d-none d-lg-block">
                     <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                   </div>
                 </div>
               </a>
               <div class="dropdown-menu dropdown-menu-right">
                 <div class="dropdown-header noti-title">
                   <h6 class="text-overflow m-0">Welcome!</h6>
                 </div>
                 <a href="{{ route('user.profile') }}" class="dropdown-item">
                   <i class="ni ni-single-02"></i>
                   <span>My profile</span>
                 </a>
                 <a href="#!" class="dropdown-item">
                   <i class="ni ni-settings-gear-65"></i>
                   <span>Settings</span>
                 </a>
                 <a href="#!" class="dropdown-item">
                   <i class="ni ni-calendar-grid-58"></i>
                   <span>Activity</span>
                 </a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="{{ route('admin.logout') }}">
                 <i class="fa fa-sign-out fa-lg"></i>
                 <span>{{ __('Logout') }}</span>
                </a>
                
               </div>
             </li>
           </ul>
         </div>
       </div>
     </nav>
     </div>
         <!-- Header -->
     @endguest
 
     @yield('content')
   
   <!-- Argon Scripts -->
   <!-- Core -->
   <script src="{{ asset('backend/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
   <script src="{{ asset('backend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('backend/assets/vendor/js-cookie/js.cookie.js') }}"></script>
   <script src="{{ asset('backend/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
   <script src="{{ asset('backend/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{asset('backend/assets/vendor/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

    <!-- Datatable JS -->
    <script src="{{asset('backend/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>

    <!-- Argon JS -->
    <script src="{{ asset('backend/assets/js/argon.js?v=1.1.0') }}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ asset('backend/assets/js/demo.min.js') }}"></script>

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
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
   @stack('scripts')
 </body>

 </html>

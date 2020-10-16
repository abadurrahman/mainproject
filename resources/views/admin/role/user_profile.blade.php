@extends('layouts.admin')

@section('title', 'Category')

@section('content')
  <!-- End Google Tag Manager (noscript) -->
  <!-- Sidenav -->

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{ asset('backend//assets/img/theme/profile-cover.jpg') }}); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello {{ Auth::user()->name }}</h1>
            <p class="text-white mt-0 mb-5">{{ Auth::user()->description }}</p>
            <a href="{{ route('edit.profile') }}" class="btn btn-neutral">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <!-- <img src="{{ asset('backend/assets/img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder" class="card-img-top"> -->
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    
                    <img src="{{ asset('backend/assets/img/theme/team-4.jpg') }}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="{{ route('home') }}" class="btn btn-sm btn-info  mr-4 ">Dashbord</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  {{ Auth::user()->name }}<span class="font-weight-light"></span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{{ Auth::user()->email }}
                </div>
                <div class="h5 mt-4">
                  <h3 class="ni business_briefcase-24 mr-2"></h3>{{ Auth::user()->address }}
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>{{ Auth::user()->education }}
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>
@endsection

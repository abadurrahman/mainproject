@extends('layouts.admin')

@section('title', 'Category')

@section('content')

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello {{ Auth::user()->name }}</h1>
            <p class="text-white mt-0 mb-5">{{ Auth::user()->description }}</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="{{ route('home') }}" class="btn btn-sm btn-primary">Dashbord</a>
                </div>
              </div>
            </div>
            <div class="card-body">

              <form action="{{ route('update.profile') }}" method="POST">
               @csrf
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Fullname</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Fullname" name="name"  value="{{Auth::user()->name}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control" placeholder="Email here"  name="email" value="{{Auth::user()->email}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Address</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="address" name="address" value="{{Auth::user()->address}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Details</label>
                        <textarea type="text" id="input-last-name" class="form-control" placeholder="Details..." name="description">{{Auth::user()->description}}</textarea> 
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-education">Education</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="education" name="education" value="{{Auth::user()->education}}">
                      </div>
                    </div>
                  </div>

                 <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                           
              </form>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  
@endsection

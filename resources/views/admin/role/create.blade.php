@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">New Admin</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">New Admin Add Form</a></li>
                            <li class="breadcrumb-item active"><a href="#">Add New</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
<div class="row">
    <div class="col-12">
        <div class="col">
            <div class="card-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Add New</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.admin') }}" method="post" >
                            @csrf
                            <div class="form-row">
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="name">Full Name*</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Full Name" autocomplete="off" name="name" required="">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="name">Address*</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Address" autocomplete="off" name="address" required="">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="name">Email*</label>
                                    <input type="email" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="email" autocomplete="off" name="email" required="">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="name">Education*</label>
                                    <input type="education" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="education" autocomplete="off" name="education" required="">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="name">Password*</label>
                                    <input type="password" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="password" autocomplete="off" name="password" required="">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                             </div>

                             <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="name">Details*</label>
                                    <textarea type="password" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Details here..." autocomplete="off" name="description" required=""></textarea>
                                  
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                             </div>
                         </div>
                  <br>
               <hr>

            <div class="row">
                <div class="col-lg-4">
                    <label class="ckbox">
                      <input type="checkbox" name="category" value="1">
                      <span>Category</span>
                    </label>
                </div>
                <div class="col-lg-4">
                    <label class="ckbox">
                      <input type="checkbox" name="tag" value="1">
                      <span>Tag</span>
                    </label>
                </div>
            </div>                           
        <br>
     <button class="btn btn-primary" type="submit">Submit</button>

</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

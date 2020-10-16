@extends('layouts.admin')

@section('title', 'Header Advertise')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Header Advertise</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Header Advertise</a></li>
                            <li class="breadcrumb-item active"><a href="#">List</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
<div class="row">
    <div class="col-xl-9 order-xl-2">
      <div class="card card-profile">
        <div class="card-body pt-0">
          <div class="row">
            <div class="card-body">
                <div class="card-header">
                    <h3 class="mb-0">Header Advertise List</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th></th> Title</th>
                                <th>Image</th>
                                <th>Show Days</th>
                                <th>Created date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($headerAds as $headerAd)
                            <tr>
                                <td> {{ $headerAd->title }} </td>
                                <td><img style="height:37px; border-radius:20px;" src="{{asset('storage/uploads/HeaderAd/' . $headerAd->image)}}"></td>
                                <td>{{ $headerAd->show_days }}</td>
                                <td>{{ $headerAd->created_at }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" id="edit" href="{{ route('header-advertise.edit', $headerAd->id) }}">Edit</a>
                                    <form action="{{ route('header-advertise.destroy', $headerAd->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return(confirm('are you sure to delete?'))">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 order-xl-1">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Add Header Advertise </h3>
            </div>
          </div>
        </div>
        <div class="card-body">
        <form action="{{ route('header-advertise.update', [$headerAdvertise->id] ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="title">Ads Title*</label>
                      <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $headerAdvertise->title }}" placeholder="Title">
                      @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                    </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label class="form-control-label" for="source_link">Reference Link*</label>
                          <input type="text" id="source_link" name="source_link" class="form-control @error('source_link') is-invalid @enderror" value="{{ $headerAdvertise->source_link }}" placeholder="Reference Link">
                          @error('source_link')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                          <label class="form-control-label" for="show_days">Show Days*</label>
                          <input type="text" id="show_days" name="show_days" class="form-control @error('show_days') is-invalid @enderror" value="{{ $headerAdvertise->show_days }}" placeholder="how Days">
                          @error('show_days')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="custom-file">
                          <input type="file" id="image" name="image" class="custom-file-input @error('show_days') is-invalid @enderror" value="{{ $headerAdvertise->image }}" id="customFileLang" lang="en">
                          <label class="custom-file-label" for="customFileLang">Select file</label>
                          @error('image')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                </div>
              <button class="btn btn-primary" type="submit">Save Ads</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

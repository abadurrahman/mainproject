@extends('layouts.admin')

@section('title', 'Blog')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Blog</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
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
                    <h3 class="mb-0">Blog</h3>
                    <a href="{{ route('add.blog') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">Add-Blog</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>SL:</th>
                                <th>Title:</th>
                                <th>Blog_Category:</th>
                                <th>Image:</th>
                                <th>Created At:</th>
                                <th>Actions:</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            @foreach($blog as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->blogcategory_name}}</td>
                                <td><img src="{{ URL::to($row->image_one) }}" height="60px;" width="65px;"></td>
                                <td>{!! $row->details !!}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ URL::to('edit/blog/'.$row->id) }}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" id="delete" href="{{ URL::to('delete/blog/'.$row->id) }}"><i class="fa fa-trash"></i></a>
                                    <a class="btn btn-sm btn-warning" href="{{ URL::to('view/blog/'.$row->id) }}"><i class="fa fa-eye"></i></a>
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
  </div>
</div>
@endsection

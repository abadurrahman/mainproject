@extends('layouts.admin')

@section('title', 'Category')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Admin</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active"><a href="#">Admin List</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12 order-xl-2">
          <div class="card card-profile">
            <div class="card-body pt-0">
              <div class="row">
                <div class="card-body">
                    <div class="card-header">
                        <h3 class="mb-0">Admin List</h3>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('create.admin') }}" class="btn btn-sm btn-info mt-2 mr-3 text-white float-right">Add New</a>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Access</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($user as $index => $row)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->address }}</td>
                                    <td>
                                  @if($row->category == 1)
                                    <span class="badge badge-danger">category</span>
                                    @else
                                    @endif
                                 @if($row->tag == 1)
                                    <span class="badge badge-success">tag</span>
                                    @else
                                    @endif
                                 
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="#">View</a>
                                        <a class="btn btn-sm btn-info" id="edit" href="{{ URL::to('edit/admin/'.$row->id) }}">Edit</a>
                                        <a class="btn btn-sm btn-danger" id="delete" href="{{ URL::to('delete/admin/'.$row->id) }}">Delete</a>
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

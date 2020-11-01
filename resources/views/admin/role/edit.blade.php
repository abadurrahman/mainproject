@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

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
                    <form action="{{ route('update.admin') }}" method="post" >
                     @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                     <div class="form-row">
                      </div>
                       <div class="form-row">
                        <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="name">Name*</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" autocomplete="off" value="{{ $user->name }}" name="name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="name">Address*</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Address" autocomplete="off" value="{{ $user->address }}" name="address">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="name">Email*</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" autocomplete="off" value="{{ $user->email }}" name="email">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="name">Education*</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="education" autocomplete="off" value="{{ $user->education }}" name="education">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                       <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="name">Details*</label>
                                    <textarea type="text" class="form-control @error('name') is-invalid @enderror" id="summernote" autocomplete="off"  name="description"> {{ $user->description }}</textarea> 
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                        <!-- <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="name">Image*</label>
                                    <input type="file" class="form-control @error('name') is-invalid @enderror" id="name" autocomplete="off" value="{{ $user->image }}" name="image">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div> -->

                     </div>
                  <br>

            <hr style="margin-top:25px;">
         <div class="row">
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck1" type="checkbox" name="category" value="1" <?php  if ($user->category == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck1">Category</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck2" type="checkbox" name="subcategory" value="1" <?php  if ($user->subcategory == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck2">SubCategory</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck3" type="checkbox" name="tag" value="1" <?php  if ($user->tag == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck3">Tag</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck4" type="checkbox" name="coupon" value="1" <?php  if ($user->coupon == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck4">Coupon</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck5" type="checkbox" name="slider" value="1" <?php  if ($user->slider == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck5">Slider</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck6" type="checkbox" name="brand" value="1" <?php  if ($user->brand == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck6">Brand</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck7" type="checkbox" name="blog" value="1" <?php  if ($user->blog == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck7">Blog</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck8" type="checkbox" name="product" value="1" <?php  if ($user->product == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck8">Product</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck9" type="checkbox" name="categorypages" value="1" <?php  if ($user->categorypages == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck9">Category with page</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck10" type="checkbox" name="subcategorypages" value="1" <?php  if ($user->subcategorypages == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck10">Subcategory with page</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck11" type="checkbox" name="order" value="1" <?php  if ($user->order == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck11">Orders</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck12" type="checkbox" name="report" value="1" <?php  if ($user->report == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck12">Reports</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck13" type="checkbox" name="return" value="1" <?php  if ($user->return == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck13">Return Order</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck14" type="checkbox" name="contact" value="1" <?php  if ($user->contact == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck14">Contact Message</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck15" type="checkbox" name="comment" value="1" <?php  if ($user->comment == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck15">Product Comment</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck15" type="checkbox" name="role" value="1" <?php  if ($user->role == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck15">User Role</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck16" type="checkbox" name="advertise " value="1" <?php  if ($user->advertise == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck16">Advertise</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck17" type="checkbox" name="seo" value="1" <?php  if ($user->seo == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck17">SEO</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck18" type="checkbox" name=" stock" value="1" <?php  if ($user->stock == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck18">Stock</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck19" type="checkbox" name="newslater" value="1" <?php  if ($user->newslater == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck19">Subscriber</label>
               </div>
              </div>
          </div>
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck20" type="checkbox" name="websetting" value="1" <?php  if ($user->websetting == 1) {
                                echo "checked";
                      }?> >
               <label class="custom-control-label" for="customCheck20">Websetting</label>
               </div>
              </div>
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

<script>
      $('#summernote').summernote({
        placeholder: 'Text Here.....',
        tabsize: 2,
        height: 150
      });
    </script>
@endsection

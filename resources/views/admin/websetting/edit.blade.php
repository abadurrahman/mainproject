@extends('layouts.admin')

@section('title', 'Web Setting')

@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Web Setting</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Web Setting</a></li>
                            <li class="breadcrumb-item active"><a href="#">Add</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="padding:25px;margin-top:-5.5rem">
  <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Add Web Setting</h3>
          <a href="{{ route('all.websetting') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-Web Setting</a>
        </div>
        <!-- Card body -->
        <div class="card-body">
        <form method="POST" action="{{ url('update/websetting/'.$websetting->id) }}">
          @csrf
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Phone One:</label>
                  <input type="text" class="form-control" placeholder="Phone" name="phone_one" required=""value="{{ $websetting->phone_one }}">
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Phone Two:</label>
                  <input type="text" class="form-control" placeholder="Phone" name="phone_two"value="{{ $websetting->phone_two }}">
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Company Name:</label>
                  <input type="text" class="form-control" placeholder="Company Name" name="company_name"value="{{ $websetting->company_name }}">
                </div>
             </div>
             
            
           <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Email:</label>
                  <input type="text" class="form-control" placeholder="Email" name="email"value="{{ $websetting->email }}">
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Company Address:</label>
                  <input type="text" class="form-control" placeholder="Address" name="company_address"value="{{ $websetting->company_address }}">
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Facebook:</label>
                  <input type="text" class="form-control" name="facebook"value="{{ $websetting->facebook }}">
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Youtube:</label>
                  <input type="text" class="form-control" placeholder="" name=" youtube" value="{{ $websetting->youtube }}">
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Twitter:</label>
                  <input type="text" class="form-control" placeholder="" name=" twitter" value="{{ $websetting->twitter }}">
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Instagram:</label>
                  <input type="text" class="form-control" placeholder="" name=" instagram" value="{{ $websetting->instagram }}">
                </div>
             </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" >Description</label>
                <textarea id="summernote" name="description">{{ $websetting->description}}</textarea>
             </div>
           </div>
         </div>
          <button class="btn btn-primary" style="margin-top:15px;" type="submit">Update Setting</button>
        </form>  
        </div>
    </div>
</div>

<div style="padding:25px;margin-top:-1.5rem">
  <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Update Websetting</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
        <form method="POST" action="{{ url('update/websettingwithphoto/'.$websetting->id) }}" enctype="multipart/form-data">
          @csrf
          <!-- Form groups used in grid -->
          <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Logo</label>
                <input type="file" class="form-control" id="example3cols1Input" name="logo" onchange="readURL(this);" accept="image" >

                <img src="#" id="one" style="margin-top:25px;"> 

                <input type="hidden" name="old_one" value="{{ $websetting->logo }}"> 
               </div>
            </div> 
            <div class="col-md-6">
              <div class="form-group">
                <img src="{{ URL::to($websetting->logo) }}" id="one" style="margin-top:25px; height: 70px;width: 60px;">        
               </div>
            </div>
          </div>
          <button class="btn btn-primary" style="margin-top:15px;" type="submit">Update</button>
        </form>  
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

<script type="text/javascript">
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection


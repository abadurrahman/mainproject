@extends('layouts.admin')

@section('title', 'Search')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Search</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Report</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
<div class="row">
  <div class="col-lg-4">
    <div class="col-xl-3 order-xl-1">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-12">
              <h3 class="mb-0">Search By Date</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
       <form action="{{ route('search.by.date') }}" method="POST">
            @csrf
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Search By Date*</label>
                <input class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2018" name="date" required="">
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

 <div class="col-lg-4">
    <div class="col-xl-3 order-xl-1">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-12">
              <h3 class="mb-0">Search By Month</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
       <form action="{{ route('search.by.month') }}" method="POST">
            @csrf
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Search By Month*</label>
                <select class="form-control" name="month">
                         <option value="January">January</option>
                         <option value="February">February</option>
                         <option value="March">March</option>
                         <option value="April">April</option>
                         <option value="May">May</option>
                         <option value="June">June</option>
                         <option value="July">July</option>
                         <option value="August">August</option>
                         <option value="September">September</option>
                         <option value="October">October</option>
                         <option value="November">November</option>
                         <option value="December">December</option>
                </select>
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

  <div class="col-lg-4">
    <div class="col-xl-3 order-xl-1">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-12">
              <h3 class="mb-0">Search By Year</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
       <form action="{{ route('search.by.year') }}" method="POST">
            @csrf
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Search By Year*</label>
               <select class="form-control" name="year">
                         <option value="2020">2020</option>
                         <option value="2021">2021</option>
                         <option value="2022">2022</option>
                         <option value="2023">2023</option>
                         <option value="2024">2024</option>
                         <option value="2025">2025</option>
                         <option value="2026">2026</option>
                         <option value="2027">2027</option>
                         <option value="2028">2028</option>
                         <option value="2029">2029</option>
                         <option value="2030">2030</option>
                         <option value="2020">2031</option>
                         <option value="2021">2032</option>
                         <option value="2022">2033</option>
                         <option value="2023">2034</option>
                         <option value="2024">2035</option>
                         <option value="2025">2036</option>
                         <option value="2026">2037</option>
                         <option value="2027">2038</option>
                         <option value="2028">2039</option>
                         <option value="2029">2040</option>

                  </select>
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

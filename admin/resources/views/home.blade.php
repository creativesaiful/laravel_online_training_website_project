@extends('layout.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-around">


        <div class="col-md-3 card mb-3">

            <div class="card-body">
              <h5 class="card-title">Total Visitor</h5>

              <h2 >{{$totalVisitor}}</h2>


            </div>
        </div>




          <div class="col-md-3 card mb-3">

            <div class="card-body">
                <h5 class="card-title">Total Course</h5>
              <h2 class="">{{$totalCourse}}</h2>


            </div>
          </div>


          <div class="col-md-3 card mb-3">

            <div class="card-body">
                <h5 class="card-title">Total Service</h5>
              <h2 class="">{{$totalService}}</h2>


            </div>
          </div>



    </div>


    <div class="row justify-content-around">
        <div class="col-md-3 card mb-3">

            <div class="card-body">
                <h5 class="card-title">Total Project</h5>
              <h2 class="">{{$totalProject}}</h2>


            </div>
          </div>


          <div class="col-md-3 card mb-3">

            <div class="card-body">
                <h5 class="card-title">Total Contact</h5>
              <h2 class="">{{$totalContact}}</h2>


            </div>
          </div>


          <div class="col-md-3 card mb-3">

            <div class="card-body">
                <h5 class="card-title">Total Review</h5>
              <h2 class="">6</h2>


            </div>
          </div>


     </div>


</div>




@endsection

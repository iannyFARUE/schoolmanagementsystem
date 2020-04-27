@extends('staff.welcome')

@section('content')
<div class="card" id="profile">
        <div class="card-block">
        <h4 class="text-center my-4"><b>Staff Profile</b></h4>
        <div class="row bg-gradient-primary pt-2 my-2">
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Title</b></h5>  <span class="text-default">{{Auth::user()->title}}</span>

            </div>
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Firstname</b></h5>   <span class="text-default">{{Auth::user()->firstname}}</span>

            </div>

            <div class="col-md-4">
                <h5 class="details text-danger"><b>Lastname</b></h5>   <span class="text-default">{{Auth::user()->lastname}}</span>

            </div>
        </div>

         <div class="row my-2">
             <div class="col-md-4">
                <h5 class="details text-danger"><b>Sex</b></h5>   {{Auth::user()->sex}}

            </div>
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Address</b></h5>   {{Auth::user()->address}}

            </div>
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Phone Number</b></h5>   {{Auth::user()->phone_number}}

            </div>


        </div>

            <div class="row bg-gradient-primary pt-2 my-2">
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Specialty</b></h5>   <span class="text-default">{{Auth::user()->specialty}}</span>

            </div>
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Contract</b></h5>   <span class="text-default">{{Auth::user()->job_type}}</span>

            </div>

            <div class="col-md-4">
                <h5 class="details text-danger"><b>Email</b></h5>   <span class="text-default">{{Auth::user()->email}}</span>

            </div>
        </div>
        </div>



        </div>
</div>

@endsection

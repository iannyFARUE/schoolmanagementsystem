@extends('students.welcome')

@section('content')
<div class="card" id="">
        <div class="card-block">
        <h4 class="text-center mb-3"><b>Student Profile</b></h4>
        <div class="row bg-gradient-primary pt-2 my-2">
            <div class="col-md-4">
                <h5 class="details text-success"><b>Sex</b></h5>   <span class="text-default">{{Auth::user()->sex}}</span>

            </div>
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Firstname</b></h5>    <span class="text-default">{{Auth::user()->firstname}}</span>

            </div>

            <div class="col-md-4">
                <h5 class="details text-danger"><b>Lastname</b></h5>    <span class="text-default">{{Auth::user()->lastname}}</span>

            </div>
        </div>
            <div class="row  pt-2 my-2">
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Curriculum Activities</b></h5>   {{Auth::user()->curriculun_activities}}

            </div>
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Roles</b></h5>   {{Auth::user()->roles}}

            </div>

            <div class="col-md-4">
                <h5 class="details text-danger"><b>Email</b></h5>   {{Auth::user()->email}}

            </div>
        </div>
             <div class="row bg-gradient-primary my-2">
             <div class="col-md-4">
                <h5 class="details text-danger"><b>DOB</b></h5>   <span class="text-default">{{Auth::user()->dob}}</span>

            </div>
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Address</b></h5>   <span class="text-default">{{Auth::user()->address}}</span>

            </div>
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Phone Number</b></h5>   <span class="text-default">{{Auth::user()->phone_number}}</span>

            </div>


        </div>

            <div class="row  pt-2">
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Form</b></h5>   {{Auth::user()->class->numeric}}

            </div>
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Section</b></h5>   {{Auth::user()->section->name}}

            </div>

            <div class="col-md-4">
                <h5 class="details text-danger"><b>Guardian</b></h5>   {{Auth::user()->guardian_id}}

            </div>
        </div>
               <div class="row bg-gradient-primary pt-2">
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Date Joined</b></h5>   <span class="text-default">{{Auth::user()->created_at->diffForHumans()}}</span>

            </div>
            <div class="col-md-4">
                <h5 class="details text-danger"><b>Student Number</b></h5>   <span class="text-default">{{Auth::user()->student_number}}</span>

            </div>

            <div class="col-md-4">
                <h5 class="details text-danger"><b>Last Edited</b></h5>   <span class="text-default">{{Auth::user()->updated_at->diffForHumans().' by Admin'}}</span>

            </div>
        </div>
        </div>



        </div>
</div>

@endsection

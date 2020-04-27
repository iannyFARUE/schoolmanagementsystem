@extends('admin.welcome')

@section('content')

<div class="container">

                                                                <nav aria-label="breadcrumb">
                                                                <ol class="breadcrumb">
                                                                <li class="breadcrumb-item"><a href="{{'admin'}}">Home</a></li>
                                                                <li class="breadcrumb-item active" aria-current="page">Manage Teacher</li>
                                                                </ol>
                                                                </nav>

                                                                <div class="card">

                                                                <div class="card-body">
                                                                <fieldset>
                                                                <legend class="divider">Manage Teacher</legend>
                                                                <hr>

                                                                <div class="float-right">
                                                                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#addTeacher" id="addTeacherModelBtn">
                                                                <i class="fas fa-plus"></i> Add Teacher
                                                                </button>
                                                                </div>
                                                                <br /> <br /> <br />



                                                                <table class="table table-bordered" id="teachers-table">
                                                                <thead>
                                                                <tr>
                                                                <th>Id</th>
                                                                <th>Title</th>
                                                                <th>Lastname</th>
                                                                <th>Job Title</th>
                                                                <th>Specialty</th>
                                                                <th>action</th>
                                                                </tr>
                                                                </thead>
                                                                </table>




                                                                </fieldset>
                                                                </div>
                                                                </div>

                                                                <!-- add teacher -->
<div                                                            class="modal fade" tabindex="-1" role="dialog" id="addTeacher">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h4 class="modal-title">Add Teacher</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>

                                                                </div>

                                                                <form method="post" id="createTeacherForm" action="/teachers/create" enctype="multipart/form-data">
@csrf
                                                                <div class="modal-body create-modal">

                                                                <div id="add-teacher-messages"></div>

                                                                <div class="row">
                                                                <div class="col-md-6">


                                                                <div class="form-group row">
                                                                <label for="fname" class="col-sm-4 col-form-label text-md-right">{{ __('First Name:') }}</label>
                                                                <div class="col-sm-8">
                                                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}"  autocomplete="fname" autofocus>

                                                                @error('fname')
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                <label for="lname" class="col-sm-4 col-form-label text-md-right">{{ __('Last Name:') }}</label>
                                                                <div class="col-sm-8">
                                                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}"  autocomplete="lname" autofocus>

                                                                @error('lname')
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                <label for="dob" class="col-sm-4 col-form-label text-md-right">{{ __('DOB:') }}</label>
                                                                <div class="col-sm-8">
                                                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}"  autocomplete="lname" autofocus>

                                                                @error('dob')
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                </div>

                                                               <div class="form-group row">
                                                                <label for="sex" class="col-sm-4 col-form-label text-md-right">{{ __('Sex :') }}</label>
                                                                <div class="col-sm-8">
                                                                <select class="form-control" name="sex" id="sex">
                                                                <option value="">Select an gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                </select>

                                                                @error('sex')
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                <label for="contact" class="col-sm-4 col-form-label text-md-right">{{ __('Contact:') }}</label>
                                                                <div class="col-sm-8">
                                                                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}"  autocomplete="contact" autofocus>

                                                                @error('contact')
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email:') }}</label>
                                                                <div class="col-sm-8">

                                                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                <label for="address" class="col-sm-4 col-form-label text-md-right">{{ __('Address:') }}</label>
                                                                <div class="col-sm-8">
                                                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus>

                                                                @error('address')
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                </div>

                                                                </div>
                                                                <!-- /col-md-6 -->

                                                                <div class="col-md-6">

                                                                <div class="form-group row">
                                                                <label for="specialty" class="col-sm-4 col-form-label text-md-right">{{ __('Specialty:') }}</label>
                                                                <div class="col-sm-8">
                                                                <select class="form-control" name="specialty" id="specialty">
                                                                <option value="">Select an subject...</option>
                                                               @foreach ($subjects as $subject)
                                                                <option value="{{$subject->name}}">{{$subject->name}}</option>


                                                               @endforeach
                                                                </select>

                                                                @error('jobType')
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                </div>



                                                                <div class="form-group row">
                                                                <label for="jobType" class="col-sm-4 col-form-label text-md-right">{{ __('Job Type:') }}</label>
                                                                <div class="col-sm-8">
                                                                <select class="form-control" name="jobType" id="jobType">
                                                                <option value="">Select an option</option>
                                                                <option value="Full Time">Full-Time</option>
                                                                <option value="Part Time">Part-Time</option>
                                                                </select>

                                                                @error('jobType')
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                </div>

                                                                    <div class="form-group row">
                                                                <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title :') }}</label>
                                                                <div class="col-sm-8">
                                                                <select class="form-control" name="title" id="title">
                                                                <option value="">Select an option</option>
                                                                <option value="MR">MR</option>
                                                                <option value="MRS">MRS</option>
                                                                <option value="DR">DR</option>
                                                                <option value="PHD">PHD</option>


                                                                </select>

                                                                @error('title')
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                </div>

                                                                {{-- <profile></profile> --}}



                                                                </div>
                                                                <!-- /col-md-4 -->


                                                                </div>
                                                                <!-- /row -->
                                                                </div>
                                                                <!-- /modal-body -->
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                                </form>
                                                                </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                                </div><!-- /.modal -->



</div>

@endsection


@push('scripts')

@if (count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#addTeacher').modal('show');
        });
    </script>
@endif

<script>
$('document').ready(function(){
                                                                      $('#teachers-table').DataTable({
                                                                        processing: true,
                                                                        serverSide: true,
                                                                        ajax: '{!! route('get.teachers') !!}',
                                                                        columns: [
                                                                        { data: 'id', name: 'id' },
                                                                        { data: 'title', name: 'title' },
                                                                        { data: 'lastname', name: 'lastname' },
                                                                        { data: 'job_type', name: 'job_type' },
                                                                        { data: 'specialty', name: 'specialty' },
                                                                        { data: 'action', name: 'action' },

                                                                    ]
                                                                });

                                                                // $('#classes-table').DataTable({
                                                                //     processing: true,
                                                                //     serverSide: true,
                                                                //     ajax: '{!! route('get.classes') !!}',
                                                                //     columns: [
                                                                //         { data: 'id', name: 'id' },
                                                                //         { data: 'name', name: 'name' },
                                                                //         { data: 'numeric', name: 'numeric' },
                                                                //         // { data: 'created_at', name: 'created_at' },
                                                                //         // { data: 'updated_at', name: 'updated_at' },
                                                                //         { data: 'action', name: 'action' },

                                                                //     ]
                                                                // });

                                                                });

                                                                </script>

@endpush

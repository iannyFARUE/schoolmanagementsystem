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
            <div id="messages"></div>

            <fieldset>
                    <legend class="divider">Manage Student</legend>
                    <hr>

                    <div class="float-right">
                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#addStudent" id="addButtonModelBtn">
                                    <i class="fas fa-plus"></i> Add Student
                            </button>
                        </div>
                        <br/><br/><br/>

            </fieldset>


    <table class="table table-bordered" id="students-table">
            <thead>
                <tr>

                        <th>id</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Student Number</th>
                        <th>Action</th>

                </tr>
            </thead>
        </table>
        </div>
    </div>
      <!-- add teacher -->
<div class="modal fade" tabindex="-1" role="dialog" id="addStudent">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
                    <h4 class="modal-title">Add Student</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

            </div>

        <form method="post" id="createStudentForm" action="/p/create" enctype="multipart/form-data">
            @csrf
            <div class="modal-body create-modal">

                <div id="add-student-messages"></div>

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
                                            <label for="phone_number" class="col-sm-4 col-form-label text-md-right">{{ __('Phone number:') }}</label>
                                            <div class="col-sm-8">
                                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}"  autocomplete="phone_number" autofocus>

                                                @error('phone_number')
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
                                        <label for="student_number" class="col-sm-4 col-form-label text-md-right">{{ __('Student No:') }}</label>
                                        <div class="col-sm-8">
                                            <input id="student_number" type="text" class="form-control @error('student_number') is-invalid @enderror" name="student_number" value="{{ old('student_number') }}"  autocomplete="student_number" autofocus>

                                            @error('student_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                            <label for="curriculum activities" class="col-sm-4 col-form-label text-md-right">{{ __('Curriculum Activities:') }}</label>
                                            <div class="col-sm-8">
                                                    <select class="form-control @error('curriculum_activities') is-invalid @enderror" name="curriculum_activities" id="curriculum_activities">
                                                            <option value="">Select an option</option>
                                                            <option value="debate">Debate</option>
                                                            <option value="choir">Choir</option>
                                                            <option value="music">Music</option>

                                                        </select>
                                                @error('curriculum_activities')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                           <div class="form-group row">
                                            <label for="classy" class="col-sm-4 col-form-label text-md-right">{{ __('Class :') }}</label>
                                            <div class="col-sm-8">
                                                    <select class="form-control @error('classy') is-invalid @enderror" name="classy" id="classy">
                                                            <option value="">Select an option</option>
                                                            @foreach ($classes as $class)
                                                    <option value="{{$class->id}}">{{$class->numeric}}</option>
                                                            @endforeach

                                                        </select>
                                                @error('classy')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                            <div class="form-group row">
                                            <label for="section" class="col-sm-4 col-form-label text-md-right">{{ __('Class :') }}</label>
                                            <div class="col-sm-8">
                                                    <select class="form-control @error('section') is-invalid @enderror" name="section" id="section">
                                                            <option value="">Select an section</option>
                                                            @foreach ($sections as $section)
                                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                                            @endforeach

                                                        </select>
                                                @error('section')
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

      {{-- edit students profile modal --}}
@if (Route::currentRouteName() === 'p.edit')

<div class="modal fade" tabindex="-1" role="dialog" id="editStudent">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
                    <h4 class="modal-title">Edit Student</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

            </div>

        <form method="post" id="editStudentForm" action="/p/{{$student->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-body create-modal">

                <div id="add-student-messages"></div>

                <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                                <label for="fname" class="col-sm-4 col-form-label text-md-right">{{ __('First Name:') }}</label>
                                <div class="col-sm-8">
                                    <input  type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') ?? $student->firstname }}"  autocomplete="fname" autofocus>

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
                                    <input  type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') ?? $student->lastname}}"  autocomplete="lname" autofocus>

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
                                        <input  type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') ?? $student->dob }}"  autocomplete="lname" autofocus>

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
                                                <select class="form-control" name="sex" >
                                                <option value="{{old('sex') ?? $student->sex}}">{{old('sex') ?? $student->sex}}</option>
                                                 @if ( $student->sex !== "Male")
                                                <option value="Male">Male</option>
                                                 @endif
                                                  @if ( $student->sex !== "Female")
                                                   <option value="Female">Female</option>
                                                 @endif
                                                     </select>

                                                             @error('sex')
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                </div>

                                    <div class="form-group row">
                                            <label for="phone_number" class="col-sm-4 col-form-label text-md-right">{{ __('Phone number:') }}</label>
                                            <div class="col-sm-8">
                                                <input  type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') ?? $student->phone_number }}"  autocomplete="phone_number" autofocus>

                                                @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email:') }}</label>
                                                <div class="col-sm-8">

                                                    <input  type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $student->email}}"  autocomplete="email" autofocus>

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
                                                        <input  type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $student->address}}"  autocomplete="address" autofocus>

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
                                        <label for="student_number" class="col-sm-4 col-form-label text-md-right">{{ __('Student No:') }}</label>
                                        <div class="col-sm-8">
                                            <input  type="text" class="form-control @error('student_number') is-invalid @enderror" name="student_number" value="{{ old('student_number') ?? $student->student_number}}"  autocomplete="student_number" autofocus>

                                            @error('student_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                            <label for="curriculum activities" class="col-sm-4 col-form-label text-md-right">{{ __('Curriculum Activities:') }}</label>
                                            <div class="col-sm-8">
                                                    <select class="form-control @error('curriculum_activities') is-invalid @enderror" name="curriculum_activities" >
                                                    <option value="{{old('curriculum_activities') ?? $student->curriculum_activities}}">{{old('curriculum_activities') ?? $student->curriculum_activities}}</option>
                                                    @if ($student->curriculum_activities !== 'Debate')
                                                    <option value="Debate">Debate</option>
                                                    @endif
                                                    @if ($student->curriculum_activities !== 'Choir')
                                                        <option value="Choir">Choir</option>
                                                    @endif

                                                    @if ($student->curriculum_activities !== 'Music')
                                                      <option value="Music">Music</option>
                                                    @endif


                                                        </select>
                                                @error('curriculum_activities')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                           <div class="form-group row">
                                            <label for="classy" class="col-sm-4 col-form-label text-md-right">{{ __('Class :') }}</label>
                                            <div class="col-sm-8">
                                                    <select class="form-control @error('classy') is-invalid @enderror" name="classy" >
                                                            <option value="{{old('classy') ?? $student->class->id}}">{{old('classy') ?? $student->class->numeric}}</option>
                                                            @foreach ($classes as $class)
                                                            @if ($class->numeric !==  $student->class->numeric)
                                                                 <option value="{{$class->id}}">{{$class->numeric}}</option>
                                                            @endif
                                                            @endforeach

                                                        </select>
                                                @error('classy')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                            <div class="form-group row">
                                            <label for="section" class="col-sm-4 col-form-label text-md-right">{{ __('Class :') }}</label>
                                            <div class="col-sm-8">
                                                    <select class="form-control @error('section') is-invalid @enderror" name="section">
                                                            <option value="{{old('classy') ?? $student->section->id}}">{{old('classy') ?? $student->section->name}}</option>
                                                            @foreach ($sections as $section)
                                                            @if ($student->section->name !== $section->name)
                                                    <option value="{{$section->id}}">{{$section->name}}</option>

                                                            @endif
                                                            @endforeach

                                                        </select>
                                                @error('section')
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

@endif


      {{-- delete modal class --}}
    <div class="modal" tabindex="-1" role="dialog" id="deleteStudent">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="text-danger">Are you Sure you want to delete student....??</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      <form id="delete-form" action="" method="POST">
                 @csrf
                 @method('DELETE')
        <button type="submit" class="btn btn-danger">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>



</div>

@endsection

@push('scripts')
<script>

$('document').ready(function(){

     $('#students-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get.students') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'firstname', name: 'firstname' },
            { data: 'lastname', name: 'lastname' },
            { data: 'email', name: 'lastname' },
            { data: 'student_number', name: 'student_number' },
            { data: 'action', name: 'action' },

        ]
    });



});

function deleteStudent(studentId = null){

     $(document).ready(function() {
            // $('#delete-form').attr("action","/p/"+studentId);
            $('#deleteStudent').modal('show');

            $('#delete-form').submit(function(e){
                 e.preventDefault();
                 var formdata = $(this).serialize();
                    $.ajax({
                    url :"/p/"+studentId,
                    method:'POST',
                    data:formdata,
                    success:function(data){
                        if(data === "True"){
                            $('#students-table').DataTable().ajax.reload();
                         $('#deleteStudent').modal('hide');
                        $('#messages').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                          Record deleted successfully...
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                             </button>
                        </div>`);

                        }


                    },
                });

            });

     });

}

</script>

 @if (count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#addStudent').modal('show');
        });
    </script>
@endif


    @if(Route::currentRouteName() === "p.edit")
    <script>
          $(document).ready(function() {
            $('#editStudent').modal('show');
        });
    </script>

    @endif


@endpush



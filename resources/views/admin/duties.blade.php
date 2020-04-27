@extends('admin.welcome')

@section('content')
<div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{'admin'}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Manage Duty</li>
            </ol>
        </nav>

        <div class="card">

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">


                    <fieldset>
                            <legend class="divider">Manage Duty</legend>
                            <hr>

                            <div class="float-right">
                                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#addDuty" id="addDutyModelBtn">
                                    <i class="fas fa-plus"></i> Add Duty
                                    </button>
                                </div>
                                <br/> <br/> <br/>

                    </fieldset>


            <table class="table table-bordered" id="duties-table">
                    <thead>
                        <tr>

                                <th>id</th>
                                {{-- <th>Class</th> --}}
                                 <th>Teacher Name</th>
                                 <th>Subject</th>
                                 <th>Class</th>
                                 <th>Section</th>



                                <th>Action</th>

                        </tr>
                    </thead>
                </table>
                </div>
            </div>


        </div>
        </div>


    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="addDuty">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                        <h4 class="modal-title">Assign Duties</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <form method="post" id="createDutyForm" action="/duties/create" enctype="multipart/form-data">
                @csrf
                <div class="modal-body create-modal">

                    <div id="add-section-messages"></div>

                    <div class="row">
                            <div class="col-md-12">
                                   <div class="form-group row">
                                    <label for="subject_id" class="col-sm-4 col-form-label text-md-right">{{ __('Subject:') }}</label>
                                    <div class="col-sm-8">
                                            <select id="subject_id" class="custom-select custom-select-lg mb-3 @error('subject_id') is-invalid @enderror" name="subject_id" title="subject_id">
                                                <option value="">Select subject here...</option>

                                                   @foreach ($subjects as $subject)
                                            <option id="subjectId" value="{{$subject->id}}">{{$subject->name}}</option>
                                                   @endforeach
                                                  </select>
                                        @error('subject_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="teacher_id" class="col-sm-4 col-form-label text-md-right">{{ __('Teacher:') }}</label>
                                    <div class="col-sm-8">
                                            <select class="custom-select custom-select-lg mb-3 @error('teacher_id') is-invalid @enderror" name="teacher_id" title="teacher_id">
                                                <option value="">Select teacher here...</option>
                                                   @foreach ($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->title}} {{ $teacher->lastname}}</option>
                                                   @endforeach
                                                  </select>
                                        @error('teacher_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="class_id" class="col-sm-4 col-form-label text-md-right">{{ __('Classes:') }}</label>
                                    <div class="col-sm-8">
                                            <select class="custom-select custom-select-lg mb-3 @error('class_id') is-invalid @enderror" name="class_id" title="class_id">
                                                <option value="">Select class here...</option>
                                                   @foreach ($classes as $class)
                                            <option value="{{$class->id}}">{{$class->grade}}</option>
                                                   @endforeach
                                                  </select>
                                        @error('class_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                  <div class="form-group row">
                                    <label for="section_id" class="col-sm-4 col-form-label text-md-right">{{ __('Section:') }}</label>
                                    <div class="col-sm-8">
                                            <select class="custom-select custom-select-lg mb-3 @error('section_id') is-invalid @enderror" name="section_id" title="section_id">
                                                <option value="">Select section here...</option>
                                                   @foreach ($sections as $section)
                                            <option value="{{$section->id}}">{{$section->name}}</option>
                                                   @endforeach
                                            </select>
                                        @error('section_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>





                            </div>
                            <!-- /col-md-6 -->


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







@endsection

@push('scripts')
<script>

$('document').ready(function(){

    //  $('#duties-table').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: '{!! route('get.sections') !!}',
    //     columns: [
    //         { data: 'id', name: 'id' },
    //         // { data: 'classes_id', name: 'classes_id' },
    //         { data: 'name', name: 'name' },
    //         { data: 'action', name: 'action' },



    //     ]
    // });

    // $('#subject').on('change',function(e){



    // });

});

</script>

 @if (count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#addDuty').modal('show');
        });
    </script>
@endif


@endpush


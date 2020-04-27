@extends('admin.welcome')

@section('content')
<div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{'admin'}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Manage Section</li>
            </ol>
        </nav>

        <div class="card">

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">


                    <fieldset>
                            <legend class="divider">Manage Section</legend>
                            <hr>

                            <div class="float-right">
                                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#addSection" id="addTeacherModelBtn">
                                            <i class="fas fa-plus"></i> Add Section
                                    </button>
                                </div>
                                <br/> <br/> <br/>

                    </fieldset>


            <table class="table table-bordered" id="sections-table">
                    <thead>
                        <tr>

                                <th>id</th>
                                {{-- <th>Class</th> --}}
                                 <th>Section Name</th>
                                <th>Action</th>

                        </tr>
                    </thead>
                </table>
                </div>
            </div>


        </div>
        </div>


    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="addSection">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                        <h4 class="modal-title">Add Section</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <form method="post" id="createSectionForm" action="/sections/create" enctype="multipart/form-data">
@csrf
                <div class="modal-body create-modal">

                    <div id="add-section-messages"></div>

                    <div class="row">
                            <div class="col-md-12">


                              <div class="form-group row">
                                    <label for="sname" class="col-sm-4 col-form-label text-md-right">{{ __('Section Name:') }}</label>
                                    <div class="col-sm-8">
                                        <input id="sname" type="text" class="form-control @error('sname') is-invalid @enderror" name="sname" value="{{ old('sname') }}"  autocomplete="sname" autofocus>

                                        @error('sname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="classId" class="col-sm-4 col-form-label text-md-right">{{ __('Classes:') }}</label>
                                    <div class="col-sm-8">
                                            <select class="custom-select custom-select-lg mb-3" name="classId" title="classId">
                                                <option value="">Select class here...</option>
                                                   @foreach ($classes as $class)
                                            <option value="{{$class->id}}">{{$class->grade}}</option>
                                                   @endforeach
                                                  </select>
                                        @error('classId')
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

     $('#sections-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get.sections') !!}',
        columns: [
            { data: 'id', name: 'id' },
            // { data: 'classes_id', name: 'classes_id' },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action' },



        ]
    });

});

</script>

 @if (count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#addSection').modal('show');
        });
    </script>
@endif


@endpush


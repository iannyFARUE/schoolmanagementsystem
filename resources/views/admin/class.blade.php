@extends('admin.welcome')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{'admin'}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Manage Class</li>
        </ol>
    </nav>

    <div class="card">

        <div class="card-body">

            <fieldset>
                    <legend class="divider">Manage Class</legend>
                    <hr>

                    <div class="float-right">
                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#addClass" id="addTeacherModelBtn">
                                    <i class="fas fa-plus"></i> Add Class
                            </button>
                        </div>
                    <br/><br/> <br/>

            </fieldset>


    <table class="table table-bordered" id="classes-table">
            <thead>
                <tr>

                        <th>id</th>
                        <th>name</th>
                        <th>numeric nalue</th>
                        <th>Action</th>


                </tr>
            </thead>
        </table>
        </div>
    </div>




<div class="modal fade" tabindex="-1" role="dialog" id="addClass">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
                    <h4 class="modal-title">Add Class</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form method="post" id="createClassForm" action="/classes/create" enctype="multipart/form-data">
@csrf
            <div class="modal-body create-modal">

                <div id="add-class-messages"></div>

                <div class="row">
                        <div class="col-md-12">


                          <div class="form-group row">
                                <label for="cname" class="col-sm-4 col-form-label text-md-right">{{ __('Class Name:') }}</label>
                                <div class="col-sm-8">
                                    <input id="cname" type="text" class="form-control @error('cname') is-invalid @enderror" name="cname" value="{{ old('cname') }}" required autocomplete="cname" autofocus>

                                    @error('cname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="numeric" class="col-sm-4 col-form-label text-md-right">{{ __('Numeric Value:') }}</label>
                                <div class="col-sm-8">
                                    <input id="numeric" type="text" class="form-control @error('numeric') is-invalid @enderror" name="numeric" value="{{ old('numeric') }}" required autocomplete="numeric" autofocus>

                                    @error('numeric')
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

      @if (Route::currentRouteName() === "classes.edit")
      <div class="modal fade" tabindex="-1" role="dialog" id="editClass">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
                    <h4 class="modal-title">Add Class</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form method="post" id="editClassForm" action="/classes/{{$class->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-body create-modal">

                <div id="add-class-messages"></div>

                <div class="row">
                        <div class="col-md-12">


                          <div class="form-group row">
                                <label for="cname" class="col-sm-4 col-form-label text-md-right">{{ __('Class Name:') }}</label>
                                <div class="col-sm-8">
                                    <input id="cname" type="text" class="form-control @error('cname') is-invalid @enderror" name="cname" value="{{ old('cname') ?? $class->grade}}" required autocomplete="cname" autofocus>

                                    @error('cname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="numeric" class="col-sm-4 col-form-label text-md-right">{{ __('Numeric Value:') }}</label>
                                <div class="col-sm-8">
                                    <input id="numeric" type="text" class="form-control @error('numeric') is-invalid @enderror" name="numeric" value="{{ old('numeric') ?? $class->numeric }}" required autocomplete="numeric" autofocus>

                                    @error('numeric')
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

      @endif

      </div>


@endsection


@push('scripts')
<script>

$('document').ready(function(){

     $('#classes-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get.classes') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'grade', name: 'grade' },
            { data: 'numeric', name: 'numeric' },
            { data: 'action', name: 'action' },



        ]
    });

});

</script>

 @if (count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#addClass').modal('show');
        });
    </script>
@endif


    @if(Route::currentRouteName() === "classes.edit")
    <script>
          $(document).ready(function() {
            $('#editClass').modal('show');
        });
    </script>

    @endif


@endpush

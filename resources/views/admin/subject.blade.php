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
                            <legend class="divider">Manage Subject</legend>
                            <hr>

                            <div class="float-right">
                                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#addSubject" id="addSubjectModelBtn">
                                            <i class="fas fa-plus"></i> Add Subject
                                    </button>
                                </div>
                                <br/> <br/> <br/>

                    </fieldset>


            <table class="table table-bordered" id="subjects-table">
                    <thead>
                        <tr>

                                <th>id</th>

                                 <th>Subject</th>
                                <th>Action</th>

                        </tr>
                    </thead>
                </table>
                </div>
            </div>


        </div>
        </div>


    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="addSubject">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                        <h4 class="modal-title">Add Subject</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <form method="post" id="createSubjectForm" action="/subjects/create" enctype="multipart/form-data">
                @csrf

                <div class="modal-body create-modal">

                    <div id="add-section-messages"></div>

                    <div class="row">
                            <div class="col-md-12">


                              <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Subject Name:') }}</label>
                                    <div class="col-sm-8">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="sname" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

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

     $('#subjects-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get.subjects') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action' },



        ]
    });

});

</script>

 @if (count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#addSubject').modal('show');
        });
    </script>
@endif


@endpush


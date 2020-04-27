
<div class="modal fade" tabindex="-1" role="dialog" id="editStudent">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
                    <h4 class="modal-title">Edit Student</h4>
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

      @push('scripts')
      <script>




      </script>

      @endpush



<!-- Add -->
<div class="modal fade" id="addnewteacher">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Teacher</b></h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('teachers.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" required >
                            @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-9">
                            <select class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender') }}" id="gender" name="gender" required>
                                <option value="" selected>- Select -</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                            @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" id="address" name="address" required>
                            @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="col-sm-3 control-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" id="dob" name="dob" required>
                            @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" id="phone" name="phone" required>
                            @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">E-Mail</label>

                        <div class="col-sm-9">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" required>
                            @error('email')
                                        <span class="invalid-feedback red-text" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="schedule" class="col-sm-3 control-label">Schedule</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="schedule" name="schedule" required>
                                <option value="" selected>- Select -</option>
                                @foreach($schedules as $schedule)
                                <option value="{{$schedule->slug}}">{{$schedule->slug}} : {{$schedule->time_in}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

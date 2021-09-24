<!-- Edit -->
<div class="modal fade" id="edit{{$student->name}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="employee_id">Edit Student</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('students.update',$student->name) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Student ID</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="id" value="{{$student->student_id}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{$student->name}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="gender" required>
                                @if($student->gender === 'female')
                                <option value="female" selected>Female</option>
                                <option value="female">Male</option>
                                @else
                                <option value="male" selected>Male</option>
                                <option value="male">Female</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="class" class="col-sm-3 control-label">Class</label>

                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="class" value="{{$student->class}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="section" class="col-sm-3 control-label">Section</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="section" value="{{$student->section}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" value="{{$student->address}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="col-sm-3 control-label">Date of Birth</label>

                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="dob" value="{{$student->dob}}" required>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="schedule" class="col-sm-3 control-label">Schedule</label>

                        <div class="col-sm-9">
                            <select class="form-control" name="schedule" required>
                                <option value="{{$student->schedules->first()}}" selected></option>
                                @foreach($schedules as $schedule)
                                <option value="{{$schedule->slug}}">{{$schedule->slug}} : {{$schedule->time_in}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete{{$student->name}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="student_id">Delete Student</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"  action="{{ route("students.destroy", $student->id) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <p>DELETE STUDENT</p>
                        <h2 class="bold del_employee_name"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

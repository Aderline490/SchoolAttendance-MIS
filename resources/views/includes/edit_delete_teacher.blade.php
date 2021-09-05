<!-- Edit -->
<div class="modal fade" id="editteacher">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="employee_id">Edit Teacher</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('teachers.update',$teacher->name) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{$teacher->name}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="gender" required>
                                @if($teacher->gender === 'female')
                                <option value="female" selected>Female</option>
                                @else
                                <option value="male">Male</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" value="{{$teacher->address}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="col-sm-3 control-label">Date of Birth</label>

                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="dob" value="{{$teacher->dob}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-3 control-label">Phone</label>

                        <div class="col-sm-9">
                            <input type="tel" class="form-control" name="phone" value="{{$teacher->phone}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">E-Mail</label>

                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" value="{{$teacher->email}}" required>
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
<div class="modal fade" id="deleteteacher">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="employee_id">Delete teacher</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('teachers.destroy',$teacher->name) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <p>DELETE teacher</p>
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
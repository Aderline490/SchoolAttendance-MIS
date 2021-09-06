<!-- Add -->
<div class="modal fade" id="addteacherleave">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Teacher Leave</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('sleave.assign') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id" class="col-sm-3 control-label">Teacher Id</label>

                        <div class="col-sm-9">
                            <div class="date">
                                <input type="number" class="form-control" id="id" name="id" value="{{ old('id') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="leave_date" class="col-sm-3 control-label">Leave Date</label>

                        <div class="col-sm-9">
                            <div class="date">
                                <input type="date" class="form-control" id="leave_date" name="leave_date" value="{{ old('leave_date') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="return_date" class="col-sm-3 control-label">Return Date</label>

                        <div class="col-sm-9">
                            <div class="date">
                                <input type="date" class="form-control" id="return_date" name="return_date" value="{{ old('return_date') }}">
                            </div>
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

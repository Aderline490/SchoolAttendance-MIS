<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>School Profile Update</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ url('/updateProfile')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">E-Mail</label>

                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>

                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">New Password</label>

                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password"
                            placeholder="input Your New password">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

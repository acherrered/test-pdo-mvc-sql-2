
<div id="addAdmin" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add agent</h4>
            </div>
            <div class="modal-body">
                <form name="formAdmin" onsubmit="registeradmin(); return false">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Name" required
                            autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="family" type="text" class="form-control" name="family"
                            placeholder="Country" required autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="date" type="date" class="form-control" name="date"
                            placeholder="Date" required autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="email" type="email" class="form-control" name="email"
                            placeholder="type" required autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="password" type="password" class="form-control" name="password"
                            placeholder="password" required autocomplete="off">
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Register</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="updateAdmin" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update contact</h4>
            </div>
            <div class="modal-body">
                <form name="formAdminUpdate" onsubmit="updateadmin(); return false">
                    <input type="text" name="id" id="id" style="display: none;">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Name" required
                            autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="family" type="text" class="form-control" name="family"
                            placeholder="Country" required autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="date" type="date" class="form-control" name="date"
                            placeholder="Date" required autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="email" type="email" class="form-control" name="email"
                            placeholder="type" required autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="password" type="password" class="form-control" name="password"
                            placeholder="password" required autocomplete="off">
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Register</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<div id="addMission" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add agent</h4>
            </div>
            <div class="modal-body">
                <form name="formMission" onsubmit="registermission(); return false">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="title" type="text" class="form-control" name="title" placeholder="title" required value="aaaa"
                            autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="discription" type="text" class="form-control" name="discription" value="aaaa"
                            placeholder="discription" required autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="identification" type="text" class="form-control" name="identification" value="aaaa"
                            placeholder="Identification" required autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="country" type="text" class="form-control" name="country" value="aaaa"
                            placeholder="country" required autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="type" type="text" class="form-control" name="type" value="aaaa"
                            placeholder="type" required autocomplete="off">
                    </div>
                                      <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="status" type="text" class="form-control" name="status" value="aaaa"
                            placeholder="status" required autocomplete="off">
                    </div>
                                      <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="speciality" type="text" class="form-control" name="speciality" value="aaaa"
                            placeholder="speciality" required autocomplete="off">
                    </div>
                                      <br>
                  
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <?php 
                        // Agents
                        $db = db::connect();
                        $records = $db->prepare('SELECT * FROM agents');
                        $records->execute();
                        $agents = $records->fetchAll();

                      ?>
                      <select id="agents" name="agents[]" multiple>
                        <option value="0">Select agents</option>
                        <?php foreach($agents as $k=>$v) { ?>
                          <option value="<?php echo $v["id_agent"]; ?>"><?php echo $v["family_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                                      <br>
                  
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <?php 

                        // Planques
                        //$db = db::connect();
                        $records = $db->prepare('SELECT * FROM hideouts');
                        $records->execute();
                        $hideouts = $records->fetchAll();

                      ?>
                      <select id="hideouts" name="hideouts[]" multiple>
                        <option value="0">Select hideouts</option>
                        <?php foreach($hideouts as $k=>$v) { ?>
                          <option value="<?php echo $v["id_hideout"]; ?>"><?php echo $v["address"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                                      
                                      <br>

                                      <br>
                  
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <?php 

                        // Contacts
                        //$db = db::connect();
                        $records = $db->prepare('SELECT * FROM contacts');
                        $records->execute();
                        $hideouts = $records->fetchAll();

                      ?>
                      <select id="contacts" name="contacts[]" multiple>
                        <option value="0">Select contacts</option>
                        <?php foreach($contacts as $k=>$v) { ?>
                          <option value="<?php echo $v["id_contact"]; ?>"><?php echo $v["family_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                                      
                                      <br>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <?php 

                        // Contacts
                        //$db = db::connect();
                        $records = $db->prepare('SELECT * FROM targets');
                        $records->execute();
                        $hideouts = $records->fetchAll();

                      ?>
                      <select id="targets" name="targets[]" multiple>
                        <option value="0">Select targets</option>
                        <?php foreach($targets as $k=>$v) { ?>
                          <option value="<?php echo $v["id_target"]; ?>"><?php echo $v["family_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                                      
                                      <br>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="start_date" value="05.05.2022" type="date" class="form-control" name="start_date"
                            placeholder="start_date" required autocomplete="off">
                    </div>
                                                        <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="end_date" value="2023-01-01" type="date" class="form-control" name="end_date"
                            placeholder="end_date" required autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Register</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="updateMission" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update contact</h4>
            </div>
            <div class="modal-body">
                <form name="formMissionUpdate" onsubmit="updatemission(); return false">
                    <input type="text" name="id" id="id" style="display: none;">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="title" type="text" class="form-control" name="title" placeholder="title" required
                            autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="discription" type="text" class="form-control" name="discription"
                            placeholder="discription" required autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="identification" type="text" class="form-control" name="identification"
                            placeholder="Identification" required autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="country" type="text" class="form-control" name="country"
                            placeholder="country" required autocomplete="off">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="type" type="text" class="form-control" name="type"
                            placeholder="type" required autocomplete="off">
                    </div>
                                      <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="status" type="text" class="form-control" name="status"
                            placeholder="status" required autocomplete="off">
                    </div>
                                      <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="speciality" type="text" class="form-control" name="speciality"
                            placeholder="speciality" required autocomplete="off">
                    </div>

                                      <br>
                  
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <?php  ?>
                      <select id="agents" name="agents" multiple>
                        <option value="0">Select agents</option>
                        <option value="1">Agent 1</option>
                        <option value="2">Agent 2</option>
                        <option value="3">Agent 3</option>
                      </select>
                    </div>
                                      <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="start_date" type="date" class="form-control" name="start_date"
                            placeholder="start_date" required autocomplete="off">
                    </div>
                                                        <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="end_date" type="date" class="form-control" name="end_date"
                            placeholder="end_date" required autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Register</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<section class="content">
<?php require_once 'alert-message.php'; ?>
    <div class="box ">
<section class="panel">
                      <header class="panel-heading">
                        <!-- <h1 class="panel-title text-center">Create a new user</h1> -->
                      </header>
                      <div class="panel-body">
                        <form id="updateprofile" class="form-horizontal mb-lg" method="post" action="">
                        <input type="hidden" name="action" value="UpdateProfile">
                        <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-9">
                              <input type="text"  name="username" value="<?php echo $_SESSION['login_admin']->Username; ?>" class="form-control"  readonly/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Firstname</label>
                            <div class="col-sm-9">
                              <input type="text"  name="firstname" value="<?php echo $_SESSION['login_admin']->Firstname; ?>" class="form-control"  required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Lastname</label>
                            <div class="col-sm-9">
                              <input type="text"  name="lastname" value="<?php echo $_SESSION['login_admin']->Lastname; ?>" class="form-control"  required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-9">
                              <input type="password"  name="password" class="form-control"/>
                              <span class="text text-danger">*leave blank for no change new password </span>
                            </div>
                          </div>                        
                      
                      <!-- <footer class="panel-footer"> -->
                        <div class="row">
                          <div class="col-md-11 text-right">                            
                            <button class="btn btn-primary btnSubmit modal-confirm fa fa-check-circle"> Save</button>
                            <button class="btn btn-default modal-dismiss fa fa-warning" onclick="history.go(-1)"> Cancel</button>
                          </div>
                        </div>
                      <!-- </footer> -->
                      </form>                      
                      </div>
                    </section>
                    </div>
                    </section>
<!-- Main content -->
    <section class="content">
    <?php require_once 'alert-message.php'; ?> 
		<div class="box ">
            <div class="box-header">
              <h3 class="box-title"><a href="#register-form" class="register-form btn btn-primary btn-sm" ><i class="fa fa-plus "></i> Add User</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="datatable-ajax-users"  class="table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>User Type</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>                                 
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>User Type</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

         </section>
    <!-- /.content -->

    <div id="register-form" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" style="margin-top:10px ">
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
                    <section class="panel" style="border-radius: 0">
                      <header class="panel-heading">
                        <h1 class="panel-title text-center">Create a new user</h1>
                      </header>
                      <div class="panel-body">
                        <form id="form-user" class="form-horizontal mb-lg" method="post" action=''>
                        <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-9">
                              <input type="text" name="username" class="form-control" required/>
                              <input type="hidden" name="action" value="InsertUser">
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-9">
                              <input type="password" name="password" class="form-control" required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Firstname</label>
                            <div class="col-sm-9">
                              <input type="text" name="firstname" class="form-control" required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Lastname</label>
                            <div class="col-sm-9">
                              <input type="text" name="lastname" class="form-control" required/>
                            </div>
                          </div>     
                          <div class="form-group">
                            <label class="col-sm-2 control-label">User Type</label>
                            <div class="col-sm-9">
                              <select name="admintype" class="form-control">                                
                                  <option value="2">Normal Admin</option>
                                  <option value="1">Super Admin</option>                                                  
                              </select>
                            </div>
                          </div>                                             
                      </div>
                      <footer class="panel-footer">
                        <div class="row">
                          <div class="col-md-11 text-right">                            
                            <button class="btn btn-primary modal-confirm fa fa-check-circle"> Save</button>
                            <button class="btn btn-default modal-dismiss fa fa-warning"> Cancel</button>
                          </div>
                        </div>
                      </footer>
                      </form>
                    </section>
                  </div>
                  </div>
                  </div>

<!-- Main content -->
    <section class="content">
    <?php require_once 'alert-message.php'; ?>     
		<div class="box ">
            <div class="box-header">
              <h3 class="box-title"><a href="#register-form" class="register-form btn btn-primary btn-sm" ><i class="fa fa-plus "></i> Add Customer</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="datatable-ajax-customer"  class="table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Area</th>                  
                  <th>City</th>
                  <th>Post Code</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>                                 
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Area</th>                  
                  <th>City</th>
                  <th>Post Code</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

         </section>
    <!-- /.content -->

    <div id="register-form" class="mfp-with-anim modal-block modal-block-primary mfp-hide" style="margin-top:10px ">
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
                    <section class="panel">
                      <header class="panel-heading">
                        <h1 class="panel-title text-center">Create a new customer</h1>
                      </header>
                      <div class="panel-body">
                        <form id="form-customer" class="form-horizontal mb-lg" method="post" enctype="multipart/form-data" action="">
                        <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-9">
                              <input type="text" name="username" class="form-control" required/>
                              <input type="hidden" name="actions" value="InsertCustomer" />
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
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" name="email" class="form-control" required/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Phone Number</label>
                            <div class="col-sm-9">
                              <input type="text" name="phone" class="form-control" required/>
                            </div>
                          </div>
                          <div id="div-passport-or-ic-img1" class="form-group">
                          <label class="col-md-2 control-label" >Image</label>
                          <div class="col-md-9">
                            <input type="file" name="ImgUrl" class="form-control" id="passport-or-ic1"  />
                            <input type="hidden" id="ImgFile" name="ImgFile">
                            
                            <br>
                            <img id="passport-or-ic-img1" alt="Uploaded Passport or IC" src="" width="100%" onerror="imgError(this);"/>
                          </div>
                        </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Gender</label>
                            <div class="col-sm-9">
                              <select name="gender" class="form-control">                                
                                  <option value="P">Female</option>
                                  <option value="L">Male</option>                                                              
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label" >Address</label>
                            <div class="col-sm-9">
                              <textarea rows="5" name="address" class="form-control" required></textarea>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Area 1</label>
                            <div class="col-sm-9">
                              <input type="text" name="area" class="form-control" required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Area 2</label>
                            <div class="col-sm-9">
                              <input type="text" name="area2" class="form-control" required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">City</label>
                            <div class="col-sm-9">
                              <input type="text" name="city" class="form-control" required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Post Code</label>
                            <div class="col-sm-9">
                              <input type="text" name="postcode" class="form-control" required/>
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

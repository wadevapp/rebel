<?php
  $setting = ORM::factory('setting',1);
?>
<section class="content">
<?php require_once 'alert-message.php'; ?>
    <div class="box ">
<section class="panel">
                      <header class="panel-heading">
                        <!-- <h1 class="panel-title text-center">Create a new user</h1> -->
                      </header>
                      <div class="panel-body">
                        <form id="updatesetting" class="form-horizontal mb-lg" method="post" action="">
                        <input type="hidden" name="action" value="UpdateSetting">
                        <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text"  name="name" <?php echo "value='$setting->Name'"; ?> class="form-control"  required/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label" >Address</label>
                            <div class="col-sm-9">
                              <textarea rows="5" class="form-control" name="address" required><?php echo $setting->Address; ?></textarea>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Area 1</label>
                            <div class="col-sm-9">
                              <input type="text"  name="area" <?php echo "value='$setting->Area1'"; ?> class="form-control"  required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Area2</label>
                            <div class="col-sm-9">
                              <input type="text"  name="area2" <?php echo "value='$setting->Area2'"; ?> class="form-control"  required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">City</label>
                            <div class="col-sm-9">
                              <input type="text"  name="city" <?php echo "value='$setting->City'"; ?> class="form-control"  required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Post Code</label>
                            <div class="col-sm-9">
                              <input type="text" name="postcode"  <?php echo "value='$setting->PostCode'"; ?> class="form-control"   required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Contact</label>
                            <div class="col-sm-9">
                              <input type="text" name="contact"  <?php echo "value='$setting->Contact'"; ?> class="form-control"   required/>
                            </div>
                          </div>                                                                                 
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Pin BBM</label>
                            <div class="col-sm-9">
                              <input type="text" name="pinbbm"  <?php echo "value='$setting->PinBBM'"; ?> class="form-control"   required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Line</label>
                            <div class="col-sm-9">
                              <input type="text" name="line"  <?php echo "value='$setting->Line'"; ?> class="form-control"   required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">WhatsApp</label>
                            <div class="col-sm-9">
                              <input type="text" name="whatsapp"  <?php echo "value='$setting->Whatsapp'"; ?> class="form-control"   required/>
                            </div>
                          </div>                                                    
                        <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Facebook</label>
                            <div class="col-sm-9">
                              <input type="text" name="facebook"  <?php echo "value='$setting->LinkFacebook'"; ?> class="form-control"   required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Twitter</label>
                            <div class="col-sm-9">
                              <input type="text" name="twitter"  <?php echo "value='$setting->LinkTwitter'"; ?> class="form-control"   required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Instagram</label>
                            <div class="col-sm-9">
                              <input type="text" name="instagram"  <?php echo "value='$setting->LinkInstagram'"; ?> class="form-control"   required/>
                            </div>
                          </div>
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-9">
                              <input type="text" name="email"  <?php echo "value='$setting->Email'"; ?> class="form-control"   required/>
                            </div>
                          </div>                          
                      </div>
                      <footer class="panel-footer">
                        <div class="row">
                          <div class="col-md-11 text-right">                            
                            <button class="btn btn-primary btnSubmit modal-confirm fa fa-check-circle"> Save</button>
                            <button class="btn btn-default modal-dismiss fa fa-warning" onclick="history.go(-1)"> Cancel</button>
                          </div>
                        </div>
                      </footer>
                      </form>                      
                    </section>
                    </div>
                    </section>
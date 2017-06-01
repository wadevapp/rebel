<!-- Main content -->

    <section class="content">    
    <?php require_once 'alert-message.php'; ?> 
		<div class="box ">
            <div class="box-header">
              <h3 class="box-title"><a href="#register-form" class="register-form btn btn-primary btn-sm" ><i class="fa fa-plus "></i> Add category</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="datatable-ajax-categories" class="table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>ID Category</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>                                 
                </tbody>
                <tfoot>
                <tr>
                  <th>ID Category</th>
                  <th>Name</th>
                  <th>Action</th>
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
                    <section class="panel panel-flat" style="border-radius: 0">
                      <header class="panel-heading">
                        <h1 class="panel-title text-center title-descriptions">Create a new category</h1>
                      </header>
                      <div class="panel-body">
                        <form id="form-category" class="form-horizontal mb-lg" method="post" action="">
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="name" class="form-control"  required/>
                              <input type="hidden" name="action" value="InsertCategory">
                              <input type="hidden" name="CategoryId">
                            </div>
                          </div>                                                                        
                      </div>
                      <footer class="panel-footer">
                        <div class="row">
                          <div class="col-md-11 text-right">
                            <button class="btn btn-primary modal-confirm fa fa-check-circle"> <b>SAVE</b></button>
                            <button class="btn btn-default modal-dismiss fa fa-warning"> <b>CANCEL</b></button>
                          </div>
                        </div>
                      </footer>
                      </form>
                    </section>
                  </div>
                  </div>
                  </div>

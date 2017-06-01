<?php
  if(isset($_POST['actions']))
  {    
      if($_POST['actions'] == 'InsertProduct')
      {
          $sizes = array();
          foreach ($_POST['sizes'] as $s) {
              array_push($sizes, $s);
          }
          $sizes = serialize($sizes);

          $colors = array();
          foreach ($_POST['colors'] as $c) {
              array_push($colors, $c);
          }
          $colors = serialize($colors);

          $product = ORM::factory('product');
          $product->Name = $_POST['name'];
          $product->Price = $_POST['price'];
          $product->PriceDiscount = $_POST['pricediscount'];
          if(!empty($_POST['isdiscount']))
          {
            $product->IsDiscount = $_POST['isdiscount'];
          }          
          $product->CategoryId = $_POST['category'];
          $product->Descriptions = $_POST['description'];
          $product->Colors = $colors;
          $product->Sizes = $sizes;
          $product->StatusId = 1;
          $product->CreatedDate = DB::expr('NOW()');
          $product->save();

          $PassportOrIcImgUrl = "";
          if($_FILES["PassportOrIcImgUrl"]["error"] == 0){
            $PassportOrIcImgUrl = save_image($_FILES["PassportOrIcImgUrl"],$product->ProductId);
            $product->ImgUrl = $PassportOrIcImgUrl;
            $product->save();
          }       

          $history = ORM::factory('history');
          $history->CreatedDate = DB::expr('Now()');
          $history->Descriptions = 'New product added -> '.$product->Name;
          $history->StatusId = 71;
          $history->save();

          header("location:?page=product");
          die();   
      }
      else if($_POST['actions'] == 'UpdateProduct')
      {
          $sizes = array();
          foreach ($_POST['sizes'] as $s) {
              array_push($sizes, $s);
          }
          $sizes = serialize($sizes);

          $colors = array();
          foreach ($_POST['colors'] as $c) {
              array_push($colors, $c);
          }
          $colors = serialize($colors);

          $product = ORM::factory('product',$_POST['productid']);
          if($product->loaded())
          {
              $product->Name = $_POST['name'];
              $product->Price = $_POST['price'];
              $product->CategoryId = $_POST['category'];
              $product->Descriptions = $_POST['description'];
              $product->PriceDiscount = $_POST['pricediscount'];
              if(!empty($_POST['isdiscount']))
              {
                $product->IsDiscount = $_POST['isdiscount'];
              } 
              $product->Colors = $colors;
              $product->Sizes = $sizes;
              $product->StatusId = 1;
              $product->save();

              if(isset($_FILES))
              {
                $PassportOrIcImgUrl = "";
                if($_FILES["PassportOrIcImgUrl"]["error"] == 0){
                  $PassportOrIcImgUrl = save_image($_FILES["PassportOrIcImgUrl"],$product->ProductId);
                  $product->ImgUrl = $PassportOrIcImgUrl;
                  $product->save();
                }              
              }

              $history = ORM::factory('history');
              $history->CreatedDate = DB::expr('Now()');
              $history->Descriptions = 'Update Product -> '.$product->Name;
              $history->StatusId = 72;
              $history->save(); 
          }              

          header("location:?page=product");
          die();   
      }
  }

  function save_image($image,$productid)
  {
      if (
          ! Upload::valid($image) OR
          ! Upload::not_empty($image) OR
          ! Upload::type($image, array('jpg', 'jpeg', 'png', 'gif')))
      {
          return FALSE;
      }

      $directory = $_SERVER['DOCUMENT_ROOT'].'/uploads/product/'.$productid."/";
      
      if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }

      if ($file = Upload::save($image, NULL, $directory))
      {
          $filename = strtolower(Text::random('alnum', 20)).'.jpg';

          Image::factory($file)->save($directory.$filename);
          // Delete the temporary file
          unlink($file);
          return '/uploads/product/'.$productid."/".$filename;
      }

      return FALSE;
  }

?>

<!-- Main content -->
    <section class="content">
    <?php require_once 'alert-message.php'; ?> 
		<div class="box ">
            <div class="box-header">
              <h3 class="box-title"><a href="#register-form" class="register-form btn btn-primary btn-sm" ><i class="fa fa-plus "></i> Add product</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="datatable-ajax-products" class="table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Discount Price</th>
                  <th>Description(s)</th>
                  <th>Category</th>
                  <th>Colors</th>
                  <th>Sizes</th> 
                  <th>Discount</th>               
                  <th>Status</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>                                 
                </tbody>
                <tfoot>
                <tr>
                  <th>Image</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Discount Price</th>
                  <th>Description(s)</th>
                  <th>Category</th>
                  <th>Colors</th>
                  <th>Sizes</th> 
                  <th>Discount</th>                 
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

    <div id="register-form" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" style="margin-top:10px ">
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
                    <section class="panel" style="border-radius: 0">
                      <header class="panel-heading">
                        <h1 class="panel-title text-center title-descriptions">Create a new product</h1>
                      </header>
                      <div class="panel-body">
                        <form id="form-product" class="form-horizontal mb-lg" method="post" enctype="multipart/form-data" action="">
                          <div class="form-group mt-lg">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="name" class="form-control" required/>
                              <input type="hidden" name="actions" value="InsertProduct">
                              <input type="hidden" name="productid">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-9">
                              <input type="text" name="price" data-toggle="tooltip" title="Numeric Only" class="Price form-control" required/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Price for discount</label>
                            <div class="col-sm-7">
                              <input type="text" name="pricediscount" value="0" min="0" data-toggle="tooltip" title="Numeric Only" class="Price form-control" required/>                              
                            </div>
                            <div class="col-sm-2">
                              <input id="isdiscount" type="checkbox" name="isdiscount"> Discount ?
                            </div>
                          </div>
                          <div id="div-passport-or-ic-img1" class="form-group">
                          <label class="col-md-2 control-label" >Image</label>
                          <div class="col-md-9">
                            <input type="file" name="PassportOrIcImgUrl" class="form-control" id="passport-or-ic1" required="true" />
                            <input type="hidden" name="action" value="Passport">                            
                            <br>
                            <img id="passport-or-ic-img1" alt="Uploaded Passport or IC" src="" width="100%" onerror="imgError(this);"/>
                          </div>
                        </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Category</label>
                            <div class="col-sm-9">
                              <select name="category" id="category" class="form-control" required>                                
                                  <option value="">Please select</option>
                                  <?php foreach (ORM::factory('category')->find_all() as $c) { ?>
                                      <option value="<?php echo $c->CategoryId; ?>"><?php echo $c->Name; ?></option>
                                  <?php } ?>                                
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Sizes</label>
                            <div class="col-sm-9">
                                <select id="size" name="sizes[]" id="sizes" class="form-control select2" style="width: 100%;border-radius: 0" multiple="multiple" required>
                                    <option value=""></option>
                                    <?php foreach (ORM::factory('sizes')->find_all() as $s) { ?>                          
                                        <option value="<?php echo $s->Name; ?>"><?php echo $s->Name; ?></option>
                                        <?php } ?>
                                </select>                     
                             </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Colors</label>
                            <div class="col-sm-9">
                                <select id="color" id="colors" name="colors[]" class="form-control select2" style="width: 100%;border-radius: 0" multiple="multiple" required>
                                    <option value=""></option>
                                    <?php foreach (ORM::factory('colors')->find_all() as $s) { ?>                          
                                        <option value="<?php echo $s->Name; ?>"><?php echo $s->Name; ?></option>
                                        <?php } ?>
                                </select>                     
                             </div>
                          </div>     
                          <div class="form-group">
                            <label class="col-sm-2 control-label" >Descriptions</label>
                            <div class="col-sm-9">
                              <textarea rows="5" name="description" id="description" class="form-control" required></textarea>
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
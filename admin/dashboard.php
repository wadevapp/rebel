<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count(ORM::factory('category')->find_all()); ?></h3>

              <p>Category</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="?page=category" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count(ORM::factory('visitor')->find_all()); ?></h3>

              <p>Visitor</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count(ORM::factory('colors')->find_all()); ?> / <?php echo count(ORM::factory('sizes')->find_all()); ?></h3>

              <p>Color / Size</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count(ORM::factory('product')->find_All()); ?></h3>

              <p>All Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="?page=product" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">  

          <!-- TABLE: LATEST ORDERS -->                    

          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Latest History</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
              <?php              
              foreach (ORM::factory('History')->order_by('CreatedDate','DESC')->limit(10)->find_all() as $p) { ?>
                <li class="item">
                  <!-- <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div> -->
                  <!-- <div class="product-info"> -->
                    <a href="javascript:void(0)" class="product-title"><?php echo $p->CreatedDate; ?>
                      <span class=" pull-right"><?php echo HistoryBiz::$Status[$p->StatusId]; ?></span></a>
                        <span class="product-description">
                          <?php echo substr($p->Descriptions,0,80); ?>
                        </span>
                  <!-- </div> -->
                </li>
              <?php } ?>                
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="?page=history" class="uppercase">View All History</a>
            </div>
            <!-- /.box-footer -->
          </div>            

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">          

          <!-- solid sales graph -->          

          <?php 

          $customer = ORM::factory('admin')->order_by('CreatedDate','DESC')->limit(8)->find_all();          
          $count = count($customer);
          if(count($customer) < 8)
          {
            $count = count($customer);
          }

          ?>
          <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Users</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?php echo $count; ?> New User</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  <?php foreach ($customer as $c) { ?>
                  <?php
// $date1 = new DateTime($c->CreatedDate);
// $date2 = new DateTime(DB::expr('NOW()'));
// $diff = $date1->diff($date2);
// print_r($diff->days); // or $diff->days
                  ?>                                                                         
                    <li>
                      <img src="dist/img/user1-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#"><?php echo $c->Firstname.' '.$c->Lastname; ?></a>                      
                      <span class="users-list-date"></span>
                    </li>  
                    <?php } ?>                  
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="?page=user" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->   

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
              <?php              
              foreach (ORM::factory('product')->order_by('CreatedDate','DESC')->limit(5)->find_all() as $p) { ?>
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo $p->ImgUrl; ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo $p->Name; ?>
                      <span class="label label-info pull-right"><?php echo BinaryHelper::NumberFormat($p->Price); ?></span></a>
                        <span class="product-description">
                          <?php echo substr($p->Descriptions,0,80); ?>
                        </span>
                  </div>
                </li>
              <?php } ?>                
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="?page=product" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>                    

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
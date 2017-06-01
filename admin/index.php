<?php
  require_once '../Library/kohana/include.php';
  require_once '../Library/BinaryHelper.php';
  require_once '../Library/HistoryBiz.php';
  session_start();    
  if(empty($_SESSION['login_admin']))
  {  
    header( 'Location: /admin/login.php');
    die();
  }

    $iconpage = 'fa-dashboard';
    $pagename = 'dashboard';
    if(isset($_GET['page']))
    {      
        switch ($_GET['page']) {
          case 'product':            
            $pagename = 'Product' ; 
            $iconpage = 'fa-book';    
            break; 
          case 'category':            
            $pagename = 'Category' ; 
            $iconpage = 'fa-tags';    
            break;
          case 'suggestion':            
            $pagename = 'Suggestion' ;  
            $iconpage = 'fa-comments-o';   
            break;
          case 'sizes':            
            $pagename = 'Sizes' ;     
            $iconpage = 'fa-tasks';
            break;
          case 'colors':            
            $pagename = 'Colors' ;    
            $iconpage = 'fa-task'; 
            break;
          case 'setting':        
            $pagename = 'Setting' ;    
            $iconpage = 'fa-gear'; 
            break;
          case 'user':        
            $pagename = 'User' ;     
            $iconpage = 'fa-user';
            break;
          case 'profile':        
            $pagename = 'Profile' ;     
            $iconpage = 'fa-user';
            break; 
          case 'history':        
            $pagename = 'History' ;     
            $iconpage = 'fa-history';
            break;             
          default:
            # code...
            break;
        }
    }  

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['settingApp']->Name; ?> | <?php echo $pagename; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../css/magnific-popup.css" />
  <link rel="stylesheet" href="../css/jquery-confirm.css" />
  <link rel="stylesheet" href="plugins/select2/select2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">



/*====== Zoom effect ======*/

.mfp-with-zoom .mfp-container,
.mfp-with-zoom.mfp-bg {
  opacity: 0;
  -webkit-backface-visibility: hidden;
  /* ideally, transition speed should match zoom duration */
  -webkit-transition: all 0.3s ease-out;
  -moz-transition: all 0.3s ease-out;
  -o-transition: all 0.3s ease-out;
  transition: all 0.3s ease-out;
}

.mfp-with-zoom.mfp-ready .mfp-container {
    opacity: 1;
}
.mfp-with-zoom.mfp-ready.mfp-bg {
    opacity: 0.8;
}

.mfp-with-zoom.mfp-removing .mfp-container,
.mfp-with-zoom.mfp-removing.mfp-bg {
  opacity: 0;
}


  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" id="melogo">
    <!-- Logo -->
    <a href="/admin/" class="logo hidden-xs">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b>WDV</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg "><b></b><?php echo $_SESSION['settingApp']->Name; ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top ">
      <!-- Sidebar toggle button-->

      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
<a href="?page=dashboard" class="visible-xs" style="position: absolute;margin-left: 38%;margin-top:10px;font-size:18px;color: white"><span><b><?php echo strtoupper($_SESSION['settingApp']->Name); ?></b></span></a>
      <div class="navbar-custom-menu " >
        <ul class="nav navbar-nav"> 

          <!-- User Account: style can be found in dropdown.less -->
          <!-- <li class="visible-xs" style="margin-right: 75px">
            <a href="#" >
            <span class="logo-lg " style="font-size:18px"><b>RAMA</b>DANI</span>
            </a>
            </li> -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class=" fa fa-gears"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image">

                <p>
                  <span id="loginAdminUsername"><?php echo $_SESSION['login_admin']->Firstname.' '.$_SESSION['login_admin']->Lastname; ?></span>
                  <small><?php echo $_SESSION['login_admin']->AdminTypeId == 1 ? "Super Admin":"Normal Admin"; ?></small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?page=profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/admin/?page=logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p id="loginAdminUsername2"><?php echo $_SESSION['login_admin']->Firstname.' '.$_SESSION['login_admin']->Lastname; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..." style="background-color: white">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" style="background-color: white" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>        
        <li class="<?php if($pagename == 'dashboard'){echo "active";} ?> treeview">
          <a href="/admin/">
            <i class="fa fa-dashboard"></i> <span >Dashboard</span>
            <span class="pull-right-container">              
            </span>
          </a>
        </li>        
        <li class="<?php if($pagename == 'Product'){echo "active";} ?>"><a href="?page=product"><i class="fa fa-book"></i> <span>Product</span></a></li>         
        <li class="<?php if($pagename == 'Category'){echo "active";} ?>"><a href="?page=category"><i class="fa fa-tags"></i> <span>Category</span></a></li>
        <li class="<?php if($pagename == 'Sizes'){echo "active";} ?>"><a href="?page=sizes"><i class="fa fa-tags"></i> <span>Sizes</span></a></li>
        <li class="<?php if($pagename == 'Colors'){echo "active";} ?>"><a href="?page=colors"><i class="fa fa-tags"></i> <span>Colors</span></a></li>
        <li class="<?php if($pagename == 'Suggestion'){echo "active";} ?>"><a href="?page=suggestion"><i class="fa fa-comments-o"></i> <span>Suggestion</span></a></li>
        <li class="<?php if($pagename == 'History'){echo "active";} ?>"><a href="?page=history"><i class="fa fa-history"></i> <span>History</span></a></li>
        <li class="<?php if($pagename == 'User'){echo "active";} ?>"><a href="?page=user"><i class="fa fa-user"></i> <span>User</span></a></li>
        <li class="<?php if($pagename == 'Setting'){echo "active";} ?>"><a href="?page=setting"><i class="fa fa-gear"></i> <span>Setting</span></a></li>
        
        <li class="header">END</li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php 
          echo $pagename; 
          if($pagename == 'dashboard')
            echo "<small>Control panel</small>";
          else if($pagename == 'dashboard')
            echo "<small>Control panel</small>";
          else if($pagename == 'Product')
            echo "<small>manage product</small>";
          else if($pagename == 'Profile')
            echo "<small>manage your profile</small>";
          else if($pagename == 'Suggestion')
            echo "<small>suggestion panel</small>";
          else if($pagename == 'Colors')
            echo "<small>manage colors panel</small>";
          else if($pagename == 'History')
            echo "<small>history panel</small>";
          else if($pagename == 'User')
            echo "<small>manage user</small>";
          else if($pagename == 'Setting')
            echo "<small>setting</small>";
          else if($pagename == 'Category')
            echo "<small>manage category</small>";
          else if($pagename == 'Sizes')
            echo "<small>sizes panel</small>";
          else 
            echo "<small>documentation panel</small>";
        ?>        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa <?php echo $iconpage; ?>"></i> Home</a></li>
        <li class="active"><?php echo $pagename; ?></li>
      </ol>
    </section>


  <?php
    // var_dump($_GET['page']);die();
    if(isset($_GET['page']))
    {      
        switch ($_GET['page']) {
          case 'logout':
            session_destroy();
            header( 'Location: login.php');            
            break;
          case 'dashboard':            
            include 'dashboard.php';          
            break;
          case 'product':            
            include 'product.php';          
            break;
          case 'sizes':            
            include 'sizes.php';          
            break;
          case 'colors':            
            include 'colors.php';          
            break;
          case 'category':            
            include 'category.php';          
            break;
          case 'suggestion':            
            include 'suggested.php';          
            break;
          case 'user':            
            include 'user.php';          
            break;       
          case 'setting':            
            include 'setting.php';          
            break; 
          case 'history':            
            include 'history.php';          
            break;
          case 'profile':            
            include 'profile.php';          
            break;                     
          
          default:
            # code...
            break;
        }
    }
    else
    {
      include 'dashboard.php';   
    }
  ?>


  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Powered by</b> Wadev
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#"><?php echo $_SESSION['settingApp']->Name; ?></a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <!--  -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTable -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../js/magnific-popup.js"></script>
<script src="../js/jquery-numeric.js"></script>
<script src="../js/jquery-confirm.js"></script>
<script src="../js/jquery.leanModal.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>


<script>

  $("#datatable-ajax-products").DataTable({
    "bProcessing": true,
    "sAjaxSource": 'ajax/ajax-datatable-products.php'
  });

  $("#datatable-ajax-customer").DataTable({
    "bProcessing": true,
    "sAjaxSource": 'ajax/ajax-datatable-customers.php',
  });

  $("#datatable-ajax-suggestions").DataTable({
    "bProcessing": true,
    "sAjaxSource": 'ajax/ajax-datatable-suggestions.php'
  });  

  $("#datatable-ajax-categories").DataTable({
    "bProcessing": true,
    "sAjaxSource": 'ajax/ajax-datatable-categories.php'
  });

  $("#datatable-ajax-users").DataTable({
    "bProcessing": true,
    "sAjaxSource": 'ajax/ajax-datatable-users.php'
  });   

  $("#datatable-ajax-histories").DataTable({
    "bProcessing": true,
    "sAjaxSource": 'ajax/ajax-datatable-histories.php'
  }); 

  $("#datatable-ajax-colors").DataTable({
    "bProcessing": true,
    "sAjaxSource": 'ajax/ajax-datatable-colors.php'
  });  

  $("#datatable-ajax-sizes").DataTable({
    "bProcessing": true,
    "sAjaxSource": 'ajax/ajax-datatable-sizes.php'
  });              


  
  
  $.widget.bridge('uibutton', $.ui.button);

$('.register-form').click(function(){
  $("#size").val('').trigger("change"); 
  $("#color").val('').trigger("change"); 
  $('#passport-or-ic-img1').attr('src','../images/No_Image_Available.png');
  $("#passport-or-ic1").prop('required',true);
  if (document.getElementById("form-product")) {
         document.getElementById("form-product").reset();
    }
 
  $.magnificPopup.open({                  
          items: {
           src: '#register-form'
         },                  
          mainClass: 'mfp-with-zoom',
          closeOnBgClick: false,    
          showCloseBtn : false,
          enableEscapeKey : false,
          zoom: {
              enabled: true, // By default it's false, so don't forget to enable it

              duration: 300, // duration of the effect, in milliseconds
              easing: 'ease-in-out', // CSS transition easing function

              // The "opener" function should return the element from which popup will be zoomed in
              // and to which popup will be scaled down
              // By defailt it looks for an image tag:
              opener: function(openerElement) {
                // openerElement is the element on which popup was initialized, in this case its <a> tag
                // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                return openerElement.is('img') ? openerElement : openerElement.find('img');
              }
            }                                  
      });
})


  $(document).on('click', '.modal-dismiss', function (e) {
    e.preventDefault();
    $.magnificPopup.close();
  });

        function imgError(image) {
          image.onerror = "";
          image.src = "../images/No_Image_Available.png";
          image.width ="150";
          return true;
      }

      function readURL(input,id) {

          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $(id).attr('src', e.target.result);
                  $(id).attr('width', "100%");
              }

              reader.readAsDataURL(input.files[0]);              
          }
      };

      $("#passport-or-ic1").change(function(){
          readURL(this,"#passport-or-ic-img1");          
      });      
      
$('#datatable-ajax-customer').on( 'draw.dt', function () {
    $('.CustomerToDelete').on('click',function(){
        var CustomerId = $(this).attr("data-id");
       var result =  $.confirm({
            icon: 'fa fa-warning',
            title: 'Are you sure ?',
            buttons: {
              ok: function(){
                  $.ajax({
                      type: "POST",
                      url: "ajax/ajax-crud-customer.php", 
                      data:{ CustomerId : CustomerId,actions:'DeleteCustomer'  } ,
                      success: function(data){                             
                              $('#datatable-ajax-customer').DataTable().ajax.reload();
                              $('#alertmessage').html(data.TemplateAlert); 
                                $('html, body').animate({
                                    scrollTop: $("#melogo").offset().top
                                }, 500);                                                             
                          },
                      error: function () {
                          $.confirm({
                            icon: 'fa fa-warning',
                            title: 'Sorry you can\'t delete',
                            content:'Oopss error',
                            buttons:{
                              ok:function(){

                              }
                            }
                          })
                      }                                                         
                      });                
              },
              cancel: function(){
                
              }
          }
        });
    });

  $('.register-form').magnificPopup({
                  items: {
                      src: '#register-form'
                  },
                  mainClass: 'mfp-with-zoom',
                  type: 'inline',
                  closeOnBgClick: false,    
                  showCloseBtn : false,
                  enableEscapeKey : false 
  });  
});

$('#datatable-ajax-categories').on( 'draw.dt', function () {
    $('.CategoryToDelete').on('click',function(e){
    e.stopImmediatePropagation();      
        var CategoryId = $(this).attr("data-id");
        $.confirm({
            icon: 'fa fa-warning',
            title: 'Are you sure ?',            
            closeIcon: true,
            closeIconClass: 'fa fa-close',
            buttons: {
              ok: function(){
                  $.ajax({
                      type: "POST",
                      url: "ajax/ajax-crud-category.php", 
                      data:{ CategoryId : CategoryId,action:'DeleteCategory'  } ,
                      success: function(data){                                 
                                $('#datatable-ajax-categories').DataTable().ajax.reload();                                        
                                $('#alertmessage').html(data.TemplateAlert);
                                $('html, body').animate({
                                    scrollTop: $("#melogo").offset().top
                                }, 500);                                
                          },
                      error: function () {
                          $.confirm({
                            icon: 'fa fa-warning',
                            title: 'Sorry you can\'t delete',
                            content:'Oopss error',
                            buttons:{
                              ok:function(){

                              }
                            }
                          })
                      }                               
                      });                
              },
              cancel: function(){
                
              }
          }
        });
    });

  $('.edit-form').click(function(){
      $.ajax({
        type: "POST",
        url: "ajax/ajax-crud-category.php", 
        data:{ id:$(this).attr("data-id"),action:'GetCategory' } ,
          success: function(data){           
              $("input[name='name']").val(data.name);
              $("input[name='CategoryId']").val(data.id);
              $("input[name='action']").val('UpdateCategory');
              $('.title-descriptions').text('Update category');                                                 
              $.magnificPopup.open({                  
                              items: {
                                  src: '#register-form'
                              },       
                              mainClass: 'mfp-with-zoom',           
                              type: 'inline',
                              closeOnBgClick: false,    
                              showCloseBtn : false,
                              enableEscapeKey : false ,                                  
              });              
          },
          beforeSend:  function(){                  
            // $('.btn').addClass('disabled');
          }
      })
  })
});


$('#datatable-ajax-sizes').on( 'draw.dt', function () {
    $('.CategoryToDelete').on('click',function(e){
    e.stopImmediatePropagation();      
        var SizeId = $(this).attr("data-id");
        $.confirm({
            icon: 'fa fa-warning',
            title: 'Are you sure ?',            
            closeIcon: true,
            closeIconClass: 'fa fa-close',
            buttons: {
              ok: function(){
                  $.ajax({
                      type: "POST",
                      url: "ajax/ajax-crud-size.php", 
                      data:{ SizeId : SizeId,action:'DeleteSize'  } ,
                      success: function(data){                                 
                                $('#datatable-ajax-sizes').DataTable().ajax.reload();                                        
                                $('#alertmessage').html(data.TemplateAlert);
                                $('html, body').animate({
                                    scrollTop: $("#melogo").offset().top
                                }, 500);                                
                          },
                      error: function () {
                          $.confirm({
                            icon: 'fa fa-warning',
                            title: 'Sorry you can\'t delete',
                            content:'Oopss error',
                            buttons:{
                              ok:function(){

                              }
                            }
                          })
                      }                               
                      });                
              },
              cancel: function(){
                
              }
          }
        });
    });

  $('.edit-form').click(function(){
      $.ajax({
        type: "POST",
        url: "ajax/ajax-crud-size.php", 
        data:{ id:$(this).attr("data-id"),action:'GetSize' } ,
          success: function(data){           
              $("input[name='name']").val(data.name);
              $("input[name='SizeId']").val(data.id);
              $("input[name='action']").val('UpdateSize');
              $('.title-descriptions').text('Update size');                                                          
              $.magnificPopup.open({                  
                              items: {
                                  src: '#register-form'
                              },           
                              mainClass: 'mfp-with-zoom',       
                              type: 'inline',
                              closeOnBgClick: false,    
                              showCloseBtn : false,
                              enableEscapeKey : false ,                                  
              });              
          },
          beforeSend:  function(){                  
            // $('.btn').addClass('disabled');
          }
      })
  })
});


$('#datatable-ajax-colors').on( 'draw.dt', function () {
    $('.CategoryToDelete').on('click',function(e){
    e.stopImmediatePropagation();      
        var ColorId = $(this).attr("data-id");
        $.confirm({
            icon: 'fa fa-warning',
            title: 'Are you sure ?',            
            closeIcon: true,
            closeIconClass: 'fa fa-close',
            buttons: {
              ok: function(){
                  $.ajax({
                      type: "POST",
                      url: "ajax/ajax-crud-color.php", 
                      data:{ ColorId : ColorId,action:'DeleteColor'  } ,
                      success: function(data){                                 
                                $('#datatable-ajax-colors').DataTable().ajax.reload();                                        
                                $('#alertmessage').html(data.TemplateAlert);
                                $('html, body').animate({
                                    scrollTop: $("#melogo").offset().top
                                }, 500);                                
                          },
                      error: function () {
                          $.confirm({
                            icon: 'fa fa-warning',
                            title: 'Sorry you can\'t delete',
                            content:'Oopss error',
                            buttons:{
                              ok:function(){

                              }
                            }
                          })
                      }                               
                      });                
              },
              cancel: function(){
                
              }
          }
        });
    });

  $('.edit-form').click(function(){
      $.ajax({
        type: "POST",
        url: "ajax/ajax-crud-color.php", 
        data:{ id:$(this).attr("data-id"),action:'GetColor' } ,
          success: function(data){           
              $("input[name='name']").val(data.name);
              $("input[name='ColorId']").val(data.id);
              $("input[name='action']").val('UpdateColor');
              $('.title-descriptions').text('Update colors');                                                             
              $.magnificPopup.open({                  
                              items: {
                                  src: '#register-form'
                              },      
                              mainClass: 'mfp-with-zoom',            
                              type: 'inline',
                              closeOnBgClick: false,    
                              showCloseBtn : false,
                              enableEscapeKey : false ,
              });              
          },
          beforeSend:  function(){                  
            // $('.btn').addClass('disabled');
          }
      })
  })
});


$('#datatable-ajax-users').on( 'draw.dt', function () {
    $('.UserToDelete').on('click',function(e){
      e.stopImmediatePropagation();
        var UserId = $(this).attr("data-id");
        $.confirm({
            icon: 'fa fa-warning',
            title: 'Are you sure ?',
            buttons: {
              ok: function(){
                  $.ajax({
                      type: "POST",
                      url: "ajax/ajax-crud-user.php", 
                      data:{ UserId : UserId,action:'DeleteUser'  } ,
                      success: function(data){                                                 
                                $('#datatable-ajax-users').DataTable().ajax.reload();
                                $('#alertmessage').html(data.TemplateAlert);    
                                $('html, body').animate({
                                    scrollTop: $("#melogo").offset().top
                                }, 500);                                    
                          },
                      error: function () {
                          $.confirm({
                            icon: 'fa fa-warning',
                            title: 'Sorry you can\'t delete',
                            content:'Oopss error',
                            buttons:{
                              ok:function(){

                              }
                            }
                          })
                      }                               
                      });                
              },
              cancel: function(){
                
              }
          }
        });
    });

  $('.register-form').magnificPopup({                  
                  items: {
                      src: '#register-form'
                  },           
                  mainClass: 'mfp-with-zoom',       
                  type: 'inline',
                  closeOnBgClick: false,    
                  showCloseBtn : false,
                  enableEscapeKey : false ,                                  
  });  
});

$('#datatable-ajax-products').on( 'draw.dt', function () {
  $('.img-popup').magnificPopup({
                  delegate: 'a', // child items selector, by clicking on it popup will open
                  type: 'image'
                  // other options
                });

    $('.ProductToDelete').on('click',function(e){
      e.stopImmediatePropagation();
        var ProductId = $(this).attr("data-id");
        $.confirm({
            icon: 'fa fa-warning',
            title: 'Are you sure ?',
            buttons: {
              ok: function(){
                  $.ajax({
                      type: "POST",
                      url: "ajax/ajax-crud-product.php", 
                      data:{ ProductId : ProductId,actions:'DeleteProduct'  } ,
                      success: function(data){                                                 
                                $('#datatable-ajax-products').DataTable().ajax.reload();
                                $('#alertmessage').html(data.TemplateAlert);  
                                $('html, body').animate({
                                    scrollTop: $("#melogo").offset().top
                                }, 500);                                                                                     
                          },
                      error: function () {
                          $.confirm({
                            icon: 'fa fa-warning',
                            title: 'Sorry you can\'t delete',
                            content:'Oopss error',
                            buttons:{
                              ok:function(){

                              }
                            }
                          })
                      }                               
                      });                
              },
              cancel: function(){
                
              }
          }
        });
    });

  $('.edit-form').click(function(){
    $('#passport-or-ic-img1').attr('src','../images/No_Image_Available.png');
    document.getElementById("form-product").reset();
      $.ajax({
        type: "POST",
        url: "ajax/ajax-crud-product.php", 
        data:{ id:$(this).attr("data-id"),actions:'GetProduct' } ,
          success: function(data){ 
              $("#color option").each(function()
              {
                  var index = data.colors.indexOf($(this).val());                  
                  if(data.colors[index] != null )
                  {
                    $(this).prop('selected',true).val(data.colors[index]);
                  }

              });
              $("#color").val(data.colors).trigger("change"); 
              $("#size option").each(function()
              {
                  var index = data.sizes.indexOf($(this).val());                  
                  if(data.sizes[index] != null )
                  {
                    $(this).prop('selected',true).val(data.sizes[index]);
                  }

              });
              $("#size").val(data.sizes).trigger("change"); 
              $("input[name='pricediscount']").val(data.pricediscount);
              document.getElementById("isdiscount").checked = data.isdiscount;       
              $("input[name='PassportOrIcImgUrl']").removeAttr('required');                   
              $("input[name='productid']").val(data.id);                      
              $("input[name='name']").val(data.name);                      
              $("input[name='price']").val(data.price);
              document.getElementById('category').value = data.category;
              document.getElementById('description').value = data.description;                            
              $("input[name='actions']").val('UpdateProduct');
              $('#passport-or-ic-img1').attr('src', data.image);
              $('.title-descriptions').text('Update Product');                                                             
              $.magnificPopup.open({                  
                              items: {
                                  src: '#register-form'
                              },            
                              mainClass: 'mfp-with-zoom',      
                              type: 'inline',
                              closeOnBgClick: false,    
                              showCloseBtn : false,
                              enableEscapeKey : false ,
              });              
          },
          beforeSend:  function(){                  
            // $('.btn').addClass('disabled');
          }
      })
  }) 
});

function checksize(age) {
    return age >= document.getElementById("ageToCheck").value;
}

function myFunction() {
    document.getElementById("size").innerHTML = ages.find(checkAdult);
}

$(".Price").numeric();
$(".select2").select2({placeholder: "    Please Select"});
$(document).ready(function(){  
    $('[data-toggle="tooltip"]').tooltip({      
      trigger: "click"
    });   

});
</script>

<!-- Insert Update Delete -->
<script>    
        $("#form-category").submit(function(event){
            event.preventDefault();
            var $form = $( this ),
            name = $form.find( "input[name='name']" );
            CategoryId = $form.find( "input[name='CategoryId']" );
            action = $form.find( "input[name='action']" );
            
            var posting = $.ajax({
                type: "POST",
                url: "ajax/ajax-crud-category.php", 
                data:{ name:name.val(),action:action.val(),CategoryId:CategoryId.val()} ,
                success: function(data){                             
                          $('#datatable-ajax-categories').DataTable().ajax.reload();
                          name.val('');
                          $('.btn').prop('disabled',false);      
                          $.magnificPopup.close();
                          $('#alertmessage').html(data.TemplateAlert);
                          $('html, body').animate({
                            scrollTop: $("#melogo").offset().top
                          }, 500);                          
                         },
                beforeSend:  function(){
                              $('.modal-confirm').addClass('fa-spinner');
                              $('.btn').prop('disabled',true);
                             }
                });
        });     

        $("#form-user").submit(function(event){
            event.preventDefault();
            var user = $(this).serialize();             
            var posting = $.ajax({
                type: "POST",
                url: "ajax/ajax-crud-user.php", 
                data:user ,
                success: function(data){                                      
                          $('#datatable-ajax-users').DataTable().ajax.reload();                          
                          $('.btn').prop('disabled',false);
                          document.getElementById("form-user").reset();
                          $.magnificPopup.close();
                          $('#alertmessage').html(data.TemplateAlert);
                          $('html, body').animate({
                            scrollTop: $("#melogo").offset().top
                          }, 500);                          
                         },
                beforeSend:  function(){
                              $('.modal-confirm').addClass('fa-spinner');
                              $('.btn').prop('disabled',true);
                             }
                });
        });        

        $("#form-customer").submit(function(event){
            event.preventDefault();            
            var customer = $(this).serialize();  
            // customer.append('ImgFile',$('#ImgFile')[0].files[0]);                 
            var posting = $.ajax({
                type: "POST",
                url: "ajax/ajax-crud-customer.php", 
                data:customer ,
                success: function(data){                             
                          $('#datatable-ajax-customer').DataTable().ajax.reload();                          
                          $('.btn').prop('disabled',false);
                          document.getElementById("form-customer").reset();
                          $.magnificPopup.close();
                          $('#alertmessage').html(data.TemplateAlert); 
                          $('html, body').animate({
                            scrollTop: $("#melogo").offset().top
                          }, 500);                                              
                         },
                beforeSend:  function(){
                              $('.modal-confirm').addClass('fa-spinner');
                              $('.btn').prop('disabled',true);                              
                             }
                });
        });          

        $("#updatesetting").submit(function(event){
            event.preventDefault();            
            var setting = $(this).serialize();  
            // customer.append('ImgFile',$('#ImgFile')[0].files[0]);                 
            var posting = $.ajax({
                type: "POST",
                url: "ajax/ajax-setting.php", 
                data:setting ,
                success: function(data){                                                                                    
                          $('#alertmessage').html(data.TemplateAlert).fadeIn('slow'); 
                          $('html, body').animate({
                            scrollTop: $("#melogo").offset().top
                          }, 500);                         
                          $('.btnSubmit').removeClass('disabled');

                         },
                beforeSend:  function(){                             
                      $('.btnSubmit').addClass('disabled');
                   }
                });
        });  

        $("#updateprofile").submit(function(event){
            event.preventDefault();            
            var profile = $(this).serialize();  
            // customer.append('ImgFile',$('#ImgFile')[0].files[0]);                 
            var posting = $.ajax({
                type: "POST",
                url: "ajax/ajax-profile.php", 
                data:profile ,
                success: function(data){                                                                                    
                          $('#alertmessage').html(data.TemplateAlert); 
                          $('html, body').animate({
                            scrollTop: $("#melogo").offset().top
                          }, 500);  
                          $('#loginAdminUsername').text(data.loginAdminUsername);
                          $('#loginAdminUsername2').text(data.loginAdminUsername);                       

                         },
                beforeSend:  function(){                             
                      $('.btnSubmit').addClass('disabled');
                   }
                });
        });   



        $("#form-sizes").submit(function(event){
            event.preventDefault();
            var $form = $( this ),
            name = $form.find( "input[name='name']" );
            action = $form.find( "input[name='action']" );
            SizeId = $form.find( "input[name='SizeId']" );
            
            var posting = $.ajax({
                type: "POST",
                url: "ajax/ajax-crud-size.php", 
                data:{ name:name.val(),action:action.val(),SizeId:SizeId.val() } ,
                success: function(data){                             
                          $('#datatable-ajax-sizes').DataTable().ajax.reload();
                          name.val('');
                          $('.btn').prop('disabled',false);      
                          $.magnificPopup.close();
                          $('#alertmessage').html(data.TemplateAlert);
                          $('html, body').animate({
                            scrollTop: $("#melogo").offset().top
                          }, 500);      
                          $('.modal-confirm').removeClass('fa-spinner');                    
                         },
                beforeSend:  function(){
                              $('.modal-confirm').addClass('fa-spinner');
                              $('.btn').prop('disabled',true);
                             }
                });
        });  


        $("#form-colors").submit(function(event){
            event.preventDefault();
            var $form = $( this ),
            name = $form.find( "input[name='name']");
            action = $form.find( "input[name='action']" );
            ColorId = $form.find( "input[name='ColorId']" );            
            
            var posting = $.ajax({
                type: "POST",
                url: "ajax/ajax-crud-color.php", 
                data:{ name:name.val(),action:action.val(),ColorId:ColorId.val() } ,
                success: function(data){                             
                          $('#datatable-ajax-colors').DataTable().ajax.reload();
                          name.val('');
                          $('.btn').prop('disabled',false);      
                          $.magnificPopup.close();
                          $('#alertmessage').html(data.TemplateAlert);
                          $('html, body').animate({
                            scrollTop: $("#melogo").offset().top
                          }, 500);
                          $('.modal-confirm').removeClass('fa-spinner');                          
                         },
                beforeSend:  function(){
                              $('.modal-confirm').addClass('fa-spinner');
                              $('.btn').prop('disabled',true);
                             }
                });
        });                           
</script>

</body>
</html>

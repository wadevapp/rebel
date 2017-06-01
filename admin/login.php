<?php
require_once '../Library/kohana/include.php';
$Name = ORM::factory('setting',1)->Name;
session_start();
if(isset($_SESSION['login_admin']))
{  
  header( 'Location: /admin/');
  die();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $Name; ?> | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page" style="background-image: url(../images/bg2.jpg)">
<div class="login-box">
  <div class="login-logo">
    <a href="/admin/"><b><?php echo strtoupper(substr($Name,0,1)); ?></b><?php echo strtoupper(substr($Name,1)); ?></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form id="login-form" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
             <div id="alert-sign-in" ></div>
              <img id="signin-spinner" src="../images/preloader.gif" class="fright hidden" style="margin-top: 9px;
                      margin-right: 9px;">

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function(){
        $("#login-form").submit(function(event){
            event.preventDefault();
            var $form = $( this ),
            username = $form.find( "input[name='username']" ),
            password = $form.find( "input[name='password']" );
        
            var posting = $.ajax({
                type: "POST",
                url: "../Library/ajax/ajax-signin.php", 
                data:{ username: username.val(), password: password.val() } ,
                success: function(data){                             
                            if(data.success == true)
                            {                                
                              $("#alert-sign-in").html("<div class=\"col-sm-12 text-center  btn-flat mt-sm mb-sm btn btn-success\" ><i class=\"fa fa-check-circle\"></i> "+data.message+" </div>");
                              window.location= "/admin/";
                            }
                            else
                            {                                
                                $("#alert-sign-in").html("<div class=\"col-sm-12 text-center btn-flat   mt-sm mb-sm btn btn-danger\" ><i class=\"fa fa-warning\"></i> "+data.message+" </div>");
                            }
                            $("#signin-spinner").addClass("hidden");
                            $("#alert-sign-in").removeClass("hidden");
                         },
                beforeSend:  function(){
                               $("#signin-spinner").removeClass("hidden");
                               $("#alert-sign-in").addClass("hidden");
                             }
                });
        });
    })
</script>
</body>
</html>

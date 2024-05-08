<?php 
include('../conn.php');
session_start();
 ?>
<!DOCTYPE html>
<html>		    
	<head>
        <!--
            ==============================================
                Mobile + Desktop + Browser Responsive Tags
            ==============================================
        -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bank Atm System</title>
        <meta http-equiv="refresh" content=""/>
        <!--
            ============================
                Bootstrap + Custom + Css
            ============================
        -->
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../css/custom.css"/>
		<!--
            ============================
                Bootstrap + Custom + Jquery
            ============================
        -->
		<script src="../js/jquery_library.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</head>
	<body style="background: #ccc;">
		<nav class="navbar navbar-default navbar-fixed-top" style="background:">
			<div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand"><strong><i class="glyphicon glyphicon-lock"></i>Admin Panel - Dashboard</strong></a>
                </div>
			</div>
		</nav>	
		<!-- navbar ends-->
		<div class="container-fluid" style="background: #f3f3f3; margin-top:50px;">
			<br/><div class="row">
				<!-- container -->
				<div class="col-sm-4 col-sm-offset-4">
                    <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px">
                        <div class="panel-heading" id="signin_panel_header">
                           
                            <h4 align="center" style="padding-top:5px;">Admin Login</h4><hr/>
                        </div>
                        <div class="panel-body" style="margin-top:-30px;">
                            <form role="form" align="center" action="" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" placeholder="Username..." id="email" name="user" type="text"  required>
	                                		</div>
                                    <div class="form-group">
                                          <label>Password</label>
                                        <input class="form-control" placeholder="Password..." id="pass" name="pass" type="password" value="" required>
                                    </div>
                                    <hr/>
                                    <center>
                                        <button  type="submit" name="login" class="btn btn-success btn-custom"><i class="glyphicon glyphicon-log-in"></i>  login</button>
                                    </center>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
					if(isset($_POST['login']))
					{
						$email = mysqli_real_escape_string($con ,$_POST['user']);
						$password = mysqli_real_escape_string($con , $_POST['pass']);
						//$encrypt = md5($password);// for to encrypt password
						$query = "select * from admin where user='$email' and pass='$password'"; 
						$run = mysqli_query($con,$query);
						if(mysqli_num_rows($run)>0)
						{
							$query2 = "select * from admin where user='$email' and pass='$password'"; 
							$run2 = mysqli_query($con,$query);
							$run3 = mysqli_fetch_array($run2);
							$_SESSION['name'] = $run3['1'];
							$_SESSION['email'] = $run3['2'];
							echo '<script>window.open("index.php","_self")</script>';
						}
						else
						{
							echo '<script>alert("Enter Email and Password Correctly");</script>';
						}
					}
			?>
	
            	<!-- container -->
			</div>
		</div>
		<!-- Main div end -->
		<footer class="container-fluid" style="font-size:20px; background:#444; color:#fff;">
            <p align="center">Copyright &copy; 2019</p>
            <p align="center">Website Developed By CME-005</p>
        </footer>
		<!-- footer end-->
	</body>
</html>
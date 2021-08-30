<?php
session_start();
if(isset($_SESSION["userID"])){
	header("location:../home.php");
}
$error="";
if(isset($_POST["login"])){
 $email=$_POST["email"];
 $pass=$_POST["pass"];

$conn=mysqli_connect("localhost","root","root")
        or die("Could Not Connect");

$db=mysqli_select_db($conn,"healthylifestyle");

$query="SELECT * from user where email='$email' AND password='$pass'";
$result=mysqli_query($conn,$query);
$userSet=mysqli_fetch_assoc($result);

if(isset($userSet["email"]) && $userSet["GroupID"]== 0){
	$_SESSION['userID']=$userSet["userID"];
	header("location:../home.php");
}
elseif (isset($userSet["email"]) && $userSet["GroupID"]== 1) {
	$_SESSION['userID']=$userSet["userID"];
	header("location:../Nutrition_expert.php");	
}
else{
	$error="Enter A valid Email Or Password";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/logo3.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link href = 'http://fonts.googleapis.com/css?family=Calligraffitti'
         rel = 'stylesheet' type='text/css'/>
<!--===============================================================================================-->
<style>
	.login100-form-btn {  
	font-family: Calligraffitti ;
	letter-spacing: 10px ;
	font-weight: bolder}
	
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100"> <!--this div has a white background-->
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title" style="color: #2f7a0e">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
	
					
				<br><br><br>	
                         <!-------------------------------------------------------------->
			 
			   <input class="login100-form-btn" type="submit" value="sign in" name="login">
			  		
					<label style="color:red;background: white; border:none; text-align: center;" class="form-control"><small><?php echo "$error";?></small></label>
                          <!--------------------------------------------------------------->
					<div class="text-center p-t-136">
						<a class="txt2" href="Register.php" style = "position:relative ; top: -60px;">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
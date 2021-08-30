<?php
session_start();
$conn=mysqli_connect("localhost","root","root")
        or die("Could Not Connect");

$db=mysqli_select_db($conn,"healthylifestyle");

if(isset($_POST["register"])){
	$fname=$_POST["fname"];
	$email=$_POST["email"];
	$pass =$_POST["pass"];
	$age  =$_POST["age"];
	$gender=$_POST["gender"];
	$weight=$_POST["weight"];
	$height=$_POST["height"];
	
	$img=$_FILES["image"]["name"];
	$img_tmp=$_FILES["image"]["tmp_name"];
	$path="../assets/images/avatar/";
	
	move_uploaded_file($img_tmp, $path.$img);
	
	$table=$_POST["c"];

	
	$query="INSERT INTO user(firstName,email,age,password,gender,weight,height,image,ownTable) VALUES('$fname','$email','$age','$pass','$gender','$weight','$height','$img',
	                         '$table')";
	
	if(mysqli_query($conn,$query)){
		$query2 = "SELECT * from user where email='$email' AND password='$pass'";
		$res  = mysqli_query($conn,$query2);
		$data = mysqli_fetch_assoc($res);
		$_SESSION["userID"]=$data["userID"];
		header("location:login.php");
	}
/*	if($result){
		$query2 = "SELECT * form user where email='$email' AND password='$pass'";
		$res = mysqli_query($conn,$query2);
		if($res){
			print_r($query2);
			die;
		}
		else{
			die;
		}
		$userSet = mysqli_fetch_assoc($res);
		
		if(isset($userSet["email"]) && $userSet["GroupID"]== 0){
		
			$_SESSION['userID']=$userSet["userID"];
			header("location:../home.php");
		
		
	}  */


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
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
	option {
	        
		color: green ;
		font-family: cursive  ;
		float: left ;

                }
  .wrap-login100 {
  width: 960px;
  height: 1150px;
  background: #fff;
  border-radius: 10px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  padding: 90px 130px 33px 95px;
  
}
/*------------ button ------*/
.login100-form-btn {  
	font-family: Calligraffitti ;
	letter-spacing: 10px ;
	font-weight: bolder}	
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100"> <!--this div has a white background-->
				<div class="login100-pic js-tilt" data-tilt>
				<br><br>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" enctype="multipart/form-data">
					<span class="login100-form-title">
						Create New Account
					</span>
				<!--first name----------------------------------------------------->
				  <div class="wrap-input100 validate-input" data-validate = " first name is required">
						<input class="input100" type="text" name="fname" placeholder="first name">
						<span class="focus-input100"></span>
					        <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
							
						</span>
						
					</div>
                    <!--email field---------------------------------------------->
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
                    
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="age" placeholder="Age" id="age">
						<span class="focus-input100"></span>
					</div>
                    
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password" min="8" max="15">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						
					</div>
					<p style="color:gray"> minimum 8 character and maximum 15  </p>
				
			
					
				<br>
				

	<!------------------------------------------------------------------------>
		
			<div class="wrap-input100 validate-input" data-validate = "Password is required">
			<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-venus-mars" aria-hidden="true" ></i>
					
						</span>
			<select class="input100" name="gender" id="gender">
			<option value="male">male</option>
			<option value="female">female</option>
			</select>
			
            </div>			

				<!---- weight and height -------->           
				<div class="wrap-input100 validate-input" data-validate = "weight is required">
						<input class="input100" type="number" name="weight" placeholder="weight in km" min = "0" max="200" style="text-align:center">
						
					</div>
					<div class="wrap-input100 validate-input" data-validate = "height is required">
						<input class="input100" type="number" name="height" placeholder="height in cm" min="0" max="200" style="text-align:center">
						
					</div><br>
					
					<div class="wrap-input100 validate-input" data-validate = "weight is required">
							<label><span style="color:gray">Choose a personal picture:</span><br><input type="file" class="form-control" name="image" id="image"><label>
					</div>	
					
			    <!------ some questions to determine the type of diet ---->
				 
				 <span style="font-size:18px ">
				 	
					<!---- if user is female these two questiins withh show otherwise will be hidden ----->
                    <div id="ForFemale">
					<input  type="radio" name="c" value="pregnant"> are you pregnant and breastfeeding ? <br>
					</div>

					<div id="ForChild">
					<input  type="radio" name="c" value="child"> are you Baby ? <br>
					</div>
				
					<input  type="radio"  name="c" value="anemia" > Do you suffer from anemia? <br>
					<input  type="radio" name="c"  value="diet based"> I would like to use a diet based on my weight.<br>
					<input  type="radio" name="c"  value="steady diet"> I want to use a steady diet . <br>
					<input  type="radio" name="c"  value="dieting with someone"> Are you dieting with someone else?
				
				 </span>	 
				<br>
				
				<!--button----------------------------------------------------->
                
				<input class="login100-form-btn" type="submit" value="Sign up" name="register">
				<br><br><br>
                <div class="text-center">
						<a class="txt2" href="login.php" style = "position:relative ; top: -60px;">
							Go to Login
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
		});
		$("document").ready(function(){
			$("#ForFemale").hide();
			$("#ForChild").hide();
			$("#age").change(function(){
				if($("#age").val()<=14){
					$("#ForChild").show(1000);	
				}
				else if($("#age").val()>14){
					$("#ForChild").hide(1000);
				}
				
			})
			$("select").change(function(){
				$(this).find("option:selected").each(function(){
					var optionSelected = $(this).attr("value");
					if(optionSelected=="female"){
						$("#ForFemale").show(1000);
					}
					else if(optionSelected=="male"){
						$("#ForFemale").hide(1000);
					}
				});
			});
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
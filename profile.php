<?php
session_start();
if(!isset($_SESSION['userID'])){
  header("location:login_v1/login.php");
}
$conn=mysqli_connect("localhost","root","root")
        or die("Could Not Connect");

$db=mysqli_select_db($conn,"healthylifestyle");

$id=$_SESSION['userID'];

if(isset($_POST['update'])){
$name=$_POST["fname"];
$email=$_POST["email"];
$age=$_POST["age"];
$pass=$_POST["pass"];
$gender=$_POST["gender"];
$weight=$_POST["weight"];
$height=$_POST["height"];
$img=$_FILES["img"]["name"];
$img_tmp=$_FILES["img"]["tmp_name"];
$path="assets/images/avatar/";
move_uploaded_file($img_tmp, $path.$img);
$table=$_POST["c"];

if($_FILES['img']['error']==0){
$query="UPDATE user set firstName='$name',
                        email='$email',
                        age='$age',
                        password='$pass',
                        gender='$gender',
                        weight='$weight',
                        height='$height',
                        image='$img',
                        ownTable='$table'
                        where userID='$id'";
mysqli_query($conn,$query);
header("location:profile.php");
}
else{
  $query="update user set firstName='$name',
                        email='$email',
                        age='$age',
                        password='$pass',
                        gender='$gender',
                        weight='$weight',
                        height='$height',
                        ownTable='$table'
                        where userID='$id'";
  mysqli_query($conn,$query);
  header("location:profile.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>your </title>

    <!-- Favicon -->
   <link rel="shortcut icon" href="assets/images/logo/logo3.png" type="image/x-icon">  

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/fonts/flat-icon/flaticon.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
      
     <link href = 'http://fonts.googleapis.com/css?family=Calligraffitti'
         rel = 'stylesheet' type='text/css'>
      
     <style>
	 
    #word {color :#2f7a0e ;
	       position:relative ;
		   top:-120px ;
		   -webkit-animation: skew 2s infinite linear;
		   font-size:50px ;}
	
    #word2 {color :#000 ;
	       position:relative ;
		   top:-130px ;
		   font-size:20px ;}
	
    #word2:hover{
	           color: #2f7a0e
	            }
				
    @-webkit-keyframes skew 
         {
            from { -webkit-transform: skewX(0deg); }
            25% { -webkit-transform: skewX(30deg); }
            50% { -webkit-transform: skewX(0); }
            75% { -webkit-transform: skewX(-30deg); }
            to { -webkit-transform: skewX(0); }
         }				 
	 

/*---------------------- the table / in the bottom of the page -----------------------------*/
        th { color:#2f7a0e ;
	    font-size: 25px ;
	      text-align: center ;} 
	td { font-size: 20px ;
	      color: #000 ;
	      padding-left: 50px;
	      padding-right: 50px;}
	td span { color:#2f7a0e ;}
	
*------ panel -----------------------------------------------------------------------------*/

.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);

}
.panel-default {
    border-color: #ddd;
}
.panel-default>.panel-heading {
    color: white;
    background-color: #2f7a0e;
    border-color: #ddd;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

.panel-body {
    padding: 25px;    background-color:#d9e6dc  ;
}
.wrap-input100 {
  position: relative;
  width: 100%;
  z-index: 1;
  margin-bottom: 10px;
}

.input100 {
  font-family: Poppins-Medium;
  font-size: 15px;
  line-height: 1.5;
  color: #107e03;

  display: block;
  width: 100%;
  background: #e6e6e6;
  height: 50px;
  border-radius: 25px;
  padding: 0 30px 0 68px;
}


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

    <!-- Header Area Starts -->

	<header class="header-area main-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="index.php"><img src="assets/images/logo1.jpeg" alt="logo" width= 150px height=60px alt="logo" style="margin-top:15px"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>  
                    <div class="main-menu">
                        <ul>
                            <li class="active" ><a href="home.php"  style="font-size: 18px; color: #2f7a0e ; padding:7px">home</a></li>
                            <li><a href="about.php" style="font-size: 18px;color: #2f7a0e ;  padding:7px">about us</a></li>
                           
                            <!--<li><a href="trainers.html">trainers</a></li>-->
                            <li><a href="#" style="font-size: 18px;color: #2f7a0e" ;  padding:7px >blog</a>
                                <ul class="sub-menu">
                                    <li><a href="tips nutration.html"  style="font-size: 16px;color: #2f7a0e" > tips nutrition </a></li>
                                    <li><a href="Food warnings.html" style="font-size: 16px;color: #2f7a0e"> Food warnings </a></li>
				                    <li><a href="food.html" style="font-size: 16px;color: #2f7a0e"> Food Recipes </a></li>
                                </ul>
                            </li>
                            <!--<li><a href="contact-us.html">contact</a></li>-->
                            <!--<li><a href="#">pages</a>
                                <ul class="sub-menu">
                                    <li><a href="service.html">Service</a></li>
                                    <li><a href="elements.html">Elements</a></li>
                                </ul>
                            </li>-->
			      <li><a href="blood.php" style="font-size: 18px;color: #2f7a0e" ;  padding:5px>blood donation</a></li>
                   <li><a href="to_know.html" style="font-size: 18px;color: #2f7a0e" ;  padding:5px> To know </a></li>
				   
                            <li><a href="profile.php"><i class="fa fa-user-circle-o fa-3x " aria-hidden="true"></i></a></i>
				 <li><a href="sign_out.php" class="template-btn" style = "font-size:14px">sign out </a></li>       
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
<!--------------------------------------------------------------------------------------------------------------------------->
    <!-- Banner Area Starts -->
    <section class="banner-area banner-bg about-page text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-text">
                        <h3 id ="word">personal page</h3>
                        <a id ="word2" href="index.html">home</a>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--------------------------------------------------------------------------------------------------------------------------->


  
   <div class="row">
  <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
	
     <!--<a class="list-group-item list-group-item-action active"id="list-Profile-list"   style=" border-color: #ddd;background-color:#2f7a0e;color:white" data-toggle="list" href="#list-Profile" role="tab" aria-controls="Profile"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
     -->
     <button class="btn btn-lg btn-success list-group list-group-item-action" onclick="showProfile()" style=" border-color: #ddd;background-color:#2f7a0e;color:white; padding:20px;"><i class="fa fa-user" aria-hidden="true"> Profile</i> </button>
     <script type="text/javascript">
         function showProfile(){
            $("document").ready(function(){
                $("#list-Profile").show();
                $("#list-Mydiet").hide();
            });
         }
     </script>
     <button class="btn btn-lg btn-success list-group list-group-item-action" onclick="showDiet()" style=" border-color: #ddd;background-color:#2f7a0e;color:white; padding:20px;" ><i class="fa fa-tasks" aria-hidden="true"> My diet </i></button>
     <script type="text/javascript">
         function showDiet(){
            $("document").ready(function(){
                $("#list-Mydiet").show();
                $("#list-Profile").hide();
            });
         }
     </script>
    </div>
  </div>
  <div class="col-10">
<div class="tab-content" id="nav-tabContent"> 	

<?php
$query="select * from user where userID='$id'";
$result=mysqli_query($conn,$query);
$setUser=mysqli_fetch_assoc($result);

?>
<div class="container">
    
<div class="tab-pane fade show active" id="list-Profile" role="tabpanel" aria-labelledby="list-Profile-list" >   
<div class="container"style="position:absolute;top:1px;left:-25px">
  <div class="panel panel-default">
    <div class="panel-heading"><center>Profile</center></div>
    <div class="panel-body">
    
     <?php echo "<img class='author_img rounded-circle' src='assets/images/avatar/".
     $setUser["image"]."' width='150' height='150'id='a2'>"?>
     
 
     
<table border ="0"style="position:relative;top:-130px;margin-left:270px"> 
<tr>
<td>name : <?php echo $setUser["firstName"];?></td>
</tr>                              

<tr>
<td>e-mail : <?php echo $setUser["email"];?></td>      
</tr>

<tr>
<td>Age : <?php echo $setUser["age"];?></td>      
</tr>


<tr>
<td>weight : <?php echo $setUser["weight"];?></td>      
</tr>

<tr>
<td>height : <?php echo $setUser["height"];?></td>      
</tr>

</table> 
  

  
<button onclick="show()">Edit</button>
<script type="text/javascript">
    function show(){
        $("document").ready(function(){
            $("#UpdateForm").show(1000);
            
        });
    }
    function hide(){
        $("document").ready(function(){
            $("#UpdateForm").hide(1000);
        });
    }
</script>
<button onclick="hide()">close</button>         
                                
<div id="UpdateForm">
    <div class="card-title">
        <h3 class="text-center">Update Information</h3>
    </div>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label  class="control-label mb-1">First Name</label>
            <input id="cc-payment" name="fname" type="text" class="form-control" value='<?php echo $setUser["firstName"];?>'style="border-radius: 30px;">
        </div>
        <div class="form-group has-success">
            <label class="control-label mb-1">Email</label>
            <input id="cc-name" name="email" type="email" class="form-control cc-name valid" value='<?php echo $setUser["email"];?>' style="border-radius: 30px;">
            
        </div>
        <div class="form-group has-success">
            <label class="control-label mb-1">Age</label>
            <input id="cc-name" name="age" type="text" class="form-control cc-name" value='<?php echo $setUser["age"];?>' style="border-radius: 30px;">
            
        </div>
        <div class="form-group">
            <label class="control-label mb-1">Password</label>
            <input id="cc-number" name="pass" type="password" class="form-control" value='<?php echo $setUser["password"];?>'style="border-radius: 30px;">
            
        </div>
        <div class="form-group">
            <label class="control-label">Gender</label>
            <br>
        <select class="form-control" name="gender" id="gender" style="border-radius: 30px;">
            <?php
               if($setUser["gender"]=="female"){
                echo '<option value="female" selected>female</option>';
               }
               else if($setUser["gender"]=="male"){
                echo '<option value="male" selected>male</option>';
               }
            ?>
         </select>

         </div>
        <br><br>
        <div class="form-group">
        <label class="control-label">Weight</label>
        <input class="form-control" type="number" name="weight" min="0" max="200" value='<?php echo $setUser["weight"];?>'style="border-radius: 30px;">
        </div>

        <div class="form-group wrap-input100">
        <label class="control-label">Height</label>
        <input class="form-control"type="number" name="height" min="0" max="300" value='<?php echo $setUser["height"];?>' style="border-radius: 30px;">
        </div>
        <div class="form-group">
            <label class="control-label">Choose a personal picture :</label>
            <input type="file" name="img" class="form-control" style="border-radius: 30px;">
        </div>
        <div class="form-group">
             <span style="font-size:18px ">
        <?php
        if($setUser["ownTable"]=="pregnant"){
          echo '<div id="ForFemale">
                 <input  type="radio" name="c" value="pregnant" checked="true"> are you pregnant and breastfeeding ? <br>
                </div>';

          echo '<input  type="radio"  name="c" value="anemia"> Do you suffer from anemia? <br>';

          echo '<input  type="radio" name="c"  value="diet based"> I would like to use a diet based on my weight.<br>';

           echo '<input  type="radio" name="c"  value="steady diet">   I want to use a steady diet . <br>';

           echo '<input  type="radio" name="c"  value="dieting with someone"> Are you dieting with someone else?';
        }
        elseif($setUser["ownTable"]=="anemia"){
          echo '<div id="ForFemale">
                 <input  type="radio" name="c" value="pregnant"> are you pregnant and breastfeeding ? <br>
                </div>';

          echo '<input  type="radio"  name="c" value="anemia" checked="true" > Do you suffer from anemia? <br>';

          echo '<input  type="radio" name="c"  value="diet based"> I would like to use a diet based on my weight.<br>';

          echo '<input  type="radio" name="c"  value="steady diet">   I want to use a steady diet . <br>';

          echo '<input  type="radio" name="c"  value="dieting with someone"> Are you dieting with someone else?';
        }
        elseif($setUser["ownTable"]=="diet based"){
          echo '<div id="ForFemale">
                 <input  type="radio" name="c" value="pregnant"> are you pregnant and breastfeeding ? <br>
                </div>';

          echo '<input  type="radio"  name="c" value="anemia"> Do you suffer from anemia? <br>';

          echo '<input  type="radio" name="c"  value="diet based" checked="true"> I would like to use a diet based on my weight.<br>';

          echo '<input  type="radio" name="c"  value="steady diet">   I want to use a steady diet . <br>';

          echo '<input  type="radio" name="c"  value="dieting with someone"> Are you dieting with someone else?';
        }
        elseif($setUser["ownTable"]=="steady diet"){
          echo '<div id="ForFemale">
                 <input  type="radio" name="c" value="pregnant"> are you pregnant and breastfeeding ? <br>
                </div>';

          echo '<input  type="radio"  name="c" value="anemia"> Do you suffer from anemia? <br>';

          echo '<input  type="radio" name="c"  value="diet based"> I would like to use a diet based on my weight.<br>';

          echo '<input  type="radio" name="c"  value="steady diet" checked="true">I want to use a steady diet . <br>';

          echo '<input  type="radio" name="c"  value="dieting with someone"> Are you dieting with someone else?';
        }
        elseif($setUser["ownTable"]=="dieting with someone"){
          echo '<div id="ForFemale">
                 <input  type="radio" name="c" value="pregnant"> are you pregnant and breastfeeding ? <br>
                </div>';

          echo '<input  type="radio"  name="c" value="anemia"> Do you suffer from anemia? <br>';

          echo '<input  type="radio" name="c"  value="diet based"> I would like to use a diet based on my weight.<br>';

          echo '<input  type="radio" name="c"  value="steady diet">I want to use a steady diet . <br>';


          echo '<input  type="radio" name="c"  value="dieting with someone" checked="true"> Are you dieting with someone else?';
        }
        else{
          echo '<div id="ForFemale">
                 <input  type="radio" name="c" value="pregnant" checked="true"> are you pregnant and breastfeeding ? <br>
                </div>';

          echo '<input  type="radio"  name="c" value="anemia"> Do you suffer from anemia? <br>';

          echo '<input  type="radio" name="c"  value="diet based"> I would like to use a diet based on my weight.<br>';

           echo '<input  type="radio" name="c"  value="steady diet">   I want to use a steady diet . <br>';

           echo '<input  type="radio" name="c"  value="dieting with someone"> Are you dieting with someone else?';
        }
        ?>

             </span>
        </div>
        <br>
        <div>
            <button  type="submit" class="btn btn-lg btn-success btn-block" name="update">      
                Save                                       
            </button>
        </div>
    </form>
  </div>
</div>
<footer class="footer-area footer section-padding" style=" background: -webkit-gradient(
            linear, center top, center bottom,
             color-stop(15%, #f2f2f2),
        color-stop(40%, #7af5ab),
        color-stop(60%, #60f558),
        color-stop(80%, #13b00b),
            color-stop(98%, #137005) );">
        
        <table border=0>
           <tr>
            <th>about us</th>
            <th>contact us</th>
            
            </tr>
            <tr>
            <td><center>You can trust us, with us for a better lifestyle, thank you for choosing</center></td>
            <td style="padding-left: 60px">If you want to inquire about something that does not hesitate you can
                contact us via the following numbers
                <br> <br>
            </td>
            </tr>
            <tr>
             <td></td>
             <td>
              <center>
                <span>
                078 2582580
                </span><br>
                <span>
                079 2581476
                </span></center>
              
             </td>
            </tr>
        </table></footer>
      

    <!-- Footer Area End -->
  
         </div>
        </div>
<div id="myDIV">

</div>   
  
</div>
<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $("document").ready(function(){
            $("#list-Profile").show();
            $("#list-Mydiet").hide();
            $("#UpdateForm").hide();
            $("#ForFemale").hide();
            $("select").find("option:selected").each(function(){
                var optionSelected = $(this).attr("value");
                if(optionSelected=="female"){
                    $("#ForFemale").show(1000);
                }
                else if(optionSelected=="male"){
                    $("#ForFemale").hide(1000);
                }
            });
            $("#Show").click(function(){
               $("#UpdateForm").show();
            });
            $("#Hide").click(function(){
                $("#UpdateForm").hide();
            });

            $("#Schedule1,#Schedule2,#Schedule3,#Schedule4").hide();
            $("#first").click(function(){
                $("#Schedule1").slideToggle(500);
            });
            $("#second").click(function(){
                $("#Schedule2").slideToggle(500);
            });
            $("#third").click(function(){
                $("#Schedule3").slideToggle(500);
            });
            $("#fourth").click(function(){
                $("#Schedule4").slideToggle(500);
            });
        });
    </script>
    </div>
  </div>

<div class="tab-pane " id="list-Mydiet" role="tabpanel">   
<div class="container"style="position:absolute;top:1px;left:-25px">
  <div class="panel panel-default">
    <div class="panel-heading"><center>My diet</center></div>
    <div class="panel-body">

        
<div class="col-lg-12">
                        
<ul class="unordered-list" style="color:black;font-size:22px"> 



<li><a href="#a1" id="first">The first week</a><br>
<div id="Schedule1">
    <?php
    include "php/Schedule1.php";     
    ?>
</div></li>
<!-- end Schedule1------------------------------------------------------------------------------------------------------->
<li><a href="#a2" id="second" >second week</a><br>
<div id="Schedule2">
    <?php
    include "php/Schedule2.php";
    ?>
</div></li>
<!-- end Schedule2------------------------------------------------------------------------------------------------------->
<li><a href="#a3" id="third" >the third week</a><br>
<div id="Schedule3">
<?php
include "php/Schedule3.php"; 
?>
</div></li>
<!-- end Schedule3------------------------------------------------------------------------------------------------------->
<li><a href="#a4" id="fourth">Fourth and last week</a><br>
<div id="Schedule4">
    <?php
    include "php/Schedule4.php";
    ?>
</div></li>           
<!-- end Schedule4------------------------------------------------------------------------------------------------------->   
<br><br>
</ul>


    <table border="2" style="margin-left: -20px" class="times">
     <tr>
      <th id="th">meal</th>
      <th>time</th>
      
     </tr>
     <!-------row 2 -->
     <tr>
      <td>breakfast</td>
      <td>  7:00 am - 9:00 am</td>
     </tr>
     <!-------row 3 -->
     <tr>
      <td>snake</td>
      <td>10:00 am - 11:00 am </td>
     </tr>
     <!-------row 4 -->
     <tr>
      <td>lunch</td>
      <td>3:00 pm - 5:00 pm </td>
     </tr>
     <!-------row 5 -->
     
     <tr>
      <td>snake</td>
      <td>6:00 am - 7:00 am </td>
     </tr>
     <!-------row 6 -->
     <tr>
      <td>dinner</td>
      <td>8:00 am - 9:00 am </td>
     </tr>
     
    </table>
   </div>
   
   
   
    <div class="row justify-content-center">
                <div class="table-wrap col-lg-10">
                <b>tables</b>
                </div></div>
   
   
</div>

   
   

    <!-- Footer Area Starts -->
  <footer class="footer-area footer section-padding" style=" background: -webkit-gradient(
            linear, center top, center bottom,
             color-stop(15%, #f2f2f2),
        color-stop(40%, #7af5ab),
        color-stop(60%, #60f558),
        color-stop(80%, #13b00b),
            color-stop(98%, #137005) );">
        
        <table border=0>
           <tr>
            <th>about us</th>
            <th>contact us</th>
            
            </tr>
            <tr>
            <td><center>You can trust us, with us for a better lifestyle, thank you for choosing</center></td>
            <td style="padding-left: 60px">If you want to inquire about something that does not hesitate you can
                contact us via the following numbers
                <br> <br>
            </td>
            </tr>
            <tr>
             <td></td>
             <td>
              <center>
                <span>
                078 2582580
                </span><br>
                <span>
                079 2581476
                </span></center>
              
             </td>
            </tr>
        </table></footer>
      

    <!-- Footer Area End -->
   
   

                  

</div><!--end panel add-->
</div><!--end  container add-->
</div><!--end paneltab add-->
</div>               
 
















<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>

    </div>
  </div>

</div>
</div>        
</div>

    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	  <script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="assets/js/vendor/gmaps.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>

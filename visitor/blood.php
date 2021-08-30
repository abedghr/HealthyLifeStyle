<?php
$conn=mysqli_connect("localhost","root","")
      or die("Could Not Connecnt");
         
$db=mysqli_select_db($conn,"healthylifestyle");
if(isset($_POST["submit"])){
    $fname=$_POST["first_name"];
    $sname=$_POST["second_name"];
    $lname=$_POST["last_name"];
    $email=$_POST["email"];
    $gender=$_POST["gender"];
    $age=$_POST["age"];
    $weight=$_POST["weight"];
    $tel=$_POST["telephone"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $hospital=$_POST["hospital"];
    $disease=$_POST["disease"];

    $checkQuery = "SELECT email From user where email='$email'";
    $checkRes   = mysqli_query($conn , $checkQuery);
    $count = mysqli_num_rows($checkRes);
    if($count == 0){

        $data = mysqli_fetch_assoc($checkRes);
        $em = $data["email"];

        $query="insert into blooddonation 
        (firstName,secondName,lastName,email,gender,age,weight,telephone,address,city,hospital,disease)
        values('$fname','$sname','$lname','$email','$gender','$age','$weight','$tel','$address','$city','$hospital','$disease')";
        $res=mysqli_query($conn,$query);
        header("location:blood.php");
    }
    else{
        $query="insert into blooddonation 
        (firstName,secondName,lastName,email,gender,age,weight,telephone,address,city,hospital,disease,FromUsers)
        values('$fname','$sname','$lname','$email','$gender','$age','$weight','$tel','$address','$city','$hospital','$disease','1')";
        $res=mysqli_query($conn,$query);
        header("location:blood.php");
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
    <title>blood donation</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/images/logo/logo3.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="../assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="../assets/fonts/flat-icon/flaticon.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="../assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="../assets/css/nice-select.css">
    <link rel="stylesheet" href="../assets/css/style.css">
<!--===============================================================================================-->
    <link href = 'http://fonts.googleapis.com/css?family=Calligraffitti'
    rel = 'stylesheet' type='text/css'/>

<!----------------------------------------------------------------------------->
<style>
    
.banner-area.about-page{background-image:url("../assets/images/blood/blood8.jpg") !important;
                                    position:relative;
                                    z-index:1}
/*---------------------- the table / in the bottom of the page -----------------------------*/
        th { color:#2f7a0e ;
	    font-size: 25px ;
	      text-align: center ;} 
	td { font-size: 20px ;
	      color: #000 ;
	      padding-left: 50px;
	      padding-right: 50px;}
	td span { color:#2f7a0e ;}
/*------ form-----------------------------------------------------------------------------*/
form .template-btn {background-color: #b30000}
form .template-btn:hover {border-color: #b30000 ;
                     }



</style>	
	
	
	
</head>
<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- -------------- main menu ---------------------------------------------------------------------------- -->
	<header class="header-area main-header">
        <div class="container">
            <div class="row">
      
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="../index.php"><img src="../assets/images/logo1.jpeg" alt="logo" width= 150px height=60px></a>
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
                            <li class="active" ><a href="../index.php"  style="font-size: 20px; color: #2f7a0e">home</a></li>
                            <li><a href="about.html" style="font-size: 20px;color: #2f7a0e">about us</a></li>

                            <li class="menu-btn">
          		     <a href="../Login_v1\login.php" class="template-btn" style="margin-left:250px">sign in </a>
                                <a href="../Login_v1\Register.php" class="template-btn" style="margin-left:10px">sign up </a>
				
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
  

    <!-- ------------ classes for main photo ----------------------------->
    <section class="banner-area banner-bg about-page text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-text">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    
    
    <!-- Start Align Area -->
   
           
            
          
<br><br><br>	    
<!--------------------------------------------- form -------------------------------------------------------------->
           <img src="../assets/images/blood/blood1.jpg" alt = "photo" style="margin-top: -280px">
	    	<video controls style="margin-left:100px ; margin-top: 0px" height="300" width="500">

            <source src="../assets/images/blood/blood0.mp4"type="video/mp4"></source>

           </video>
	    
	    <br><br><br><br>
<!------------------------------- form ------------------------------------------------->
	    
            <div class="section-top-border">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h3 class="mb-30 title_color" style="text-align: center ;
                    font-family: Calligraffitti ;
		    color: #ce0000 ;
		    font-size: 30px ;
		    letter-spacing: 5px;
		    word-spacing: 15px;" >Form Blood Donation </h3>
			
                        <form action="#" method="post">
                            <div class="mt-10">
                                <input type="text" name="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input">
                            </div>
                            <div class="mt-10">
                                <input type="text" name="second_name" placeholder="Second Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Second Name'" required class="single-input">
                            </div>
                            <div class="mt-10">
                                <input type="text" name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
                            </div>
                            <div class="mt-10">
                                <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required class="single-input">
                            </div>
                            <div class="mt-10">&nbsp;&nbsp;
                             <input  type="radio"  name="gender" value="male" > Male
                             <input  type="radio" name="gender"  value="female"> Female <br>
                            </div>    

                <div class="mt-10">
                                <input type="text" name="age" placeholder="age" onfocus="this.placeholder = ''" onblur="this.placeholder = 'age'" required class="single-input">
                            </div>
                <div class="mt-10">
                                <input type="text" name="weight" placeholder="weight" onfocus="this.placeholder = ''" onblur="this.placeholder = 'weight'" required class="single-input">
                            </div>
                 <div class="mt-10">
                                <input type="text" name="telephone" placeholder="telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'telephone'" required class="single-input">
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                <input type="text" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required class="single-input">
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                                <div class="form-select" id="default-select">
                                    <select name="city">
                                    <option >city</option>
                                        <option value="zarqaa">zarqaa</option>
                                        <option value="Amman">Amman</option>
                                        <option value="Jerash">Jerash</option>
                                        <option value="Jerash">Jerash</option>
                                        <option value="Ajloun">Ajloun</option>
                                        <option value="Mafraq">Mafraq</option>
                                        <option value="Madaba">Madaba</option>
                                        <option value="Tafila">Tafila</option>
                                        <option value="Karak">Karak</option>
                                        <option value="Irbid">Irbid</option>
                                        <option value="Aqaba">Aqaba</option>
                                        <option value="Salt">Salt</option>
                     
                                    </select>
                    
                                </div>
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                                <div class="form-select" id="default-select2">
                                    <select name="hospital">
                                        <option value="name of the hospital">name of the hospital</option>
                                        <option value="Zarqa Modern Hospital">Zarqa Modern Hospital
                                        </option>
                                        <option value="Prince Hamzah Hospital">Prince Hamzah Hospital
                                        </option>
                                        <option value="Prince Faisal Hospital">Prince Faisal Hospital
                                        </option>
                                        <option value="Isra Hospital">Isra Hospital</option>
                                        <option value="Islamic Hospital">Islamic Hospital</option>
                                    </select>
                                </div>
                            </div>
                





                            
                            <div class="mt-10">
                                <textarea class="single-textarea" name="disease" placeholder="Please if you suffer from any disease, tell us" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your feedback .. Please if you suffer from any disease, tell us'" required></textarea>
                            </div>
                                  <center><input class="template-btn" type="submit" name="submit"
                                   value="submit"></center>
                        </form>
			</div>
		    

		    
		    
<!------------------------------------------ the div on the left ------------------------------------------------------------------>
                    
                    <div class="col-lg-3 col-md-4 mt-sm-30 element-wrap" style="background-color: #e8e8e8">
                        <div class="single-element-widget">
			    <br><br>
                         <img src="../assets/images/blood/blood3.jpg" alt="photo" style="margin-left: 10px">
                     <p style="color: black"><br><br><span style="color: red">People who can donate blood</span>
                       <br> "Age 17-70 years, weight> 50 Kg, donation interval,
			minimum 12 weeks, donations / year, max, 3 donations."</p>

                    <p style="color: black"><span style="color: red">People who are prevented from making a donation</span>
                          <br>Pregnant and lactating women, cardiac patients, respiratory patients, daily insulin
			  users, “diabetics”, chronic kidney patients<br><br>
                        </p>
            </div>
        </div>
    </div>
<!--------Image Gallery---------------------------------------------------------------------------------------------->
	 <br><br><br>
	  <div class="section-top-border">
                <h3 class="title_color" style="text-align: center ;
                    font-family: Calligraffitti ;
		    color: #ce0000 ;
		    font-size: 30px ;
		    letter-spacing: 5px;
		    word-spacing: 15px;">Image Gallery</h3>
                <div class="row gallery-item">
                    <div class="col-md-4">
                        <a href="../assets/images/blood/blood4.jpg" class="img-gal">
			    <div class="single-gallery-image" style="background: url(../assets/images/blood/blood4.jpg);"></div></a>
                    </div>
		    
		    <div class="col-md-4">
                        <a href="../assets/images/blood/blood11.jpg" class="img-gal">
			    <div class="single-gallery-image" style="background: url(../assets/images/blood/blood11.jpg);"></div></a>
                    </div>
		    
                    <div class="col-md-4">
                        <a href="../assets/images/blood/blood9.jpg" class="img-gal">
			    <div class="single-gallery-image" style="background: url(../assets/images/blood/blood9.jpg);"></div></a>
                    </div>
		    
		    
		    
                    
		    <!------------------------- picture 4 ------------------------------------------>
                    <div class="col-md-6">
                        <a href="../assets/images/blood/blood7.jpg" class="img-gal">
			    <div class="single-gallery-image" style="background: url(../assets/images/blood/blood7.jpg);"></div></a>
                    </div>
                    <div class="col-md-6">
                        <a href="../assets/images/blood/blood5.jpg" class="img-gal">
			    <div class="single-gallery-image" style="background: url(../assets/images/blood/blood5.jpg);"></div></a>
                    </div>
		    <!-------------------------------------------------------------------------------->
                      <div class="col-md-4">
                        <a href="../assets/images/blood/blood12.jpg" class="img-gal">
			    <div class="single-gallery-image" style="background: url(../assets/images/blood/blood12.jpg);"></div></a>
                    </div>
		    <div class="col-md-4">
                        <a href="../assets/images/blood/blood10.jpg" class="img-gal">
			    <div class="single-gallery-image" style="background: url(../assets/images/blood/blood10.jpg);"></div></a>
                    </div>
                  
                    <div class="col-md-4">
                        <a href="../assets/images/blood/blood13.jpg" class="img-gal">
			    <div class="single-gallery-image" style="background: url(../assets/images/blood/blood13.jpg);"></div></a>
                    </div>
                </div>
            </div>	    
		    
		
		
		
 <!-------------------------------------------------------------------------------------->
<br><br><br><br><br>
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


    <!-- Javascript -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="../assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="../assets/js/vendor/wow.min.js"></script>
    <script src="../assets/js/vendor/owl-carousel.min.js"></script>
    <script src="../assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="../assets/js/vendor/gmaps.min.js"></script>
    <script src="../assets/js/main.js"></script>


</body>
</html>

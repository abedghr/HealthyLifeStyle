<?php
 $conn=mysqli_connect("localhost","root","")
    or die("Could not Connect");
    $db=mysqli_select_db($conn,"healthylifestyle");
    $query3="SELECT feedback.* , user.firstName , user.email from feedback 
    INNER JOIN user ON user.userID = feedback.userID where agreeFeedback='1'";
    $result=mysqli_query($conn,$query3);
    $setFeed = array();
    while($rows= mysqli_fetch_assoc($result)){
        $setFeed[]=$rows;
    }

    if(isset($_POST["send"])){
        
        $query="select firstName,email from user where userID='$userID'";
        $result=mysqli_query($conn,$query);
        $setUser=mysqli_fetch_assoc($result);

        $opinon=$_POST["feedback"];
        
        $userName=$setUser["firstName"];
        $email=$setUser["email"];
    
        $query22="insert into feedback(userID,opinon,agreeFeedback)
              values('$userID','$opinon','0')";
        mysqli_query($conn,$query22);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href = 'http://fonts.googleapis.com/css?family=Calligraffitti'
         rel = 'stylesheet' type='text/css'/>

    <!-- Page Title -->
    <title>About Us</title>

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
	
	<style>
	
/*---------------- the fisrt photo ----------------------------------*/
#word {color :#2f7a0e;
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
/*---------------- table Starts --------------*/
        th { }
	      
	td { font-size: 20px ;
	      color: #000000 ;
	      padding-left: 50px;
	      padding-right: 50px;}
	td span { color:#2f7a0e ;}
/*------------- the paraghraph -------------------*/

	 /*#skew1 { -webkit-animation: skew 7s infinite linear;}*/
	 
	 @-webkit-keyframes skew 
         {
            from { -webkit-transform: skewX(0deg); }
            25% { -webkit-transform: skewX(30deg); }
            50% { -webkit-transform: skewX(0); }
            75% { -webkit-transform: skewX(-30deg); }
            to { -webkit-transform: skewX(0); }
         }
	 
	#brief {font-size: 18px ;
	         }
	
	#brief:hover {font-size: 20px;
	               color: #2f7a0e ;}
		       
	.img-fluid {position: relative ;
	            top: 100px ;
		        left: 70px ;
		    box-shadow: 10px 10px 35px #0e010c ;
            -webkit-animation: movingimage linear 10s 1s infinite alternate;}
	    
	@-webkit-keyframes movingimage 
         {
            0%   {opacity: 0; left: 0px; top: 0px;}
            25%  {opacity: 1; left: 0px; top: 50px;}
            50%  {opacity: 0; left: 0px; top: 100px;}
            75%  {opacity: 1; left: 0px; top: 50px;}
            100% {opacity: 0; left: 0px; top: 0px;}
         }    
/*------------------------ faedback ------------------------*/
    	   
.feadback { 
              position: relative ;
	      top: 100;
	      left: 10px ;
	      padding-left: 50px ;
	      }		       
		 
.red {color: red ; }
.blue {color: blue}

#field_1 {position: absolute ;
          top: -470px;
	  left: 190px;
	  margin-left: 100px;
          
         width: 380px ;
	 height: 60px;}
	 
#field_2 {position: absolute ;
          top: -370px;
	  margin-left: 100px;
	  height: 200px ;
	  width: 750px}
	  
#button {position: absolute ;
          top: -120px;
	  height: 60px ;
	  width: 300px;
	  margin-left: 350px;
	  background-color: #3737ff ;
	  font-size : 25px ;
	  color : white  ;
	  text-align: center ;
	  text-height: max-size ;
	  font-family: Calligraffitti ;
	  letter-spacing: 20px;
	  
	  
	  }
/*-- Unsuccessful 5-star website evaluation experience
.s1 , .s2 , .s3 , .s4 , .s5 {
position:relative ;

    
}
.s1 {left: -150px ;top: -375px;}

.s2 {left: -100px ;top: -425px; }

.s3 {left: -50px ;top: -475px; }

.s4 {left: 0px ;top: -525px; }

.s5 {left: 50px ;top: -575px; }*/


     </style>	
	
</head>
<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
	<header class="header-area main-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a><img src="../assets/images/logo1.jpeg" alt="logo"  width= 150px height=60px></a>
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
                            <li class="active" ><a href="../index.php" style="font-size: 20px; color: #2f7a0e">home</a></li>
                         
                         
                          
			      <li><a href="blood.php" style="font-size: 20px;color: #2f7a0e">blood donation</a></li>
                            <li class="menu-btn">
                                <a href="../Login_v1\login.php" class="template-btn" style="margin-left:200px">sign in </a>
                                <a href="../Login_v1\Register.php" class="template-btn" style="margin-left:10px">sign up </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
<!-------------------------------------------------------------------------------------------------------------->
    <!-- Banner Area Starts -->
    <section class="banner-area banner-bg about-page text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-text">
                        <h3 id="word">about us</h3>
                        <a href="index.html" id="word2">home</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->


    <!-- About Area Starts -->
     <section class="about-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center mb-5 mb-lg-0">
                    <h3 id ="skew1"> WELCOME TO OUR website life  quality and well being </h3>
                    <p  id="brief" >Our site provides nutition tips, nutition warnings,
					sports tips and a lifestyle and is distinguished in the site that there is a diet that 
					fits and covers most cases, namely the weight system under 80, the weight system over 80,
					a system for children, a system for pregnant women, a system for breastfeeding, a system 
					for patients with anemia Blood, a system for all weights and a system for those who suffer
					from underweight and all that based on the weight mass index and will be given a table for
					each user according to his condition and tips and cautions needed and put tips on the way 
					of the question and answer, there will be a subscription and login And feedback.</p>
                
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <img class="img-fluid" src="../assets/images/ph5.jpeg" alt="" width="5500px" height="9500px">
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->
<!------------------------------------------------------------------------------------------------------------------------------->
<!--<hr style="  border-style: solid ; border-width: thin "  >-->
<hr style="border-style: solid  ; border-width: thin" >
<hr style=" border-style: solid ; border-width: thin">
<!-----------------------------------------------the faed back-------------------------------------------->


      <!-- Client Area Starts -->
    <section class="client-area section-padding">
        <div class="container">
          
           
                    <div class="section-top text-center">
                        <h3 style="color: #2f7a0e ; font-family: Calligraffitti ; letter-spacing: 10px ; font-size: 40px"><strong>Feedback</strong></h3>
                    </div>
       
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="client-slider owl-carousel">
                        <?php
                        foreach ($setFeed as $s) {
                            echo '<div class="single-slide d-flex" style="color: #2f7a0e ; -webkit-box-shadow:1px 1px 5px #2f7a0e; height:250px;">';
                            $query4="select image from user where userID = {$s['userID']}";
                            $res=mysqli_query($conn,$query4);
                            $setImage=mysqli_fetch_assoc($res);
                            echo '<div class="slide-img mr-4">
                                  <img src="../assets/images/avatar/'.$setImage["image"].'" alt="personn_photo">
                                  </div>';
                            echo " <div class='slide-text'>
                                <h6><strong>{$s['firstName']}</strong></h6>
                                <p>{$s['opinon']} .
                                </p>
                                <!--<h5>danyel yarde</h5>-->
                                <!--<h6>CEO & founder</h6>-->
                                </div>
                                </div>";
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
  
<br>
<!--<hr style="  border-style: solid ; border-width: thin "  >-->
<hr style="border-style: solid  ; border-width: thin" >
<hr style=" border-style: solid ; border-width: thin">
    <br><br><br><br>
    
    
<!------------------------------------------------ your feadback------------------------------------------------>




<!------------------------------------------- the bar ------------------------------------------------------------------------------------------>
    <!-- Footer Area Starts -->
    <footer class="footer-area section-padding" style=" background: -webkit-gradient(
            linear, center top, center bottom,
             color-stop(15%, #ffffff),
	    color-stop(40%, #7af5ab),
	    color-stop(60%, #60f558),
	    color-stop(80%, #13b00b),
            color-stop(98%, #137005) );"> <!-- for light color -->
 <!-- <footer class="footer-area footer section-padding">-->
		
		<table border=0>
		    <tr>
			<th style="color:#2f7a0e ;font-size: 25px ; text-align: center ;">about us</th>
			<th style="color:#2f7a0e ;font-size: 25px ; text-align: center ;">contact us</th>
			
		    </tr>
		    <tr>
			<td><center>You can trust us, with us for a better lifestyle, thank you for choosing</center></td>
			<td style="padding-left: 60px"><br>If you want to inquire about something that does not hesitate you can
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
		</table>
      
    </footer>
    <!-- Footer Area End -->
<!----------------------------------------------------------------------------------------------->

    <!-- Javascript -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="../assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="../assets/js/vendor/wow.min.js"></script>
    <script src="../assets/js/vendor/owl-carousel.min.js"></script>
    <script src="../assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="../assets/js/main.js"></script>


</body>
</html>

<?php 

session_start();
if(isset($_SESSION['userID'])){
  header("location:home.php");
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>healthy life style</title>

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
	
     <style>
	  
/*---------------------- the table / in the bottom of the page -----------------------------*/
        th { color:#2f7a0e ;
	    font-size: 25px ;
	      text-align: center ;} 
	td { font-size: 20px ;
	      color: #000 ;
	      padding-left: 50px;
	      padding-right: 50px;}
	td span { color:#2f7a0e ;}
/*--------------------------- the first paragraph -------------------------------*/
	/*#title {-webkit-animation: skew 20s infinite linear;}*/
	
	@-webkit-keyframes skew 
         {
            from { -webkit-transform: skewX(0deg); }
            25% { -webkit-transform: skewX(30deg); }
            50% { -webkit-transform: skewX(0); }
            75% { -webkit-transform: skewX(-30deg); }
            to { -webkit-transform: skewX(0); }
         }
	
	#brief {font-size: 18px ;
	         -webkit-transition: 1s ease-out ;}
	
	#brief:hover {font-size: 22px;
	               color: #a60053 ;}
		       
	.img-fluid {position: relative ;
	            top: 100px ;
		        left: 70px ;
		    box-shadow: 10px 10px 35px #0e010c ;
		     -webkit-animation: movingimage linear 10s 1s infinite alternate;
		    width=5500px ;
		    height=9500px;}
		     
		    
	@-webkit-keyframes movingimage 
         {
            0%   {opacity: 0; left: 0px; top: 0px;}
            25%  {opacity: 1; left: 0px; top: 50px;}
            50%  {opacity: 0; left: 0px; top: 100px;}
            75%  {opacity: 1; left: 0px; top: 50px;}
            100% {opacity: 0; left: 0px; top: 0px;}
         }
	 

/*---------------------------- the calculate part ----------------------------------*/
	.bmi-img2 {position: relative ;
	            top: 20px ;
		    left: 20px ;
		    }
	.bmi-img3 {position:absolute ;
	            top: 20px ;
		    left: 34px ;
		    -webkit-transition: opacity 1s ease-in-out ;}
	.bmi-img3:hover {opacity: 0;}
	
/*--------------------------- the blog part / the diet part -------------------------------------------------------*/
         h1 {color: #dadada ;}
	 
	#tips1 {font-size: 16px ;-webkit-transition: 0.25s ease-out ; }
		 
	 #tips2 {font-size: 16px ;-webkit-transition: .25s ease-out ;}
	 
	 #tips3 {font-size: 16px ;-webkit-transition: .25s ease-out ;}
	 
	 #tips1:hover {font-size: 20px;
	                 color: #2f7a0e ;
			 font-family: cursive sans-serif ;
			 
			 }
			 
	 #tips2:hover {font-size: 20px;
	                 color: #2f7a0e ;
			 font-family: cursive sans-serif ; 
			 }
			 
	 #tips3:hover {font-size: 20px;
	                 color: #2f7a0e ;
			 font-family: cursive sans-serif ; 
			 }
	 
	 
/*----------------------------- flexbox------------------------------------------*/
    .flexbox
    {
        width: 1250px;
        height: 600px;
        display: -webkit-box;
        -webkit-box-orient: horizontal;
        box-orient: horizontal;
        overflow:auto;
    }

         .flexbox > div

         {
            -webkit-transition: 1s ease-out;
            transition: 1s ease-out;
            -webkit-border-radius: 10px;
            border-radius: 20px;
            border: 2px solid black;
            width: 250px;
	    height: 500px;
            margin: 10px -10px 10px 0px;
            padding: 20px 20px 20px 20px;
            box-shadow: 10px 10px 20px dimgrey;
	    font-size: 16px ;
	    color: #2f7a0e
	    
	    
         }
         .flexbox > div:nth-child(1){ background-color: lightgrey; }
         .flexbox > div:nth-child(2){ background-color: lightgrey; }
         .flexbox > div:nth-child(3){ background-color: lightgrey; }
         .flexbox > div:nth-child(4){ background-color: lightgrey; }

         .flexbox > div:hover { 
            width: 360px; color: white; font-weight: bold; font-size: 20px }
         .flexbox > div:nth-child(1):hover { background-color:#842b55;  }
         .flexbox > div:nth-child(2):hover { background-color: #cd1237; }
         .flexbox > div:nth-child(3):hover { background-color: #0e7a21; }
         .flexbox > div:nth-child(4):hover { background-color: #d18a05; }
	 #d1:hover {background-color: #0f6a88; }
	 #d2:hover {background-color: #ff8080; }
	 #d3:hover {background-color: #666666; }
	 #d4:hover {background-color: #666600; }
	 #par{ height: 250px; overflow: hidden; font-family: "Rosario" ; }
	
	
/*------------------------------------------------------------------------*/
	 
     </style>
         <script>
        var val1 ;
        var val2 ;
         
        function start(){
            // document.writeln( " welcome ^_^ ");
	    
	    //------------------- date and time -------------------------
	    
	    var date = document.getElementById("date");
            var time = document.getElementById("time");
            var d = new Date();
           date.setAttribute("value" , d.getDay()+ " - " + (d.getMonth()+1) + " - " + d.getFullYear() );
	    time.setAttribute("value" , d.getHours()+" : " + d.getMinutes() + " : " + d.getSeconds() );
            
	    
	    
           //----------- BMI-------------------------------------------   
            var bt = document.getElementById("button");
            
            bt.addEventListener("click",bmi,false);
            
            var r = document.getElementById("result");
            r.setAttribute("value" , 0)
	    
           
	    

	    
        }
         
        function bmi(){
            
            val1=parseInt(document.getElementById("value1").value)  ;
            val2=parseInt(document.getElementById("value2").value) ;
           
            var r = document.getElementById("result");
	    var r2 = document.getElementById("result2") ; 
	    var bmi = val1/((val2/100) * (val2/100));
            r.setAttribute("value" ,bmi )
    
//---------------- the souce of these numbers is -----> https:// m.marefa.org 
    
	    if ( bmi < 16.5)
	    r2.setAttribute("value" , "you are severely uderwight");
	    else if (bmi >= 16.5 && bmi <=18.4 )
	    r2.setAttribute("value" , "you are uderwight");
	    else if (bmi >= 18.5 && bmi <=24.9 )
	    r2.setAttribute("value" , "you weight is normal ");
	    else if (bmi >= 25 && bmi <=30 )
	    r2.setAttribute("value" , "you are overwight ");
	    else if (bmi >= 30.1 && bmi <=34.9 )
	    r2.setAttribute("value" , " First-class obesity");
	    else if (bmi >= 35 && bmi <=40 )
	    r2.setAttribute("value" , "Second-class obesity");
	    else if (bmi >40 )
	    r2.setAttribute("value" , "Third-class obesity ");
	    
	    
            }//end function
         
        window.addEventListener("load",start,false);
        
    </script>

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
                        <a><img src="assets/images/logo1.jpeg" alt="logo" width= 150px height=60px></a>
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
                            
                            <li><a href="visitor/about.php" style="font-size: 20px;color: #2f7a0e">about us</a></li>
			    <li><a href="visitor/blood.php" style="font-size: 20px;color: #2f7a0e">blood donation</a></li>
			    <li class="menu-btn">
			     <a href="Login_v1/login.php" class="template-btn" style="margin-left:200px">sign in </a>
                                <a href="Login_v1/Register.php" class="template-btn" style="margin-left:10px">sign up </a>
				
                            </li>
                        </ul>
                    </div>
                </div>
	
            </div>
	   
        </div><!-- the date of entry  -->
	<form action="#" style="position: absolute ; top:120px ; left: -40px">
		        <label ><input  size="10" type="text" id="date" style=" padding-left:15px " readonly></label>
			<label ><input  size="8" type="text" id="time" style=" padding-left:15px " readonly></label>
			<p style="padding-left: 30px">Time and Date of entry </p>
	    </form>
    </header>
		
    <!-- Header Area End -->
<!-------------------------------- words on the main photo ------------------------------------------------------->
   
    
    <section class="banner-area banner-bg">
      
        <div class="container">
	 
            <div class="row">
	    
                <div class="col-xl-6 offset-xl-6 col-lg-7 offset-lg-5">
		 
                    <div class="banner-text">
                        <h1 style="color:#000">life </h1> 
                          <h2 style="color:#000"> quality <br>and <br><span style = "color:#fff">well being </span></h2>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->
<!------------------------------------------------------------------------------------------->
<br><br><br><br>
    <!-- About Area Starts -->
    <section class="about-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center mb-5 mb-lg-0">
                    <h3 id="title">WELCOME TO OUR website life  quality and well being 
</h3>
                    <p  id="brief" style="color: #2f7a0e">Our site provides nutition tips, nutition warnings,
		    sports tips and a lifestyle and is distinguished in the site that there
		    is a diet that fits and covers most cases, namely the weight system under
		    80, the weight system over 80, a system for children, a system for pregnant
		    women, a system for breastfeeding, a system for patients with anemia Blood,
		    a system for all weights and a system for those who suffer from underweight
		    and all that based on the weight mass index and will be given a table for each
		    user according to his condition and tips and cautions needed and put tips on the
		    way of the question and answer, there will be a subscription and login And
		    feedback.</p>
                
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <img class="img-fluid" src="assets/images/ph2.jpg" alt="" width="5500px" height="9500px">
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->
<!------------------------------------------------------------------------------------------------>

        
	<!-- Feature Area Starts -->
    <section class="feature-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top text-center">
                        <h1 style="text-shadow: 3px 3px 15px #64584a;">Our Blog</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature mb-5 mb-lg-0">
                        <div class="feature-img">
                            <img src="assets/images/ph3.jpg" alt="">
                        </div>
                        <div class="feature-footer text-center">
                            <h5>tips nutrition</h5>
                            <p id="tips1">We will give you the most important
			    dietary tips to reach a better health and weight and a healthy
			    lifestyle<br><br><br></p> </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature mb-5 mb-lg-0">
                        <div class="feature-img">
                            <img src="assets/images/ph4.jpg" alt="">

                        </div>
                        <div class="feature-footer text-center">
                            <h5>Food warnings</h5>
                            <p id = "tips2">We will give you common mistakes in food
			    and how to avoid those mistakes until you reach a better life system
			    free of obesity and disease<br></p>   </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature">
                        <div class="feature-img">
                            <img src="assets/images/ph27.jpg" alt="">

                        <div class="feature-footer text-center">
			 <br><br>
                            <h5>Food Recipes</h5>
                            <p id = "tips3">We will put you the most important healthy and delicious
			    recipes that fit with your healthy lifestyle without deprivation
			    and ensure a sense of satiety.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- Feature Area End -->  
	  
	  
<!-- -------------------------------------------------------------------------------------------------->
<br><br><br><br>
          
                
                    <div >
                       <center><h1 style="text-shadow: 3px 3px 15px #64584a;">Our Dite</h1></center> 
                    </div>
<br><br><br>



               <div class = "flexbox">
                   <div><img src = "assets/images/ph8.jpg" alt = "System for all weights" height=150px width=190px
			     style="padding-top: 10px ; padding-left: 10px ; padding-bottom: 20px;">
                       <p>System for all weights: a comprehensive system of all weights and
		       takes into account all differences and without deprivation and with
		       healthy nutrition.
                        </p></div>
                   <div><img src = "assets/images/ph28.jpg" alt = "Weight system for children" height=150px width=180px
			     style="padding-top: 10px ; padding-left: 20px ; padding-bottom: 20px;">
                       <p>Weighing system above 80: If you want a more accurate diet and take into
		       account the differences instead of choosing the system of all weights and weight
		       over 80 I advise you in this system.  </p></div>
                   <div><img src = "../assets/images/ph19.jpeg" alt = "" height=150px width=190px
			     style="padding-top: 10px ; padding-left: 10px ; padding-bottom: 20px;">
                       <p>A diet less than 80: If you want a more accurate diet and take into account
		       the differences rather than choosing a diet of all weights and weight less than
		       80, I recommend this diet.</p></div>
     
                   <div><img src =  "assets/images/ph17.jpeg" height=150px width=190px
			     style="padding-top: 10px ; padding-left: 20px ; padding-bottom: 20px;">
			 <p>Weight system for children: There are children who are obese and
		       do not find anyone to give them advice and Help them in early stages
		       before the problem worsens in our site we offer a diet for children
		       and without deprivation.</p></div>
		   
               </div>
			
   
              <div class = "flexbox">
                   <div id="d1"><img src = "assets/images/ph10.jpg" alt = "System for all weights" height=150px width=190px
			     style="padding-top: 10px ; padding-left: 10px ; padding-bottom: 20px;">
                       <p> Weight system for pregnant and lactating women: A system for
		       breastfeeding and pregnant women while ensuring the growth of your
		       baby and your fetus in full health and without depriving the mother
		       of the necessary food for her and her baby.</p></div>
                   <div id="d2"><img src = "assets/images/ph20.jpg" alt = "Weight system for children" height=150px width=200px
			     style="padding-top: 10px ; padding-left: 10px ; padding-bottom: 20px;">
                       <p>Anemia System: The system of people suffering from anemia and obesity at the
		       same time, we have the solution of a healthy system and without deprivation with
		       our wishes for a speedy recovery for all disease fighters everywhere.</p></div>
                   <div id="d3"><img src = "assets/images/ph21.jpg" alt = "" height=150px width=190px
			     style="padding-top: 10px ; padding-left: 10px ; padding-bottom: 20px;">
                       <p>Keto system: is a diet free of direct and indirect sugar and whether it is
		       fruits or vegetables high carbohydrates, thus treat sugar, pressure, cancer,
		       infections, salts, cysts ovaries and Alzheimer's and stomach germ.</p></div>
     
                   <div id="d4"><img src =  "assets/images/ph22.jpg" height=150px width=190px
			     style="padding-top: 10px ; padding-left: 20px ; padding-bottom: 20px;">
			 <p>Feeding system:  healthy diet and provide enough energy for his movement
			 because the increase in food will cause you many diseases.</p></div>
		   
               </div>
    
<!------------------------------------------------------Service--------------------------------------------------->
  
   <!-- <section class="service-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 offset-xl-7 col-lg-6 offset-lg-6">
                    <div class="section-top">
                        <h3>our service</h3>
                    </div>
                    <div class="single-service d-flex mb-4">
                        <div class="serv-icon mr-4">
                            <img src="assets/images/serv-icon1.png" alt="">
                        </div>
                        <div class="serv-text">
                            <h5>personal training</h5>
                            <p>Two herb creature bearing signs won't void signs eve female every
			    together Thin thiIsnrnyou're every fourth cattle thermal grid line accrose</p>
                        </div>
                    </div>
                    <div class="single-service d-flex mb-4">
                        <div class="serv-icon mr-4">
                            <img src="assets/images/serv-icon2.png" alt="">
                        </div>
                        <div class="serv-text">
                            <h5>boxing training</h5>
                            <p>Two herb creature bearing signs won't void signs eve female every
			    together Thin thiIsnrnyou're every fourth cattle thermal grid line
			    accrose</p>
                        </div>
                    </div>
                    <div class="single-service d-flex">
                        <div class="serv-icon mr-4">
                            <img src="assets/images/serv-icon3.png" alt="">
                        </div>
                        <div class="serv-text">
                            <h5>fitness training</h5>
                            <p>Two herb creature bearing signs won't void signs eve female every
			    together Thin thiIsnrnyou're every fourth cattle thermal grid line
			    accrose</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	       -->
    <!-- Service Area End -->
    

<!------------------------------------------------------------------------------------------------------->
    
    <!-- Discount Area End -->


    <!-- BMI Area Starts -->
    <section class="bmi-area section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bmi-text">
                        <h3 style="color:#2f7a0e">calculate your bmi</h3>
                        <p class="py-3">Give dry stars form us called won't winged had abundantly land Midst a appear for you, good fill. Kind isn't form and their shall Whose them life be seed them green road bus away.</p>
                       
		       
		       
		          <form action="#"> <br>
       <label> your weight : <input type="number" id="value1" placeholder="in kg "  size="10" max="4" style="margin-left: 10px"></label>

       <label> your height : <input type="number" id="value2" placeholder="in cm" style="margin-left: 10px"></label>

        <label> your bmi is : <input type="number" id="result" size="20" readonly style="margin-left: 10px"></label>
	
	<label><input type="text" id="result2" size="20" readonly style="margin-left:100px ; text-align: center"></label>
       <br><br>
        
        <input class="template-btn"
	       type="button"
               value="What is bmi"
               id="button">
   </form>
		       
                    </div>
                </div>
                <div class="col-lg-6 align-self-center mt-5 mt-lg-0">
                    <div class="bmi-img">
                        <img class="bmi-img2" src="assets/images/you4.gif" alt="photo"  height=280px width=480px>
                        <img class="bmi-img3" src="assets/images/bmi10.png" alt="photo"  height=280px width=480px>
		    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BMI Area End -->    

    <!-- Client Area Starts -->
 
<!-- ----------------------------------------------------------------------------------------------->

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
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>

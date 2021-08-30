<?php
session_start();

if(!isset($_SESSION['userID'])){
  header("location:login_v1/login.php");
}

$conn=mysqli_connect("localhost","root","root")
        or die("Could Not Connect");

$db=mysqli_select_db($conn,"healthylifestyle");

$query="SELECT * from artical order by artical_id DESC";
$result=mysqli_query($conn,$query);
$setArt=array();
while($row=mysqli_fetch_assoc($result)){
  $setArt[]=$row;
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
	 <!-- Bootstrap core CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/blog-post.css" rel="stylesheet">
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
                        <a><img src="assets/images/logo1.jpeg" alt="logo"  width= 150px height=60px style="margin-top:15px"></a>
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
                            <!--<li class="active" ><a href="home.html" style="font-size: 20px; color: #2f7a0e">home</a></li>-->
                            <li><a href="about.php" style="font-size: 20px;color: #2f7a0e">about us</a></li>
                            <!--<li><a href="trainers.html">trainers</a></li>-->
                            <li><a href="#" style="font-size: 20px;color: #2f7a0e" >blog</a>
                                <ul class="sub-menu">
                                    <li><a href="tips nutration.html" style="font-size: 16px;color: #2f7a0e"> tips nutrition </a></li>
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
			      <li><a href="blood.php" style="font-size: 20px;color: #2f7a0e">blood donation</a></li>
				   <li><a href="to_know.html" style="font-size: 20px;color: #2f7a0e"> To know </a></li>
				   
                            <li><a href="profile.php"><i class="fa fa-user-circle-o fa-3x " aria-hidden="true"></i></a></i>
				 <li style="margin-left:10px"><a href="sign_out.php" class="template-btn">sign out </a></li>
				
				

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
<!--------------------------------------------------------------------------------------->
    <!-- Banner Area Starts -->
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

      
  <!-- Page Content -->
   <section class="feature-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top text-center">
       
<!------------------------------------------------------------------------------------------------------->
    <div class="container">

    <div class="row">
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
      <!-- Post Content Column -->
      <div class="col-lg-8"style="margin-top:-180px">
       <?php 
       $count=1;
       foreach ($setArt as $art) {
       echo "<!-- Title -->
             <br><br><br><br>
             <h3 class='mt-4'>".$art["artical_title"]."</h3><hr>";
       echo '<h5 class="lead">Type of Category</h5>';
       echo "<p class='lead'>".$art["artical_classification"]."</p>";
       echo "<!-- Preview Image -->
        <img class='img-fluid rounded' src='assets/images/artical/".$art["artical_image"]."' alt=''><hr>";
       echo "<!-- Post Content -->
        <p class='lead'>".$art["artical_text"]."</p>";
        echo '<hr>
        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <textarea class="form-control" name="comment" rows="3"></textarea>
              </div>
              <input type="submit" name="submit'.$count.'" class="btn btn-primary">
            </form>
          </div>
        </div>';
        $NameUser="";
        $emailUser="";
        $commentUser="";
        $agreeComment="";
        $imgUser="";
        $artID=$art["artical_id"];
        if(isset($_POST["submit$count"])){
          $IDuser=$_SESSION["userID"];
          $queryy1="SELECT * from user where userID='$IDuser'";
          $ress1=mysqli_query($conn,$queryy1);
          $roww1=mysqli_fetch_assoc($ress1);
          $NameUser=$roww1["firstName"];
          $emailUser=$roww1["email"];
          $commentUser=$_POST["comment"];
          $agreeComment='0';
          $imgUser=$roww1["image"];

          $queryy2="INSERT INTO `comments`(`userID`, `comment`, `agreeComment`, `artical_id`)
                    values ('$IDuser','$commentUser','$agreeComment','$artID')";
                     
          mysqli_query($conn,$queryy2);
          unset($_POST["submit$count"]);
        }
      $query5="SELECT comments.* , user.firstName , user.image from comments
      INNER JOIN user ON user.userID = comments.userID where artical_id={$art['artical_id']} AND agreeComment='1'";
      $res1=mysqli_query($conn,$query5);
      $comm2Set=array();
      while($row2=mysqli_fetch_assoc($res1)){
        $comm2Set[]=$row2;
      }
      foreach ($comm2Set as $c2) {
        echo'  <!-- Single Comment -->
        <div class="media mb-4" style="border-bottom:1px solid silver;">';
        
      echo "<img class='d-flex mr-3 rounded-circle' src='assets/images/avatar/".$c2['image']."' width='50' height='50' alt=''>
          <div class='media-body'>";
     
      echo "<h5 class='mt-0 text-left'>".$c2['firstName']."</h5><p class='text-left' style='text-indent:10px;'>"
      .$c2['comment'].".</p>
          </div>
        </div>
      "; 
      }
      $count++;
       }
       ?>
      </div>
            <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
         <center> <h5 class="card-header">Categories</h5></center>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#"></a>
                  </li>
                  <li>
               <center><a href="Food warnings.html">Food warnings</a> </center>   
                  </li>
                  <li>
                 <center>  <a href="tips nutration.html">tips nutration</a>  </center> 
                  </li>
           <li>
               <center>     <a href="food.html">food</a>  </center>
                  </li>
           </ul>
            
        
              </div>
            </div>
          </div>
        </div>
              
      
      

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

  </div></div></section>








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

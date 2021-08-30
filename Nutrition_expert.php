<?php
session_start();
if(!isset($_SESSION['userID'])){
  header("location:login_v1/login.php");
}
  $adminID = $_SESSION["userID"];
  $conn=mysqli_connect("localhost","root","root")
        or die("Could Not Connect");
  mysqli_select_db($conn,"healthylifestyle");

  $query="SELECT * from user where userID ='$adminID'";

  $result=mysqli_query($conn,$query);
  
  $setAdmin=mysqli_fetch_assoc($result);


  // Add Artical Page .

  if(isset($_POST["publish"])){
    
    $title=$_POST["title"];
    $post=$_POST["post"];
    $category=$_POST["category"];
    $image=$_FILES["image"]["name"];
    $image_tmp=$_FILES["image"]["tmp_name"];
    $path ="assets/images/artical/";
    move_uploaded_file($image_tmp, $path.$image); 

    $query2="INSERT into artical 
    (admin_id,artical_title,artical_text,artical_classification,artical_image)
    values ('$adminID','$title','$post','$category','$image')";
    $res=mysqli_query($conn,$query2);
    header("location:Nutrition_expert.php");                                     
  
  }

  // END Add Artical Page


  // BloodDonation 
  $query2="SELECT * from blooddonation";
  $res=mysqli_query($conn,$query2);
  $bloodSet=Array();
  while($row=mysqli_fetch_assoc($res)){
    $bloodSet[]=$row;
  }

  // End BloodDonation 

  $query3="SELECT * from user where userID!=$adminID";
  $res3=mysqli_query($conn,$query3);
  $userSet=Array();
  while($row3=mysqli_fetch_assoc($res3)){
    $userSet[]=$row3;
  }
  if(isset($_POST["update"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $img2=$_FILES["img2"]["name"];
    $tmp_name2=$_FILES["img2"]["tmp_name"];
    $path2="assets/images/admin/";
    
    move_uploaded_file($tmp_name2, $path2.$img2);
    
    if($_FILES["img2"]["error"] == 0){
      $qu="UPDATE user set firstName='$name',
                            email='$email',
                            password='$pass',
                            image='$img2'
                            where userID='$adminID' AND GroupID='1'";
      mysqli_query($conn,$qu);
      header("location:Nutrition_expert.php");
    }
    else{
      $qu="UPDATE user set firstName='$name',
                            email='$email',
                            password='$pass'
                            where userID='$adminID' AND GroupID='1'";
      mysqli_query($conn,$qu);
      header("location:Nutrition_expert.php");
    }
  }

  if(isset($_POST['addNewUser'])){
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

    $queryAdd="insert into user (firstName,email,age,password,gender,weight,height,image,ownTable)
               values('$name','$email','$age','$pass','$gender','$weight','$height','$img','$table')";
    mysqli_query($conn,$queryAdd);
    header("location:Nutrition_expert.php");
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
    <title>Nutrition expert</title>

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
	  <link rel="stylesheet" href="assets/css/font-awesome.min.css" rel="stylesheet">
	
<!--===============================================================================================-->
    <link href = 'http://fonts.googleapis.com/css?family=Calligraffitti'
    rel = 'stylesheet' type='text/css'/>

<!----------------------------------------------------------------------------->
<style>
    
.banner-area.about-page{background-image:url("assets/images/ph31.jpg") !important;
                                    position:relative;
                                    z-index:1}

/*------ panel -----------------------------------------------------------------------------*/

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
    background-color:  #0077ff;
    border-color: #ddd;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

.panel-body {
    padding: 25px;
}

//-------------------- button------------------------------------
form .template-btn {background-color: blue ; margin-left:650px}
form .template-btn:hover {border-color: blue} ;




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
                        <a><img src="assets/images/logo1.jpeg" alt="logo" width= 150px height=60px alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>  
                    <div class="main-menu">

				 <a href="sign_out.php" class="template-btn" >sign out </a>       
                    
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
     <!--------------------------------------------- menu -------------------------------------------------------------->  








     
   <div class="row">
  <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
     <a class="list-group-item list-group-item-action active"id="list-Profile-list" data-toggle="list" href="#list-Profile" role="tab" aria-controls="Profile"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
	 <a class="list-group-item list-group-item-action"id="list-Addarticle-list" data-toggle="list" href="#list-Addarticle" role="tab" aria-controls="Addarticle"><i class="fa fa-pencil" aria-hidden="true"></i> Add an article</a>
	 <a class="list-group-item list-group-item-action"id="list-Members-list" data-toggle="list" href="#list-Members" role="tab" aria-controls="Members"><i class="fa fa-users" aria-hidden="true"></i> Members</a>
     <a class="list-group-item list-group-item-action"id="list-Comments-list" data-toggle="list" href="#list-Comments" role="tab" aria-controls="Comments"><i class="fa fa-comments" aria-hidden="true"></i> Comments</a>
	 <a class="list-group-item list-group-item-action"id="list-Feedback-list" data-toggle="list" href="#list-Feedback" role="tab" aria-controls="Feedback"><i class="fa fa-bar-chart" aria-hidden="true"></i> Feedback</a>
     <a class="list-group-item list-group-item-action"id="list-Bloodonors-list"data-toggle="list"href="#list-Bloodonors"role="tab"aria-controls="Bloodonors"><i class="fa fa-tint" aria-hidden="true"></i> Blood Donors</a>
    </div>
  </div>
  <div class="col-10">
<div class="tab-content" id="nav-tabContent"> 	
<div class="tab-pane fade show active" id="list-Profile" role="tabpanel" aria-labelledby="list-Profile-list" >	 
<div class="container"style="position:absolute;top:1px;left:-15px">
  <div class="panel panel-default">
    <div class="panel-heading"><center>Profile</center></div>
    <div class="panel-body">
	<?php
	 echo "<img class='author_img rounded-circle' src='assets/images/avatar/".$setAdmin["image"]."' width='150' height='150'alt='' id='a2'>";
  ?>	 
 
	 
<table border ="0"style="position:relative;top:-130px;margin-left:270px"> 

<tr>
<td>name :    </td>
<td><?php echo $setAdmin["firstName"];?></td>
</tr>                              

<tr>
<td>e-mail :    </td>      
<td><?php echo $setAdmin["email"];?></td>
</tr>


<tr>
<td>password :    </td>      
<td>**********</td>
</tr>
</table> 
  

 <a class="genric-btn danger text-light" id="edit">edit</a>
 <br><br>

   
 <div id="updateAdmin">
  <h3 style="color:black;"><center>Update Admin</center></h3>
  <br>
   <form method="post" enctype="multipart/form-data">
     <div class="form-group">
      <?php echo "<input type='text' name='name' class='form-control' placeholder='Admin Name' value='".
      $setAdmin["firstName"]."' >";?>
     </div>
     <div class="form-group">
      <?php echo "<input type='email' name='email' class='form-control' placeholder='Email' value='".$setAdmin["email"]."'>";?>
     </div>
     <div class="form-group">
      <?php echo "<input type='password' name='pass' class='form-control' placeholder='password' value='".$setAdmin["password"]."'>";?>
     </div>
     <div class="form-group">
       <input type="file" name="img2" class="form-control">
     </div>
     <br>
     <input type="submit" name="update" class="btn btn-warning form-control">
   </form>
 </div>   
		 
</div>


	
	
	</div>
  </div>
</div>

<div class="tab-pane fade" id="list-Addarticle" role="tabpanel" aria-labelledby="list-Addarticle-list">	  
<div class="container"style="position:absolute;top:1px;left:-15px">
  <div class="panel panel-default">
    <div class="panel-heading"><center>Addarticle</center></div>
    <div class="panel-body">


<form action="" method="post" class="form-horizontal" enctype="multipart/form-data" style="font-size:15px;color:black">
				  
				  
 <div class="form-group">
	<label for="title" class="col-sm-2 control-label">Article title</label>
			<div class="col-sm-5">
				 <input type="text" class="form-control" name="title" value="" id="title" placeholder=" enter article title ">
			</div>
  </div>
  
  <div class="form-group">
	 <label for="post" class="col-sm-2 control-label">the article</label>
			<div class="col-sm-10">
			  <textarea rows="8" class="form-control" name="post" id="post"></textarea>
		</div>
  </div>

   
   <div class="form-group">
			<label for="category" class="col-sm-2 control-label">Article classification:</label>
				<div class="col-sm-4">
					 <select class="form-control" name="category" id="category">
					 <option value="">-Choose a rating-</option>
					 <option> Food warnings </option>
                     <option> tips nutration</option>
                     <option>  Food Recipes  </option>
					 </select>
					</div>
   </div><br>
	        

 <div class="form-group"><br><br>
	<label for="image" class="col-sm-2 control-label">Choose a picture:</label>
			<div class="col-sm-5">
				<input type="file" class="form-control" name="image" id="image">
			</div>
  </div> 

 <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" name="publish" class="btn btn-danger">Publishing</button>
			</div>
 </div>
</form><br>


</div><!--end panel add-->
</div><!--end  container add-->
</div><!--end paneltab add-->
</div>	  			 
 
<div class="tab-pane fade" id="list-Members" role="tabpanel" aria-labelledby="list-Members-list">
<div class="container"style="position:absolute;top:1px;left:-15px">
  <div class="panel panel-default">
    <div class="panel-heading"><center>Members</center></div>
    <div class="panel-body">
			
              <table class="table text-center table-bordered">
                      <thead>
                        <tr>
                        <th>#</th>
						<th>personal picture</th>
						<th>member name</th>
						<th>E-mail</th>
					    <th>gender</th>
						<th>the system</th>
						<th>Data modification</th>
						</tr>
                    </thead>
                    <tbody id="data">
                      <?php 
                      foreach ($userSet as $u ) {
                        echo "<tr>";
                        echo "<td>".$u["userID"]."</td>";
                        echo "<td><img src='assets/images/avatar/".$u["image"]."' class='rounded-circle' width='60p' height='60'/></td>";
                        echo "<td>".$u["firstName"]."</td>";
                        echo "<td>".$u["email"]."</td>";
                        echo "<td>".$u["gender"]."</td>";
                        echo "<td>".$u["ownTable"]."</td>";
                        echo "<td><a class='btn btn-warning text-light' href='updateUser.php?userID={$u['userID']}'><i class='fa fa-wrench' aria-hidden='true'></i></a>&nbsp;<a class='btn btn-danger text-light' href='deleteUser.php?userID={$u['userID']}'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
                        echo "<tr>";
                      }
                      ?>
                    </tbody>
                    </table>
<br><br>
<form method="post" enctype="multipart/form-data" class="form-group">
  <h3 class="text-center bg-primary text-light">Add New User</h3>
          <hr>
          <form action="" method="post" enctype="multipart/form-data">
              
              <div class="form-group">
                  <label  class="control-label mb-1">First Name</label>
                  <input id="cc-payment" name="fname" type="text" class="form-control" style="border-radius: 30px;">
              </div>
              <div class="form-group has-success">
                  <label class="control-label mb-1">Email</label>
                  <input id="cc-name" name="email" type="email" class="form-control cc-name valid" style="border-radius: 30px;">
                  
              </div>
              <div class="form-group has-success">
                  <label class="control-label mb-1">Age</label>
                  <input id="cc-name" name="age" type="text" class="form-control cc-name" style="border-radius: 30px;">
                  
              </div>
              <div class="form-group">
                  <label class="control-label mb-1">Password</label>
                  <input id="cc-number" name="pass" type="password" class="form-control"style="border-radius: 30px;">
                  
              </div>
              <div class="form-group">
                  <label class="control-label">Gender</label>
                  <br>
              <select class="form-control" name="gender" id="gender" style="border-radius: 30px;">
                    <option value="male">male</option>
                    <option value="female">female</option>
               </select>

               </div>
              <br><br>
              <div class="form-group">
              <label class="control-label">Weight</label>
              <input class="form-control" type="number" name="weight" min="0" max="200" style="border-radius: 30px;">
              </div>

              <div class="form-group wrap-input100">
              <label class="control-label">Height</label>
              <input class="form-control"type="number" name="height" min="0" max="300" style="border-radius: 30px;">
              </div>
              <div class="form-group">
                  <label class="control-label">Choose a personal picture :</label>
                  <input type="file" name="img" class="form-control" style="border-radius: 30px;">
              </div>
              <div class="form-group">
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
              </div>
              <div>
                  <button  type="submit" class="btn btn-lg btn-success btn-block" name="addNewUser">      
                      Save                                       
                  </button>
              </div>
</form>  

<br>




<br>


<script>
var newone=[]
var newtwo=[]
var newthree=[]
var newfour=[]
var newfive=[]

function add(){
var one=document.getElementById('one').value
var two=document.getElementById('two').value
var three=document.getElementById('three').value
var four=document.getElementById('four').value
var five=document.getElementById('five').value

newone.push(one);
newtwo.push(two);
newthree.push(three);
newfour.push(four);
newfive.push(five);
listshow();
}



function listshow(){
var list=""
for(var i=0;i<newone.length;i++){
list+= "<tr><td>"+(i+1)+"</td>"
+"<td> <img src=.../"+newone[i]+">"+"</td>"
+"<td>"+newtwo[i]+"</td>"
+"<td>"+newthree[i]+"</td>"
+"<td>"+newfour[i]+"</td>"
+"<td>"+newfive[i]+"</td>"
+"<td>"+"<button onclick='edt("+i+")'>Edit</button><button onclick='del("+i+")'>Delete</button>"+"</td></tr>"

}
document.getElementById('data').innerHTML=list

}

var load=""
function edt(edit){
load=edit
document.getElementById('one').value=newone[edit]
document.getElementById('two').value=newtwo[edit]
document.getElementById('three').value=newthree[edit]
document.getElementById('four').value=newfour[edit]
document.getElementById('five').value=newthree[edit]


}

function update(){
newone[load]=document.getElementById('one').value
newtwo[load]=document.getElementById('two').value
newthree[load]=document.getElementById('three').value
newfour[load]=document.getElementById('four').value
newtfive[load]=document.getElementById('five').value
listshow();
}

function del(dok){
newone.splice(dok,1)
newtwo.splice(dok,1)
newthree.splice(dok,1)
newfour.splice(dok,1)


listshow();
}
</script>


</div>
</div>
</div>
</div>

<div class="tab-pane fade" id="list-Comments" role="tabpanel" aria-labelledby="list-Comments-list">	  
<div class="container"style="position:absolute;top:1px;left:-15px">
  <div class="panel panel-default">
    <div class="panel-heading"><center>Comments</center></div>
    <div class="panel-body">
	<table class="table table-hover">
				    <thead>
					    <tr>
						<th>Name</th>
						<th>Comment</th>
						<th>action</th>
						</tr>
				   </thead>
				   <tbody>
            <?php
            // comments Page 

            $query2="SELECT comments.* , user.firstName from comments
            INNER JOIN user ON user.userID = comments.userID ORDER BY comments.comment_id DESC";
            $result=mysqli_query($conn,$query2);
            $CommSet=Array();
            while ($comm=mysqli_fetch_assoc($result)) {
              $CommSet[]=$comm;
            }
              foreach ($CommSet as $c) {
                if($c["agreeComment"]!="1"){
                echo "<tr>";
                echo "<td>".$c["firstName"]."</td>";
                echo "<td>".$c["comment"]."</td>";
                echo '<td style="width:100px;">';
                echo "<a class='btn btn-primary' href='php/acceptComment.php?comment_id={$c['comment_id']}' aria-label='Settings'>";
                echo '<i class="fa fa-thumb-tack" aria-hidden="true"></i>
                      </a>';
                echo "<a class='btn btn-danger' href='php/deleteComment.php?comment_id={$c['comment_id']}' aria-label='Settings'>
                      <i class='fa fa-trash-o' aria-hidden='true'></i>
                      </a>
                      </td>
                      </tr>";
              }
            }
            ?>
				   </tbody>
</table>				
	
</div>
<br>
<hr>
<div class="panel-heading"><center>Comments Agree</center></div>
    <div class="panel-body">
  <table class="table table-hover">
            <thead>
              <tr>
            <th>Name</th>
            <th>Comment</th>
            <th>action</th>
            </tr>
           </thead>
           <tbody>
            <?php
            $query2="SELECT * from comments
            INNER JOIN user ON user.userID = comments.userID ORDER BY comments.comment_id DESC";
            $result=mysqli_query($conn,$query2);
            $CommSet=Array();
            while ($comm=mysqli_fetch_assoc($result)) {
              $CommSet[]=$comm;
            }
              foreach ($CommSet as $c) {
                if($c["agreeComment"]=="1"){
                echo "<tr>";
                echo "<td>".$c["firstName"]."</td>";
                echo "<td>".$c["comment"]."</td>";
                echo '<td style="width:100px;">';
                echo "<a class='btn btn-warning' href='php/disagreeComment.php?comment_id={$c['comment_id']}' aria-label='Settings'>
                      <i class='fa fa-trash-o' aria-hidden='true'></i>
                      </a>
                      </td>
                      </tr>";
              }
            }
            ?>
           </tbody>
</table>        
  
  </div>
  </div>
</div>
</div>

<div class="tab-pane fade" id="list-Feedback" role="tabpanel" aria-labelledby="list-Feedback-list">	  
<div class="container"style="position:absolute;top:1px;left:-15px">
  <div class="panel panel-default">
    <div class="panel-heading"><center>Feedback</center></div>
    <div class="panel-body">
<table class="table table-hover">
				    <thead>
					    <tr>
						<th>Name</th>
						<th>feedback</th>
						<th>action</th>
						</tr>
				   </thead>
				   <tbody>
					    <?php
            $query2="SELECT feedback.* , user.firstName from feedback INNER JOIN user ON user.userID = feedback.userID ORDER BY feedback.feedback_id DESC";
            $result=mysqli_query($conn,$query2);
            $CommSet=Array();
            while ($comm=mysqli_fetch_assoc($result)) {
              $CommSet[]=$comm;
            }
              foreach ($CommSet as $c) {
                if($c["agreeFeedback"]!="1"){
                echo "<tr>";
                echo "<td>".$c["firstName"]."</td>";
                echo "<td>".$c["opinon"]."</td>";
                echo '<td style="width:100px;">';
                echo "<a class='btn btn-primary' href='php/accept.php?feedback_id={$c['feedback_id']}' aria-label='Settings'>";
                echo '<i class="fa fa-thumb-tack" aria-hidden="true"></i>
                      </a>';
                echo "<a class='btn btn-danger' href='php/delete.php?feedback_id={$c['feedback_id']}' aria-label='Settings'>";
                echo '<i class="fa fa-trash-o" aria-hidden="true"></i>
                      </a>
                      </td>
                      </tr>';
              }
            }
            ?>
				   </tbody>
</table>				
</div>

<br>
<hr>

<div class="panel-heading"><center>Agree Feedback</center></div>
    <div class="panel-body">
<table class="table table-hover">
            <thead>
              <tr>
            <th>Name</th>
            <th>feedback</th>
            <th>action</th>
            </tr>
           </thead>
           <tbody>
              <?php
            $query2="SELECT feedback.* , user.firstName from feedback INNER JOIN user ON user.userID = feedback.userID ORDER BY feedback.feedback_id DESC";
            $result=mysqli_query($conn,$query2);
            $CommSet=Array();
            while ($comm=mysqli_fetch_assoc($result)) {
              $CommSet[]=$comm;
            }
              foreach ($CommSet as $c) {
                if($c["agreeFeedback"]=="1"){
                echo "<tr>";
                echo "<td>".$c["firstName"]."</td>";
                echo "<td>".$c["opinon"]."</td>";
                echo '<td style="width:100px;">';
              echo "<a class='btn btn-warning' href='php/disagree.php?feedback_id={$c['feedback_id']}' aria-label='Settings'>";
              echo '<i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                    </td>
                    </tr>';
              }
            }
            ?>
           </tbody>
</table>        

</div>		
</div>
</div>
</div>
	
<div class="tab-pane fade " id="list-Bloodonors" role="tabpanel" aria-labelledby="list-Bloodonors-list">	  
<div class="container"style="position:absolute;top:1px;left:-15px">
  <div class="panel panel-default">
    <div class="panel-heading"><center>Blood donors</center></div>
    <div class="panel-body">
	<table class="table text-center table-hover table-responsive" style="position:relative;top:7px;margin-left:-12px; font-size:14px">
				        <thead>
				        <tr>
						<th>&nbsp;&nbsp;&nbsp;First Name&nbsp;&nbsp;&nbsp;</th>
						<th>&nbsp;&nbsp;&nbsp;Seconde Name&nbsp;&nbsp;&nbsp;</th>
						<th>&nbsp;&nbsp;&nbsp;last Name&nbsp;&nbsp;&nbsp;</th>
						<th>&nbsp;&nbsp;&nbsp;E-mail&nbsp;&nbsp;&nbsp;</th>
						<th>&nbsp;&nbsp;&nbsp;gender&nbsp;&nbsp;&nbsp;</th>
						<th>&nbsp;&nbsp;&nbsp;age&nbsp;&nbsp;&nbsp;</th>
						<th>&nbsp;&nbsp;&nbsp;wieght&nbsp;&nbsp;&nbsp;</th>
						<th>&nbsp;&nbsp;&nbsp;phone&nbsp;&nbsp;&nbsp;</th>
						<th>&nbsp;&nbsp;&nbsp;&nbsp;address&nbsp;&nbsp;&nbsp;&nbsp;</th>
						<th>&nbsp;&nbsp;&nbsp;city&nbsp;&nbsp;&nbsp;</th>
						<th>&nbsp;&nbsp;&nbsp;hospital&nbsp;&nbsp;&nbsp;</th>
						<th>&nbsp;&nbsp;&nbsp;disease&nbsp;&nbsp;&nbsp;</th>
						</tr>
				      </thead>
				      <tbody>
                <?php
                foreach ($bloodSet as $b) {
                  echo "<tr>";
                  echo "<td>&nbsp;&nbsp;&nbsp;".$b["firstName"]."&nbsp;&nbsp;&nbsp;</td>";
                  echo "<td>&nbsp;&nbsp;&nbsp;".$b["secondName"]."&nbsp;&nbsp;&nbsp;</td>";
                  echo "<td>&nbsp;&nbsp;&nbsp;".$b["lastName"]."&nbsp;&nbsp;&nbsp;</td>";
                  echo "<td>&nbsp;&nbsp;&nbsp;".$b["email"]."&nbsp;&nbsp;&nbsp;</td>";
                  echo "<td>&nbsp;&nbsp;&nbsp;".$b["gender"]."&nbsp;&nbsp;&nbsp;</td>";
                  echo "<td>&nbsp;&nbsp;&nbsp;".$b["age"]."&nbsp;&nbsp;&nbsp;</td>";
                  echo "<td>&nbsp;&nbsp;&nbsp;".$b["weight"]."&nbsp;&nbsp;&nbsp;</td>";
                  echo "<td>&nbsp;&nbsp;&nbsp;".$b["telephone"]."&nbsp;&nbsp;&nbsp;</td>";
                  echo "<td>&nbsp;&nbsp;&nbsp;".$b["address"]."&nbsp;&nbsp;&nbsp;</td>";
                  echo "<td>&nbsp;&nbsp;&nbsp;".$b["city"]."&nbsp;&nbsp;&nbsp;</td>";
                  echo "<td>&nbsp;&nbsp;&nbsp;".$b["hospital"]."&nbsp;&nbsp;&nbsp;</td>";
                  echo "<td>&nbsp;&nbsp;&nbsp;".$b["disease"]."&nbsp;&nbsp;&nbsp;</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>

</table>
<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</div>	
</div>
</div>
</div>





<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>	
<br><br><br><br><br><br><br><br><br><br><br>

    </div>
  </div>
</div>
           
            
          
<br><br><br>	    


    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="assets/js/vendor/gmaps.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="tiny/tinymce.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $("document").ready(function(){
            $("#updateAdmin").hide();
            $("#edit").click(function(){
              $("#updateAdmin").slideToggle(500);
            });
        });
    </script>
	
	<!---- tiny text area--->
	
<!--	<script>
tinymce.init({
  selector: 'textarea',
  height: 300,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
	</script>
-->
<script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: false, // change to true		
	title:{
		text: "dite"
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
		dataPoints: [
			{ label: "allweights",  y: 5  },
			{ label: "above 80",  y: 10 },
			{ label: "less than 80",  y: 7  },
		    { label: "children",  y: 12  },
			{ label: " pregnant women", y: 15  },
			{ label: "Anemia", y: 35  },
			{ label: "Keto",  y: 10  },
			{ label: "Feeding ",  y: 18  }
		]
	}
	]
});
chart.render();

}

</script>
<?php 


$query = "SELECT count(ID) from blooddonation where FromUsers= 1 ";
$stmt  = mysqli_query($conn,$query);
$count = mysqli_fetch_array($stmt);
$users = $count[0];

$query2   = "SELECT count(ID) from blooddonation where FromUsers= 0 ";
$stmt2    = mysqli_query($conn,$query2);
$count2   = mysqli_fetch_array($stmt2);
$visitors = $count2[0];

?>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  

  var data = google.visualization.arrayToDataTable([
  ['donors', 'Hours per Day'],
  ['User donors', <?php echo $users; ?> ],
  ['Visitor donors', <?php echo $visitors; ?>],
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Blood donors', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</body>
</html>

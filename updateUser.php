<?php
$conn=mysqli_connect("localhost","root","root")
    or die("Could Not Connect");

$db=mysqli_select_db($conn,"healthylifestyle");

$query="SELECT * from user where userID={$_GET['userID']}";
$result=mysqli_query($conn,$query);
$setUser=mysqli_fetch_assoc($result);

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
                        where userID='{$_GET['userID']}'";
mysqli_query($conn,$query);
header("location:Nutrition_expert.php");
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
                        where userID='{$_GET['userID']}'";
    mysqli_query($conn,$query);
    header("location:Nutrition_expert.php");
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
      
</head>
<body>
	<br><br>
<div class="container">
 <div class="header">
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
        ?>

             </span>
        </div>
        <br>
        <div>
            <button  type="submit" class="btn btn-lg btn-success btn-block" name="update">      
                Save                                       
            </button>
        </div>
</form></div>
</body>
</html>
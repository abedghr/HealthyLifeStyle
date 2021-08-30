<?php
$conn=mysqli_connect("localhost","root","root")
      or die("Could Not Connect");
$db=mysqli_select_db($conn,"healthylifestyle");

$query="DELETE from user where userID={$_GET['userID']}";
mysqli_query($conn,$query);
header("location:Nutrition_expert.php");

?>
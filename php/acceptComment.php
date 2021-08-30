<?php
$conn=mysqli_connect("localhost","root","")
      or die("Could Not Connect");
$db=mysqli_select_db($conn,"healthylifestyle");
$query="update comments set agreeComment='1' where comment_id={$_GET['comment_id']}";
mysqli_query($conn,$query);
header("location:../Nutrition_expert.php");
?>
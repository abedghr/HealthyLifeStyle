<?php
$conn=mysqli_connect("localhost","root","")
or die("Could Not Connect");

$db=mysqli_select_db($conn,"healthylifestyle");
$query="delete from feedback where feedback_id={$_GET['feedback_id']}";
mysqli_query($conn,$query);
header("location:../Nutrition_expert.php");
?>
<?php
$conn=mysqli_connect("localhost","root","")
or die("Could not Connect");

$db=mysqli_select_db($conn,"healthylifestyle");
$query="UPDATE comments set agreeComment='0'
        where comment_id={$_GET['comment_id']}";
mysqli_query($conn,$query);
header("location:../Nutrition_expert.php");
?>
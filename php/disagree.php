<?php
$conn=mysqli_connect("localhost","root","")
or die("Could not Connect");

$db=mysqli_select_db($conn,"healthylifestyle");
$query="update feedback set agreeFeedback='0'
        where feedback_id={$_GET['feedback_id']}";
mysqli_query($conn,$query);
header("location:../Nutrition_expert.php");
?>
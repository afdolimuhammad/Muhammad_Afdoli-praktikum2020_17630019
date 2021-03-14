<?php
include "../connection.php";
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM user WHERE id=$id") or die(mysqli_error($con));
header("Location:../admin/?page=user-show");
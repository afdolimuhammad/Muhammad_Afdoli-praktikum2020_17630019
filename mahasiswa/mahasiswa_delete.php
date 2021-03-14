<?php
include "../connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($con, "DELETE FROM mahasiswa WHERE id=$id") or die(mysqli_error($con));
}
header("Location:../admin/?page=mahasiswa-show");
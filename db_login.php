<?php
$con = mysqli_connect("localhost", "root", "", "kasir");

if (!$con) {
    die('Connection Failed' . mysqli_connect_error());
}
?>
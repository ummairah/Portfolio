<?php

$connect = new mysqli("localhost","root","","pinjambuku");

if($connect->connect_error) {
    die("Connection failed: ".$con->connect_error);
}

?>

<?php

$connect = new mysqli("localhost","root","","parcel");

if($connect->connect_error) {
    die("Connection failed: ".$con->connect_error);
}

?>
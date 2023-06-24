<?php
$servername="localhost";
$database="customer";
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password,$database);


if(!$conn){
    die("Connection failed:" .mysqli_error($conn));
}
?>

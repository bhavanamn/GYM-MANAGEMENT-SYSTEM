<?php
include 'database.php';

global $conn;



if(isset($_POST['submit']))
{   $name=$_POST['uname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=$_POST['psw'];
    $hashed = hash('sha512',$password);
    $sql="insert into chutiyanabmiarpart2(Name,Email,contact,password)values('$name','$email','$contact','$hashed')";
    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Your Record has been inserted')</script>";
    }
    else
    {
        echo "error:".mysqli_error($conn);
    }
    mysqli_close($conn);
}


?>
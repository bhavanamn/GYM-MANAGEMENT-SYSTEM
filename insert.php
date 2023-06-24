<?php
include 'newdatabase.php';
global $conn;
if (isset($_POST['submit'])) {
    $name = $_POST['uname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $pincode = $_POST['pin'];
    $password = $_POST['psw'];

    $sql = "insert into newregister(username,email,contact,address,pin,password)values('$name','$email','$contact','$address','$pincode','$password')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('You are now registered! please login...')</script>";
    } else {
        echo "error:" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
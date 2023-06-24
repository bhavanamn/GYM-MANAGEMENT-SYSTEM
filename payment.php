<?php
include('newdatabase.php');
global $conn;


if (isset($_POST['Pay'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['fav_language'];
    $address = $_POST['age'];
    $pincode = $_POST['card-number'];
    $password = $_POST['expiration-date'];
    $reppassword = $_POST['cvv'];
    $sql = "insert into newpayment(Name,Email,course,price,CardNumber,ExpirationDate,CVV)values('$name','$email','$contact','$address','$pincode','$password','$reppassword')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Your Payment has been successful')</script>";
    

    } else {
        echo "error:" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
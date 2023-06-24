<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted email and password
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate email
    if (empty($email)) {
        $emailError = "Email is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email address";
    }

    // Validate password
    if (empty($password)) {
        $passwordError = "Password is required";
    } else if (!isValidPassword($password)) {
        $passwordError = "Password must contain at least 6 characters with at least one uppercase letter, one lowercase letter, one number, and one special character";
    }

    // If there are no errors, submit the form
    if (empty($emailError) && empty($passwordError)) {
        // Perform your login logic here
        // e.g. check against database, validate credentials, etc.
        // If login is successful, redirect to index.html
        header("Location: save.html");
        exit;
    }
}

// Function to validate password
function isValidPassword($password) {
    $passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/";
    return preg_match($passwordRegex, $password);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <h1 class="label">User Login</h1>
        <form class="login_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="font">Email-Id</div>
            <input type="email" name="email" required>
            <?php if (!empty($emailError)) { ?>
                <div class="error"><?php echo $emailError; ?></div>
            <?php } ?>
            <div class="font font2">Password</div>
            <input type="password" name="password" required>
            <?php if (!empty($passwordError)) { ?>
                <div class="error"><?php echo $passwordError; ?></div>
            <?php } ?>
            <button type="submit">Login</button>
            <div class="signup_link">
                Not a member? <a href="signup.html">Signup</a>
            </div>
        </form>
    </div>
</body>

</html>

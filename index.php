<!DOCTYPE html>
<html lang="en">

<head>
    <title>login</title>
    <link rel="stylesheet" href="newstyle.css">
    
    
</head>

<body>
    <script>
                document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('.login_form');
            const emailInput = document.querySelector('input[type="email"]');
            const passwordInput = document.querySelector('input[type="password"]');

            form.addEventListener('submit', (e) => {
                e.preventDefault();

                // Validate email
                const email = emailInput.value.trim();
                if (email === '') {
                    showError(emailInput, 'Email is required');
                } else if (!isValidEmail(email)) {
                    showError(emailInput, 'Invalid email address');
                } else {
                    removeError(emailInput);
                }

                // Validate password
                const password = passwordInput.value.trim();
                if (password === '') {
                    showError(passwordInput, 'Password is required');
                } else if (!isValidPassword(password)) {
                    showError(passwordInput, 'Password must contain at least 6 characters with at least one uppercase letter, one lowercase letter, one number, and one special character');
                } else {
                    removeError(passwordInput);
                }

                // Submit form if there are no errors
                if (!document.querySelectorAll('.error').length) {
                    form.submit();
                }
            });

            function showError(input, message) {
                // Remove any existing error messages
                removeError(input);

                // Add new error message
                const errorElement = document.createElement('div');
                errorElement.classList.add('error');
                errorElement.innerText = message;
                input.parentElement.appendChild(errorElement);

                // Add red border to input
                input.classList.add('error-border');
            }

            function removeError(input) {
                // Remove error message
                const errorElement = input.parentElement.querySelector('.error');
                if (errorElement) {
                    errorElement.remove();
                }

                // Remove red border from input
                input.classList.remove('error-border');
            }

            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            function isValidPassword(password) {
                const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
                return passwordRegex.test(password);
            }
        });
    </script>



    </script>
    <div class="container">
        <h1 class="label">User Login</h1>
        <form  method="post" action="login.php">
            <?php if (isset($_GET['error'])) { ?>

                <p class="error"><?php echo $_GET['error']; ?></p>
    
            <?php } ?>
            <div class="font">Username</div>
            <input type="text" name="uname" type="email" required>
            <div class="font2">Password</div>
            <input type="password" name="password" type="password" required>
            <Button type="submit">Login</Button>
            <div class="signup_link">
                Not a member?<a href="signin.html">Signup</a>
            </div>

        </form>
            
    </div>
</body>

</html>
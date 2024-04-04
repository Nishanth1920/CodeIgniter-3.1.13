<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-Login</title>
    <link rel="shortcut icon" href="https://super-monitoring.com/blog/wp-content/uploads/2022/10/codeigniter.png.webp"
        type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .password-toggle {
            cursor: pointer;
        }

        .custom-container {
            max-width: 850px;
            /* Adjust the width as needed */
            margin: 0 auto;
            /* Center the container horizontally */

        }

        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .card {
            /* border: none; */
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #343a40;
            color: white;
            border: 20px;
            border-radius: 15px 15px 0 0 !important;
        }

        .card-body {
            background-color: #ffffff;
            border-radius: 0 0 15px 15px;
            padding: 30px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #ffa000;
            border-color: #ffa000;
        }

        .btn-link {
            color: #343a40;
        }

        .form-check-input {
            margin-top: 8px;
        }

        .form-check-label {
            margin-left: 10px;
            margin-top: 4px;
        }

        /* Custom styling for form inputs */
        .form-control {
            border-radius: 20px;
            border-color: #ced4da;
        }

        /* Additional styles for the form */
        .login-form {
            margin-top: 50px;
        }

        .login-form .btn {
            border-radius: 20px;
            margin-top: 20px;
        }

        /* Password strength meter styles */
        .strength-meter {
            margin-top: 10px;
            text-align: center;
        }

        .strength-meter .strength-text {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .strength-meter .progress {
            height: 10px;
            border-radius: 10px;
        }

        /* Adjustments for small devices */
        @media (max-width: 576px) {
            .login-form {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body style="background-color: #f0f0f0;">
    <div class="custom-container"> <!-- Change container class to container-sm for smaller width -->
        <div class="row justify-content-center login-form">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>CRUD-Login</h3>
                    </div>
                    <div class="card-body">
                        <div id="error-message" class="alert alert-danger" style="display: none;"></div>
                        <?php echo form_open('login', array('id' => 'login-form')); ?>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" placeholder="Username"
                                class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>"
                                id="username" name="username" value="<?php echo set_value('username'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <div class="input-group">
                                <input type="password" placeholder="Password"
                                    class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>"
                                    id="password" name="password">
                                <div class="input-group-append">
                                    <span class="input-group-text password-toggle" onclick="togglePasswordVisibility()">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                <?php echo form_error('password'); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Login</button>
                        <a href="" class="btn btn-link btn-block">Forgot Password?</a>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var icon = document.querySelector(".password-toggle i");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#login-form').submit(function (e) {
                e.preventDefault(); // Prevent normal form submission

                var formData = $(this).serialize(); // Serialize form data

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url("login/ajax_login"); ?>', // Corrected URL
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            window.location.href = '<?php echo base_url("user"); ?>'; // Redirect to user page on success
                        } else {
                            $('#error-message').html(response.error).show(); // Display error message
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>
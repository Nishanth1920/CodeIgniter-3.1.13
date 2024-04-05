<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI-Add User</title>
    <link rel="shortcut icon" href="https://super-monitoring.com/blog/wp-content/uploads/2022/10/codeigniter.png.webp"
        type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
        integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <style>
        /* Add custom styles if needed */
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            /* Reduced width */
            margin-top: 5rem;
            background-color: #f0f0f0;
            ;
            padding: 20px 30px;
            /* Adjusted padding to reduce height */
            border-radius: 10px;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.2);
            /* Increased shadow */
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        select {
            border: 1px solid #ced4da;
            border-radius: 10px;
            font-size: 14px;
            padding: 10px;
            width: 100%;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        select:focus {
            outline: none;
            border-color: #007bff;
        }

        button[type="submit"],
        a.btn {
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover,
        a.btn:hover {
            background-color: black;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-3">Add User</h2>
        <?php echo form_open('user/store', 'class="needs-validation"'); ?>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control <?php echo form_error('username') ? 'is-invalid' : ''; ?>"
                id="username" name="username" value="<?php echo set_value('username'); ?>">
            <?php echo form_error('username', '<div class="invalid-feedback">', '</div>'); ?>
            <!-- Display username error -->
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" id="email"
                name="email" value="<?php echo set_value('email'); ?>">
            <?php echo form_error('email', '<div class="invalid-feedback">', '</div>'); ?> <!-- Display email error -->
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <div class="input-group">
                <input type="number" class="form-control <?php echo form_error('age') ? 'is-invalid' : ''; ?>" id="age"
                    name="age" value="<?php echo set_value('age'); ?>">
                <?php echo form_error('age', '<div class="invalid-feedback">', '</div>'); ?>
            </div>
        </div>


        <div class="form-group">
            <label for="mobile">Mobile No:</label>
            <div class="input-group">
                <input type="text" class="form-control <?php echo form_error('mobile') ? 'is-invalid' : ''; ?>" id="mobile"
                    name="mobile" value="<?php echo set_value('mobile'); ?>">
                <?php echo form_error('mobile', '<div class="invalid-feedback">', '</div>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control <?php echo form_error('gender') ? 'is-invalid' : ''; ?>" id="gender"
                name="gender">
                <option value="">Select Gender</option>
                <option value="male" <?php echo set_select('gender', 'male'); ?>>Male</option>
                <option value="female" <?php echo set_select('gender', 'female'); ?>>Female</option>
                <option value="others" <?php echo set_select('gender', 'others'); ?>>Others</option>
            </select>
            <?php echo form_error('gender', '<div class="invalid-feedback">', '</div>'); ?>
            <!-- Display gender error -->
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>"
                id="password" name="password">
            <?php echo form_error('password', '<div class="invalid-feedback">', '</div>'); ?>
            <!-- Display password error -->
        </div>

        <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Submit</button>
        <a href="<?php echo site_url('user/index'); ?>" class="btn btn-danger"><i class="bi bi-x-lg"></i> Cancel</a>

        <?php echo form_close(); ?>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
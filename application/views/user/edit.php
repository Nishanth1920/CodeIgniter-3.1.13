<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI-Edit User</title>
    <link rel="shortcut icon" href="https://super-monitoring.com/blog/wp-content/uploads/2022/10/codeigniter.png.webp">
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
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.2); /* Increased shadow */
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            border: 1px solid #ced4da;
            border-radius: 10px;
            font-size: 14px;
            padding: 10px;
            width: 100%;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
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

        .cancel-btn:hover {
            background-color: #000;
        }

        .cancel-btn {
            border-radius: 20px;
            /* padding: 10px 20px; */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Edit User</h2>
        <?php echo form_open('user/update/' . $user['id']); ?>
        <div class="form-group">
            <label>Username:</label>
            <input class="form-control" type="text" name="username" value="<?php echo $user['username']; ?>">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input class="form-control" type="email" name="email" value="<?php echo $user['email']; ?>">
        </div>
        <div class="form-group">
            <label>Age:</label>
            <input class="form-control" type="text" name="age" value="<?php echo $user['age']; ?>">
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <input class="form-control" type="text" name="gender" value="<?php echo $user['gender']; ?>">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input class="form-control" type="password" name="password" value="<?php echo $user['password']; ?>">
        </div>
        <div class='d-flex'>
            <button class="btn btn-primary" type="submit"><i class="bi bi-folder-check"></i> Update</button>
            <div class='px-3'>
                <a href="index.php">
                    <button class="btn btn-danger px-3 cancel-btn"><i class="bi bi-x-lg"></i> Cancel</button>
                </a>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="shortcut icon" href="https://super-monitoring.com/blog/wp-content/uploads/2022/10/codeigniter.png.webp"
        type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles if needed */
        .form-group {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="container-sm mt-5">
        <h2 class="mb-4">Add User</h2>
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
                <input type="text" class="form-control <?php echo form_error('age') ? 'is-invalid' : ''; ?>" id="age"
                    name="age" value="<?php echo set_value('age'); ?>">
                <?php echo form_error('age', '<div class="invalid-feedback">', '</div>'); ?>
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

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?php echo site_url('user/index'); ?>" class="btn btn-danger">Cancel</a>

        <?php echo form_close(); ?>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
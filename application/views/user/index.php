<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Start session
// session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard CI</title>
    <link rel="shortcut icon" href="https://super-monitoring.com/blog/wp-content/uploads/2022/10/codeigniter.png.webp"
        type="image/x-icon" ;">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
        integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3">
        <div class="container p-2">
            <h2 class='text-center mt-3'>CodeIgniter User Dashboard</h2>
            <a class="btn btn-primary mt-4 mb-2" href="<?php echo base_url('user/create'); ?>"><i
                    class="bi bi-person-fill-add"></i><strong> Add User</strong>
            </a>
            <a class="btn btn-danger mt-4 mb-2 float-right" href="<?php echo base_url('login/logout'); ?>"><i
                    class="bi bi-box-arrow-right"></i><strong> Logout</strong>
            </a>
        </div>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($success_message)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        <table id="userTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <?php echo $user['id']; ?>
                        </td>
                        <td>
                            <?php echo $user['username']; ?>
                        </td>
                        <td>
                            <?php echo $user['email']; ?>
                        </td>
                        <td>
                            <?php echo $user['age']; ?>
                        </td>
                        <td>
                            <?php echo $user['gender']; ?>
                        </td>
                        <td>
                            <?php echo $user['password']; ?>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary"
                                href="<?php echo base_url('user/edit/' . $user['id']); ?>">
                                <i class="bi bi-pencil"></i>
                                <span class="ml-1"></span>
                            </a>
                            <a class="btn btn-sm btn-outline-danger"
                                href="<?php echo base_url('user/delete/' . $user['id']); ?>">
                                <i class="bi bi-trash3-fill"></i>
                                <span class="ml-1"></span>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                "paging": true, // Enable pagination
                "searching": true, // Enable search functionality
                "ordering": true, // Enable sorting
            });
        });
    </script>
</body>

</html>
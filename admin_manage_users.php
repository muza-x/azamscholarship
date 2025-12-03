<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
require 'includes/db_connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container my-5">
    <h2 class="section-title">Manage Users</h2>
    <div class="decorative-line"></div>

    <!-- STUDENTS -->
    <h4 class="mt-4 mb-3">Students</h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th><th>Name</th><th>Email</th><th>Mobile</th><th>Institute</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $students = $pdo->query("SELECT * FROM students")->fetchAll();
            $i = 1;
            foreach ($students as $stu) {
                echo "
                <tr>
                    <td>{$i}</td>
                    <td>{$stu['fullname']}</td>
                    <td>{$stu['email']}</td>
                    <td>{$stu['mobile']}</td>
                    <td>{$stu['institute']}</td>
                    <td>
                        <a href='backend/delete_user.php?id={$stu['id']}&type=student' 
                           class='btn btn-danger btn-sm'
                           onclick='return confirm(\"Delete this student?\");'>Delete</a>
                    </td>
                </tr>";
                $i++;
            }
            ?>
        </tbody>
    </table>

    <!-- PROVIDERS -->
    <h4 class="mt-4 mb-3">Providers</h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th><th>Name</th><th>Email</th><th>Mobile</th><th>Organization</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $providers = $pdo->query("SELECT * FROM providers")->fetchAll();
            $i = 1;
            foreach ($providers as $pro) {
                echo "
                <tr>
                    <td>{$i}</td>
                    <td>{$pro['fullname']}</td>
                    <td>{$pro['email']}</td>
                    <td>{$pro['mobile']}</td>
                    <td>{$pro['organization']}</td>
                    <td>
                        <a href='backend/delete_user.php?id={$pro['id']}&type=provider' 
                           class='btn btn-danger btn-sm'
                           onclick='return confirm(\"Delete this provider?\");'>Delete</a>
                    </td>
                </tr>";
                $i++;
            }
            ?>
        </tbody>
    </table>

</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>

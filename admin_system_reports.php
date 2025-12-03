<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
require 'includes/db_connection.php';

$students = $pdo->query("SELECT COUNT(*) FROM students")->fetchColumn();
$providers = $pdo->query("SELECT COUNT(*) FROM providers")->fetchColumn();
$scholarships = $pdo->query("SELECT COUNT(*) FROM scholarships")->fetchColumn();
$applications = $pdo->query("SELECT COUNT(*) FROM applications")->fetchColumn();

$approved = $pdo->query("SELECT COUNT(*) FROM applications WHERE status='approved'")->fetchColumn();
$rejected = $pdo->query("SELECT COUNT(*) FROM applications WHERE status='rejected'")->fetchColumn();
$pending = $pdo->query("SELECT COUNT(*) FROM applications WHERE status='pending'")->fetchColumn();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>System Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container my-5">
    <h2 class="section-title">System Reports</h2>
    <div class="decorative-line"></div>

    <div class="step-box p-4">
        <p><strong>Total Students:</strong> <?= $students ?></p>
        <p><strong>Total Providers:</strong> <?= $providers ?></p>
        <p><strong>Total Scholarships:</strong> <?= $scholarships ?></p>
        <p><strong>Total Applications:</strong> <?= $applications ?></p>
        <p><strong>Approved:</strong> <?= $approved ?></p>
        <p><strong>Rejected:</strong> <?= $rejected ?></p>
        <p><strong>Pending:</strong> <?= $pending ?></p>

        <a href="backend/download_report.php" class="btn-view-all mt-3">Download Full Report</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>

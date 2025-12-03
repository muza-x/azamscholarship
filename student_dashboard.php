<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-inner">
            <div class="preloader-spinner"></div>
            <div class="preloader-text">Loading...</div>
        </div>
    </div>

    <!-- Navbar -->
    <?php include 'includes/header.php'; ?>

    <div class="container my-5">
        <h2 class="section-title">Welcome, <?php echo $_SESSION['name']; ?>!</h2>
        <div class="decorative-line"></div>

        <div class="row">
            <div class="col-md-8">
                <div class="step-box">
                    <h4>My Applications</h4>
                    <?php
                    require 'includes/db_connection.php';
                    $stmt = $pdo->prepare("SELECT a.*, s.title, s.amount 
                                          FROM applications a 
                                          JOIN scholarships s ON a.scholarship_id = s.id 
                                          WHERE a.student_id = ? 
                                          ORDER BY a.applied_at DESC");
                    $stmt->execute([$_SESSION['user_id']]);
                    $applications = $stmt->fetchAll();

                    if ($applications) {
                        foreach ($applications as $app) {
                            $status_color = $app['status'] == 'approved' ? 'success' : 
                                          ($app['status'] == 'rejected' ? 'danger' : 'warning');
                            echo '
                            <div class="application-item mb-3 p-3 border rounded">
                                <h5>'.$app['title'].'</h5>
                                <p><strong>Amount:</strong> ₹'.$app['amount'].'</p>
                                <p><strong>Status:</strong> <span class="badge bg-'.$status_color.'">'.ucfirst($app['status']).'</span></p>
                                <p><strong>Applied on:</strong> '.$app['applied_at'].'</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No applications yet. <a href="view_scholarships.php">Browse scholarships</a></p>';
                    }
                    ?>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="step-box">
                    <h4>Quick Actions</h4>
                    <a href="view_scholarships.php" class="btn-view-all d-block mb-2">Browse Scholarships</a>
                    <a href="#" class="btn-view-all d-block mb-2">Update Profile</a>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
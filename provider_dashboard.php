<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'provider') {
    header("Location: login.php");
    exit();
}

// Database
require 'includes/db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Provider Dashboard</title>
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

<?php include 'includes/header.php'; ?>

<div class="container my-5">
    <h2 class="section-title">Provider Dashboard - <?php echo $_SESSION['name']; ?></h2>
    <div class="decorative-line"></div>

    <div class="row">

        <!-- ======================== LEFT SIDE ========================= -->
        <div class="col-md-4">
            <div class="step-box">
                <h4>My Scholarships</h4>

                <?php
                $stmt = $pdo->prepare("SELECT * FROM scholarships WHERE provider_id = ?");
                $stmt->execute([$_SESSION['user_id']]);
                $scholarships = $stmt->fetchAll();

                if ($scholarships) {
                    foreach ($scholarships as $sch) {
                        echo '
                        <div class="scholarship-item mb-2 p-2 border rounded">
                            <h6>'.$sch['title'].'</h6>
                            <p>₹'.$sch['amount'].' - '.$sch['deadline'].'</p>
                        </div>';
                    }
                } else {
                    echo '<p>No scholarships created yet.</p>';
                }
                ?>

                <a href="create_scholarship.php" class="btn-view-all mt-2">Create New Scholarship</a>
            </div>
        </div>

        <!-- ======================== RIGHT SIDE ========================= -->
        <div class="col-md-8">
            <div class="step-box">
                <h4>Applications Received</h4>

                <?php
                // Alerts
                if (isset($_GET['message'])) {
                    echo '<div class="alert alert-success alert-dismissible fade show"> 
                            '.$_GET['message'].'
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          </div>';
                }
                if (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show"> 
                            '.$_GET['error'].'
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          </div>';
                }

                // Fetch Applications
                $stmt = $pdo->prepare("
                    SELECT a.*, s.title AS scholarship_title, st.fullname AS student_name
                    FROM applications a
                    JOIN scholarships s ON a.scholarship_id = s.id
                    JOIN students st ON a.student_id = st.id
                    WHERE s.provider_id = ?
                    ORDER BY a.applied_at DESC
                ");
                $stmt->execute([$_SESSION['user_id']]);
                $applications = $stmt->fetchAll();

                if ($applications) {
                    foreach ($applications as $app) {

                        $status = $app['status'];
                        $status_color = ($status == 'approved') ? 'success' :
                                        (($status == 'rejected') ? 'danger' : 'warning');

                        echo '
                        <div class="application-item mb-3 p-3 border rounded">
                            <h5>'.$app['scholarship_title'].'</h5>

                            <p><strong>Student:</strong> '.$app['student_name'].'</p>
                            <p><strong>Status:</strong> 
                                <span class="badge bg-'.$status_color.'">'.ucfirst($status).'</span>
                            </p>
                            <p><strong>Applied on:</strong> '.$app['applied_at'].'</p>';

                        // ================= DOC BUTTON (NEW TAB) =================
                        if (!empty($app['document_path'])) {
                            echo '
                            <p><strong>Document:</strong>
                                <a href="assets/'.$app['document_path'].'" 
                                   target="_blank" 
                                   class="btn btn-sm btn-info text-white">
                                    View Document
                                </a>
                            </p>';
                        } else {
                            echo '<p><strong>Document:</strong> No document uploaded.</p>';
                        }

                        // =============== APPROVE / REJECT BUTTONS ===============
                        if ($status == 'pending') {
                            echo '
                            <div class="btn-group">
                                <a href="backend/manage_application.php?action=approve&id='.$app['id'].'" class="btn btn-sm btn-success">Approve</a>
                                <a href="backend/manage_application.php?action=reject&id='.$app['id'].'" class="btn btn-sm btn-danger">Reject</a>
                            </div>';
                        } else {
                            echo '<p class="text-muted"><em>Action completed - Application '.$status.'</em></p>';
                        }

                        echo '</div>';
                    }
                } else {
                    echo '<p>No applications received yet.</p>';
                }
                ?>
            </div>
        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>

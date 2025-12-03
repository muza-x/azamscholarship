<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: view_scholarships.php");
    exit();
}

$scholarship_id = $_GET['id'];
require 'includes/db_connection.php';

// Get scholarship details
$stmt = $pdo->prepare("SELECT * FROM scholarships WHERE id = ?");
$stmt->execute([$scholarship_id]);
$scholarship = $stmt->fetch();

if (!$scholarship) {
    header("Location: view_scholarships.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Apply for Scholarship</title>
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
        <h2 class="section-title">Apply for Scholarship</h2>
        <div class="decorative-line"></div>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="step-box">
                    <h4><?php echo $scholarship['title']; ?></h4>
                    <p><strong>Amount:</strong> ₹<?php echo $scholarship['amount']; ?></p>
                    <p><strong>Deadline:</strong> <?php echo $scholarship['deadline']; ?></p>
                    <p><strong>Description:</strong> <?php echo $scholarship['description']; ?></p>

                    <form action="backend/apply_scholarship_process.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="scholarship_id" value="<?php echo $scholarship_id; ?>">
                        
                        <div class="mb-3">
                            <label for="document" class="form-label">Upload Required Document (PDF/DOC/Image)</label>
                            <input type="file" class="form-control" id="document" name="document" required accept=".pdf,.doc,.docx,.jpg,.png">
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Why should you get this scholarship? (Optional)</label>
                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Tell us about your achievements and why you deserve this scholarship..."></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn-view-all">Submit Application</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
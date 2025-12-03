<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'provider') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Scholarship</title>
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
        <h2 class="section-title">Create New Scholarship</h2>
        <div class="decorative-line"></div>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="step-box">
                    <form action="backend/create_scholarship_process.php" method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label">Scholarship Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label">Scholarship Amount (₹)</label>
                            <input type="number" class="form-control" id="amount" name="amount" required min="1">
                        </div>

                        <div class="mb-3">
                            <label for="deadline" class="form-label">Application Deadline</label>
                            <input type="date" class="form-control" id="deadline" name="deadline" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn-view-all">Create Scholarship</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
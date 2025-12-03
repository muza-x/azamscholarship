<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Scholarships</title>
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

    <!-- Announcement -->
    <div class="announcement-bar">
        <marquee behavior="scroll" direction="left" scrollamount="6">
            🔔 Browse available scholarships and apply now!
        </marquee>
    </div>

    <div class="container my-5">
        <h2 class="section-title">Available Scholarships</h2>
        <div class="decorative-line"></div>

        <div class="row">
            <?php
            require 'includes/db_connection.php';
            $stmt = $pdo->query("SELECT s.*, p.organization FROM scholarships s 
                                JOIN providers p ON s.provider_id = p.id 
                                WHERE s.deadline >= CURDATE() 
                                ORDER BY s.created_at DESC");
            $scholarships = $stmt->fetchAll();

            if ($scholarships) {
                foreach ($scholarships as $scholarship) {
                    echo '
                    <div class="col-md-6 mb-4">
                        <div class="step-box">
                            <h5>'.$scholarship['title'].'</h5>
                            <p><strong>Amount:</strong> ₹'.$scholarship['amount'].'</p>
                            <p><strong>Deadline:</strong> '.$scholarship['deadline'].'</p>
                            <p><strong>Provider:</strong> '.$scholarship['organization'].'</p>
                            <p>'.substr($scholarship['description'], 0, 150).'...</p>';
                    
                    if (isset($_SESSION['user_id']) && $_SESSION['role'] == 'student') {
                        echo '<a href="apply_scholarship.php?id='.$scholarship['id'].'" class="btn-view-all">Apply Now</a>';
                    } elseif (!isset($_SESSION['user_id'])) {
                        echo '<a href="login.php" class="btn-view-all">Login to Apply</a>';
                    }
                    
                    echo '</div></div>';
                }
            } else {
                echo '<div class="col-12"><div class="step-box text-center"><p>No scholarships available at the moment.</p></div></div>';
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
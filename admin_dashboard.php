<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

require 'includes/db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container my-5">

    <h2 class="section-title text-center">Admin Dashboard</h2>
    <div class="decorative-line mb-4"></div>

    <div class="row justify-content-center">

        <!-- LEFT INFO BOX -->
        <div class="col-md-3">
            <div class="step-box text-center">
                <?php
                    $students = $pdo->query("SELECT COUNT(*) FROM students")->fetchColumn();
                    $providers = $pdo->query("SELECT COUNT(*) FROM providers")->fetchColumn();
                    $scholarships = $pdo->query("SELECT COUNT(*) FROM scholarships")->fetchColumn();
                    $applications = $pdo->query("SELECT COUNT(*) FROM applications")->fetchColumn();
                ?>

                <h4>Welcome, <?php echo $_SESSION['name']; ?>!</h4>
                <p>Students: <?php echo $students; ?></p>
                <p>Providers: <?php echo $providers; ?></p>
                <p>Scholarships: <?php echo $scholarships; ?></p>
                <p>Applications: <?php echo $applications; ?></p>
            </div>
        </div>

        <!-- QUICK ACTIONS BOX -->
        <div class="col-md-7">
    <div class="step-box">
        <h4>Quick Actions</h4>

        <div class="d-flex gap-3 flex-wrap mt-3">
            <a href="view_scholarships.php" class="btn-view-all">View Scholarships</a>
            <a href="admin_manage_users.php" class="btn-view-all">Manage Users</a>
            <a href="admin_system_reports.php" class="btn-view-all">System Reports</a>
        </div>

    </div>
</div>


    </div>

    <!-- SLIDER MANAGEMENT SECTION -->
    <div class="mt-5">
        <h4 class="mb-3">📢 Manage Homepage Slider</h4>

        <div class="step-box">

            <?php
            $slider_stmt = $pdo->query("SELECT * FROM slider_content ORDER BY slide_number");
            $slides = $slider_stmt->fetchAll();

            foreach($slides as $slide) {
                echo '
                <div class="mb-4 p-3 border rounded">
                    <h6>Slide '.$slide['slide_number'].'</h6>

                    <label class="form-label"><strong>Current Image:</strong></label><br>
                    <img src="assets/images/' . ($slide['image_url'] ?: 'slide'.$slide['slide_number'].'.jpg') . '" 
                        style="max-width: 200px; border:1px solid #ddd; border-radius:5px;">

                    <form action="backend/update_slider.php" method="POST" enctype="multipart/form-data" class="mt-3">
                        <input type="hidden" name="slide_id" value="'.$slide['id'].'">

                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label"><strong>Heading</strong></label>
                                <input type="text" name="heading" class="form-control" value="'.htmlspecialchars($slide['heading']).'" required>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label"><strong>Description</strong></label>
                                <textarea name="description" class="form-control" rows="2" required>'.htmlspecialchars($slide['description']).'</textarea>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label"><strong>Button Text</strong></label>
                                <input type="text" name="button_text" class="form-control" value="'.htmlspecialchars($slide['button_text']).'">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label"><strong>Button Link</strong></label>
                                <input type="text" name="button_link" class="form-control" value="'.htmlspecialchars($slide['button_link']).'">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label"><strong>Change Image</strong></label>
                                <input type="file" name="slide_image" class="form-control" accept="image/*">
                                <small class="text-muted">Leave empty to keep current image</small>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm mt-3">💾 Update Slide</button>
                    </form>

                </div>';
            }
            ?>
        </div>
    </div>

</div>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

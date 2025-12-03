<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Scholarship Portal - Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/navbar.css" />
  <link rel="stylesheet" href="css/slider.css" />
</head>
<body class="preloader-lock">
  <!-- PRELOADER START -->
  <div id="preloader">
    <div class="preloader-inner">
      <div class="preloader-spinner"></div>
      <div class="preloader-text">Loading...</div>
    </div>
  </div>
  <!-- PRELOADER END -->

  <!-- Navbar -->
  <?php include 'includes/header.php'; ?>

  <!-- Announcement -->
  <div class="announcement-bar">
    <marquee behavior="scroll" direction="left" scrollamount="6">
      🔔 Announcement: Scholarship deadline extended till 30th November! Apply now and grab your chance.
    </marquee>
  </div>

  <!-- ============================================= -->
  <!-- DYNAMIC SLIDER SECTION - Database se content fetch karta hai -->
  <!-- ============================================= -->
  <div class="container-fluid mt-4 px-0">
    <div id="scholarshipCarousel" class="carousel slide rounded" data-bs-ride="carousel" data-bs-interval="3000">
      
      <!-- Carousel Indicators - Dynamic dots -->
      <div class="carousel-indicators">
        <?php
        require 'includes/db_connection.php';
        // Database se active slides fetch karo
        $slider_stmt = $pdo->query("SELECT * FROM slider_content WHERE is_active = true ORDER BY slide_number");
        $slides = $slider_stmt->fetchAll();
        $slide_count = 0;
        
        // Har slide ke liye indicator dot banayo
        foreach($slides as $slide) {
            $active_class = $slide_count == 0 ? 'active' : '';
            echo '<button type="button" data-bs-target="#scholarshipCarousel" data-bs-slide-to="'.$slide_count.'" class="'.$active_class.'"></button>';
            $slide_count++;
        }
        ?>
      </div>
      
      <!-- Carousel Items - Dynamic content -->
      <div class="carousel-inner">
        <?php
        // Phir se slides fetch karo display ke liye
        $slider_stmt = $pdo->query("SELECT * FROM slider_content WHERE is_active = true ORDER BY slide_number");
        $slides = $slider_stmt->fetchAll();
        $slide_count = 0;
        
        // Har slide ko display karo
        foreach($slides as $slide) {
            $active_class = $slide_count == 0 ? 'active' : '';
            
            // Image URL check karo - agar nahi hai to default use karo
            $image_path = 'slide'.($slide_count+1).'.jpg';
            if (isset($slide['image_url']) && !empty($slide['image_url'])) {
                $image_path = $slide['image_url'];
            }
            
            echo '
            <div class="carousel-item '.$active_class.'">
              <img src="assets/images/' . $image_path . '" class="d-block w-100" alt="'.$slide['heading'].'" style="height: 450px; object-fit: cover;">
              <div class="carousel-caption">
                <h5>'.$slide['heading'].'</h5>
                <p>'.$slide['description'].'</p>';
                
            // Agar button text hai to button show karo
            if (!empty($slide['button_text'])) {
                echo '<a href="'.$slide['button_link'].'" class="btn btn-light mt-2">'.$slide['button_text'].'</a>';
            }
                
            echo '</div>
            </div>';
            $slide_count++;
        }
        ?>
      </div>

      <!-- Carousel controls - Previous/Next buttons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#scholarshipCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#scholarshipCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- Slider ends -->

  <!-- Live Scholarships Section -->
<div class="container my-5">
  <h2 class="section-title">Live Scholarships</h2>
  <div class="decorative-line"></div>

  <div class="scholarship-slider">
    <?php
      require 'includes/db_connection.php';
      $stmt = $pdo->query("SELECT * FROM scholarships WHERE deadline >= CURDATE() ORDER BY created_at DESC");
      $scholarships = $stmt->fetchAll();

      foreach($scholarships as $scholarship) {
        echo '
        <div class="sch-card">
          <h5>'.$scholarship['title'].'</h5>
          <p><strong>Amount:</strong> ₹'.$scholarship['amount'].'</p>
          <p><strong>Deadline:</strong> '.$scholarship['deadline'].'</p>
          <p>'.substr($scholarship['description'], 0, 80).'...</p>
          <a href="view_scholarships.php" class="btn-view-all">View Details</a>
        </div>';
      }
    ?>
  </div>

  <!-- View All Button -->
  <div class="text-center mt-4">
    <a href="view_scholarships.php" class="btn-view-all">View All Scholarships</a>
  </div>
</div>


  <!-- Scholarship Steps Section -->
  <div class="container my-5 scholarship-steps">
    <h2 class="section-title">How to Get Scholarship</h2>
    <div class="decorative-line"></div>

      

    <div class="row g-4">
      <div class="col-md-4">
        <div class="step-box">
          <h5>Step 1: Register</h5>
          <p>Create your student account with basic details and verify your email.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="step-box">
          <h5>Step 2: Browse Scholarships</h5>
          <p>Explore available scholarships that match your profile and interests.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="step-box">
          <h5>Step 3: Apply Online</h5>
          <p>Submit your application with required documents in few clicks.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Call to Action Section -->
<div class="container my-5">
  <div class="cta-box text-center p-5 rounded">
      <h2 class="fw-bold mb-3">Start Your Scholarship Journey Today</h2>
      <p class="mb-4">Register now and unlock hundreds of scholarships tailored just for you.</p>
      <a href="register.php" class="btn btn-cta">Register Now</a>
  </div>
</div>


  <div class="container my-5">
  <div class="row text-center">

    <div class="col-md-3">
      <h3 class="stat-number">1000+</h3>
      <p>Students Registered</p>
    </div>

    <div class="col-md-3">
      <h3 class="stat-number">50+</h3>
      <p>Scholarship Providers</p>
    </div>

    <div class="col-md-3">
      <h3 class="stat-number">200+</h3>
      <p>Scholarships Available</p>
    </div>

    <div class="col-md-3">
      <h3 class="stat-number">500+</h3>
      <p>Successful Applications</p>
    </div>

  </div>
</div>

  <?php include 'includes/footer.php'; ?>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
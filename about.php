<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>About Us - Scholarship Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/navbar.css" />
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
      🔔 New scholarships added every week! Keep checking for updates.
    </marquee>
  </div>

  <!-- About Section -->
  <div class="container my-5">
    <h2 class="section-title">About Scholarship Portal</h2>
    <div class="decorative-line"></div>
    <div class="step-box">
      <p class="lead text-center">
        The Scholarship Management System is a one-stop platform dedicated to empowering students through accessible financial aid opportunities. 
        We aim to bridge the gap between deserving students and educational funding.
      </p>
    </div>
  </div>

  <!-- Mission, Vision, Values -->
  <div class="container my-5">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="step-box">
          <h5>🎯 Our Mission</h5>
          <p>To democratize access to education by connecting students with scholarships that match their profile and potential.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="step-box">
          <h5>🌟 Our Vision</h5>
          <p>To become the most trusted and comprehensive scholarship platform for students across India.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="step-box">
          <h5>💡 Core Values</h5>
          <p>Transparency, Equality, Innovation, and Empowerment guide every step we take to support student success.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Why Choose Us -->
  <div class="container my-5">
    <h2 class="section-title">Why Choose Us?</h2>
    <div class="decorative-line"></div>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="step-box text-center">
          <h5>🔎 200+ Scholarships</h5>
          <p>Find scholarships for every field and education level in one place.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="step-box text-center">
          <h5>⚡ Easy Application</h5>
          <p>Simple and quick application process with document upload.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="step-box text-center">
          <h5>⏱ Save Time</h5>
          <p>No more manual searching. Apply directly with few clicks.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="step-box text-center">
          <h5>📈 Trusted Platform</h5>
          <p>Thousands of students have received financial aid through our portal.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Team Section -->
  <div class="container my-5">
    <h2 class="section-title">Our Team</h2>
    <div class="decorative-line"></div>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="step-box text-center">
          <h5>Sayyed Gufran</h5>
          <p>Roll No: 94</p>
          <p>BCA III Year</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="step-box text-center">
          <h5>Muzaffar Husain</h5>
          <p>Roll No: 135</p>
          <p>BCA III Year</p>
        </div>
      </div>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
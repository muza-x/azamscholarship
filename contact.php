<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact | Scholarship Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />
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

  <div class="container my-5">
    <h2 class="section-title">Contact Us</h2>
    <div class="decorative-line"></div>

    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="step-box">
          <form action="backend/contact_process.php" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Your Name</label>
              <input type="text" class="form-control" id="name" name="name" required />
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Your Email</label>
              <input type="email" class="form-control" id="email" name="email" required />
            </div>

            <div class="mb-3">
              <label for="subject" class="form-label">Subject</label>
              <input type="text" class="form-control" id="subject" name="subject" required />
            </div>

            <div class="mb-3">
              <label for="message" class="form-label">Your Message</label>
              <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn-view-all">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Contact Info -->
    <div class="row mt-5">
      <div class="col-md-4">
        <div class="step-box text-center">
          <h5>📍 Address</h5>
          <p>Dr. P.A. Inamdar University<br>Pune, Maharashtra</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="step-box text-center">
          <h5>📞 Phone</h5>
          <p>+91 9876543210<br>+91 9123456789</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="step-box text-center">
          <h5>📧 Email</h5>
          <p>info@scholarshipportal.edu<br>support@scholarshipportal.edu</p>
        </div>
      </div>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
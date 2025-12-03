<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register | Scholarship Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/auth.css" />
</head>
<body class="register-bg">
  <!-- Preloader -->
  <div id="preloader">
    <div class="preloader-inner">
      <div class="preloader-spinner"></div>
      <div class="preloader-text">Loading...</div>
    </div>
  </div>

  <div class="register-container">
    <div class="register-card">
      <h3>📝 Register</h3>

      <form action="backend/register_process.php" method="POST">
        <div class="mb-3">
          <label for="fullname" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="fullname" name="fullname" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
          <label for="mobile" class="form-label">Mobile Number</label>
          <input type="tel" class="form-control" id="mobile" name="mobile" required pattern="[0-9]{10}">
        </div>

        <div class="mb-3">
          <label for="role" class="form-label">Register As</label>
          <select class="form-select" id="role" name="role" required>
            <option value="">-- Select Role --</option>
            <option value="student">🎓 Student</option>
            <option value="provider">🏫 Provider</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="institute" class="form-label" id="institute_label">Institute Name</label>
          <input type="text" class="form-control" id="institute" name="institute" placeholder="Enter your institute/organization name">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
          <label for="confirm_password" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-register">Register</button>
        </div>

        <p class="text-center mt-3">
          Already have an account? <a href="login.php">Login here</a>
        </p>
      </form>
    </div>
  </div>

  <script>
    // Dynamic label change based on role
    document.getElementById('role').addEventListener('change', function() {
      const label = document.getElementById('institute_label');
      if (this.value === 'student') {
        label.textContent = 'Institute Name';
        document.getElementById('institute').placeholder = 'Enter your institute name';
      } else if (this.value === 'provider') {
        label.textContent = 'Organization Name';
        document.getElementById('institute').placeholder = 'Enter your organization name';
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
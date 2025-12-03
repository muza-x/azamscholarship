<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | Scholarship Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/auth.css" />
</head>
<body class="login-bg">
  <!-- Preloader -->
  <div id="preloader">
    <div class="preloader-inner">
      <div class="preloader-spinner"></div>
      <div class="preloader-text">Loading...</div>
    </div>
  </div>

  <div class="login-container">
    <div class="login-card">
      <h3>🔐 Login</h3>

      <form action="backend/login_process.php" method="POST">
        <div class="mb-3">
          <label for="role" class="form-label">Login As</label>
          <select class="form-select" id="role" name="role" required>
            <option value="">-- Select Role --</option>
            <option value="student">🎓 Student</option>
            <option value="provider">🏫 Provider</option>
            <option value="admin">⚙️ Admin</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email/Username</label>
          <input type="text" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-login">Login</button>
        </div>

        <p class="text-center mt-3">
          Don't have an account? <a href="register.php">Register here</a>
        </p>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f2f2f2;
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-box {
      width: 50%;
      background-color: #fff;
      padding: 40px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .login-box img {
      margin-bottom: 20px;
    }
    .login-box h1 {
      margin-bottom: 20px;
    }
    .form-group {
      text-align: left;
      margin-bottom: 10px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
    }
    .form-group input[type="radio"] {
      display: inline-block;
      vertical-align: middle;
      margin-right: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-box">
      <img src="../images/ayologo.png" width="100px" alt="" srcset="">
      <h1>Ayo Daftar</h1>
      <form action="/register" method="post">
        @csrf
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
          </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
        </div>
        <div class="form-group">
            <label>Daftar Sebagai</label>
            <div class="form-check">
              <input type="radio" class="form-check-input" id="pemilik" name="role" value="pemilik" required>
              <label class="form-check-label" for="pemilik">Pemilik Kost</label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" id="pencari" name="role" value="penghuni" required>
              <label class="form-check-label" for="penghuni">Pencari Kost</label>
            </div>
          </div>

        <p>Sudah punya akun? <a href="/login">Login</a></p>
        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

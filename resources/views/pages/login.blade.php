
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

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
    .login-box h2 {
      margin-bottom: 20px;
    }
    .form-group {
      text-align: left;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
    }
  </style>

<div class="container">
    <div class="login-box">
        <img src="../images/ayologo.png" width="100px" alt="" srcset="">
        <h1>Ayo Login</h1>
        <form method="POST" action="/login">
            @csrf
            @if(session()->has('loginError'))
                <div class="alert alert-danger" role="alert">
                    {{ session('loginError') }}
                </div>
            @endif
            <div class="form-group">
                <label for="username">Email</label>
                <input type="text" class="form-control" id="username" name="email" placeholder="Enter your username">
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
            <br>
            <p>Belum punya akun? <a href="/register">Register</a></p>
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </form>
    </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- Google Fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
  <style>
    body {
        color:#706660;
        background-image: url('../public/admin/images/paper-money-table.jpg');
      background-position:center;
      background-size:cover;
      background-color: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;

      font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    .card {
      max-width: 400px;
      margin-top: 40px;
      background-color: #F2EDC5;
      border: 0;
    }

    .card-header {
      background-color: #CFE3CB;
      text-align: center;
      padding: 10px;
      border-radius: 8px 8px 0 0;
    }

    .card-body {
      padding: 40px;
    }

    .card-footer {
      background-color: #CFE3CB;
      text-align: center;
      padding: 10px;
      border-radius: 0 0 8px 8px;
    }

    .card-footer .form-links a {
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 30px;
      color: black;
      padding: 10px;
      border-radius: 8px;
      font-size: 24px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      color: #555;
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ced4da;
      border-radius: 6px;
      transition: border-color 0.3s;
    }

    .form-group input:focus {
      border-color: #CFE3CB;
    }

    .form-group button {
        color: #706660;
      width: 100%;
      padding: 12px;
      background-color: #CFE3CB;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .form-group button:hover {
      background-color: #25a18e;
    }

    .form-links {
      text-align: center;
      margin-top: 20px;
      color: #555;
    }

    .form-links a {
      color: #706660;
      text-decoration: none;
      margin: 0 15px;
      display: inline-block;
      transition: color 0.3s;
    }

    .form-links a:hover {
      color: #9fffcb;
    }

    .form-links i {
      margin-right: 5px;
    }
    @media screen and (max-width: 992px) {
  body {
   background-image: url();
  }
}
  </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-7">
            <div class="card ">
                <div class="card-header text-center pb-1 pt-4">
                  <p class="h2">Welcome</p>
                  <p>Fill all fields to login</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                        @csrf
                    <div class="form-group">
                      <label for="email"><i class="fas fa-user"></i> Username</label>
                      <input type="email" id="email" name="email" class="form-control" required autocomplete="new-email">
                    </div>
                    <div class="form-group">
                      <label for="password"><i class="fas fa-lock"></i> Password</label>
                      <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer pb-4 pt-1">
                  <div class="form-links">
                    <a href="{{route('register')}}" class="btn"><i class="fas fa-user-plus"></i> Sign Up</a>
                    <span>|</span>
                    <a href="#" class="btn"><i class="fas fa-question-circle"></i> Forgot password?</a>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>


  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Login page for the application.">
  <meta name="keywords" content="login, authentication">
  <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
  <title>Login - {{ config('app.name') }}</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
  <div class="loader-wrapper" id="loader-wrapper">
    <div class="loader"></div>
  </div>

  <section class="page-section login-page">
    <div class="full-width-screen">
      <div class="container-fluid">
        <div class="content-detail">
          <!-- Login form -->
          <form class="login-form" method="post" action="{{ url('/login') }}">
            @csrf
            <div class="imgcontainer">
              <a href="{{ url('/home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="avatar">
              </a>
            </div>

            <div class="input-control">
              <!-- Email Input -->
              <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
              @error('email')
                <span class="error invalid-feedback">{{ $message }}</span>
              @enderror

              <!-- Password Input -->
              <span class="password-field-show">
                <input type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                <span data-toggle=".password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </span>
              @error('password')
                <span class="error invalid-feedback">{{ $message }}</span>
              @enderror

              <!-- Remember Me Checkbox -->
              <label class="label-container">Remember Me
                <input type="checkbox" id="remember" name="remember">
                <span class="checkmark"></span>
              </label>

              <!-- Forgot Password Link -->
              <span class="psw">
                <a href="{{ route('password.request') }}" class="forgot-btn">Forgot password?</a>
              </span>

              <!-- Login Button -->
              <div class="login-btns">
                <button type="submit">Login</button>
              </div>

              <!-- Register Link -->
              <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>

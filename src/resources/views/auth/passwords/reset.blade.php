<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Password reset page for the application.">
  <meta name="keywords" content="password reset, recovery">
  <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
  <title>Password Reset - {{ config('app.name') }}</title>
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
          <!-- Forgot form -->
          <form class="forgot-form" method="post" action="{{ route('password.update') }}">
            @csrf

            <div class="imgcontainer">
              <a href="{{ url('/home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="avatar">
              </a>
            </div>

            <div class="input-control">
              <p>Enter your email, we will send a link to reset your password.</p>

              <input type="hidden" name="token" value="{{ $token }}">

              <input type="email" placeholder="Enter your email" name="email" value="{{ $email ?? old('email') }}" class="form-control @error('email') is-invalid @enderror" required readonly>
              @error('email')
                <span class="error invalid-feedback">{{ $message }}</span>
              @enderror

              <input type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror" required>
              @error('password')
                <span class="error invalid-feedback">{{ $message }}</span>
              @enderror

              <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control" required>

              <div class="login-btns">
                <button type="submit">Reset</button>
              </div>

              <div class="login-with-btns">
                <span class="already-acc">Return to<a href="{{ route('login') }}" class="login-btn"> Login</a></span>
              </div>
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

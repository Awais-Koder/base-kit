<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Confirm Password for {{ config('app.name') }}">
  <meta name="keywords" content="confirm password, security, login">
  <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
  <title>Confirm Password - {{ config('app.name') }}</title>
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
          <form class="login-form" method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="imgcontainer">
              <a href="{{ url('/home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="avatar">
              </a>
            </div>

            <div class="input-control">
              <p class="login-box-msg">Please confirm your password before continuing.</p>

              <div class="input-group mb-3">
                <input type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                @error('password')
                  <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="login-btns">
                <button type="submit" class="btn btn-primary">Confirm Password</button>
              </div>

              <p class="mt-3 mb-1">
                <a href="{{ route('password.request') }}">Forgot Your Password?</a>
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

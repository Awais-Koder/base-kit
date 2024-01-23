<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Registration page for the application.">
  <meta name="keywords" content="registration, sign up">
  <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
  <title>Register - {{ config('app.name') }}</title>
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
          <!-- Signup form -->
          {{-- <form class="signup-form" method="post" action="{{ route('register') }}"> --}}
        <form class="signup-form" method="post" action="{{ route('register') }}" onsubmit="return checkTerms()">

            @csrf
            <div class="imgcontainer">
              <a href="{{ url('/home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="avatar">
              </a>
            </div>

            <div class="input-control">
              <div class="row p-l-5 p-r-5">
                <!-- Name Input -->
                <div class="col-md-6 p-l-10 p-r-10">
                  <input type="text" placeholder="Full name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                  @error('name')
                    <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Email Input -->
                <div class="col-md-6 p-l-10 p-r-10">
                  <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                  @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Password Input -->
                <div class="col-md-6 p-l-10 p-r-10">
                  <input type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                  @error('password')
                    <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Confirm Password Input -->
                <div class="col-md-6 p-l-10 p-r-10">
                  <input type="password" placeholder="Retype password" name="password_confirmation" class="form-control" required>
                </div>
              </div>

              <!-- Terms and Conditions Checkbox -->
              <label class="label-container">I agree to the <a href="#">terms</a>
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <span class="checkmark"></span>
            </label>
            <p id="termsError" style="color:red; display:none;">Please agree to the terms to proceed</p>
        
              

              <!-- Register Button -->
              <div class="login-btns">
                <button type="submit">Register</button>
              </div>

              <!-- Existing Member Link -->
              <span class="already-acc">
                Already have an account? <a href="{{ route('login') }}" class="login-btn">Login</a>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/script.js') }}"></script>

  <script>
    function checkTerms() {
        var isChecked = document.getElementById('agreeTerms').checked;
        if (!isChecked) {
            document.getElementById('termsError').style.display = 'block';
            return false; // Prevent form submission
        }
        return true;
    }
</script>


</body>

</html>

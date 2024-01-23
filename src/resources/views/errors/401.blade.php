<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Erratum – Multi-purpose error page template for various services including corporate, agency, consulting, startups.">
    <meta name="keywords" content="Error page 401, unauthorized access, security">
    <meta name="author" content="Ashishmaraviya">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon"/>
    <title>401 - Unauthorized Access</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/error-page.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/error-page-responsive.css') }}">
</head>
<body>
    <div class="loader-wrapper" id="loader-wrapper">
        <div class="loader"></div>
    </div>
    <section class="page-section">
      <div class="full-width-screen">
        <div class="container-fluid">
          <div class="content-detail">
            <div class="pendulum-platform">
              <div class="pendulum-holder"></div>
              <div class="pendulum-thread">
                <div class="pendulum-knob"></div>
                <div class="pendulum">401</div>
              </div>
              <div class="pendulum-shadow"></div>
            </div>
            <div class="text-detail">
              <h4 class="sub-title">Oops!</h4>
              <p class="detail-text">Unauthorized,<br> You are trying to access a resource that has not been authenticated.</p>
              <div class="back-btn">
                <a href="{{ url('/') }}" class="btn">Back to Home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>

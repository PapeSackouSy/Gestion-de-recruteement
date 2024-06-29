<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Gestion De Recrutement</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link rel="shortcut icon" href="{{asset('Auth/assets/img/logo uabd.jpg')}}" />
        <link href="{{asset('Auth/assets/img/nouveau-logo-uadb.png')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{asset('Auth/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('Auth/assets/vendor/aos/aos.css')}}" rel="stylesheet">
        <link href="{{asset('Auth/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('Auth/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('Auth/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('Auth/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('Auth/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
        <link href="{{asset('Auth/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

        <link href="{{asset('Auth/assets/css/style.css')}}" rel="stylesheet">
      </head>
<body>
<div id="topbar" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">uadb.edu.sn</a>
        <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
      </div>
      <div class="cta d-none d-md-block">
        <a href="#about" class="scrollto">Get Started</a>
      </div>
    </div>
  </div>
<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">
         <img src="{{asset('Auth/assets/img/nouveau-logo-uadb.png')}}" width="380" alt="">
          <h1 class="logo" ><a href="index.html"></a></h1>
          <nav id="navbar" class="navbar"  >
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li class="nav-item"><a class="nav-link btn btn-primary" href="{{route('candidature')}}">Voire Offres</a></li>
          <li class="nav-item"><a class="nav-link btn btn-primary" href="{{route('login')}}">Login</a></li>
          <li class="nav-item"><a class="nav-link btn btn-primary" href="{{route('register')}}">Register</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>@yield('title') | {{ config('app.name') }} </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="i/favicon.png" type="image/x-icon">
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=DM+Sans:100,200,300,400,600,500,700,800,900|DM+Sans:100,200,300,400,500,600,700,800,900&amp;subset=latin"
    rel="stylesheet">
  <!-- Bootstrap 4.3.1 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Slick 1.8.1 jQuery plugin CSS (Sliders) -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <!-- Fancybox 3 jQuery plugin CSS (Open images and video in popup) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
  <!-- AOS 2.3.4 jQuery plugin CSS (Animations) -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <!-- FontAwesome CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- Kiwi News CSS (Styles for all blocks) -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- jQuery 3.3.1 -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<body>
  <!-- Navigation Mobile type 1 -->

  <a href="#" class="open_menu bg-light radius_full"><i class="fas fa-bars lh-40"></i></a>
  <div class="navigation_mobile bg-dark type1">
    <a href="#" class="close_menu color-white"><i class="fas fa-times"></i></a>
    <div class="px-40 pt-60 pb-60 inner">
      <div class="logo color-white mb-30">{{ config('app.name') }} </div>
      <div><a href="#" class="f-heading f-22 link color-white mb-20">Home</a></div>
      <div><a href="#" class="f-heading f-22 link color-white mb-20">Tour</a></div>
      <div><a href="#" class="f-heading f-22 link color-white mb-20">Mobile Apps</a></div>
      <div><a href="#" class="f-heading f-22 link color-white mb-20">Pricing</a></div>
      <div><a href="#" class="f-heading f-22 link color-white mb-20">Development</a></div>
      <div><a href="#" class="link color-white op-3 mb-15">Help</a></div>
      <div><a href="#" class="link color-white op-3 mb-15">F.A.Q.</a></div>
      <div><a href="#" class="link color-white op-3 mb-15">Support</a></div>
      <div><a href="#" class="link color-white op-3 mb-15">About Us</a></div>
      <div><a href="#" class="link color-white op-3 mb-15">Blog</a></div>
      <div><a href="#" class="link color-white op-3 mb-15">Careers</a></div>

      <div class="socials mt-40">
        <a href="#" target="_blank" class="link color-white f-18 mr-20"><i class="fab fa-twitter"></i></a>
        <a href="#" target="_blank" class="link color-white f-18 mr-20"><i class="fab fa-facebook"></i></a>
        <a href="#" target="_blank" class="link color-white f-18 mr-20"><i class="fab fa-google-plus-g"></i></a>
      </div>

      <div class="mt-50 f-14 light color-white op-3 copy">&copy; 2020 Designmodo. All rights reserved.</div>
    </div>
  </div>
  <!-- Header 1 -->

  <header class="pt-195 pb-110 bg-light header_1">

    <!-- Header Menu 1 -->

    <nav class="header_menu_1 pt-30 pb-30 mt-30">
      <div class="container px-xl-0">
        <div class="row justify-content-center align-items-center f-18 medium">
          <div class="col-lg-3 logo" data-aos-duration="600" data-aos="fade-down" data-aos-delay="1200">{{ config('app.name') }} </div>
          <div class="col-lg-6 text-center" data-aos-duration="600" data-aos="fade-down" data-aos-delay="900">
            <a href="#" class="link color-heading mx-15">Home</a>
            <a href="#" class="link color-heading mx-15">Latest News</a>
            <a class="link color-heading mx-15 dropdown-toggle" data-toggle="dropdown" href="#" role="button"
              aria-haspopup="true" aria-expanded="false">Countries</a>
            <span class="dropdown-menu">
              <a class="dropdown-item link color-heading mx-15" href="#">United Kingdom</a>
              <a class="dropdown-item link color-heading mx-15" href="#">India</a>
            </span>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-end align-items-center" data-aos-duration="600"
            data-aos="fade-down" data-aos-delay="1200">
            <a href="#" class="mr-20 link color-heading">Sign In</a>
            <a href="#" class="btn sm action-1">Sign Up</a>
          </div>
        </div>
      </div>
    </nav>


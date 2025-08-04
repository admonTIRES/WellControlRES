<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&amp;display=swap" rel="stylesheet">


    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Website Menu #9</title>
  </head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Niconne&family=Jura:wght@400;700&display=swap');

    body {
  font-family: 'Poppins', sans-serif;
  background-color: #fff;
  height: 200vh;
  position: relative; }
  body:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    -webkit-transition: .3s all ease;
    -o-transition: .3s all ease;
    transition: .3s all ease;
    opacity: 0;
    visibility: hidden;
    z-index: 1; }
  body.offcanvas-menu:before {
    opacity: 1;
    z-index: 1002;
    visibility: visible; }

p {
  color: #b3b3b3;
  font-weight: 300; }

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  font-family: 'Poppins', sans-serif;
}

a {
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease; }
  a, a:hover {
    text-decoration: none !important; }

.hero {
  height: 100vh;
  width: 100%;
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat; }

.site-navbar {
  margin-bottom: 0px;
  z-index: 1999;
  position: absolute;
  width: 100%;
  top: 2rem; }
  .site-navbar .container-fluid {
    padding-left: 7rem;
    padding-right: 7rem; }
    @media (max-width: 1199.98px) {
      .site-navbar .container-fluid {
        padding-left: 15px;
        padding-right: 15px; } }
  .site-navbar .site-logo {
    position: absolute;
    left: 5%; }
    @media (max-width: 767.98px) {
      .site-navbar .site-logo {
        position: relative;
        left: auto; } }
    .site-navbar .site-logo a {
      color: #fff;
      font-size: 1.5rem;
      letter-spacing: .2rem;
      text-transform: uppercase; }
      .site-navbar .site-logo a:hover {
        text-decoration: none; }
  .site-navbar .site-burger-menu, .site-navbar .right-cta-menu {
    position: absolute;
    right: 5%; }
    @media (max-width: 767.98px) {
      .site-navbar .site-burger-menu, .site-navbar .right-cta-menu {
        position: relative;
        right: auto; } }
  .site-navbar .site-menu-toggle {
    color: #fff;
    line-height: 0;
    font-size: 2.5rem;
    position: relative; }
    @media (max-width: 767.98px) {
      .site-navbar .site-menu-toggle {
        margin-left: 5px; } }
  .site-navbar .site-navigation {
    position: absolute;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
    z-index: 5; }
    .site-navbar .site-navigation .site-menu {
      margin-bottom: 0; }
      .site-navbar .site-navigation .site-menu .active {
        color: #fff;
        display: inline-block;
        padding: 5px 20px; }
      .site-navbar .site-navigation .site-menu a {
        text-decoration: none !important;
        display: inline-block;
        position: relative; }
      .site-navbar .site-navigation .site-menu > li {
        display: inline-block; }
        .site-navbar .site-navigation .site-menu > li > a {
          padding: 20px 20px !important;
          color: rgba(255, 255, 255, 0.5);
          display: inline-block;
          text-decoration: none !important; }
          .site-navbar .site-navigation .site-menu > li > a:hover {
            color: #fff; }
      .site-navbar .site-navigation .site-menu .has-children {
        position: relative; }
        .site-navbar .site-navigation .site-menu .has-children > a {
          position: relative;
          padding-right: 20px; }
          .site-navbar .site-navigation .site-menu .has-children > a:before {
            position: absolute;
            content: "\e313";
            font-size: 16px;
            top: 50%;
            right: 0;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            font-family: 'icomoon'; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown {
          visibility: hidden;
          opacity: 0;
          top: 100%;
          position: absolute;
          text-align: left;
          border-top: 2px solid #89ba16;
          -webkit-box-shadow: 0 2px 20px -2px rgba(0, 0, 0, 0.2);
          box-shadow: 0 2px 20px -2px rgba(0, 0, 0, 0.2);
          padding: 0px 0;
          margin-top: 20px;
          margin-left: 0px;
          background: #fff;
          -webkit-transition: 0.2s 0s;
          -o-transition: 0.2s 0s;
          transition: 0.2s 0s; }
          .site-navbar .site-navigation .site-menu .has-children .dropdown.arrow-top {
            position: absolute; }
            .site-navbar .site-navigation .site-menu .has-children .dropdown.arrow-top:before {
              bottom: 100%;
              left: 20%;
              border: solid transparent;
              content: " ";
              height: 0;
              width: 0;
              position: absolute;
              pointer-events: none; }
            .site-navbar .site-navigation .site-menu .has-children .dropdown.arrow-top:before {
              border-color: rgba(136, 183, 213, 0);
              border-bottom-color: #fff;
              border-width: 10px;
              margin-left: -10px; }
          .site-navbar .site-navigation .site-menu .has-children .dropdown li {
            line-height: 1.4; }
          .site-navbar .site-navigation .site-menu .has-children .dropdown a {
            text-transform: none;
            letter-spacing: normal;
            -webkit-transition: 0s all;
            -o-transition: 0s all;
            transition: 0s all;
            color: #343a40; }
            .site-navbar .site-navigation .site-menu .has-children .dropdown a.active {
              background: #ebeef0;
              color: #89ba16; }
          .site-navbar .site-navigation .site-menu .has-children .dropdown > li {
            list-style: none;
            padding: 0;
            margin: 0;
            min-width: 200px; }
            .site-navbar .site-navigation .site-menu .has-children .dropdown > li > a {
              padding: 9px 20px;
              display: block; }
              .site-navbar .site-navigation .site-menu .has-children .dropdown > li > a:hover {
                background: #ebeef0;
                color: #212529; }
            .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children > a:before {
              content: "\e315";
              right: 20px; }
            .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children > a.active {
              background: #ebeef0;
              color: #89ba16; }
            .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children > .dropdown, .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children > ul {
              left: 100%;
              top: 0; }
            .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children:hover > a, .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children:active > a, .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children:focus > a {
              background: #ebeef0;
              color: #212529; }
        .site-navbar .site-navigation .site-menu .has-children:hover, .site-navbar .site-navigation .site-menu .has-children:focus, .site-navbar .site-navigation .site-menu .has-children:active {
          cursor: pointer; }
          .site-navbar .site-navigation .site-menu .has-children:hover > .dropdown, .site-navbar .site-navigation .site-menu .has-children:focus > .dropdown, .site-navbar .site-navigation .site-menu .has-children:active > .dropdown {
            -webkit-transition-delay: 0s;
            -o-transition-delay: 0s;
            transition-delay: 0s;
            margin-top: 0px;
            visibility: visible;
            opacity: 1; }
      .site-navbar .site-navigation .site-menu.site-menu-dark > li > a {
        color: black;
        position: relative; }
        .site-navbar .site-navigation .site-menu.site-menu-dark > li > a:after {
          height: 2px;
          background: #000;
          content: "";
          position: absolute;
          bottom: 0;
          left: 20px;
          right: 20px;
          -webkit-transform: scale(0);
          -ms-transform: scale(0);
          transform: scale(0);
          -webkit-transition: .3s all ease;
          -o-transition: .3s all ease;
          transition: .3s all ease; }
        .site-navbar .site-navigation .site-menu.site-menu-dark > li > a:hover, .site-navbar .site-navigation .site-menu.site-menu-dark > li > a.active {
          color: #89ba16;
          position: relative; }
          .site-navbar .site-navigation .site-menu.site-menu-dark > li > a:hover:after, .site-navbar .site-navigation .site-menu.site-menu-dark > li > a.active:after {
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1); }

.site-mobile-menu {
  width: 300px;
  position: fixed;
  right: 0;
  z-index: 2000;
  padding-top: 20px;
  background: #fff;
  height: calc(100vh);
  -webkit-transform: translateX(110%);
  -ms-transform: translateX(110%);
  transform: translateX(110%);
  -webkit-box-shadow: -10px 0 20px -10px rgba(0, 0, 0, 0.1);
  box-shadow: -10px 0 20px -10px rgba(0, 0, 0, 0.1);
  -webkit-transition: 0.2s all cubic-bezier(0.66, 0.2, 0.48, 0.9);
  -o-transition: 0.2s all cubic-bezier(0.66, 0.2, 0.48, 0.9);
  transition: 0.2s all cubic-bezier(0.66, 0.2, 0.48, 0.9); }
  .offcanvas-menu .site-mobile-menu {
    -webkit-transform: translateX(0%);
    -ms-transform: translateX(0%);
    transform: translateX(0%); }
  .site-mobile-menu .site-mobile-menu-header {
    width: 100%;
    float: left;
    padding-left: 20px;
    padding-right: 20px; }
    .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close {
      float: right;
      margin-top: 8px; }
      .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close span {
        font-size: 30px;
        display: inline-block;
        padding-left: 10px;
        padding-right: 0px;
        line-height: 1;
        cursor: pointer;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease; }
        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close span:hover {
          color: #dee2e6; }
    .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo {
      float: left;
      margin-top: 10px;
      margin-left: 0px; }
      .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a {
        display: inline-block;
        text-transform: uppercase; }
        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a img {
          max-width: 70px; }
        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a:hover {
          text-decoration: none; }
  .site-mobile-menu .site-mobile-menu-body {
    overflow-y: scroll;
    -webkit-overflow-scrolling: touch;
    position: relative;
    padding: 0 20px 20px 20px;
    height: calc(100vh - 52px);
    padding-bottom: 150px; }
  .site-mobile-menu .site-nav-wrap {
    padding: 0;
    margin: 0;
    list-style: none;
    position: relative; }
    .site-mobile-menu .site-nav-wrap a {
      padding: 10px 20px;
      display: block;
      position: relative;
      color: #212529; }
      .site-mobile-menu .site-nav-wrap a:hover {
        color: #89ba16;
        text-decoration: none; }
    .site-mobile-menu .site-nav-wrap li {
      position: relative;
      display: block; }
      .site-mobile-menu .site-nav-wrap li .active {
        color: #000; }
    .site-mobile-menu .site-nav-wrap .arrow-collapse {
      position: absolute;
      right: 0px;
      top: 10px;
      z-index: 20;
      width: 36px;
      height: 36px;
      text-align: center;
      cursor: pointer;
      border-radius: 50%; }
      .site-mobile-menu .site-nav-wrap .arrow-collapse:hover {
        background: #f8f9fa; }
      .site-mobile-menu .site-nav-wrap .arrow-collapse:before {
        font-size: 12px;
        z-index: 20;
        font-family: "icomoon";
        content: "\f078";
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%) rotate(-180deg);
        -ms-transform: translate(-50%, -50%) rotate(-180deg);
        transform: translate(-50%, -50%) rotate(-180deg);
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease; }
      .site-mobile-menu .site-nav-wrap .arrow-collapse.collapsed:before {
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%); }
    .site-mobile-menu .site-nav-wrap > li {
      display: block;
      position: relative;
      float: left;
      width: 100%; }
      .site-mobile-menu .site-nav-wrap > li > a {
        padding-left: 20px;
        font-size: 20px; }
      .site-mobile-menu .site-nav-wrap > li > ul {
        padding: 0;
        margin: 0;
        list-style: none; }
        .site-mobile-menu .site-nav-wrap > li > ul > li {
          display: block; }
          .site-mobile-menu .site-nav-wrap > li > ul > li > a {
            padding-left: 40px;
            font-size: 16px; }
          .site-mobile-menu .site-nav-wrap > li > ul > li > ul {
            padding: 0;
            margin: 0; }
            .site-mobile-menu .site-nav-wrap > li > ul > li > ul > li {
              display: block; }
              .site-mobile-menu .site-nav-wrap > li > ul > li > ul > li > a {
                font-size: 16px;
                padding-left: 60px; }
    .site-mobile-menu .site-nav-wrap[data-class="social"] {
      float: left;
      width: 100%;
      margin-top: 30px;
      padding-bottom: 5em; }
      .site-mobile-menu .site-nav-wrap[data-class="social"] > li {
        width: auto; }
        .site-mobile-menu .site-nav-wrap[data-class="social"] > li:first-child a {
          padding-left: 15px !important; }

.sticky-wrapper {
  position: absolute;
  z-index: 100;
  width: 100%; }
  .sticky-wrapper + .site-blocks-cover {
    margin-top: 96px; }
  .sticky-wrapper .site-menu-toggle {
    color: #000; }
    @media (max-width: 991.98px) {
      .sticky-wrapper .site-menu-toggle {
        color: #fff; } }
  .sticky-wrapper .site-navbar {
    -webkit-transition: .3s all ease;
    -o-transition: .3s all ease;
    transition: .3s all ease; }
    .sticky-wrapper .site-navbar .site-menu > li {
      display: inline-block; }
      .sticky-wrapper .site-navbar .site-menu > li > a {
        position: relative; }
        .sticky-wrapper .site-navbar .site-menu > li > a:after {
          height: 2px;
          background: #fff;
          content: "";
          position: absolute;
          bottom: 0;
          left: 20px;
          right: 20px;
          -webkit-transform: scale(0);
          -ms-transform: scale(0);
          transform: scale(0);
          -webkit-transition: .3s all ease;
          -o-transition: .3s all ease;
          transition: .3s all ease; }
        .sticky-wrapper .site-navbar .site-menu > li > a:hover, .sticky-wrapper .site-navbar .site-menu > li > a.active {
          color: #fff;
          position: relative; }
          .sticky-wrapper .site-navbar .site-menu > li > a:hover:after, .sticky-wrapper .site-navbar .site-menu > li > a.active:after {
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1); }
  .sticky-wrapper.is-sticky .site-menu-toggle {
    color: #000; }
  .sticky-wrapper.is-sticky .site-navbar {
    -webkit-box-shadow: 4px 0 20px -5px rgba(0, 0, 0, 0.2);
    box-shadow: 4px 0 20px -5px rgba(0, 0, 0, 0.2);
    background: #fff; }
    .sticky-wrapper.is-sticky .site-navbar .site-logo a {
      color: #000; }
    .sticky-wrapper.is-sticky .site-navbar .site-menu > li {
      display: inline-block; }
      .sticky-wrapper.is-sticky .site-navbar .site-menu > li > a {
        position: relative;
        color: #000; }
        .sticky-wrapper.is-sticky .site-navbar .site-menu > li > a:after {
          height: 2px;
          background: #89ba16;
          content: "";
          position: absolute;
          bottom: 0;
          left: 20px;
          right: 20px;
          -webkit-transform: scale(0);
          -ms-transform: scale(0);
          transform: scale(0);
          -webkit-transition: .3s all ease;
          -o-transition: .3s all ease;
          transition: .3s all ease; }
        .sticky-wrapper.is-sticky .site-navbar .site-menu > li > a:hover, .sticky-wrapper.is-sticky .site-navbar .site-menu > li > a.active {
          color: #89ba16;
          position: relative; }
          .sticky-wrapper.is-sticky .site-navbar .site-menu > li > a:hover:after, .sticky-wrapper.is-sticky .site-navbar .site-menu > li > a.active:after {
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1); }
  .sticky-wrapper .shrink {
    padding-top: 10px !important;
    padding-bottom: 10px !important; }

.btn:after, .btn:before {
  display: none; }

.btn:hover, .btn:focus, .btn:active {
  outline: none;
  -webkit-box-shadow: none !important;
  box-shadow: none !important; }

.btn.btn-primary {
  color: #fff;
  background: #89ba16;
  border-color: #89ba16; }
  .btn.btn-primary:hover {
    background: #90c317;
    border-color: #90c317; }

.btn.btn-outline-white {
  background: transparent;
  border-width: 2px;
  border-color: #fff;
  color: #fff; }
  .btn.btn-outline-white:hover {
    background: #fff;
    color: #000; }

.btn.btn-outline-primary {
  color: #89ba16; }
  .btn.btn-outline-primary:hover {
    color: #fff;
    background: #89ba16; }

  </style>
  <body>


    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"><ul class="site-nav-wrap">
              <li><a href="index.html" class="nav-link active">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li class="has-children"><span class="arrow-collapse collapsed" data-toggle="collapse" data-target="#collapseItem0"></span>
                <a href="job-listings.html">Job Listings</a>
                <ul class="collapse" id="collapseItem0">
                  <li><a href="job-single.html">Job Single</a></li>
                  <li><a href="post-job.html">Post a Job</a></li>
                </ul>
              </li>
              <li class="has-children"><span class="arrow-collapse collapsed" data-toggle="collapse" data-target="#collapseItem1"></span>
                <a href="services.html">Pages</a>
                <ul class="collapse" id="collapseItem1">
                  <li><a href="services.html">Services</a></li>
                  <li><a href="service-single.html">Service Single</a></li>
                  <li><a href="blog-single.html">Blog Single</a></li>
                  <li><a href="portfolio.html">Portfolio</a></li>
                  <li><a href="portfolio-single.html">Portfolio Single</a></li>
                  <li><a href="testimonials.html">Testimonials</a></li>
                  <li><a href="faq.html">Frequently Ask Questions</a></li>
                  <li><a href="gallery.html">Gallery</a></li>
                </ul>
              </li>
              <li><a href="blog.html">Blog</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span> Post a Job</a></li>
              <li class="d-lg-none"><a href="login.html">Log In</a></li>
            </ul></div>
    </div> <!-- .site-mobile-menu -->
    

    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.html">Brand</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="index.html" class="nav-link active">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li class="has-children">
                <a href="job-listings.html">Job Listings</a>
                <ul class="dropdown">
                  <li><a href="job-single.html">Job Single</a></li>
                  <li><a href="post-job.html">Post a Job</a></li>
                </ul>
              </li>
              <li class="has-children">
                <a href="services.html">Pages</a>
                <ul class="dropdown">
                  <li><a href="services.html">Services</a></li>
                  <li><a href="service-single.html">Service Single</a></li>
                  <li><a href="blog-single.html">Blog Single</a></li>
                  <li><a href="portfolio.html">Portfolio</a></li>
                  <li><a href="portfolio-single.html">Portfolio Single</a></li>
                  <li><a href="testimonials.html">Testimonials</a></li>
                  <li><a href="faq.html">Frequently Ask Questions</a></li>
                  <li><a href="gallery.html">Gallery</a></li>
                </ul>
              </li>
              <li><a href="blog.html">Blog</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span> Post a Job</a></li>
              <li class="d-lg-none"><a href="login.html">Log In</a></li>
            </ul>
          </nav>
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="post-job.html" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>
              <a href="login.html" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>
    

    <div class="hero" style="background-image: url('assets/images/hero_1.jpg');"></div>
  


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
  <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon="{&quot;rayId&quot;:&quot;91b232516f1a4677&quot;,&quot;serverTiming&quot;:{&quot;name&quot;:{&quot;cfExtPri&quot;:true,&quot;cfL4&quot;:true,&quot;cfSpeedBrain&quot;:true,&quot;cfCacheStatus&quot;:true}},&quot;version&quot;:&quot;2025.1.0&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;}" crossorigin="anonymous"></script>

</body></html>
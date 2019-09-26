<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.15
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Stok</title>
    <!-- Icons-->
    <link rel="icon" type="image/ico" href="{{asset('./img/favicon.ico')}}" sizes="any" />
    <link href="{{asset('node_modules/@coreui/icons/css/coreui-icons.min.css')}}" rel="stylesheet">
    <link href="{{asset('node_modules/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
    <link href="{{asset('node_modules/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('node_modules/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/pace-progress/css/pace.min.css')}}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    @section('sidebar')
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#"><b>STOK<span></b></a>
      </a>
      <ul class="nav navbar-nav ml-auto">

      <a class="btn btn-sm btn-primary" type="button" href="{{url('/logout')}}">Logout</a>
    </header>
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="home">
                <i class="nav-icon icon-speedometer"></i> Dashboard
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="members">
                <i class="nav-icon icon-drop"></i> Members</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="news">
                <i class="nav-icon icon-drop"></i> News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="announcement">
                <i class="nav-icon icon-pencil"></i> Announcement</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="complaint">
                <i class="nav-icon icon-pencil"></i> Complaint</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="community">
                <i class="nav-icon icon-pencil"></i> Community</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="posting">
                <i class="nav-icon icon-pencil"></i> Posting</a>
            </li>
            
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Dashboard</li>
          <!-- Breadcrumb Menu-->
        </ol>

        <div class="container-fluid">
          @yield('content')
        </div>
        @show

    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('node_modules/pace-progress/pace.min.js')}}"></script>
    <script src="{{asset('node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('node_modules/@coreui/coreui/dist/js/coreui.min.js')}}"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{asset('node_modules/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
  </body>
</html>

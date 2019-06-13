<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <title>LaraManager</title>
    <meta name="description" content="Simple customer manager">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Carlos Eduardo da Silva - carlosedasilva@gmail.com">
    
    <link href="assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link href="assets/vendor/pace-js/themes/blue/pace-theme-loading-bar.css" rel="stylesheet">
    <link href="assets/app/css/styles.css" rel="stylesheet">

    <link href="assets/app/img/ico.png" rel="shortcut icon" type="image/x-icon">

    <script>
        var appUrl = '{{ $url }}';
    </script>

  </head>

  <body>



<!-- BEGGIN: Top menu -->
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><i class="fas fa-home"></i> LaraManager</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="/">Sair</a>
    </li>
  </ul>
</nav>
<!-- END: Top menu -->


<!-- BEGIN: Container -->
<div class="container-fluid">

    <!-- BEGIN: row -->
  <div class="row">

    <!-- BEGIN: Sidemenu -->
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
          <a class="nav-link" href="javascript:void(0);" onclick="triggerRequest('dashboard','#master-container');">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="javascript:void(0);" onclick="triggerRequest('clientes','#master-container');">
                <i class="fa fa-users"></i>
                Clientes
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- END: Sidemenu -->


    <!-- BEGIN: Main -->
    <main role="main" id="master-container" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <!-- Content loads here -->
    </main>
    <!-- END: Main -->
    
  </div>
  <!-- END: row -->

</div>
<!-- END: Container -->


<script src="assets/vendor/jquery/dist/jquery.js"></script>
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery-form/dist/jquery.form.min.js"></script>
<script src="assets/vendor/pace-js/pace.min.js"></script>
<script src="assets/app/js/Core/Boot.js"></script>

<script>			
    $(window).on('load', function() { 
      Pace.restart();
      triggerRequest('dashboard','#master-container');
    });
</script>

</html>
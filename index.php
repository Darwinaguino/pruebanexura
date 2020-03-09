<?php
session_start();
?>
<html>
	<head>
		<title>.: Registro de empleados - NEXURA :.</title>
		
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>

		
		<?php include './php/link.php'; ?>
	</head>
	<body>
	
	<body id="container-page-index">
    <?php include './php/navbar.php'; ?>
    <meta charset="utf-8">
    <div class="jumbotron" id="jumbotron-index">
      <h3><span class="tittles-pages-logo">FORMULARIO</span></h3>
      <h1><small style="color: #fff;">Sistema</small></h1>
      <p>
        Bienvenido a nuestra aplicación de registro y control WebApp para NEXURA.
      </p>
    </div>

    <div id="new-prod-index">
      <section id="about-us">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="block">
                <img class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms" src="images/logoSinet.png" alt="cooker-img">
                <h2 class="heading wow fadeInUp" data-wow-duration="400ms" data-wow-delay="500ms"><span style="color:#005F9F">NEXURA  </span> </br><span style="color:#005F9F">INTERNACIONAL</span></h2>

                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="600ms" style="color:black;">Nuestro compromiso con usted es mucho más que suministrarle el software que necesita. Contamos con especialistas en las áreas de capacitación, asesoría y soporte técnico, lo que hace de nosotros una empresa completa en servicios para los
                  sistemas de calidad. </br>
              </div>
            </div>
            <!-- .col-md-12 close -->
          </div>
          <!-- .row close -->
        </div>
        <!-- .containe close -->
      </section>
      <!-- #call-to-action close -->
    </div>
    <section id="reg-info-index">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 text-center">
            <article style="margin-top:20%;">
              <p><i class="fa fa-users fa-4x"></i></p>
              <h3>Registrate</h3>
              <p>Registro de empleado <span class="tittles-pages-logo"> NEXURA INTERNACIONAL</span> para recibir las politicas de registro y de control.</p>
              <p><a href="registration.php" class="btn btn-info btn-block">Registrarse</a></p>
            </article>
          </div>
          <div class="col-xs-12 col-sm-6">
            <img src="images/logo1.png" alt="Smart-TV" class="img-responsive">
          </div>
        </div>
      </div>
    </section>
    <?php include './php/footer.php'; ?>
  </body>
	</body>
</html>
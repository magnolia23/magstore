<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Mag Store</title>
    <!--<link rel="icon" href="vistas/img/plantilla/glasses-solid.svg" />-->


    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- Plug ins CSS-------------------------------------------------------------------------- -->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css" />

    <!-- Ionicons -->
    <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css" />
    <!-- Theme -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css" />
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" />
    <!-- Data Tables -->
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

    <!--Select 2-------------------------------------------------------------------------  -->
    <link rel="stylesheet" href="vistas/bower_components/select2/dist/css/select2.css">
    <!-- Personalizado -->
    <link rel="stylesheet" href="vistas/css/normalize.css" />
    <link rel="stylesheet" href="vistas/css/icono.css" />
    <link rel="stylesheet" href="vistas/css/styles.css" />
    <link rel="stylesheet" href="vistas/css/estilo.css" />
    <link rel="stylesheet" href="vistas/css/style.css" />


    <!-- jQuery 3 -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script> 
    <!-- Data tables -->
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- Font awesome nuevo -->
    <script src="https://kit.fontawesome.com/d2da642bf8.js" crossorigin="anonymous"></script>
    <!-- Select2 -->
    <script src="vistas/bower_components/select2/dist/js/select2.full.js"></script>
    <!-- css personalizado -->
    <!-- <link rel="stylesheet" href="vistas/css/personalizado.css"> -->


</head>
<!-- Cuerpo documento -------------------------------------------------------------------------------- -->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
    <!-- Site wrapper -->

    <?php
    //if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
    echo '<div class="wrapper">';
    /* CABEZOTE */
    include "modulos/header.php";
    /* MENÚ */
    //include "modulos/menu.php";
    if (isset($_GET["ruta"])) {
        if (
            $_GET["ruta"] == "inicio" ||
            $_GET["ruta"] == "contacto" ||
            $_GET["ruta"] == "nosotros" ||
            $_GET["ruta"] == "producto" ||
            $_GET["ruta"] == "admin" ||
            $_GET["ruta"] == "carrito" ||
            $_GET["ruta"] == "crear-cuenta" ||
            $_GET["ruta"] == "iniciar-sesion" ||
            $_GET["ruta"] == "productos" ||
            $_GET["ruta"] == "agregar" ||
            $_GET["ruta"] == "editar" ||
            $_GET["ruta"] == "eliminar" ||
            $_GET["ruta"] == "acerca-de" ||
            $_GET["ruta"] == "salir"
        ) {
            include "modulos/" . $_GET["ruta"] . ".php";
        } else {
            include "modulos/404.php";
        }
    } else {
        include "modulos/inicio.php";
    }
    /* Footer */
    include "modulos/footer.php";
    echo '</div>';
    /* } else {
        include "modulos/login.php";
    } */

    ?>
    <script src="vistas/js/productos.js"></script>
    <script src="vistas/js/plantilla.js"></script>
    <script src="vistas/js/ventas.js"></script>
    <script src="vistas/js/carrucel.js"></script>
    <script src="vistas/js/menu.js"></script>
</body>



</html>
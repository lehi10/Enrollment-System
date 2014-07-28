<?php 
	session_start();
	include_once "Modulos/php_conexion.php";
	include_once "Modulos/class_buscar.php";
	include_once "Modulos/funciones.php";
	if($_SESSION['tipo_user']=='a' or $_SESSION['tipo_user']=='p'){
		$profesor=limpiar($_SESSION['cod_user']);
		$oProfesor=new Consultar_Profesor($profesor);
		$nombre_profesor=$oProfesor->consultar('ape').' '.$oProfesor->consultar('nom');
	}else{
		header('Location:error.php');
	}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Principal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="ico/favicon.png">
  </head>
  <!-- FACEBOOK COMENTARIOS -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!-- FIN CODIGO FACEBOOK -->
  <body>

    <?php include_once "menu/m_principal.php"; ?>
<br><br>
	<div align="center">
    	<h2><?php echo $nombre_profesor; ?></h2>
    	<table width="30%">
          <tr>
            <td>
            	<table class="table table-bordered">
                  <tr class="info">
                    <td colspan="2"><h2 align="center"><img src="img/salon.png" width="80" height="80">Mis Salones</h2></td>
                  </tr>
                  <?php 
				  	$pa=mysql_query("SELECT * FROM salon WHERE profesor='$profesor' order by nombre");				
					while($row=mysql_fetch_array($pa)){
						$url=$row['id'];
				  ?>
                  <tr>
                    <td>
                    	<div align="center">
                        	<a href="Modulos/Calificar/index.php?salon=<?php echo $url; ?>" title="Ir a Valorar Alumnos" class="btn">
                        		<strong><i class="icon-ok"></i> <?php echo $row['nombre']; ?></strong>
                            </a>
                        </div>
                    </td>
                  </tr>
                  <?php } ?>
                </table>
                
            </td>
          </tr>
        </table>

    </div>
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>
</html>

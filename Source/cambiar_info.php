<?php 
	session_start();
	include_once "Modulos/php_conexion.php";
	include_once "Modulos/funciones.php";
	include_once "Modulos/class_buscar.php";
	include_once "Modulos/Profesor/class/class.php";
	if($_SESSION['tipo_user']=='a' or $_SESSION['tipo_user']=='p'){
		$usu=limpiar($_SESSION['cod_user']);
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
	
    <div align="center">
    	<table width="50%">
          <tr>
            <td>
            	<?php
					if(!empty($_POST['ape']) and !empty($_POST['nom'])){
						$nom=limpiar($_POST['nom']);					$ape=limpiar($_POST['ape']);
						$doc=limpiar($_POST['doc']);					$fecha=limpiar($_POST['fecha']);
						$dir=limpiar($_POST['dir']);					$tel=limpiar($_POST['tel']);
						$cel=limpiar($_POST['cel']);					$correo=limpiar($_POST['correo']);
						$especialidad=limpiar($_POST['especialidad']);	
						
						mysql_query("UPDATE profesor SET nom='$nom',
										ape='$ape',
										fecha='$fecha',
										dir='$dir',
										tel='$tel',
										cel='$cel',
										correo='$correo',
										especialidad='$especialidad'
								WHERE doc='$doc'");
						echo mensajes('Informacion Actualizada con Exito','verde');
						
						
					}
					$oProfesor=new Consultar_Profesor($usu);
				?>
                <table class="table table-bordered">
                  <tr class="info">
                    <td>
                    	<h1 align="center"><img src="img/act.jpg" width="100" height="100" class="img-circle img-polaroid"> Actualizar Informacion</h1>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    	<form name="form1" method="post" action="">
                        <div class="row-fluid">
                            <div class="span6">
	<strong>Documento</strong><br>
    <input type="text" name="doc" class="input-xlarge" autocomplete="off" readonly value="<?php echo $usu; ?>"><br>
    <strong>Nombres</strong><br>
    <input type="text" name="nom" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('nom'); ?>"><br>
    <strong>Apellidos</strong><br>
    <input type="text" name="ape" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('ape'); ?>"><br>
    <strong>Fecha de Nacimiento</strong><br>
    <input type="date" name="fecha" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('fecha'); ?>"><br>
    <strong>Direccion de Residencia</strong><br>
    <input type="text" name="dir" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('dir'); ?>"><br>
                          </div>
                            <div class="span6">
	<strong>Telefonos</strong><br>
    <input type="text" name="tel" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('tel'); ?>"><br>
    <strong>Celulares</strong><br>
    <input type="text" name="cel" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('cel'); ?>"><br>
    <strong>Correo Electronico</strong><br>
    <input type="email" name="correo" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('correo'); ?>"><br>
    <strong>Especialidades</strong><br>
    <input type="text" name="especialidad" class="input-xlarge" autocomplete="off" required value="<?php echo $oProfesor->consultar('especialidad'); ?>"><br>
    <strong>Tipo de Usuario</strong><br>
    <?php 
		if($oProfesor->consultar('tipo')=='a'){
			$tipo='Administrador';
		}else{
			$tipo='Profesor';
		}
	?>
    <input type="text" name="dir" class="input-xlarge" autocomplete="off" readonly value="<?php echo $tipo; ?>"><br><br>
    <div align="right"><button type="submit" class="btn btn-primary">Actualizar Informacion</button></div>
                          </div>
                        </div>
                        </form>
                    </td>
                  </tr>
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

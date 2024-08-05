<?php	
		 include("modelo/mseguridad.php"); ?>
<!DOCTYPE html>
<html>
<head>

<?php
	$per = isset($_SESSION["idper"]) ? $_SESSION["idper"]:NULL;
	$idus = isset ($_SESSION["idem"]) ? $_SESSION["idem"]:NULL;
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SIFIR</title>
	<script src="https://kit.fontawesome.com/856e494ea2.js" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="image/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/comun.css">

	<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->

	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrapvalidator.js"></script>
	<script type="text/javascript" src="js/formValidation.min.js"></script>
	<!--<script type="text/javascript" src="js/keys.js"></script>-->
	<script type="text/javascript" src="js/es_ES.js"></script>
	<script src="js/chosen.jquery.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/all.min.js">
		$(document).ready(function(){
    		$(".chosen-select").chosen({no_results_text:'No hay resultados para '});
		});
	</script>
</head>
<body style="background-color: white; height:100vh;">
	<header>
		<?php
			include("vista/cabezote.php"); 
			$pg = isset($_GET["pg"]) ? $_GET["pg"]:NULL;
		?>
	</header>
	<div class="menutop">
		<?php include("vista/menut.php");
		 ?>
	</div>
	<div class="menuizq" id="menu_p">
		<?php include("vista/menu.php"); ?>
	</div>
	<div class="cont">
	<?php
		if($idper==1){
			if(!$pg) $pg=999;
		}else{
			if(!$pg) $pg=999;
		}
		$obj->SetIdper($idper);
		$obj->SetIdpag($pg);
		$dtarc = $obj->selarch();
		if($dtarc){
			if(count($dtarc)>0)
				include("vista/".$dtarc[0]['nomarc']);
			else
				echo "<span class='txtbold'>Usted no tiene permisos para ingresar a este formulario. Por favor comuniquese con su administrador.</span>";
		}
	?>
	</div>
	<footer>
		<?php 
		include("vista/pie.php");
		 ?>
	</footer>
</body>
<script type="text/javascript" src="js/valida.js"></script>
</html>

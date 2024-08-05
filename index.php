<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SIFIR</title>
	<link rel="shortcut icon" href="image/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/estilo af.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/comun af.css">
	<script src="https://kit.fontawesome.com/856e494ea2.js" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrapvalidator.js"></script>
<!--	<script type="text/javascript" src="js/keys.js"></script> -->
	<script type="text/javascript" src="js/formValidation.min.js"></script>
	<script type="text/javascript" src="js/es_ES.js"></script>
	<script type="text/javascript" src="js/valida.js"></script>
	<script src="js/chosen.jquery.js" type="text/javascript"></script>
</head>
<body>
	<!-- <div class="circle"></div> -->
	<header>
		<?php 
			$pg = isset($_GET["pg"]) ? $_GET["pg"]:NULL;
			if($pg!=1090){
				include("vista/cabezote.php");
				?>
					<div class="cabe1">
						<img src="image/logofinal.png" class="logo_2" />
					<div class="video_cont">
						<a href="videos.php" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video"> </i> <br>Ayuda</a>
					</div>
				</div>
				<?php
			}
		?>
	</header>
	<div class="conte" <?php if($pg==1090) echo "style='padding: 10px 0px;'"; ?>>
		<?php
		if(!$pg OR $pg=="1001")
			include("vista/ving.php");
		else if($pg=="1090")
				include("vista/vcoman.php");
		?>
	</div>
	<?php
		if($pg!=1090){
			echo "<footer>";
			include("vista/pie.php");
			echo "</footer>";
		}
	?>
</body>
</html>
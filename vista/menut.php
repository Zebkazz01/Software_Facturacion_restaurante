<div class="session">
	<div class="logo_cabe" id="boto_menu" >
		<div class="logo_circle">
			<img src="image/logofinal.png" alt="" class="logo_sup" >
			
		</div>
		<p>
			Menu
		</p>
	</div>
	<div class="logo_cabe1" id="boto_menu1" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<div class="logo_circle">
			<img src="image/logofinal.png" alt="" class="logo_sup" >
		</div>
	</div>
	<section class="datos_cabe">
		<div class="dat_usu"> Bienvenido:
		<?php echo utf8_encode(strtoupper($_SESSION["nomemp"])); ?> <br>
		 <small> Perfil:
		<?php echo utf8_encode(strtoupper($_SESSION["nomper"])); ?></small>
		</div>
		<div class="opciones_cabe">
			<a href="home.php?pg=999" title="configuracion"><i class="fa-duotone fa-house usu_i"></i></a>
			<a href="home.php?pg=1010" title="configuracion"><i class="fa-duotone fa-gears usu_i"></i></a>
			<a href="home.php?pr=<?=$_SESSION["idem"]?>&pg=1020" title="Datos personales"><i class="fa-duotone fa-user-gear usu_i"></i></a>
			<?php if($pg==999 || !$pg){?>
				<a href="videos.php?pg=<?=$pg;?>&nom=Inicio" title="videos de ayuda"><i class="fa-duotone fa-video usu_i"></i></a>
			<?php }?>
			<a href="vista/vsalir.php" title="Cerrar Sesion"><i class="fa-duotone fa-power-off usu_i"></i></a>
		</div>
	</section>
</div>
<div class="menut">

</div>
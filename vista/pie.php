<section class="dis_footer">
	<div class="logos_emp">
		<img src="<?php echo $dtconf[0]["logocon"]; ?>" class="logo_footer"/>
		<!-- <img src="image/logofinal.png" style="width:13%;"/>	 -->
	</div>
	<div class='define'>
	<strong style="font-size:1.5rem; color:#fff;">SIFIR - Sistema Integrado de Facturaci&oacute;n e Inventarios para Restaurantes</strong>
		<p style="color: #fff; padding-left:10px;"><br>
		<?php echo $dtconf[0]["nomrest"]; ?><br>
		<?php if($dtconf[0]["mosdir"]==1){ ?>
			Direcci&oacute;n: <?php echo $dtconf[0]["dircon"]; ?><br>
		<?php }
		if($dtconf[0]["mostel"]==1){ ?>
			Tel&eacute;fono: <?php echo $dtconf[0]["telcon"]; ?>
		<?php }
		if($dtconf[0]["moscel"]==1){ ?>
			- Celular: <?php echo $dtconf[0]["celcon"]; ?>
		<?php } ?>
		<br>
		<?php if($dtconf[0]["mosema"]==1){ ?>
			E-mail: <?php echo $dtconf[0]["emacon"]; ?><br>
		<?php } ?>
		&copy 2017 - 2022. All Rights Reserved<br></p>
	</div>
</section>
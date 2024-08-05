<?php include("controlador/cing.php");?>

<form action="modelo/control.php" class="form_inicio" method="POST" name="form1">
<div class="ini__menu">
<h1 class="ini__tit"><i class="fa-solid fa-house-user"></i> Inicio de sesion</h1>
		<div class="ini__user">
			<label for="user"><i class="fa-solid fa-user"></i> Usuario</label>
			<input  class="form-control"  type="text" name="nomusuario" id="nomusuario" required />
		</div>
		<div class="ini__user">
			<label for="pass"><i class="fa-solid fa-key"></i> Contraseña</label>
			<input class="form-control" type="password" name="conusuario" id="conusuario" required />
		</div>
		<div class="ini__boton"><br>
			<a href="index.php?" class="olv" id="olv__con">¿Olvido su contrasena?</a>
			<div class="botones_accion">
				<button type="submit" class="boton"><i class="fa-solid fa-check"></i> Iniciar sesion</button>
				<a href="index.php?pg=1090" class="boton1"><i class="fa-solid fa-table-list coman_ico"></i><input type="button" value="Comanda General"></a>
					<a href="index.php?pg=1090&tipe=1" class="boton1 btp"><i class="fa-solid fa-utensils coman_ico"></i><input type="button" value="Comanda Platos"></a>
					<a href="index.php?pg=1090&tipe=5" class="boton1 btb"><i class="fa-solid fa-wine-glass coman_ico"></i><input type="button" value="Comanda Bebidas"></a>
			</div>
		</div>
</form>
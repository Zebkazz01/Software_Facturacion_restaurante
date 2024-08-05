
<div class="inivideo" >
    <h1 class="tiu"><i id="vimi" class="fa-duotone fa-house-chimney" style=" color:#912b2b;">
        </i> Bienvenido a <?php echo $dtconf[0]["nomrest"]; ?>
    </h1>
</div>
<div class="conti">
<?php if($_SESSION['idper']==1){?>
        <div class="caja">
            <h1><i class="fa-duotone fa-receipt ca"></i> Facturar</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info" class="info">En facturacion encontraras opciones, como ver clientes crar faturas de las mesas y ver el detalle de los productos vendidos en el momento de uso</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1031">
                    <div class="buini"><i class="fa-duotone fa-cart-shopping oini"></i> Facturación</div>
                </a>
                <!-- <a href="home.php?pg=1032&col=col">
                    <div class="buini"><i class="fa-duotone fa-clipboard-list-check oini"></i> Detalle factura</div>
                </a> -->
                <a href="home.php?pg=1030">
                    <div class="buini"><i class="fa-duotone fa-memo-pad oini"></i> Cierre de turno</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-square-plus ca"></i> Productos</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info1').style.display='flex';document.getElementById('inf4').style.display='flex';document.getElementById('inf3').style.display='none';void 0" Title="Informacion" id="inf3"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info1').style.display='none';document.getElementById('inf4').style.display='none';document.getElementById('inf3').style.display='flex';void 0" id="inf4"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info1" class="info">Para registrar un nuevo producto solo seleccione el boton nuevo para
                    registrar los productos que se veran reflejados en el kardex y en la vista de productos.
                </p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1053&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-cart-circle-plus oini"></i> Nuevo producto</div>
                </a>
                <a href="home.php?pg=1054">
                    <div class="buini"><i class="fa-duotone fa-pallet-boxes oini"></i> Categorias</div>
                </a>
                <!-- <a href="home.php?pg=1053">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a> -->
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-cart-flatbed-boxes ca"></i> Kardex</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info2').style.display='flex';document.getElementById('inf6').style.display='flex';document.getElementById('inf5').style.display='none';void 0" Title="Informacion" id="inf5"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info2').style.display='none';document.getElementById('inf6').style.display='none';document.getElementById('inf5').style.display='flex';void 0" id="inf6"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info2" class="info">Aqui puede ver un registro total de los inventarios que lleva cada empresa.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1040">
                    <div class="buini"><i class="fa-duotone fa-garage oini"></i> Nuevo kardex</div>
                </a>
                <a href="home.php?pg=1040">
                    <div class="buini"><i class="fa-duotone fa-print-magnifying-glass oini"></i> Detalle de kardex</div>
                </a>
            </div>
        </div>
        <div class="caja">
        <h1><i class="fa-duotone fa-square-plus ca"></i> Pedidos</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info33').style.display='flex';document.getElementById('inf23').style.display='flex';document.getElementById('inf33').style.display='none';void 0" Title="Informacion" id="inf33"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info33').style.display='none';document.getElementById('inf23').style.display='none';document.getElementById('inf33').style.display='flex';void 0" id="inf23"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info33" class="info">En esta secion se almacenan los dominios pertenecientes al valor el cual ayuda a guardar datos que se repiten varias partes.</p>
            </div>
            <div class="iniopc">
            <a href="home.php?pg=1053">
                    <div class="buini"><i class="fa-duotone fa-cart-circle-plus oini"></i> Orden de compra</div>
                </a>
                <a href="home.php?pg=1052">
                    <div class="buini"><i class="fa-duotone fa-pallet-boxes oini"></i> Materia prima</div>
                </a>
                <a href="home.php?pg=1014">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Pedidos por fecha</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-user-tie ca"></i> Clientes</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info3').style.display='flex';document.getElementById('inf8').style.display='flex';document.getElementById('inf7').style.display='none';void 0" Title="Informacion" id="inf7"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info3').style.display='none';document.getElementById('inf8').style.display='none';document.getElementById('inf7').style.display='flex';void 0" id="inf8"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info3" class="info">Aqui puedes crear agregar un nuevo cliente administrar los existentes y obtener un registro de todos ellos.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1034&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-user-plus oini"></i> Registrar nuevo</div>
                </a>
                <a href="home.php?pg=1034">
                    <div class="buini"><i class="fa-duotone fa-users oini"></i> Asistencia</div>
                </a>
                <!-- <a href="home.php?pg=1034">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a> -->
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-box-open ca"></i> Proveedores</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info4').style.display='flex';document.getElementById('inf10').style.display='flex';document.getElementById('inf9').style.display='none';void 0" Title="Informacion" id="inf9"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info4').style.display='none';document.getElementById('inf10').style.display='none';document.getElementById('inf9').style.display='flex';void 0" id="inf10"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info4" class="info">En este apartado se almacenan los datos de los proveedores con los que comercializa para tener siempre el contacto.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1055&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-box-open-full oini"></i> Nuevo proveedor</div>
                </a>
                <a href="home.php?pg=1055">
                    <div class="buini"><i class="fa-duotone fa-images-user oini"></i> Ver proveedores</div>
                </a>
                <!-- <a href="home.php?pg=1055">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a> -->
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-sliders ca"></i> Perfil</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info5').style.display='flex';document.getElementById('inf12').style.display='flex';document.getElementById('inf11').style.display='none';void 0" Title="Informacion" id="inf11"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info5').style.display='none';document.getElementById('inf12').style.display='none';document.getElementById('inf11').style.display='flex';void 0" id="inf12"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info5" class="info">Estas son las opciones que tiene cada perfil como lo son las paginas que puede ver y las que tiene activas.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1021">
                    <div class="buini"><i class="fa-duotone fa-address-card oini"></i> Perfiles</div>
                </a>
                <a href="home.php?pg=1021">
                    <div class="buini"><i class="fa-duotone fa-clipboard-list-check oini"></i> Administrar</div>
                </a>
                <a href="home.php?pg=1013">
                    <div class="buini"><i class="fa-duotone fa-copy oini"></i> Ver Paginas</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-circle-d ca"></i> Dominio</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info7').style.display='flex';document.getElementById('inf16').style.display='flex';document.getElementById('inf15').style.display='none';void 0" Title="Informacion" id="inf15"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info7').style.display='none';document.getElementById('inf16').style.display='none';document.getElementById('inf15').style.display='flex';void 0" id="inf16"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info7" class="info">En esta secion se almacenan los dominios pertenecientes al valor el cual ayuda a guardar datos que se repiten varias partes.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1011&ver=si&col=col">
                    <div class="buini"><i class="fa-duotone fa-circle-dot oini"></i> Nuevo dominio</div>
                </a>
                <a href="home.php?pg=1011&ver=si&col=col">
                    <div class="buini"><i class="fa-duotone fa-box-circle-check oini"></i> Nuevo valor</div>
                </a>
                <a href="home.php?pg=1011">
                    <div class="buini"><i class="fa-duotone fa-pager oini"></i> Ver registros</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-circle-user ca"></i> Usuario</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info9').style.display='flex';document.getElementById('inf20').style.display='flex';document.getElementById('inf19').style.display='none';void 0" Title="Informacion" id="inf19"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info9').style.display='none';document.getElementById('inf20').style.display='none';document.getElementById('inf19').style.display='flex';void 0" id="inf20"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info9" class="info">En esta parte puede ver los usuarios y datos personales de la cuenta que tiene la sesion activa.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1020">
                    <div class="buini"><i class="fa-duotone fa-user-plus oini"></i> Registrar Nuevo </div>
                </a>
                <a href="home.php?pg=1020">
                    <div class="buini"><i class="fa-duotone fa-users-medical oini"></i> Ver usuarios</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-gears ca"></i> Configuracion</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info11').style.display='flex';document.getElementById('inf22').style.display='flex';document.getElementById('inf21').style.display='none';void 0" Title="Informacion" id="inf21"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info11').style.display='none';document.getElementById('inf22').style.display='none';document.getElementById('inf21').style.display='flex';void 0" id="inf22"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info11" class="info">En esta parte puede ver los usuarios y datos personales de la cuenta que tiene la sesion activa.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1010">
                    <div class="buini"><i class="fa-duotone fa-gear oini"></i> Ajustes</div>
                </a>
                <a href="home.php?pg=1012">
                    <div class="buini"><i class="fa-duotone fa-map-location-dot oini"></i> Ubicaciones</div>
                </a>
            </div>
        </div>
    </div>
    </div>
<?php }else if($_SESSION['idper']==2){?>
    <div class="caja">
            <h1><i class="fa-duotone fa-receipt ca"></i> Facturar</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info" class="info">En facturacion encontraras opciones, como ver clientes crar faturas de las mesas y ver el detalle de los productos vendidos en el momento de uso</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1031">
                    <div class="buini"><i class="fa-duotone fa-cart-shopping oini"></i> Facturación</div>
                </a>
                <a href="home.php?pg=1032&col=col">
                    <div class="buini"><i class="fa-duotone fa-clipboard-list-check oini"></i> Detalle factura</div>
                </a>
                <a href="home.php?pg=1034">
                    <div class="buini"><i class="fa-duotone fa-user-plus oini"></i> Clientes</div>
                </a>
            </div>
        </div>
<?php }else if($_SESSION['idper']==3){?>
    <div class="caja">
            <h1><i class="fa-duotone fa-receipt ca"></i> Facturar</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info" class="info">En facturacion encontraras opciones, como ver clientes crar faturas de las mesas y ver el detalle de los productos vendidos en el momento de uso</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1031">
                    <div class="buini"><i class="fa-duotone fa-cart-shopping oini"></i> Facturación</div>
                </a>
                <a href="home.php?pg=1032&col=col">
                    <div class="buini"><i class="fa-duotone fa-clipboard-list-check oini"></i> Detalle factura</div>
                </a>
                <a href="home.php?pg=1034">
                    <div class="buini"><i class="fa-duotone fa-user-plus oini"></i> Clientes</div>
                </a>
            </div>
        </div>
<?php }else{?>
    <div class="caja">
            <h1><i class="fa-duotone fa-receipt ca"></i> Facturar</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info').style.display='flex';document.getElementById('inf2').style.display='flex';document.getElementById('inf1').style.display='none';void 0" Title="Informacion" id="inf1"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info').style.display='none';document.getElementById('inf2').style.display='none';document.getElementById('inf1').style.display='flex';void 0" id="inf2"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info" class="info">En facturacion encontraras opciones, como ver clientes crar faturas de las mesas y ver el detalle de los productos vendidos en el momento de uso</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1031">
                    <div class="buini"><i class="fa-duotone fa-cart-shopping oini"></i> Facturación</div>
                </a>
                <a href="home.php?pg=1032&col=col">
                    <div class="buini"><i class="fa-duotone fa-clipboard-list-check oini"></i> Detalle factura</div>
                </a>
                <a href="home.php?pg=1030">
                    <div class="buini"><i class="fa-duotone fa-memo-pad oini"></i> Cierre de turno</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-square-plus ca"></i> Productos</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info1').style.display='flex';document.getElementById('inf4').style.display='flex';document.getElementById('inf3').style.display='none';void 0" Title="Informacion" id="inf3"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info1').style.display='none';document.getElementById('inf4').style.display='none';document.getElementById('inf3').style.display='flex';void 0" id="inf4"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info1" class="info">Para registrar un nuevo producto solo seleccione el boton nuevo para
                    registrar los productos que se veran reflejados en el inventario.
                </p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1053&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-cart-circle-plus oini"></i> Nuevo producto</div>
                </a>
                <a href="home.php?pg=1054">
                    <div class="buini"><i class="fa-duotone fa-pallet-boxes oini"></i> Categorias</div>
                </a>
                <a href="home.php?pg=1053">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-cart-flatbed-boxes ca"></i> Kardex</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info2').style.display='flex';document.getElementById('inf6').style.display='flex';document.getElementById('inf5').style.display='none';void 0" Title="Informacion" id="inf5"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info2').style.display='none';document.getElementById('inf6').style.display='none';document.getElementById('inf5').style.display='flex';void 0" id="inf6"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info2" class="info">Aqui puede ver un registro total de los inventarios que lleva cada empresa.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1040">
                    <div class="buini"><i class="fa-duotone fa-garage oini"></i> Nuevo kardex</div>
                </a>
                <a href="home.php?pg=1041">
                    <div class="buini"><i class="fa-duotone fa-print-magnifying-glass oini"></i> Detalle de kardex</div>
                </a>
            </div>
        </div>
        <div class="caja">
        <h1><i class="fa-duotone fa-square-plus ca"></i> Pedidos</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info33').style.display='flex';document.getElementById('inf23').style.display='flex';document.getElementById('inf33').style.display='none';void 0" Title="Informacion" id="inf33"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info33').style.display='none';document.getElementById('inf23').style.display='none';document.getElementById('inf33').style.display='flex';void 0" id="inf23"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info33" class="info">En esta secion se almacenan los dominios pertenecientes al valor el cual ayuda a guardar datos que se repiten varias partes.</p>
            </div>
            <div class="iniopc">
            <a href="home.php?pg=1053">
                    <div class="buini"><i class="fa-duotone fa-cart-circle-plus oini"></i> Orden de compra</div>
                </a>
                <a href="home.php?pg=1052">
                    <div class="buini"><i class="fa-duotone fa-pallet-boxes oini"></i> Materia prima</div>
                </a>
                <a href="home.php?pg=1014">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Pedidos por fecha</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-user-tie ca"></i> Clientes</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info3').style.display='flex';document.getElementById('inf8').style.display='flex';document.getElementById('inf7').style.display='none';void 0" Title="Informacion" id="inf7"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info3').style.display='none';document.getElementById('inf8').style.display='none';document.getElementById('inf7').style.display='flex';void 0" id="inf8"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info3" class="info">Aqui puedes crear agregar un nuevo cliente administrar los existentes y obtener un registro de todos ellos.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1034&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-user-plus oini"></i> Registrar nuevo</div>
                </a>
                <a href="home.php?pg=1034">
                    <div class="buini"><i class="fa-duotone fa-users oini"></i> Asistencia</div>
                </a>
                <a href="home.php?pg=1034">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-box-open ca"></i> Proveedores</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info4').style.display='flex';document.getElementById('inf10').style.display='flex';document.getElementById('inf9').style.display='none';void 0" Title="Informacion" id="inf9"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info4').style.display='none';document.getElementById('inf10').style.display='none';document.getElementById('inf9').style.display='flex';void 0" id="inf10"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info4" class="info">En este apartado se almacenan los datos de los proveedores con los que comercializa para tener siempre el contacto.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1055&col=col&ver=si">
                    <div class="buini"><i class="fa-duotone fa-box-open-full oini"></i> Nuevo proveedor</div>
                </a>
                <a href="home.php?pg=1055">
                    <div class="buini"><i class="fa-duotone fa-images-user oini"></i> Ver proveedores</div>
                </a>
                <a href="home.php?pg=1055">
                    <div class="buini"><i class="fa-duotone fa-print oini"></i> Reporte</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-sliders ca"></i> Perfil</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info5').style.display='flex';document.getElementById('inf12').style.display='flex';document.getElementById('inf11').style.display='none';void 0" Title="Informacion" id="inf11"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info5').style.display='none';document.getElementById('inf12').style.display='none';document.getElementById('inf11').style.display='flex';void 0" id="inf12"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info5" class="info">Estas son las opciones que tiene cada perfil como lo son las paginas que puede ver y las que tiene activas.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1021">
                    <div class="buini"><i class="fa-duotone fa-address-card oini"></i> Perfiles</div>
                </a>
                <a href="home.php?pg=1021">
                    <div class="buini"><i class="fa-duotone fa-clipboard-list-check oini"></i> Administrar</div>
                </a>
            </div>
        </div>
        <div class="caja">
            <h1><i class="fa-duotone fa-circle-user ca"></i> Usuario</h1>
            <div class="infor">
                <a href="javascript:document.getElementById('info9').style.display='flex';document.getElementById('inf20').style.display='flex';document.getElementById('inf19').style.display='none';void 0" Title="Informacion" id="inf19"><i class="fa-duotone fa-circle-question vi"></i></a>
                <a href="javascript:document.getElementById('info9').style.display='none';document.getElementById('inf20').style.display='none';document.getElementById('inf19').style.display='flex';void 0" id="inf20"><i class="fa-duotone fa-circle-minus vi" style="color:#f00;"></i></a>
                <p id="info9" class="info">En esta parte puede ver los usuarios y datos personales de la cuenta que tiene la sesion activa.</p>
            </div>
            <div class="iniopc">
                <a href="home.php?pg=1020">
                    <div class="buini"><i class="fa-duotone fa-user-plus oini"></i> Registrar Nuevo </div>
                </a>
                <a href="home.php?pg=1020">
                    <div class="buini"><i class="fa-duotone fa-users-medical oini"></i> Ver usuarios</div>
                </a>
            </div>
        </div>
    </div>
    </div>

<?php }?>
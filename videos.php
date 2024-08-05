<link rel="shortcut icon" href="image/favicon.ico">
<script src="js/all.min.js"></script>

<title>Videos de apoyo - SIFIR </title>
    <?php 
        $pg = isset($_GET['pg']) ? $_GET['pg']:NULL;
        $nom = isset($_GET['nom']) ? $_GET['nom']:NULL;
    ?>
    
<div class="circle"></div>
    <div>
        <h1>Explicacion de uso e interfaz del software  <a href='home.php?pg=<?=$pg;?>' class='visemp'><i class='fa-duotone fa-circle-xmark never_butt' style="color:#fff"></i></a></h1>
    </div>
    <div class="mhome">
        <h2>Video de ayuda vista <?=$nom?></h2>
    </div>
    <div class=container>
    <?php
    $name="videos/v".$pg.".mp4";
        if(file_exists($name)){ ?>
            <video controls>
                <source src="videos/v<?=$pg;?>.mp4" type="video/mp4">
            Su navegador no soporta la visualización de video.
            </video>
            <style>.mhome{display:flex; }</style>
        <?php }else if(!$pg && !$nom){ ?> 
            <video controls>
               <source src="videos/vpini.mp4" type="video/mp4">
                Su navegador no soporta la visualización de video.
           </video>
           <style>.mhome{display:none; }</style>
        <?php } else{  
            echo "<h3>Video no disponible en el momento</h3>
                  <style>.mhome{display:none; }</style>";
            
        } ?>
    <div class=info>
        <p>Aqui puedes visualizar los videotutoriales del uso del software por si aun tienes dudas de su uso o no has entendido a la perfección como funciona, no hay problema te vamos a explicar paso por paso los elementos de la interfaz, las acciones que realiza y el buen manejo de la información para evitar el registro de datos erroneos.</p>
        <div class="bot">
            <button type="button" onclick="window.location='home.php?pg=<?=$pg;?>';" ><i class="fa-duotone fa-arrow-left"></i>&nbsp;&nbsp;Volver
            </button>
        </div>
    </div>
</div>

<style>
@font-face{
font-family:sena;
font-style:normal;
font-weight:400;
src:url(../font/SHOWG.ttf)
}
*{
    font-family:Arial,Helvetica,sans-serif;
}
::-webkit-scrollbar{
    background: #8f171f;
    width: 16px;
}
::-webkit-scrollbar-thumb{
    background: #c33f48;
    border-radius: 15px;
}
h1{
    font-size:2.5rem;
    color:#fff;
    padding:10px 20px 10px 30px;
    background-color:#8f171f;
    border-radius:40px;
    display:flex;
    justify-content: space-between;
    align-items: center;
}
h1, video{
    margin-left:30px; 
    margin-right:30px;
}
.never_butt{
    font-size: 2.5rem;
}
.never_butt:hover{
    font-size: 2.6rem;
}
h2{
    margin-left:60px; 
    font-size:2rem;
    color:#202020;
    background-color:#b2adff;
    width:40vw;
    text-align:center;
    padding:10px;
    border-radius:40px;
}
h3{
    padding-left:60px; 
    width:60vw
}
video{
    border-radius:15px;
    width:60vw
}
.container{
    display:flex;
    flex-direction:row;
    flex-wrap: wrap;
}
.info{
    width:30vw;
    font-size:1.5rem;
    display:flex;
    flex-direction:column;
    color:#202020;
}
.circle{
    position:absolute;
    z-index: -1;
    right:0px;
    top:0px;
    background-color: #d17077;
    width: 65vw;
    height:65vw;
    border-radius:0 0 0 1000px;
}
button{
    width: 200px;
    height: 50px;
    border-radius: 20px;
    background-color: #8f171f;
    color: #f2e9ff;
    border: 0px solid;
    font-size: 1.3rem;
    transition: all 100ms;
}
button:hover{
        width: 205px;
        border-radius: 20px;
        background-color: #540e13;
        border: 0px solid;
        font-size: 1.4rem;
    }
@media screen and (max-width: 768px){
    video{
        width:88vw
    }
    .info{
        width:90vw;
        padding:20px;
    }
}
</style>

<?php
  $obj->SetIdper($idper);
  $dtmen = $obj->selpag();
?>

<nav class="navbar">
  <div class="container-fluidyy">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <ul class="nav nav-pills nav-stacked">
          <?php 
          if($dtmen){
          for($b=0;$b<count($dtmen);$b++){ ?>
            <li>
              <a href="home.php?pg=<?php echo $dtmen[$b]['idpag']; ?>">
                <div class="icon_menu">
                  <i class="<?php echo $dtmen[$b]['ico']; ?> fa_ta"></i>
                </div>
                <?php echo utf8_encode($dtmen[$b]['nompag']); ?>
              </a>
            </li>
          <?php }} ?>
          <li>
          <a href="vista/vsalir.php"><i class="fa-solid fa-power-off fa_ta"></i>&nbsp;&nbsp; Salir
          </a>
          </li>
        </ul>
      </ul>
    </div>
  </div>
</nav>
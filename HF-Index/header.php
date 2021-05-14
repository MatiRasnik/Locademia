<header>
<script src="../locademia/js/fuctions.js"></script>
  <div class="logo">
    <a href="index.html">
      <img src="img/LogoV1.1 - Transparente.png" alt="" />
    </a>
  </div>
  <?php
        session_start();
            if(isset ($_SESSION['ci'])){  
                    $botones = '<div class="links"> <ul>';
                    $botones .='<li> <a href="index.html">INICIO</a> </li>';
                    $botones .='<li> <a href="Form/Agendar.html">AGENDAR</a> </li>';
                    $botones .='<li> <a href="Form/Informacion.html">INFO</a> </li>';
                    $botones .='<li> <a onclick="cerrarSesion()">CERRAR SESION</a> </li>';
                    $botones .= '</ul> </div>';
                }else{
                    $botones = '<div class="links"> <ul>';
                    $botones .='<li> <a href="index.html">INICIO</a> </li>';
                    $botones .='<li> <a href="Form/Login.html">LOGIN</a> </li>';
                    $botones .='<li> <a href="Form/Register.html">REGISTER</a> </li>';
                    $botones .= '</ul> </div>';
                }
                
                echo $botones;

            ?>  
</header>

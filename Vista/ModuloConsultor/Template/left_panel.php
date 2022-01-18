
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
      
      <center><img class="img" src="../Vista/assets/css/imagenes_logo/1.png" /></center>  
        <a class="simple-text logo-normal">
          RC BUSINESS CONSULTING
        </a></div>
        
      <div class="sidebar-wrapper">
        <ul class="nav">
        <?php 
          if(isset($_GET['menu'])){
            if($_GET['menu'] == 'index'){
              echo '<li class="nav-item active">
                <a class="nav-link" href="?menu=index">
                  <i class="material-icons">dashboard</i>
                  <p>Inicio</p>
                </a>
              </li>';
            
          }else{
            echo '<li class="nav-item">
                <a class="nav-link" href="?menu=index">
                  <i class="material-icons">dashboard</i>
                  <p>Inicio</p>
                </a>
              </li>';
          } 
        }else{
          echo '<li class="nav-item">
              <a class="nav-link" href="?menu=index">
                <i class="material-icons">dashboard</i>
                <p>Inicio</p>
              </a>
            </li>';
        } 
        ?>
        <?php 
        if(isset($_GET['menu'])){
          if($_GET['menu'] == 'miPerfil'){
            echo '<li class="nav-item active">
              <a class="nav-link" href="?menu=miPerfil">
              <i class="material-icons">person</i>
              <p>Mi perfil</p>
              </a>
            </li>';
        }else{
          echo '<li class="nav-item">
              <a class="nav-link" href="?menu=miPerfil">
              <i class="material-icons">person</i>
              <p>Mi perfil</p>
              </a>
            </li>';
        }    
        }else{
          echo '<li class="nav-item">
              <a class="nav-link" href="?menu=miPerfil">
              <i class="material-icons">person</i>
              <p>Mi perfil</p>
              </a>
            </li>';
        }    
         
        ?>
        <?php 
        if(isset($_GET['menu'])){
          if($_GET['menu'] == 'reporteHoras'){
            echo '<li class="nav-item active">
            <a class="nav-link" href="?menu=reporteHoras">
            <i class="material-icons">content_paste</i>
              <p>Reporte de horas</p>
              </a>
            </li>';
        }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="?menu=reporteHoras">
          <i class="material-icons">content_paste</i>
          <p>Reporte de horas</p>
              
              </a>
            </li>';
        }     
        }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="?menu=reporteHoras">
          <i class="material-icons">content_paste</i>
          <p>Reporte de horas</p>
              
              </a>
            </li>';
        }     
        ?>
        <?php 
        if(isset($_GET['menu'])){
          if($_GET['menu'] == 'historialReporte'){
            echo '<li class="nav-item active">
            <a class="nav-link" href="?menu=historialReporte">
            <i class="material-icons">content_paste</i>
              <p>Historial Reporte Horas</p>
              </a>
            </li>';
        }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="?menu=historialReporte">
          <i class="material-icons">content_paste</i>
          <p>Historial Reporte Horas</p>
              
              </a>
            </li>';
        }     
        }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="?menu=historialReporte">
          <i class="material-icons">content_paste</i>
          <p>Historial Reporte Horas</p>
              
              </a>
            </li>';
        }     
        ?>
        <?php 
        if(isset($_GET['menu'])){
          if($_GET['menu'] == 'organigrama'){
            echo '<li class="nav-item active">
            <a class="nav-link" href="?menu=organigrama">
            <i class="material-icons">bubble_chart</i>
              <p>Organigrama</p>
              </a>
            </li>';
        }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="?menu=organigrama">
          <i class="material-icons">bubble_chart</i>
          <p>Organigrama</p>
              
              </a>
            </li>';
        }     
        }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="?menu=organigrama">
          <i class="material-icons">bubble_chart</i>
          <p>Organigrama</p>
              
              </a>
            </li>';
        }     
        ?>
        </ul>
</div>
      
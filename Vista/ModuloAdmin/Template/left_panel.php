
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      
      <div class="logo">
      
      <center><img class="img" src="../Vista/assets/css/imagenes_logo/3.png" /></center>  
        <a class="simple-text logo-normal">
          RC BUSINESS CONSULTING
        </a></div>
        
      <div style= "overflow-y: scroll;" class="sidebar-wrapper">
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
                  <p>Mi Perfil</p>
                </a>
              </li>';
            
          }else{
            echo '<li class="nav-item">
                <a class="nav-link" href="?menu=miPerfil">
                  <i class="material-icons">person</i>
                  <p>Mi Perfil</p>
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
            if($_GET['menu'] == 'consultores'){
              echo '<li class="nav-item active">
                <a class="nav-link" href="?menu=consultores">
                  <i style="font-size:20px;" class="fas fa-users "></i>
                  <p>Consultores</p>
                </a>
              </li>';
            
          }else{
            echo '<li class="nav-item">
                <a class="nav-link" href="?menu=consultores">
                <i style="font-size:20px;" class="fas fa-users "></i>
                  <p>Consultores</p>
                </a>
              </li>';
          } 
        }else{
          echo '<li class="nav-item">
              <a class="nav-link" href="?menu=consultores">
              <i style="font-size:20px;" class="fas fa-users "></i>
                <p>Consultores</p>
              </a>
            </li>';
        } 
        ?>
        <?php 
          if(isset($_GET['menu'])){
            if($_GET['menu'] == 'clientes'){
              echo '<li class="nav-item active">
                <a class="nav-link" href="?menu=clientes">
                <i style="font-size:20px;" class="fas fa-laptop-house"></i>
                  <p>Clientes</p>
                </a>
              </li>';
            
          }else{
            echo '<li class="nav-item">
                <a class="nav-link" href="?menu=clientes">
                <i style="font-size:20px;" class="fas fa-laptop-house"></i>
                  <p>Clientes</p>
                </a>
              </li>';
          } 
        }else{
          echo '<li class="nav-item">
              <a class="nav-link" href="?menu=clientes">
              <i style="font-size:20px;" class="fas fa-laptop-house"></i>
                <p>Clientes</p>
              </a>
            </li>';
        } 
        ?>
        <?php 
          if(isset($_GET['menu'])){
            if($_GET['menu'] == 'reporte'){
              echo '<li class="nav-item active">
                <a class="nav-link" href="?menu=reporte">
                  <i class="material-icons">content_paste</i>
                  <p>Reporte de horas</p>
                </a>
              </li>';
            
          }else{
            echo '<li class="nav-item">
                <a class="nav-link" href="?menu=reporte">
                  <i class="material-icons">content_paste</i>
                  <p>Reporte de horas</p>
                </a>
              </li>';
          } 
        }else{
          echo '<li class="nav-item">
              <a class="nav-link" href="?menu=reporte">
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
                  <i class="material-icons">library_books</i>
                  <p>Historial reporte</p>
                </a>
              </li>';
            
          }else{
            echo '<li class="nav-item">
            <a class="nav-link" href="?menu=historialReporte">
             <i class="material-icons">library_books</i>
             <p>Historial reporte</p>
                </a>
              </li>';
          } 
        }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="?menu=historialReporte">
            <i class="material-icons">library_books</i>
            <p>Historial reporte</p>
              </a>
            </li>';
        } 
        ?>
        
        
        
        </ul>
      </div>
      
      <script src="https://kit.fontawesome.com/d82eacb9bb.js" crossorigin="anonymous"></script>
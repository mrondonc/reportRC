<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoMod_sap::setConexionBD($conexion);

$listMod_sap = ManejoMod_sap::getList();

?>
<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" name='viewport' >
                                <title>Login RC</title>
                                <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
                                <link rel="icon" type="image/png" href="assets/img/favicon.png">
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <style>body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: linear-gradient(to right, #0F344A, #033B0F)
}

.card {
    margin-bottom: 20px;
    border: none
}

.box {
    width: 60%;
    padding: 40px;
    position: absolute;
    top: 50%;
    left: 18%;
    background: #FFFFFF;
    text-align: center;
    transition: 0.25s;
    margin-top: 5%;
    
}


.box input[type="text"],
.box input[type="password"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #30ABBA;
    padding: 10px 10px;
    width: 250px;
    outline: none;
    color: #0F344A;
    border-radius: 24px;
    transition: 0.25s
}

.box h1 {
    color: #0F344A;
    text-transform: uppercase;
    font-weight: 500
}

.box input[type="text"]:focus,
.box input[type="password"]:focus{
    width: 300px;
    border-color: #62de67
}

.box input[type="submit"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid  #62de67;
    padding: 14px 40px;
    outline: none;
    color: #033B0F;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer
}

.box input[type="submit"]:hover {
    background: #62de67
}

.forgot {
    text-decoration: underline
}

ul.social-network {
    list-style: none;
    display: inline;
    margin-left: 0 !important;
    padding: 0
}

ul.social-network li {
    display: inline;
    margin: 0 5px
}

.social-network a.icoFacebook:hover {
    background-color: #3B5998
}

.social-network a.icoTwitter:hover {
    background-color: #33ccff
}

.social-network a.icoGoogle:hover {
    background-color: #BD3518
}

.social-network a.icoFacebook:hover i,
.social-network a.icoTwitter:hover i,
.social-network a.icoGoogle:hover i {
    color: #30ABBA
}

a.socialIcon:hover,
.socialHoverClass {
    color: #44BCDD
}

.social-circle li a {
    display: inline-block;
    position: relative;
    margin: 0 auto 0 auto;
    border-radius: 50%;
    text-align: center;
    width: 50px;
    height: 50px;
    font-size: 20px
}

.social-circle li i {
    margin: 0;
    line-height: 50px;
    text-align: center
}

.social-circle li a:hover i,
.triggeredHover {
    transform: rotate(360deg);
    transition: all 0.2s
}

.social-circle i {
    color: #0F344A;
    transition: all 0.8s;
    transition: all 0.8s
}

.content-select select{
	appearance: none;
	-webkit-appearance: none;
	-moz-appearance: none;
}

.content-select{
	max-width: 250px;
	position: relative;
}
 
.content-select select{
	border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #30ABBA;
    padding: 10px 10px;
    width: 250px;
    outline: none;
    color: #0F344A;
    border-radius: 24px;
    transition: 0.25s
}
 
.content-select select:hover{
	background: none;
}
 
/* 
Creamos la fecha que aparece a la izquierda del select.
Realmente este elemento es un cuadrado que sólo tienen
dos bordes con color y que giramos con transform: rotate(-45deg);
*/
.content-select i{
	position: absolute;
	right: 20px;
	top: calc(50% - 13px);
	width: 16px;
	height: 16px;
	display: block;
	border-left:4px solid #2AC176;
	border-bottom:4px solid #2AC176;
	transform: rotate(-45deg); /* Giramos el cuadrado */
	transition: all 0.25s ease;
}
 
.content-select:hover i{
	margin-top: 3px;
}
</style>
    </head>
    <body oncontextmenu='return false' class='snippet-body'>
    <div class="container" >
        <div class="col-md-12">
            <div class="card">
                <div class="box">
                    <form method="post" action="registroConsultor.php" id="formRegistroConsultor" enctype="multipart/form-data" name="formRegistroConsultor" onsubmit="verificarPasswords(); return false">
                    <img class="img" src="../Vista/assets/css/imagenes_logo/1.png">
                    <h2>Registro de Consultor</h2>
                    <p class="text-muted"> Por favor ingrese los campos a continuación</p> 
                        <div class="form-row" id="mostrarUsuario">
                            <div class="col-md-6">
                                <div class="form-group">
                                 <div class="content-select">
                                    <input type="text" id="nombre" name="nombre" placeholder="Nombre" required> 
                                    <input type="text" id="telefono" name="telefono" placeholder="Teléfono" required>
                                    <input type="text" id="direccion" name="direccion" placeholder="Dirección de recidencia" required> 
                                    <!--<input type="text" id="mod_sap" name="mod_sap" placeholder="Módulo SAP" required> -->                                    
                                    <select  name="mod_sap" id="mod_sap"  required>
                                        <option value=0 ><?php echo 'Módulo SAP' ?></option>
                                        <?php
                                        foreach ($listMod_sap as $t) {
                                            echo '<option value=' . $t->getCod_mod_sap() . '   >' . $t->getNombre_mod_sap() . '</option>';
                                        }
                                        ?>
                                    </select>                                  
                                    <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required>
                                 </div>  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <input type="text" id="apellido" name="apellido" placeholder="Apellidos" required> 
                                    <input type="text" id="correo" name="correo" placeholder="Correo Electrónico" required>
                                    <input type="text" id="pais" name="pais" placeholder="País de recidencia" required>
                                    <input type="text" id="usuario_login" name="usuario_login" placeholder="Usuario Login" required> 
                                    <input type="password" id="confirmaContraseña" name="confirmaContraseña" placeholder="Confirmar Contraseña" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" id="login" name="addRegistroUsuario" value="Registrarse">
                                </div>
                            </div>
                        </div>
                        <a class="forgot text-muted" href="Login.php">Volver al login!</a>
                    </form>
                    <!---->
                </div>
            </div>
        </div>
    </div>
    

    <script>
        function comprobarClave() {
            clave1 = document.getElementById("mostrarUsuario");
            clave2 = document.f1.confirmaContraseña.value

            if (clave1 == clave2)
                alert("Las dos claves son iguales...\nRealizaríamos las acciones del caso positivo")
            else
                alert("Las dos claves son distintas...\nRealizaríamos las acciones del caso negativo")
        }
        function validarCliente() {
            var nombre, apellido, correo, pais, telefono, usuario_login, direccion, mod_sap, contraseña, confirmarContrasena
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="admin/dist/js/scripts.js"></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
    </body>
</html>
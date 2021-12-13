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
    width: 500px;
    padding: 40px;
    position: absolute;
    top: 50%;
    left: 50%;
    background: #FFFFFF;
    text-align: center;
    transition: 0.25s;
    margin-top: 5%;
    margin-left: 5%;
    margin-right: 5%
    
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
.box input[type="password"]:focus {
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
}</style>
    </head>
    <body oncontextmenu='return false' class='snippet-body'>
    <div class="container" >
        <div class="row" >
            <div class="col-md-6">
                <div class="card">
                    <form method="post" action="VerificarLogin.php" class="box">
                    <img class="img" src="../Vista/assets/css/imagenes_logo/1.png">
                        <h1>Login</h1>
                        <p class="text-muted"> Por favor ingrese su correo y contraseña!</p> 
                        <input type="text" name="correo" placeholder="Correo Electrónico"> 
                        <input type="password" name="contraseña" placeholder="Contraseña"> 
                        <a class="forgot text-muted" href="#">Olvido su contraseña?</a> 
                        <input type="submit" value="Login">
                        <a class="forgot text-muted" href="registrarUsuario.php">¡Registrarse!</a> 
                    </form>
                </div>
            </div>
        </div>  
    </div>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
   
    </body>
</html>
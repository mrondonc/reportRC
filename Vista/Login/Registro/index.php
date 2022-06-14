<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoMod_sap::setConexionBD($conexion);

$listMod_sap = ManejoMod_sap::getListActivo();


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>LOGIN RC REPORT</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/images/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="post" action="../../registroConsultor.php" id="formRegistroConsultor" enctype="multipart/form-data" name="formRegistroConsultor">

                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Name" name="name" id="name" required>
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="LastName" name="lastname" id="lastname" required>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2 js-datepicker" type="text" placeholder="Birthdate" name="birthday" id="birthday" required>
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="number" placeholder="Phone number" name="phone" id="phone" required>
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-2" type="email" placeholder="Email" name="email" id="email" required>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="mod_sap" id="mod_sap" required>
                                            <option disabled="disabled" selected="selected" value="">SAP Module</option>
                                            <?php
                                                foreach ($listMod_sap as $t) {
                                                    echo '<option value=' . $t->getCod_mod_sap() . '   >' . $t->getNombre_mod_sap() . '</option>';
                                                }
                                                ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="User name" name="userName" id="userName" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit" name="addRegistroUsuario" value="Registrarse">Load</button>
                        </div>
                    </form>
                    <br><br>
                    <a class="input--style-2" href="../index.php">back to login!</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
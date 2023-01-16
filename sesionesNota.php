<?php
ob_start();
require_once 'util.php';
require_once 'Nota.php';
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Textos en sesión</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>

        <div class="container-fluid">
            <h1>Introduzca notas en la sesión</h1>
            <?php
            iniciarSesion();

            if (isset($_POST["borrar"])) {
                cerrarSesion();
            }

            if (isset($_POST["titulo"]) && isset($_POST["desc"])) {
                $titulo = $_POST["titulo"];
                $desc = $_POST["desc"];
                $nota = new Nota($titulo, $desc);
                $_SESSION["notas"][] = $nota;

                print_r($_SESSION["notas"]);
               
            }

            if (isset($_SESSION["notas"]) && count($_SESSION["notas"]) > 0) {
                ?>
                <ul>
                    <?php foreach ($_SESSION["notas"] as $key => $value) { ?>
                        <li> <?= $value ?> </li>
                    <?php } ?>

                </ul>
            <?php }
            ?>

            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6">
                    <form method="post">
                        <!-- Titulo input -->
                        <div class="form-group mb-4 ">
                            <label class="form-label" for="texto">Título:</label>
                            <input type="text" id="texto" class="form-control" name="titulo"  required/>

                        </div>                    
                        <div class="form-group mb-4 ">
                            <label class="form-label" for="desc">Descripción:</label>
                            <input type="text" id="desc" class="form-control" name="desc"  required/>

                        </div> 

                        <!-- Submit button -->
                        <input type="submit" class="btn btn-primary btn-block mb-4" value="Añadir"></button>


                    </form>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6">
                    <form method="post">
                        <!-- Submit button -->
                        <input type="submit" name="borrar" class="btn btn-secondary btn-block mb-4" value="Borrar sesion"></button>


                    </form>
                </div>
            </div>
            <?php
            ob_end_flush();
            ?>
    </body>
</html>

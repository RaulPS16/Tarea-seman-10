<?php   
    //inicializa variablespara su posterior uso
    $resultado = '';

    // optiene la fecha y hora actual
    date_default_timezone_set("America/Costa_Rica");
    $fechaActual = date("Y-m-d");
    $fechaHoraActual = new DateTime(date("Y-m-d H:i:s"));

    // optiene por postback la fecha en edad del usuario
    if (isset($_POST['fecha_nacimiento']) && !empty($_POST['fecha_nacimiento'])) {
        // coloca en formato fecha hora al dato optenido por $_POST
        $fechaNacimiento = new DateTime(date("Y-m-d H:i:s", strtotime($_POST['fecha_nacimiento'])));

        //  calcual la deferencia entre la fecha actual - la fecha de nacimiento
        $resultado = $fechaHoraActual->diff($fechaNacimiento);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstap 5.1v -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>

        .centraForm{
            margin-top: 40%;
            
        }

        .fechaActual{
            position: absolute;
            bottom: 0;
            left: 1em;
        }

        @media only screen and (min-width: 990px) {
            .container{
                width: 70%;
            }
        }

        @media only screen and (min-width: 1024px) {
            .container{
                width: 50%;
            }
        }

    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="index.php" method="post" class="centraForm">
            <div>
                <label for="fecha_nacimiento" class="form-label">Ingrese la fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" max="<?php print_r($fechaActual);?>" require>
            </div>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" value="Calcular edad" name="btnCalculaEdad" class="btn btn-primary btn-lg">
            </div>

            <?php
                if ($resultado <> '') {
                    ?>  
                        <spam class="position-absolute top-50 start-50 translate-middle">Edad: <?php print_r("Años: " . $resultado->y . ", Meses: " . $resultado->m . ", Días: " . $resultado->d . ", Horas: " . $resultado->h . ", Minutos: " . $resultado->i . ", Segundos: " . $resultado->s);?></spam>
                    <?php
                }
            
            ?>
            <!---->
        </form>
    </div>
    <div class="fechaActual">
        <p>Fecha y hora actual: <?php print_r(date("Y-m-d H:i:s")); ?></p>
        
    </div>
</body>
</html>
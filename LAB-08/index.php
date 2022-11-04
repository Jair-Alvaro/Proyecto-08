<?php include 'template/header.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arreglos</title>
    <link rel="stylesheet" href="css/ESTILOS4.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body> 
    <br>
    <div id ="reseña">
       <h1>DELICIOUS DETAIL </h1>
       <p>
            "Delicious Detail” es una empresa que brinda una gran variedad de arreglos perzonalizados<br>
            elaborados y diseñados por un personal especializado.<br>Nuestros diversos diseños están hechos de una gran variedad de productos
            de alta calidad,<br> donde todos ellos son estrictamente seleccionados.
       </p>
    </div>
    <div class="container">
        <div class="container-slides">
            <ul class="slides">
                <li class="slide active brand1">
                    <a href="#" class="action"><span>Arreglo 1</span></a>
                    <img src="imagenes/imagenF6.webp"width="665" height="400">
                </li>
                <li class="slide brand2">
                    <a href="#" class="action"><span>Arreglo 2</span></a>
                    <img src="imagenes/imagenF7.jpg"width="690" height="400">
                </li>
                <li class="slide brand3">
                    <a href="#" class="action"><span>Arreglo 3</span></a>
                    <img src="imagenes/imagenF9.webp"width="670" height="400">
                </li>
                <li class="slide brand4">
                    <a href="#" class="action"><span>Arreglo 4</span></a>
                    <img src="imagenes/imagenF11.jpg"width="665" height="400">
                </li>
                <li class="slide brand5">
                    <a href="#" class="action"><span>Arreglo 5</span></a>
                    <img src="imagenes/imagenF10.webp"width="690" height="400">
                </li>
            </ul>
        </div>
    </div>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- funcs javascript -->
    <script src="js/scripts.js"></script>
</body>
</html>
<?php include 'template/footer.php' ?>
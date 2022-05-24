<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="bancologo3.png" type="image/png">
    <title>American Bank</title>
    <link rel="stylesheet" href="./sesioniniciada.css">
</head>

<body>
    <div id="contenedor">
        <header>
            <div id="logo">
                <a href="./index.html"><img src="bancologo3.png" alt="logo"></a>
            </div>
            <div id="menu">
            <ul>
                <li></li>
                <li><a href="./index.html">Cerrar sesión</a></li>
                <li></li>
            </ul>
        </div>
        </header>
        <div id="contenido">
            <div id="publicaciones">
                <div class="post">
                   
                    <div class="main">
                        <?php
                            session_start();
                            $con=mysqli_connect('localhost','root','root','datosbanco');
                            $dni = $_SESSION['dni'];
                            $nombre = $_SESSION['nombre'];
                            $saldo =  $_SESSION['saldo'];
                            
                            echo ("¡Bienvenid@ a tu cuenta, " .$nombre . "!");
                            echo ("<br>");
                            echo ("Su saldo actual es: " .$saldo);
                        ?>
                        
                    </div>
                </div>
                <div class="post2">
                   
                    <div class="main">
                        <div id="code1"><br>Ingresar dinero
                            <div id="code2">
                                <form class="formulario" method="post" action= "ingresar.php">
                                    <label for="ingreso1">Introduzca la cantidad a ingresar:</label>
                                    <input name = "ingreso" type="number"min="0" max="1000000">
                                    <input id="enviar" type="submit" name="botoningreso" value="ingresar" action="ingresar.php">
                                    
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
                 <div class="post2">
                   
                    <div class="main">
                        <div id="code1"><br>Retirar dinero
                            <div id="code2">
                            <form class="formulario" method="post" action= "retirar.php">
                                    <label for="retirada1">Introduzca la cantidad a retirar:</label>
                                    <input name = "retirada" type="number"min="0" max="1000000">
                                    <input id="enviar" type="submit" name="botonretirada" value="retirar" action="retirar.php">
                                   <?php
                                    if($_SESSION ['valido'] == 1){
                                        echo'<script>alert("ERROR: No tiene fondos suficientes")</script>';
                                        $_SESSION ['valido'] = 0;
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer id="footer">
            <div id="copyright">
                <p>&copy 2022 American Bank. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>

</html>
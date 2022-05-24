<?php

$Host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="datosbanco"; // Database name 
$tbl_name="datos"; // Table name 

// Connect to server and select databse.
$con = mysqli_connect($Host, $username, $password, $db_name); 
if ($con == true){
    // username and password sent from form 
    $dni=$_POST['dni']; 
    $contrasena=$_POST['contrasena']; 

    // To protect MySQL injection (more detail about MySQL injection)
    $dni = stripslashes($dni);
    $contrasena = stripslashes($contrasena);
    $dni = mysqli_real_escape_string($con, $dni);
    $contrasena = mysqli_real_escape_string($con, $contrasena);
    $sql = "SELECT * FROM $tbl_name WHERE dni='$dni' and contrasena='$contrasena'";
    $result = mysqli_query($con, $sql);
    $nombre = stripslashes($nombre);
    $nombre = mysqli_real_escape_string($con, $nombre);

    // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result);

    // If result matched $username and $password, table row must be 1 row
    if($count==1){
        header('location: sesioniniciada.php');
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['dni'] = $dni;
        $consultanombre = "SELECT * FROM datos where dni='$dni'";
       // $_SESSION['nombre'] = $con->query($consultanombre);
        $nombrenovale = mysqli_query($con, $consultanombre);
        $count2=mysqli_num_rows($nombrenovale);
        if($count2==1){
            while($row = $result->fetch_assoc()) {
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellidos'] = $row['apellidos'];
                $_SESSION['correo'] = $row['correo'];
                $_SESSION['saldo'] = $row['saldo'];
                $_SESSION ['valido'] = 0;
            }
        }
    }
    else{
        header('location: registrarse.html');
    }
}
else{
    echo("No es posible conectar con la Base de Datos");
}

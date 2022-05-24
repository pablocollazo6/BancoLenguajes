<?php
$link = mysqli_connect("localhost", "root", "root", "datosbanco");
 
// comprobar conexion
if($link === false){
    die("ERROR:  " . mysqli_connect_error());
}
 
// Obtener datos
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$dni = $_POST['dni'];
$telefono = $_POST['tel'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

 
// Creamos cadena SQL y la ejecutamos
$sql = "INSERT INTO datos (nombre, apellidos, DNI, telefono, correo, contrasena, saldo)
            VALUES ('$nombre', '$apellidos', '$dni', '$telefono', '$correo', '$contrasena', 1000)";
if(mysqli_query($link, $sql)){
   // echo "datos añadidos correctamente";
   header('location: PaginaPrincipalBanco.html');
} else{
    echo "ERROR:  $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
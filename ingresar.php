<?php
  session_start();
    $ingreso = $_POST['ingreso'];
    $dni = $_SESSION['dni'];
    $saldo = $_SESSION['saldo'];
        $con=mysqli_connect('localhost','root','root','datosbanco');
        if ($con->connect_error) {
            die("La conexión ha fallado: " . $conn->connect_error);
        }
       $sql="UPDATE datos SET saldo=saldo+'$ingreso' where dni='$dni'";
        
        $resultado=mysqli_query($con,$sql);
        $_SESSION['saldo'] = $saldo + $ingreso;
        
       
        $con->close();

        header('location: sesioniniciada.php');
?>
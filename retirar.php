<?php
  session_start();
    $retirada = $_POST['retirada'];
    $dni = $_SESSION['dni'];
    $saldo = $_SESSION['saldo'];
    $con=mysqli_connect('localhost','root','root','datosbanco');
    if ($con->connect_error) {
        die("La conexión ha fallado: " . $conn->connect_error);
    }
    if($retirada > $saldo){
        $_SESSION['valido'] = 1;
        
    }
    else{
       $sql="UPDATE datos SET saldo=saldo-'$retirada' where dni='$dni'";
       $_SESSION['saldo'] = $saldo - $retirada;
       
    }
    $resultado=mysqli_query($con,$sql);
  
        
       
    $con->close();

    header('location: sesioniniciada.php');
?>
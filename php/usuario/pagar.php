
<?php include('../../includes/navbar_us.php'); 
if  (isset($_POST["n_boletos"])) {
  $nb = $_POST["n_boletos"];

  $usid = $_SESSION['user_id'];    
  $evid =  $_SESSION['eventoId'];

  $a = (int)$nb;
  $b = (int)$_SESSION['eventopresio'];
  $total = $a*$b;
  
  $query = "SELECT `tarjeta` FROM `usuario` WHERE `id`=$usid";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $card = $row['tarjeta'];
  }

  $query = "SELECT * FROM `ventas` WHERE `id_evento`=$evid AND `id_usuario`=$usid";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
      $_SESSION['message'] = 'Ya cuentas con boletos';
      $_SESSION['message_type'] = 'danger';
      $query = "DELETE FROM `carrito` WHERE `id_evento`=$evid AND `id_usuario`=$usid";
      $result = mysqli_query($conn, $query);
      header('Location: misBoletos.php');
  }else{
        $query = "SELECT aforo FROM evento WHERE id = $evid";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $roww = mysqli_fetch_array($result);
            $aforo = (int)$roww['aforo'];

        }

        $query = "SELECT SUM(cantidad) AS n FROM ventas WHERE id_evento = $evid";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $roww = mysqli_fetch_array($result);
            $asis= $roww['n'];
            $as = (int)$asis;

            if(($as + $nb) > $aforo){
                $_SESSION['message'] = 'Lo siento, se acabaron los boletos';
                $_SESSION['message_type'] = 'danger';
                header('Location: ver_evento.php?id='.$_SESSION['eventoId']);
            }else{
              $query = "INSERT INTO `ventas` (`id_venta`, `id_evento`, `id_usuario`, `cantidad`, `fecha`, `total`, `pago`) VALUES (NULL, '$evid', '$usid', ' $nb', current_timestamp(), '$total', '$card')";
              $result = mysqli_query($conn, $query);
                    
              if(!$result){
                  $_SESSION['message'] = 'Ocurrió un error, intentalo de nuevo';
                  $_SESSION['message_type'] = 'danger';
                  header('Location: ver_evento.php?id='.$_SESSION['eventoId']);
              }else{
                $_SESSION['message'] = 'Ya tienes la entrada a tu evento';
                $_SESSION['message_type'] = 'success';
                header('Location: misBoletos.php'); 
              }   
            }
          
    
        }

  
  
 
  }
}

?>
             
 



<?php include('../../includes/footer.php'); ?>

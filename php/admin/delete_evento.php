<?php

include('../../database/conn.php');

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM evento WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Query Failed.");
    
  }

  $_SESSION['message'] = 'Evento eliminado';
    $_SESSION['message_type'] = 'danger';
    header('Location: catalogo.php');
}

?>
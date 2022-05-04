
<?php
    include('../../database/conn.php');
    echo "<h1> PAGAR </h1>";

    if  (isset($_GET['n'])) {
        $n = $_GET['n'];
        echo 'N: '.$n;
        if (isset($_SESSION['eventoId'])) {
            $id = $_SESSION['eventoId'];
            
            echo 'Id: '.$id; 
        }
        
        
          
        }
?>
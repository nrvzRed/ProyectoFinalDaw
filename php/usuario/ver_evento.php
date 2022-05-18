<?php include('../../includes/navbar_us.php'); ?>
<div><br><br></div>
<?php
$idevento='';
$precio='';
if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $_SESSION['eventoId'] = $id;
  $query = "SELECT * FROM evento WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    $nombre = $row['nombre'];
    $descripcion = $row['descripcion'];
    $fecha = $row["fecha"];
    $hora = $row["hora"];
    $spot = $row["lugar"];
    $precio = $row["precio"];
    $_SESSION['eventopresio'] = $precio;
    $aforo = $row["aforo"];
    $poster = $row["foto"];
    $categoria = $row["categoria"];
    

    
  }
}   

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    if  (isset($_POST["n_boletos"])) {
        $nb = $_POST["n_boletos"];

        $usid = $_SESSION['user_id'];    
        $evid =  $_SESSION['eventoId'];

        $a = (int)$nb;
        $b = (int)$_SESSION['eventopresio'];
        $total = $a*$b;

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
                $query = "INSERT INTO `carrito` (`id_carrito`, `id_evento`, `id_usuario`, `cantidad`, `total`, `fecha`) VALUES (NULL, '$evid', '$usid','$nb', '$total', current_timestamp())";
                echo $query;
                $result = mysqli_query($conn, $query);
                      
                if(!$result){
                    $_SESSION['message'] = 'Ocurrió un error, intentalo de nuevo';
                    $_SESSION['message_type'] = 'danger';
                    header('Location: ver_evento.php?id='.$_SESSION['eventoId']);
                }else{
                    $_SESSION['message'] = 'Añadido al carrito';
                    $_SESSION['message_type'] = 'success';
                    header('Location: miCarrito.php');    
                }
            }

        }

        

        
        
       
    }else{
        header('Location: ver_evento.php?id='.$_SESSION['eventoId']);
    }
  }
?>
<?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?>" role="alert">
          <strong><?= $_SESSION['message']?></strong> <p><?= $_SESSION['user']?></p>
        </div>
      
      <?php  } ?>
<section class="py-4 text-center container" id="uno">
            <div class="row py-lg-2">
              <div class="col-lg-8 col-md-2 mx-auto" >
                <h1 style="" class="ev" ><?php echo $nombre?></h1>
              </div>
            </div>
        </section>


<br><br><br>
<div class="parallax" style="background-image: url('../../img/<?php echo $poster?>');min-height: 400px;background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;"></div>
<br><br><br>

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4"><?php echo $nombre?></h1>
        <hr class="my-4">
        <p class="lead"><?php echo $descripcion?></p>
        <br>
        <div class="container">
            <div class="row" style="padding-left: 30px;">
                <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/><path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/></svg>
                    <?php echo $spot?>
                </div>
                <div class="col">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                    </svg> 
                    <?php echo $fecha?>
                </div>
                <div class="col">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16"><path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/></svg>
                    <?php echo $hora?>
                </div>
                <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                    <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z"/>
                    <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z"/>
                </svg>                    <?php echo $categoria?>
                </div>
                
            </div>
        </div>
    </div>
    <br><br><br>
    
    <div>
        <h3>Comprar </h3>
        <h5>Max 10 per order</h5>
            <br>
            
            <div class="cont" style="height: 50px;"> 
                <div class="row" style="width: 850px; padding-left:50px;  ">
                    <div class="col" >
                        <p style="font-size: large; padding-top: 10px; height: 50px; width: 250px; padding-left: 10px;" id="uno">
                            Boleto general :
                            <strong>$<?php echo $precio?> MXN</strong>
                        </p>      
                    </div>
    
                    <div class="col col-lg-2">                        
                        
                        <button class="btn btn-outline-secondary btn-lg"  type="button" id="unoo">
                            Comprar
                        </button> 
                          
                    </div>
                    <div class="col ">                        
                        
                        <button  class="btn btn-outline-secondary btn-lg"  type="button" id="dos">
                            Añadir al carrito
                        </button> 
                        
                    </div>
                </div>
            </div>  
            <br><br>
            <?php if (isset($_SESSION['user'])) { ?>
                <div class="collapse" id="aa">
                    <div class="card card-body">
                        <h3><?php echo $nombre ?></h3>
                        <div class="container">
                            <form method="post" action="pagar.php">
                                <div class="row">
                                    <div class="col col-sm-2">
                                            <p style="font-size: large;" >
                                                Selecciona cantidad : 
                                            </p>
                                    </div> 
                                    <div class="col">
                                        <input type="number" class="form-control" min="1" max="10" style="padding-top: 10px; height: 32px; width: 70px;" name="n_boletos" id="nb" oninput="total(<?php echo $precio?>)" required>
                                    </div>   
                                    <div class="col-md-auto">
                                        <strong>Total $</strong>
                                        
                                    </div>   
                                    <div class="col col-lg-1">
                                        <p id="total"></p>
                                    </div>
                                    <div class="col col-lg-1">
                                        <strong> MXN</strong>
                                    </div> 
                                    <div class="col col-lg-1">                        
                                        <button type="submit"  class="btn btn-outline-secondary btn-lg" style="height: 32px; width: 55px; padding: 0px" id="aceptar" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-front" viewBox="0 0 16 16">
                                            <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                            <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                        </svg>
                                        </button> 
                                    </div>  
                                </div>  
                            </form>
                        </div>         
                    </div>
                </div>

                <div class="collapse" id="bb">
                <div class="card card-body">
                            <h3><?php echo $nombre ?></h3>
                        <div class="container">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <div class="row">
                                    <div class="col col-sm-2">
                                            <p style="font-size: large;" >
                                                Selecciona cantidad : 
                                            </p>
                                    </div> 
                                    <div class="col">
                                        <input type="number" class="form-control" min="1" max="10" style="padding-top: 10px; height: 32px; width: 70px;" name="n_boletos" id="nb2" oninput="total2(<?php echo $precio?>)" required>
                                    </div>   
                                    <div class="col-md-auto">
                                        <strong>Total $</strong>
                                        
                                    </div>   
                                    <div class="col col-lg-1">
                                        <p id="total2"></p>
                                    </div>
                                    <div class="col col-lg-1">
                                        <strong> MXN</strong>
                                    </div> 
                                    <div class="col col-lg-1">                        
                                        <button type="submit"  class="btn btn-outline-secondary btn-lg" style="height: 32px; width: 55px; padding: 0px" id="aceptar" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                        </button> 
                                    </div>  
                                </div>  
                            </form>
                        </div>         
                    </div>
                </div>
                
                                
            
            <?php }else{ ?>
                <div class="collapse" id="aa">
                    <div class="card card-body" style="text-align:center">
                         <a href="login.php">Inicia sesion para continuar.</a>
                    </div>
                </div>
                <div class="collapse" id="bb">
                    <div class="card card-body" style="text-align:center">
                         <a href="login.php">Inicia sesion para continuar.</a>
                    </div>
                </div>
               
               
            <?php } ?>
               
</div>

<script>
$(document).ready(function(){
  
  $("#unoo").click(function(){
    $("#bb").collapse('hide');
    $("#aa").collapse('show');
    
  });
  $("#dos").click(function(){
    $("#aa").collapse('hide');
    $("#bb").collapse('show');
  });
});
</script>

<?php include('../../includes/footer.php'); ?>



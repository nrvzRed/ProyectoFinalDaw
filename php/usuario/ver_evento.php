<?php include('../../includes/navbar_us.php'); ?>
<?php include('../../database/conn.php'); ?>
<div><br><br></div>
<?php

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
    $aforo = $row["aforo"];
    $poster = $row["foto"];
    $categoria = $row["categoria"];

    
  }
}   

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if  (isset($_POST['n_boletos'])) {
        $n = $_POST["n_boletos"];
        
        //header('Location: pagar.php?n='.$n);
       
    }

     

    
    
  }
?>

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
                <div class="row" style="width: 550px; padding-left:50px;  ">
                    <div class="col" >
                        <p style="font-size: large; padding-top: 10px; height: 50px; width: 250px; padding-left: 10px;" id="uno">
                            Boleto general :
                            <strong>$<?php echo $precio?> MXN</strong>
                        </p>      
                    </div>
    
                    <div class="col">                        
                        <div class="form-group"> 
                        <button class="btn btn-outline-secondary btn-lg" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Comprar
                        </button> 
                        </div>  
                    </div>
                    </div>
                </div>
            </div>  
            <br><br>
            <?php if (isset($_SESSION['user'])) { ?>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            
            <?php }else{ ?>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <h3><?php echo $nombre ?></h3>
                           
                                <div class="cont" style="height: 50px;">
                                    <div class="row" style=" padding-left:50px;  ">
                                        <div class="col" >
                                            <p style="font-size: large; padding-top: 10px; height: 50px; width: 250px; padding-left: 10px;" >
                                            Selecciona cantidad : 
                                            </p>
                                            
                                                
                                        </div>
                                        <div class="col">
                                            <div class="form-group col-sm-4 d-flex">
                                                <input type="number" class="form-control" min="1" max="10" style="padding-top: 10px; height: 50px; width: 70px;" name="n_boletos">   
                                            </div>
                                        </div>
                                        
                                         <div class="col-md-3 offset-md-2 " style="padding-top: 10px;">
                                             <Strong>Total : </Strong>
                                         </div>
                                         <div class="col " >
                                             <p style="padding-top: 10px;">1231231212121212</p>
                                         </div>
                                         <div class="col " >
                                             <p style="padding-top: 10px;"><strong>$ MXN</strong></p>
                                         </div>
                                         <div class="col">
                                            <div class="form-group" > 
                                                <button type="submit" class="btn btn-outline-secondary btn-lg" id="aceptar" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                                    Pagar
                                                </button> 
                                            </div>
                                         </div>
                                    
                                    </div>
                                </div>
                                
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $nombre?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, dolorum. Commodi, sed consequatur. Nemo labore illo aliquam assumenda beatae, corporis officia. Architecto unde perspiciatis rerum nihil laudantium odit nisi dolorum.
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
            <?php } ?>
            
            
    
    
        
    
</div>



<?php include('../../includes/footer.php'); ?>
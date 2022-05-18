<?php include('../../includes/navbar_us.php'); ?>
<div><br><br></div>
<section class="py-4 text-center container" id="uno">
            <div class="row py-lg-2">
              <div class="col-lg-4 col-md-8 mx-auto" >
                <h1 class="ev" >Carrito</h1>
              </div>
            </div>
        </section>
        <div>
        <div class="album py-5 bg-light">
    <div class="container">
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?>" role="alert">
          <div><strong><?= $_SESSION['message']?></strong> <?= $_SESSION['user']?></div>
        </div>
      <?php   unset($_SESSION['message']); }?>
      <?php if (isset($_SESSION['user'])) { ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
            $usid = $_SESSION['user_id'];  
            $query = "SELECT * FROM carrito WHERE id_usuario = $usid ORDER BY fecha";
            $resultV = mysqli_query($conn, $query);    
            
          while($row = mysqli_fetch_assoc($resultV)) { 
                $evid =$row['id_evento'];
                $nb =$row['cantidad'];
                

                $query = "SELECT * FROM evento WHERE id=$evid";

                $resultE = mysqli_query($conn, $query);

                if (mysqli_num_rows($resultE) == 1) {     
                    $rowE = mysqli_fetch_array($resultE);
                    

                }
                $nev =  $rowE['nombre'];
        ?>
        
        <div class="col">
          <div class="card shadow-sm">
            <img src="../../img/<?php echo $rowE['foto']?>" class="card-img-top" alt="..." width="100%" >
            <div class="card-body">
              <h5 class="card-title"><?php echo $nev?></h5>
              <p class="card-text"><?php echo $rowE['descripcion']?></p>
              <div class="row" >
                <div class="col col-sm-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/><path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/></svg>
                    <?php echo $rowE['lugar'];?>
                </div>
                <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed" viewBox="0 0 16 16">
                    <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5ZM5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z"/>
                    <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z"/>
                </svg>
                    <?php  echo $nb;?>
                </div>
                <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                </svg>                 <?php  echo $rowE['hora'];?>
                </div>
                
            </div>
            <br><br>
              <div class="d-flex justify-content-between align-items-center">
                <a href="comprar.php?nb=<?php  echo $nb;?>&ev=<?php  echo $evid;?>"><button type="button" class="btn btn-sm btn-outline-secondary" >Pagar</button></a>
                <small class="text-muted"><?php echo $rowE['fecha']?></small>
                
              </div>
            </div>
            
          </div>
        </div>
        <?php } ?>
      </div>
            <?php    }else{?>
              <div class="card card-body" style="text-align:center">
                               <a href="login.php">Inicia sesion para continuar.</a>
                          </div>
              <?php    }?>
      
    </div>
  </div>

  
  <?php include('../../includes/footer.php'); ?>
<?php include('../../includes/header.php'); ?>
<?php include('../../database/conn.php'); ?>
<div><br><br></div>
<?php

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
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
?>
<section class="py-4 text-center container" id="uno">
            <div class="row py-lg-2">
              <div class="col-lg-4 col-md-8 mx-auto" >
                <h1 class="ev" ><?php echo $nombre?></h1>
              </div>
            </div>
        </section>


<br><br><br>
<div class="parallax" style="background-image: url('../../img/<?php echo $poster?>');min-height: 400px;background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;"></div>
<br><br><br>

<div class="container-fluid px-1 py-2 mx-auto">
    <div class="row d-flex justify-content-center">
        <div  class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">  
                    <div class="row justify-content-between text-left">
                    
                        <div class="flex-column d-flex">
                            <p class="data"><?php echo $nombre?></p>
                        </div>
                        <p class="contain">  </p>
                    </div>
                    
                    <br>
                    <div class="row justify-content-between text-left">
                        <div class="flex-column d-flex">
                        <p class="data"><?php echo $descripcion?></p>
                        </div>
                        <p class="contain">  </p>
                    </div>
                    <br>
                    <div class="row justify-content-between text-left">
                        <div class=" col-sm-3 flex-column d-flex">
                        <p class="data">F   : <?php echo $fecha?></p>
                        <p class="contain">  </p>
                        </div>

                        <div class=" col-sm-3 flex-column d-flex">
                        <p class="data">H   : <?php echo $hora?></p>
                        <p class="contain">  </p>
                        </div>

                        <div class=" col-sm-3 flex-column d-flex">
                        <p class="data">C   : <?php echo $categoria?></p>
                        <p class="contain">  </p>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-between text-left">
                        <div class=" flex-column d-flex">
                        <p class="data">Spot    : <?php echo $spot?></p>
                        </div>
                        <p class="contain">  </p>
                    </div>
                    <br>
                    
                    <br>
                    <div class="row justify-content-between ">
                        <div class=" col-sm-3 flex-column d-flex">
                        <p class="data" >Precio : <?php echo $precio?> Mxn</p>
                        <p class="contain">  </p>
                        </div>

                        <div class=" col-sm-3 flex-column d-flex">
                        <p class="data"> Aforo  : <?php echo $aforo?></p>
                        <p class="contain">  </p>
                        </div>

                        <div class=" col-sm-3 flex-column d-flex">
                        <p class="data"> Boletos vendidos   : n</p>
                        <p class="contain">  </p>
                        </div>
                        

                    </div>
                    <br>
                
        
        </div>
    </div>
</div>


<?php include('../../includes/footer.php'); ?>
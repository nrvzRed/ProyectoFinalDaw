<?php include('../../includes/navbar_admin.php'); ?>

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION['message'] = 'Evento editado falta';
    $_SESSION['message_type'] = 'warning';
    header('Location: catalogo.php');
}

?>
    <section class="py-4 text-center container" id="uno">
            <div class="row py-lg-2">
              <div class="col-lg-4 col-md-8 mx-auto">
                <h1 class="fw-light">Edita evento</h1>
              </div>
            </div>
        </section>
        <br><br>

<div class="parallax" style="background-image: url('../../img/<?php echo $poster?>');min-height: 400px;background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;"></div>
<br><br>

<div class="container-fluid px-1 py-2 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">  
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="row justify-content-between text-left">
                        <div class="form-group flex-column d-flex">
                            <label class="form-control-label px-3">Nombre<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" id="nombre_ev" name="nombre_ev" value="<?php echo  $nombre ?>" onblur="validate(1)" autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label class="form-control-label px-3">Fecha<span class="text-danger"> *</span></label>
                            <input type="date" class="form-control" id="fecha_ev" name="fecha_ev"  value="<?php echo  $fecha ?>" onblur="validate(2)">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label class="form-control-label px-3">Hora<span class="text-danger"> *</span></label>
                            <input type="time" class="form-control" id="hora_ev" name="hora_ev" value="<?php echo  $hora ?>" onblur="validate(3)">
                        </div>
                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label class="form-control-label px-3">Categoria<span class="text-danger"> *</span></label>
                            <select id="categoria_ev" class="form-control" name="categoria_ev"  value="<?php echo  $categoria ?>" onblur="validate(4)">
                                    <?php
                                        if ($categoria=="Musica") {

                                            echo "<option value=''>Choose...</option>";
                                            echo "<option value='Musica' selected>Musica</option>";
                                            echo "<option value='Deportes'>Deportes</option>";
                                            echo "<option value='Cultura'>Cultura</option>";
                                        }
                                        elseif ($categoria=="Deportes") {

                                            echo "<option value=''>Choose...</option>";
                                            echo "<option value='Musica' >Musica</option>";
                                            echo "<option value='Deportes' selected>Deportes</option>";
                                            echo "<option value='Cultura'>Cultura</option>";
                                        }
                                        else {

                                            echo "<option value=''>Choose...</option>";
                                            echo "<option value='Musica' >Musica</option>";
                                            echo "<option value='Deportes'>Deportes</option>";
                                            echo "<option value='Cultura' selected>Cultura</option>";
                                        }
                                    ?>

                                </select>
                            
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-between text-left">
                        <div class="form-group flex-column d-flex">
                            <label class="form-control-label px-3">Ubicacion<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" id="spot_ev" name="spot_ev" value="<?php echo  $spot ?>" onblur="validate(5)" >
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-between text-left">
                        <div class="form-group flex-column d-flex">
                            <label class="form-control-label px-3">Descripcion<span class="text-danger"> *</span></label>
                            <textarea class="form-control" id="descrip_ev" name="descrip_ev"   onblur="validate(6)"><?php echo  $descripcion ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-between ">
                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label class="form-control-label px-3">Precio<span class="text-danger"> *</span></label>
                            <input type="number" class="form-control"  value="<?php echo  $precio ?>" id="precio_ev" name="precio_ev" onblur="validate(7)">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label class="form-control-label px-3">Aforo<span class="text-danger"> *</span></label>
                            <input type="number" class="form-control" id="aforo_ev" value="<?php echo  $aforo ?>" name="aforo_ev" onblur="validate(8)">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"  onclick="file2()"checked>
                                    <label class="form-check-label" for="inlineRadio2">No cambiar poster</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" onclick="file1()">
                                    <label class="form-check-label" for="inlineRadio1">Cambiar poster</label>
                                </div>
                                
                                <input type="file" class="form-control" id="poster_ev" name="poster_ev" value='../../img/<?php echo $poster?>' accept=".jpg, .jpeg" onblur="validate(9)" disabled>

                            
                        </div>

                    </div>
                    <br>
                    <div class="row justify-content-end">
                        <div class="form-group"> 
                          <button type="submit" class="btn btn-outline-secondary btn-lg" id="aceptar"  >
                            Ingresar
                          </button> 
                        </div>
                    </div>
                </form>
            
        </div>
    </div>
</div>


<?php include('../../includes/footer.php'); ?>
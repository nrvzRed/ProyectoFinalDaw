
<?php include('../../includes/navbar_admin.php'); ?>




<?php
        /*if(isset($conn)) {
            echo 'DB is connected';
        }*/
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          echo 'Yess checo P2';

          $nombre = $_POST["nombre_ev"];
          $fecha = $_POST["fecha_ev"];
          $hora = $_POST["hora_ev"];
          $spot = $_POST["spot_ev"];
          $descrip = $_POST["descrip_ev"];
          $precio = $_POST["precio_ev"];
          $aforo = $_POST["aforo_ev"];
          $poster = $_POST["poster_ev"];
          $categoria = $_POST["categoria_ev"];

          echo $poster;

          $query = "INSERT INTO evento(id, nombre, fecha, hora, descripcion, lugar, foto, precio, aforo, categoria) VALUES ('NULL','$nombre', '$fecha', '$hora', '$descrip', '$spot', '$poster', '$precio', '$aforo', '$categoria')";

          $result = mysqli_query($conn, $query);
            if(!$result) {
                die("Query Failed.");
            }

            $_SESSION['message'] = 'Evento guardado';
            $_SESSION['message_type'] = 'success';
           

            header('Location: catalogo.php');
        }
        
      ?>
<div><br><br></div>
<section class="py-4 text-center container" id="uno">
            <div class="row py-lg-2">
              <div class="col-lg-4 col-md-8 mx-auto">
                <h1 class="fw-light">Ingresa evento</h1>
              </div>
            </div>
        </section>
        <br><br>
<div class="container-fluid px-1 py-2 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">  
                
        
            
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="row justify-content-between text-left">
                        <div class="form-group flex-column d-flex">
                            <label class="form-control-label px-3">Nombre<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" id="nombre_ev" name="nombre_ev" placeholder="Evento" onblur="validate(1)" autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label class="form-control-label px-3">Fecha<span class="text-danger"> *</span></label>
                            <input type="date" class="form-control" id="fecha_ev" name="fecha_ev" onblur="validate(2)">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label class="form-control-label px-3">Hora<span class="text-danger"> *</span></label>
                            <input type="time" class="form-control" id="hora_ev" name="hora_ev" onblur="validate(3)">
                        </div>
                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label class="form-control-label px-3">Categoria<span class="text-danger"> *</span></label>
                            <select id="categoria_ev" class="form-control" name="categoria_ev" onblur="validate(4)">
                                    <option value="">Choose...</option>
                                    <option value="Musica">Musica</option>
                                    <option value="Deportes">Deportes</option>
                                    <option value="Cultura">Cultura</option>
                                </select>
                            
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-between text-left">
                        <div class="form-group flex-column d-flex">
                            <label class="form-control-label px-3">Ubicacion<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" id="spot_ev" name="spot_ev" placeholder="Spot del evento" onblur="validate(5)" >
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-between text-left">
                        <div class="form-group flex-column d-flex">
                            <label class="form-control-label px-3">Descripcion<span class="text-danger"> *</span></label>
                            <textarea class="form-control" id="descrip_ev" name="descrip_ev"  placeholder="Descripcion general" onblur="validate(6)"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-between ">
                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label class="form-control-label px-3">Precio<span class="text-danger"> *</span></label>
                            <input type="number" class="form-control" id="precio_ev" name="precio_ev" onblur="validate(7)">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label class="form-control-label px-3">Aforo<span class="text-danger"> *</span></label>
                            <input type="number" class="form-control" id="aforo_ev" name="aforo_ev" onblur="validate(8)">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label class="form-control-label px-3">Poster<span class="text-danger"> *</span></label>
                            <input type="file" class="form-control" id="poster_ev" name="poster_ev" accept=".jpg, .jpeg" onblur="validate(9)">
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-end">
                        <div class="form-group"> 
                          <button type="submit" class="btn btn-outline-secondary btn-lg" id="aceptar"  disabled>
                            Ingresar
                          </button> 
                        </div>
                    </div>
                </form>
            
        </div>
    </div>
</div>

<?php include('../../includes/footer.php'); ?>
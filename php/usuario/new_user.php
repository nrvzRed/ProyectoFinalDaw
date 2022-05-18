<?php include('../../includes/navbar_us.php'); ?>
<?php
        /*if(isset($conn)) {
            echo 'DB is connected';
        }*/
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          echo 'Yess checo P2';

          $nombre = $_POST["nombre"];
          $username = $_POST["username"];
          $bday = $_POST["bdayy"];
          $email = $_POST["email"];
          $pwd = $_POST["pwd1"];
          $pwd2 = $_POST["pwd2"];
          $phone = $_POST["phone"];
          $card = $_POST["card"];
          $zip = $_POST["zip"];

      $query = "INSERT INTO usuario(id, nombre, username, email, contra, fnacimiento, tarjeta, cp, telefono) VALUES ('NULL','$nombre', '$username', '$email', '$pwd', '$bday', '$card', '$zip', '$phone')";
      $result = mysqli_query($conn, $query);
            if(!$result) {
              $_SESSION['message'] = 'Ocurrió un error, intentalo de nuevo';
              $_SESSION['message_type'] = 'danger';
            }

            $_SESSION['message'] = 'Usuario guardado';
            $_SESSION['message_type'] = 'success';
            $_SESSION['user'] = $username;
           

            header('Location: catalogo.php');    

         
        }
        
      ?>
<div class="container">
  <main>
      <br><br>
      <section class="py-4 text-center container" id="uno">
            <div class="row py-lg-2">
              <div class="col-lg-4 col-md-8 mx-auto" >
                <h1 class="ev" >Registrate</h1>
              </div>
            </div>
        </section>

    <br><br>
      <div class="  text-center">
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="row g-3">
            <div class="col-12">
              <label for="nombre" class="form-label">Nombre</label>
              <div class="input-group">
                <input type="text" class="form-control"  name="nombre" id="nombre_us" placeholder="Nombre" onblur="validate(1)">
              </div>
            </div>
          <div class="col-6">
              <label for="username" class="form-label">Username</label>
              <div class="input-group">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" onblur="validate(2)">
              </div>
            </div>
            <div class="col-6">
              <label for="bday" class="form-label">Fecha de nacimiento</label>
              <div class="input-group">
                <input type="date" class="form-control" name="bdayy" id="bday" placeholder="" onblur="validate(3)">
              </div>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email </label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" onblur="validate(4)">
              
            </div>
            <div class="col-sm-6">
              <label for="pwd" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="pwd1" name="pwd1" placeholder="******"   oninput="validar()">
              
            </div>

            <div class="col-sm-6">
              <label for="pwd2" class="form-label">Repite tu contraseña</label>
              <input type="password" class="form-control" id="pwd2"  name="pwd2" placeholder="x2"   oninput="validar()">
              
            </div>


            <div class="col-md-5">
              <label for="phone" class="form-label">Teléfono</label>
              <input type="tel" inputmode="numeric" class="form-control" id="phone" name="phone" minlength="10" maxlength="10"placeholder="10 digitos" oninput="validate(7)">
             
            </div>

            <div class="col-md-4">
              <label for="card" class="form-label">Numero de tajeta</label>
              <input  class="form-control" id="card" name="card"  type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" minlength="19" maxlength="19" placeholder="xxxx xxxx xxxx xxxx"  oninput="validate(8)">
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="tel" inputmode="numeric" class="form-control" id="zip" name="zip" minlength="5" maxlength="5" placeholder="Zip" oninput="validate(9)">
              
            </div>
          </div>

          <hr class="my-4">
          <button id="aceptar" class="w-100 btn btn-outline-secondary btn-lg" type="submit" onfocus="btn1()" disabled>Guardar</button>
        </form>
      </div>
   
  </main>

  
</div>

<?php include('../../includes/footer.php'); ?>
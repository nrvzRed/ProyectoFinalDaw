
<?php include('../../includes/navbar_us.php'); ?>

<?php
        /*if(isset($conn)) {
            echo 'DB is connected';
        }*/
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          
            $username = $_POST["user"];
            $password = $_POST["password"];

            $query = "SELECT username, id FROM usuario WHERE username='$username' AND contra='$password';";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {     
                $row = mysqli_fetch_array($result);
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user'] = $row['username'];
                $_SESSION['message'] = 'Bienvenido';
                $_SESSION['message_type'] = 'success';
                header('Location: catalogo.php');    
            }else{
                $query = "SELECT username FROM `admin` WHERE username='$username' AND contra='$password';";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) == 1) { 
                    $_SESSION['user'] = $row['username'];
                    $_SESSION['message'] = 'Bienvenido';
                    $_SESSION['message_type'] = 'success';
                    header('Location: ../admin/catalogo.php');   

                  }else{
                    $_SESSION['message'] = 'Ocurrió un error, intentalo de nuevo';
                    $_SESSION['message_type'] = 'danger';
                    header('Location: login.php'); 
                  }


                
            }
            
            
        }

      ?>
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?>" role="alert">
          <strong><?= $_SESSION['message']?></strong> 
        </div>
      
      <?php  }  ?>
<div><br><br></div>
<div class="container">
    <div class="py-2 text-center" id="uno">
            <h2>LOGIN</h2>
    </div>
</div>

<div class="container py-5" style="width: 500px;">

    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-floating">
        <input type="text" class="form-control" name="user" placeholder="username">
        <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <label for="floatingPassword">Password</label>
        </div>

        <br>
        <button class="w-100 btn btn-lg btn-outline-secondary" type="submit">Sign in</button>

        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
</div>


    
<?php include('../../includes/footer.php'); ?>

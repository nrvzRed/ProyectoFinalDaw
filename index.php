<?php session_start(); session_unset();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
      body{
          background: #E8CBC0;  /* fallback for old browsers */
          background: -webkit-linear-gradient(to right, #636FA4, #E8CBC0);  /* Chrome 10-25, Safari 5.1-6 */
          background: linear-gradient(to right, #636FA4, #E8CBC0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

      }

      #jumb{
        padding-top: 100px;
      }
    </style>
  <title>index</title>
</head>
<body>

  <div class="container" id="jumb">
    <div class="jumbotron">
      <h1 class="display-4">TICKET DEALER</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <hr class="my-4">
      <p>Rodrigo Narvaéz Fonseca</p>
      <p class="lead">
        <a class="btn btn-primary btn-lg-5" href="php/usuario/login.php" role="button">Login</a>
        <a class="btn btn-primary btn-lg-5" href="php/usuario/new_user.php" role="button">Registrate</a>
        <a class="btn btn-primary btn-lg-5" href="php/usuario/catalogo.php" role="button">Invitado</a>
        
        
        
      </p>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
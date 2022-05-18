
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="stylesheet" href="../../css/catalogo.css">
    <link rel="stylesheet" href="../../css/ver_evento.css">
    <script type="text/javascript" src="../../js/val_evento4.js"></script>
    <script type="text/javascript" src="../../js/edit_evento.js"></script>
    <script type="text/javascript" src="../../js/ver_evento5.js"></script>
    <script type="text/javascript" src="../../js/new_user4.js"></script>
    <script type="text/javascript" src="../../js/comprar2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    
</head>
<?php include('../../database/conn.php'); ?>
<body>
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white"><?php if (isset($_SESSION['user'])) { echo $_SESSION['user'];?>

            
            <?php }else{ ?>
              About
              
            <?php } ?></h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="miCarrito.php" class="text-white">Carrito</a></li>
            
            <?php if (isset($_SESSION['user'])) { ?>
              <li><a href="misBoletos.php" class="text-white">Mis boletos</a></li>
         
            
            <?php }else{ ?>
              <li><a href="new_user.php" class="text-white">Registrate</a></li>
              <li><a href="login.php" class="text-white">Login</a></li>
              
            <?php } ?>
            
            <li><a href="../../index.php" class="text-white">Salir</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="catalogo.php" class="navbar-brand d-flex align-items-left">
        <div class="icon">      <svg id="algo" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-collection" viewBox="0 0 16 16"><path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/></svg>
        </div>
      <div class="titulo">Ticket Dealer</div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
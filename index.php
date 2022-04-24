<?php include('database/conn.php'); 
  //if(isset($conn)) {
    //echo 'DB is connected';
  //}
?>
<?php include('includes/header.php'); ?>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="php/inProducto.php" class="btn btn-primary my-2">Ingresa evento</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </div>
  </section>
  <?php include('php/catalogo.php'); ?>
  

</main>


<?php include('includes/footer.php'); ?>
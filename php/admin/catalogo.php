<?php include('../../includes/navbar_admin.php'); ?>

<div><br><br></div>
<section class="py-4 text-center container" id="uno">
            <div class="row py-lg-4">
              <div class="col-lg-6 col-md-8 mx-auto" >
                <h1 class="ev" >Eventos</h1>
              </div>
            </div>
        </section>
<div class="album py-5 bg-light">
    <div class="container">
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?>" role="alert">
          <strong><?= $_SESSION['message']?></strong> 
        </div>
      <?php   unset($_SESSION['message']); }?>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
          $query = "SELECT * FROM evento";
          $result_tasks = mysqli_query($conn, $query);    
          if(mysqli_num_rows($result_tasks) == 0){
            echo "No hay eventos";
          }else{
          while($row = mysqli_fetch_assoc($result_tasks)) { 
        ?>

        <div class="col">
          <div class="card shadow-sm">
            <img src="../../img/<?php echo $row['foto']?>" class="card-img-top" alt="..." width="100%" >
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['nombre']?></h5>
              <p class="card-text"><?php echo $row['descripcion']?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="ver_evento.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary" >View</button></a>
                  <a href="edit_evento.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary" >Edit</button></a>
                  <a href="delete_evento.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary" >Delete</button></a>

                </div>
                <small class="text-muted"><?php echo $row['categoria']?></small>
              </div>
            </div>
            
          </div>
        </div>
        <?php } }?>
      </div>
    </div>
  </div>

  <?php include('../../includes/footer.php'); ?>
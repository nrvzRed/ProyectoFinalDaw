<?php
    include('../../includes/navbar_admin.php'); 

   
      $n = 0;
    
?>

<div><br><br></div>
<section class="py-4 text-center container" id="uno">
            <div class="row py-lg-2">
              <div class="col-lg-4 col-md-8 mx-auto" >
                <h1 class="ev" >Ventas</h1>
              </div>
            </div>
        </section>

<br><br>
<div class="container">
<div class="accordion" id="accordionExample">
  <?php
    $query= "SELECT  id, nombre  FROM evento";
    $result_tasks = mysqli_query($conn, $query);    

    while($rowE = mysqli_fetch_assoc($result_tasks)) { 
      $n = $n + 1;
      $evid = $rowE['id'];
      $query= "SELECT  *  FROM ventas WHERE id_evento = $evid";
      $result = mysqli_query($conn, $query); 
  ?>
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading<?php echo $n; ?>">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $n; ?>" aria-expanded="false" aria-controls="collapse<?php echo $n; ?>" collapsed>
      <?php echo $rowE['nombre']; ?>
      </button>
    </h2>
    <div id="collapse<?php echo $n; ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $n; ?>" data-bs-parent="#accordionExample" collapsed>
      <div class="accordion-body">
          <?php 
              $query= "SELECT  *  FROM ventas WHERE id_evento = $evid";
              $result = mysqli_query($conn, $query); 

              while($rowV = mysqli_fetch_assoc($result)) {
              
          ?>
          <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID Usuaio</th>
                                        <th scope="col">Fecha de compra</th>
                                        <th scope="col">Boletos</th>
                                        <th scope="col"></th>
                                        <th scope="col">Total</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        echo "<tr>";
                                            echo "<td>" . $rowV['id_usuario'] . "</td>";
                                            echo "<td>" . $rowV['fecha'] . "</td>";
                                            echo "<td>" . $rowV['cantidad'] . "</td>";
                                            echo "<td><strong>$</strong></td>";
                                            echo "<td>" . $rowV['total'] . "</td>";
                                            echo "<td><strong>MXN</strong></td>";
                                        echo "</tr>";
                                    
                                    
                                ?>
                                </tbody>
                                </table>
                                  
          <?php } ?>
      </div>
    </div>
  <?php }?>
</div>
</div>



</div>
<?php include('../../includes/footer.php'); ?>
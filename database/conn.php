<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'Narvz',
  'vincent',
  'proyectodaw'
) or die(mysqli_erro($mysqli));

?>
<?php

 $conn = mysqli_connect('localhost', 'root', '', 'auth');

 if(!$conn){
  die(mysqli_error($conn));
 }

?>

<?php
  include('config.php');
  // grab incoming variables
  $code2 = $_POST['code2'];

  file_put_contents("$path/code2.txt", "$code2");

  // send them back to the voting page
  header('Location: index.php');
  exit; // forces php to stop, no code will be evaluated beyond this point
?>
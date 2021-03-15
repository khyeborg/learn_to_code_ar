<?php
  include('config.php');
  // grab incoming variables
  $code1 = $_POST['code1'];

  file_put_contents("$path/code1.txt", "$code1");

  // send them back to the voting page
  header('Location: index.php');
  exit; // forces php to stop, no code will be evaluated beyond this point
?>
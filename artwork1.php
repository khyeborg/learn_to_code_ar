<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="UTF-8">
        <!-- P5 libraries -->
        <script src="https://cdn.jsdelivr.net/npm/p5@1.1.9/lib/p5.js"></script>
  </head>
  <body>

    
  	<script>
      <?php
        include('config.php');
        $data1 = file_get_contents("$path/code1.txt");
        print $data1;
      ?>
    </script>
  </body>
</html>



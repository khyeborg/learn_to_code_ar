<!DOCTYPE html>
<html lang="en-us">
  <head>
  		<style>
        textarea {
          width: 500px;
          height: 500px;
        }

        h1 {
          text-align: center;
        }

        #big_div {
          display: flex;
          justify-content: space-around;
        }
      </style>
  </head>
    <script src="js/jquery-3.3.1.min.js"></script>
  <body>
    <h1>HELLO!</h1>

    <div id="big_div">
      <div>
        <form method="POST" action="code1.php">
          <textarea name="code1"><?php
            include('config.php');
            $data1 = file_get_contents("$path/code1.txt");
            print $data1;
          ?></textarea>

          <br>

          <button>Save Code A</button>
        </form>
      </div>

      <div>
        <form method="POST" action="code2.php">
          <textarea name="code2"><?php
            include('config.php');
            $data2 = file_get_contents("$path/code2.txt");
            print $data2;
          ?></textarea>

          <br>

          <button>Save Code B</button>
        </form>
      </div>
    </div>
  </body>
</html>

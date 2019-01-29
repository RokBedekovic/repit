<?php
    $dbc = mysqli_connect('localhost', 'root', '', 'repit');
    $query = "SELECT * FROM users";
    $result = mysqli_query($dbc , $query);
    $loggedin = false;
    $ok = false;

    while($row = mysqli_fetch_array($result))
    {
      if(isset($_COOKIE[$row['username']]))
  		{
  			$loggedin=true;
  			break;
  		}

      if($row['username'] == $_POST['username'])
      {
        if($row['password'] == $_POST['password']){
          setcookie($_POST['username'], $_POST['username'], time() + 60 * 60 * 24 * 365, "/");
          $ok = true;
        }
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="Login.css"/>

    <title>Login</title>
  </head>
  <body>
    <h1>Login:</h1>
          <?php
            if($loggedin == true){
              echo "<p>User je vec ulogiran!</p>";
            }
            else{
              if($ok == true){
                echo "<p>Ulogirani ste!</p>";
              }
              else{
                echo "<p>Nesto ti nije ok</p>";
              }
            }
          ?>
    <a href="index.html">Home</a>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

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

        if($row['username'] == $_POST['username'])
        {
          if($row['password'] == $_POST['password']){
            setcookie($_POST['username'], $_POST['username'], time() + 60, "/");
            $ok = true;
          }
  		}
    }
  }
?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Setovi</title>
      <Link rel="stylesheet" href="index2setovi.css">
    </head>

    <body>
      <h1>Setovi</h1>
      <?php
        if($loggedin == true){
          echo '
          <iframe width="100%" height="120" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&feed=%2Frok-bedekovi%C4%87%2Frok-bedekovi%C4%87-melodeep-techno%2F" frameborder="0" ></iframe>
          <iframe width="100%" height="120" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&feed=%2Frok-bedekovi%C4%87%2Ftechno-the-third%2F" frameborder="0" ></iframe>
          <iframe width="100%" height="120" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&feed=%2Frok-bedekovi%C4%87%2Frok-bedekovi%C4%87-set-no2%2F" frameborder="0" ></iframe>
          <iframe width="100%" height="120" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&feed=%2FRokBedekovi%C4%87%2Frok-bedekovi%C4%87-from-ravepokalips-1pt%2F" frameborder="0" ></iframe>';
        }

          else{
            echo "<p>Morate bit ulogirani da bi ste mogli slusati setove!</p>";
          }
      ?>




    </body>
  </html>

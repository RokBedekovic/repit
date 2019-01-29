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
      <title>Gallery</title>
      <Link rel="stylesheet" href="index2setovi.css">
    </head>

    <body>
      <?php
        if($loggedin == true){
          echo '<!doctype html>
                  <html lang="en">
                    <head>
                      <!-- Required meta tags -->
                      <meta charset="utf-8">
                      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                      <!-- Bootstrap CSS -->

                    </head>
                    <body>
                      <h1>Gallery</h1>
                          <div class="row11">
                            <img src="images\1.jpg" width=370px height=370px>
                            <img src="images\2.jpg" width=370px height=370px>
                            <img src="images\3.jpg" width=370px height=370px>
                            <img src="images\4.jpg" width=370px height=370px>
                          </div>

                          <div class="row22">
                            <img src="images\5.jpg" width=370px height=370px>
                            <img src="images\6.jpg" width=370px height=370px>
                            <img src="images\7.jpg" width=370px height=370px>
                            <img src="images\8.jpg" width=370px height=370px>
                          </div>

                          <div class="row33">
                            <img src="images\9.jpg" width=370px height=370px>
                            <img src="images\10.jpg" width=370px height=370px>
                            <img src="images\11.jpg" width=370px height=370px>
                            <img src="images\12.jpg" width=370px height=370px>
                          </div>

                          <div class="row44">
                            <img src="images\13.jpg" width=370px height=370px>
                            <img src="images\14.jpg" width=370px height=370px>
                            <img src="images\15.jpg" width=370px height=370px>
                            <img src="images\16.jpg" width=370px height=370px>
                          </div>

                          <div class="row55">
                            <img src="images\17.jpg" width=370px height=370px>
                            <img src="images\18.jpg" width=370px height=370px>
                            <img src="images\19.jpg" width=370px height=370px>
                            <img src="images\20.jpg" width=370px height=370px>
                          </div>

                          <div class="row66">
                            <img src="images\21.jpg" width=370px height=370px>
                            <img src="images\22.jpg" width=370px height=370px>
                            <img src="images\23.jpg" width=370px height=370px>
                            <img src="images\24.jpg" width=370px height=370px>
                          </div>






                    </body>
                  </html>









          ';
        }

          else{
            echo "<p>Morate bit ulogirani da bi ste mogli slusati setove!</p>";
          }
      ?>


    </body>
  </html>

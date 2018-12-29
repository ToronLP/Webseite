<html>
  <head>
    <meta charset="utf-8">
    <title>Hallo</title>
    <link rel="stylesheet" href="style.css">
  </head>
<?php
  if(isset($_POST['username'])){
    if($_POST['username']=="Toron"){
      if($_POST['password']=="Toron200"){

      }else {
        $pwWrong='<p class="errorLOL">Das eingegebene Passwort stimmt nicht!</p>';
      }
    }else {
      $userWrong='<p class="errorLOL">Der eingegebene Benutzername ist falsch!</p>';
    }
  }
?>
  <body>
    <div class="loginbox">
      <h2>Login</h2>
      <form method="post" action="">
        <p>Nutzername</p>
        <?php
        if(isset($userWrong)){
          echo $userWrong;
        }
        ?>
        <input type="text" name="username" placeholder="Benutzername">
        <p>Passwort</p>
        <?php
        if(isset($pwWrong)){
          echo $pwWrong;
        }
        ?>
        <input type="password" name="password" placeholder="Passwort">
        <input type="submit">
      </form>
    </div>
  </body>
</html>

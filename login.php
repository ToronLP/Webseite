<html>
  <head>
    <title>Hallo</title>
  </head>
<?php
  if(isset($_POST['username'])){
    if($_POST['username']=="Toron"){
      if($_POST['password']=="Toron200"){

      }else {
        $pwWrong='<p>Das eingegebene Passwort stimmt nicht!</p>';
      }
    }else {
      $userWrong='<p>Der eingegebene Benutzername ist falsch!</p>';
    }
  }
?>
  <body>
    <div>
      <h1>Login</h1>
      <form method="post" action="">
        <p>
          <h2>Nutzername</h2>
          <?php
          if(isset($userWrong)){
            echo $userWrong;
          }
          ?>
          <input type="text" name="username" placeholder="Benutzername">
        </p>
        <p>
          <h2>Passwort</h2>
<?php
if(isset($pwWrong)){
  echo $pwWrong;
}
?>
          <input type="password" name="password" placeholder="Passwort">
        </p>
        <p>
          <input type="submit">
        </p>
      </form>
    </div>
  </body>
</html>

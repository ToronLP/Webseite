<?php
  if(isset($_POST['username']) && isset($_POST['password'])){
    // create the connection
    $con = mysqli_connect("localhost", "root", "");
    // Get values passed fro from in login.php file
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    // check for connection
    if($con != null){
      // to prevent mysql injection
      $username = stripcslashes($username);
      $password = stripcslashes($password);
      $username = mysqli_real_escape_string($con, $username);
      $password = mysqli_real_escape_string($con, $password);
      // hash the $password
      $pwHash = sha1($password);
      // select database
      mysqli_select_db($con, "websitelogin");

      // Querry the database for username
      $result = mysqli_query($con, "SELECT * FROM users where username = '$username' and password = '$password'") or die("Failed to query database ".mysql_error());
      $row = mysqli_fetch_array($result);
    }
  }
?>
<html>
  <head>
    <title>Eingeloggt</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div id="particles-js">
    </div>
    <div class="userBox">
      <?php
      if(isset($_POST['username']) && isset($_POST['password'])){
        if($row['username'] == $username && $row['password'] == $password){
      ?>
      <h2>Willkommen <?php echo $row['username'];?></h2>
      <?php
        if($row['su']==1){
          function newUser() {
              // get the user atributes
              $username = 'newusername';
              $password = 'newpassword';
              // create the connection
              $con = mysqli_connect("localhost", "root", "");
              // check for connection
              if($con != null){
                $username = stripcslashes($username);
                $password = stripcslashes($password);
                $username = mysqli_real_escape_string($con, $username);
                $password = mysqli_real_escape_string($con, $password);

                // select database
                mysqli_select_db($con, "websitelogin");
                $pwHash = sha1($password);
                // hash the password

                // Insert the new data int the database
                $sql = "INSERT INTO users VALUES(null,'$username','$pwHash','$su')";
                mysqli_query($con, $sql);
              }

          }
      ?>
      <div class="newUserBox">
        <h3>Create a new User</h3>
        <form method="post" action='<?php newUser()?>'>
          <p>Benutzername</p>
          <input type="text" name="newusername" placeholder="Benutzername">
          <p>Passwort</p>
          <input type="password" name="newpassword" placeholder="Passwort">
          <p>Superuser
          <input type="checkbox" name="superuser"></p>
          <input type="submit">
        </form>
      </div>
      <?php

        }
      ?>
      <a href="login.php">Abmelden</a>
      <?php
        }else{
      ?>
      <style>
        .userBox{width:20%; height: 20%;}
      </style>
      <h2>Failed to login!</h2>
      <a href="login.php" class="loginFail">Erneut versuchen</a>
      <?php
        }
      ?>
      <?php
      }else{
      ?>
      <style type="text/css">
        .userBox{width: 40%; height: 35%;}
        .userBox h2{padding-top: 7%;font-size: 80px;}
      </style>
      <h2>Noting here!</h2>
      <a href="login.php" class="noData">Einloggen?</a>
      <?php
      }
      ?>
    </div>
    <script type="text/javascript" src="javascript/particles.js"></script>
    <script type="text/javascript" src="javascript/app.js"></script>
  </body>
</html>

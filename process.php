<?php
  if(isset($_POST['username']) && isset($_POST['password'])){
    $con = mysqli_connect("localhost", "root", "");
    // Get values passed fro from in login.php file
    $username = $_POST['username'];
    $password = $_POST['password'];

    // to prevent mysql injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    // connect to the server and select database

    mysqli_select_db($con, "websitelogin");

    // Querry the database for username
    $result = mysqli_query($con, "SELECT * FROM users where username = '$username' and password = '$password'") or die("Failed to query database ".mysql_error());
    $row = mysqli_fetch_array($result);
  }
?>
<html>
  <head>
    <title>Logged in!</title>
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
          echo "<h2>Wilkommen ".$row['username']."</h2>";
          echo '<a href="login.php">Abmelden</a>';
        }else{
          echo '<style type="text/css">.userBox{width: 20%;height: 20%;}</style>';
          echo "<h2>Failed to login!</h2>";
          echo '<a href="login.php" class="loginFail">Erneut versuchen</a>';
        }
      }else{
        echo '<style type="text/css">.userBox{width: 30%;height: 25%;}.userBox h2{padding-top: 7%;font-size: 80px;}</style>';
        echo "<h2>Noting here!</h2>";
        echo '<a href="login.php" class="noData">Einloggen?</a>';
      }
    ?>
    </div>
    <script type="text/javascript" src="javascript/particles.js"></script>
    <script type="text/javascript" src="javascript/app.js"></script>
  </body>
</html>

<?php
session_start();
 ?>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="center-align">
    <h1>Debiti SUPE</h1>
    <form action="home.php" method="post">
    <div class="row">
      <div class="input-field col s12">
        <input id="user" name="user" type="text">
        <label for="email">Username</label>
      </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <input id="pass" name="pass" type="password" >
          <label for="password">Password</label>
        </div>
      </div>
      <?php
      if(isset($_SESSION["valido"]) and $_SESSION["valido"]==0){
        $_SESSION["valido"]=1;
        echo '<p class="red-text">Username o Password errati</p>';
      }
       ?>
      <button type="submit" class="grey darken-4 waves-effect waves-light btn-large">Login</button>
    </form>
  </div>
</div>
  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="../js/materialize.min.js">
  </script>
</body>
</html>

<?php
session_start();
 ?><html>
 <head>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Home</title>
 </head>
 <body>
    <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span href="#" class="navbar-brand">
            Gestione pagamenti supe
</span></div></nav>



<div class="container mt-5 content-center">
  <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">

    <form action="home.php" method="post" class="card-body">  
    <h5 class="card-title">Login</h5>  
    <div class="">
        <input id="user"  placeholder="Username" class="form-controll" name="user" type="text">
      </div>
      <div >
          <input id="pass" placeholder="Password" name="pass" class="form-controll" type="password" >
      </div>
      <?php
      if(isset($_SESSION["valido"]) and $_SESSION["valido"]==0){
        $_SESSION["valido"]=1;
        echo '<sapn class="text-danger">Username o Password errati</span>';
      }
       ?>
      <button type="submit" class="btn btn-primary mt-3">Login</button>
    </form>
  </div>
    </div>
</div>
  <!--JavaScript at end of body for optimized loading-->
</body>
</html>

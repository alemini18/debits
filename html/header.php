<?php
session_start();
if(!isset($_SESSION['id']))
    header("Location: login.php");
?>
<html>
 <head>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 
    <title>Home</title>
 </head>
 <body>
    <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a href="home.php" class="navbar-brand">
            Gestione pagamenti supe
    </a>
            
    <ul class="nav">
                <a class="nav-link" href="send.php">Paga</a>
            </il>
            <il class="nav-item">
                <a class="nav-link" href="recive.php">Richiedi</a>
            </il>
            <il class="nav-item">
                <a class="nav-link" href="actual.php">Resoconto</a>
            </il>
            
        </ul>
        <div class=""> 
            <span class="navbar-text    ">  <?=$_SESSION['user']?></span> 
            <a href="logout.php" class="  btn btn-outline-warning ">Logout</a>
        </div>
    </div>
</nav>
   
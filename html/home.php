<?php
  include 'header.php';
include_once("funzioni.php");
$db=db_connect();
if(!isset($_SESSION["id"])){
  if(!(isset($_POST["user"]) or isset($_POST["pass"]) or isset($_POST["submit"]))){   //TODO: cambiare, necessario impostare per password
    header("Location: login.php");
  }
  $user=$_POST["user"];
  $pass=$_POST["pass"];
  $result=$db->query('SELECT * FROM login_debits WHERE user="'.$user.'"');
  $id=-1;
  if($result->num_rows>0){
    $row=$result->fetch_assoc();
    if($row["pass"]!=$pass){
      $_SESSION["valido"]=0;
      header("Location: login.php");
    }
      $_SESSION["id"]=$row["id"];
      $_SESSION['user']=$user;
  }else{
    $_SESSION["valido"]=0;
    header("Location: login.php");
  }
}

$id=$_SESSION["id"];
  ?>
 <body>
   <div class="container">
     <h3>Resoconto</h3>
     <?php

    //  QUERY CHE FA TUTTO IN UNO: SELECT x.p, sum(x.valore) FROM (SELECT da p,valore FROM history_debits WHERE a='1' UNION SELECT a p,(-1* valore) valore FROM history_debits WHERE da='1') as x GROUP BY x.p;
     $bilancio=array();
     $storico=array();
     $result=$db->query('SELECT * FROM history_debits WHERE a="'.$id.'"');
      while($row=$result->fetch_assoc()){
          if(!isset($bilancio[$row["da"]]))$bilancio[$row["da"]]=0;
      $bilancio[$row["da"]]-=$row["valore"];
      $storico[]=$row["data"].": movimento da ".id_to_name($row["da"])." a ".id_to_name($id)." di ".$row["valore"]." euro";
    }
    $result=$db->query('SELECT * FROM history_debits WHERE da="'.$id.'"');
    while($row=$result->fetch_assoc()){
    $bilancio[$row["a"]]+=$row["valore"];
    $storico[]=$row["data"].": movimento da ".id_to_name($id)." a ".id_to_name($row["a"])." di ".$row["valore"]." euro";
  }
  foreach($bilancio as $nome => $valore){
    if($valore<0)echo '<h5 class="red-text">Devi a '.id_to_name($nome).' '.(-$valore).' euro<h5>';
    else if($valore>0)echo '<h5 class="green-text">'.id_to_name($nome).' ti deve '.$valore.' euro<h5>';
  }
  ?>
  <div class="center">
  <a href="send.php" class="waves-effect waves-light btn-large grey darken-4">Paga</a>
  <a href="receive.php" class="waves-effect waves-light btn-large grey darken-4">Richiedi Denaro</a>

</div>
<?php
  echo '<h3>Storico</h3>';
  $storico=array_unique($storico);
  foreach($storico as $s){
    echo '<p>'.$s.'</p>';
  }
      ?>
   </div>

   <!--JavaScript at end of body for optimized loading-->
   <script type="text/javascript" src="../js/materialize.min.js"></script>
 </body>
 </html>

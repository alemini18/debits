<?php
include_once("credentials.php");
function db_connect(){
  $db=new mysqli(server(),user(),password(),database()) or die("Errore di connessione al database");
  return $db;
}

function id_to_name($nome){
  $db=db_connect();
  $result=$db->query('SELECT * FROM login_debits WHERE id="'.$nome.'"');
  if($result->num_rows>0){
    $row=$result->fetch_assoc();
    return $row["nome"];
  }
  die($nome." Errore nell'id");
}

function name_to_id($nome){
  $db=db_connect();
  $result=$db->query('SELECT * FROM login_debits WHERE nome="'.$nome.'"');
  if($result->num_rows>0){
    $row=$result->fetch_assoc();
    return $row["id"];
  }
  die($nome." Errore nel nome");
}

 ?>

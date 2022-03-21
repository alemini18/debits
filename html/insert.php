<?php
session_start();
include_once("funzioni.php");
$db=db_connect();
if(!isset($_SESSION["id"]))die("errore");
$id_from=$_SESSION["id"];
$idArray=$_POST["idArray"];
foreach($idArray as $idto){
  $id_to=name_to_id($idto);
  if($id_from==$id_to)header("Location: ".$_POST["url"]);
}
foreach($idArray as $idto){
$id_to=name_to_id($idto);
$value=$_POST["value"];
$date=date("Y-m-d h:m:s");
$result=$db->query('INSERT INTO history_debits VALUES ('.$id_from.', '.$id_to.', '.$value.', "'.$date.'")') or die("errore nell'inserire");
}
header("Location: home.php");
?>

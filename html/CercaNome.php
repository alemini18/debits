<?php
include "funzioni.php";
$s=$_GET['s'];
$db=db_connect();

$ris=$db->query("SELECT nome,id FROM login_debits WHERE nome LIKE '%$s%' OR user LIKE '%$s%'");
if(!$ris) echo $db->error;
$r=[];
while($x=$ris->fetch_assoc())array_push($r,$x);
echo json_encode($r);

?>
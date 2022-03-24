<?php
session_start();
include 'header.php';

$q;
$heads;
if(isset($_GET['persona'])){
    $idr=$_GET['persona'];
    $idm=$_SESSION['id'];
    $q="SELECT * FROM (SELECT data,valore FROM history_debits WHERE da=$idr AND a=$idm UNION SELECT data,(-1*valore) FROM history_debits WHERE a=$idr AND da=$idm ) ORDER BY data";
}else{
    $idm=$_SESSION['id'];
    $q="SELECT * FROM (SELECT data,valore FROM history_debits WHERE da=$idr AND a=$idm UNION SELECT data,(-1*valore) FROM history_debits WHERE a=$idr AND da=$idm ) ORDER BY data";
}

// DA FARE CON INFO SULLA SINGOLA PERSONA
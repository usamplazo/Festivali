<?php
//lista korsinika
require_once("connect.php");
$qKor = "SELECT * FROM `user`";
$korisnici = $konektor->query($qKor);
$fKor = $korisnici->fetchAll(PDO::FETCH_OBJ);

//echo "<pre>".print_r($fKor)."</pre>";
foreach($fKor as $k)
{
    echo $k->username. " ".$k->ime_prezime." ".$k->email;
}
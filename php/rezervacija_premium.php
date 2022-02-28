<?php
 $upis = "INSERT INTO karta
 SET cena = 2000,
     `odrzavanje_id` = :odrz,
     `user_id` = :u";
$u = $konektor->prepare($upis);
$u->execute(array(
':odrz'=>$_GET['odrz_id'],
':u'=>$_SESSION['id']
));

$smanji = "UPDATE odrzavanje SET kapacitet = kapacitet-1
   WHERE odrzavanje_id = ".$_GET['odrz_id'];
$s = $konektor->query($smanji)->fetchAll();


$selekcija = "SELECT * FROM karta JOIN odrzavanje ON
karta.odrzavanje_id = odrzavanje.odrzavanje_id
JOIN user ON user.user_id = karta.user_id
JOIN festival ON festival.festival_id = odrzavanje.festival_id
JOIN lokacija ON odrzavanje.lokacija_id = lokacija.lokacija_id
ORDER BY karta_id DESC";
$sss = $konektor->query($selekcija)->fetch(PDO::FETCH_ASSOC);

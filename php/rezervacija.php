<?php
    if(isset($_SESSION['id'])){
        
        if(!empty($_POST['vlasnik']) && !empty($_POST['broj']) && !empty($_POST['cvv']) && !empty($_POST['datum']))
         {
            $regex_br_kartice = "/^[0-9]{16}$/";
            $regex_cvv = "/^\d{3}$/";
            $regex_vlasnik = "/\w/";
            $provera_vlasnik = preg_match($regex_vlasnik, $_POST['vlasnik']);
            $provera_br_kartice = preg_match($regex_br_kartice, $_POST['broj']);
            $provera_cvv = preg_match($regex_cvv, $_POST['cvv']);
          
            if($provera_vlasnik == 1 && $provera_br_kartice == 1 && $provera_cvv == 1){
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
            include "karta_standard.php";
        }
    }
}

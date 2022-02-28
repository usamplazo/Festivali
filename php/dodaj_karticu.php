<?php
    $err = "";
    if(isset($_POST['potvrdi_placanje']))
    {
        if(!empty($_POST['vlasnik']) && !empty($_POST['broj']) && !empty($_POST['cvv']) && !empty($_POST['datum']))
         {
            $regex_br_kartice = "/^[0-9]{16}$/";
            $regex_cvv = "/^\d{3}$/";
            $regex_vlasnik = "/\w/";
            $provera_vlasnik = preg_match($regex_vlasnik, $_POST['vlasnik']);
            $provera_br_kartice = preg_match($regex_br_kartice, $_POST['broj']);
            $provera_cvv = preg_match($regex_cvv, $_POST['cvv']);
          
            if($provera_vlasnik == 1 && $provera_br_kartice == 1 && $provera_cvv == 1){
            $stmt = $konektor->prepare("SELECT MAX(user_id) AS max_id FROM user");
            $stmt -> execute();
            $invNum = $stmt -> fetch(PDO::FETCH_ASSOC);
            $max_id = $invNum['max_id'];
            echo $max_id;
            $upit = "INSERT INTO kred_kartice
                    SET `vlasnik_kartice` = :v,
                        `broj_kartice` = :br,
                        `datum_isteka` = :dt,
                        `cvv` = :c,
                        `user_id` = :kid ";
            $kk = $konektor->prepare($upit);
            $kk->execute(array(
                ':v'=>$_POST['vlasnik'],
                ':br'=>$_POST['broj'],
                ':dt'=>$_POST['datum'],
                ':c'=>$_POST['cvv'],
                ':kid'=>$max_id
            ));
            echo "Kartica je uspesno dodata";
            header("Location:index.php?opcija=login");
        }
    }


    }
?>
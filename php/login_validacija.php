<?php
//login forma
//require_once("php/connect.php");
$err = "";
$er = array();
if (isset($_POST['login'])) { //klik na dugme za login
    if (!empty($_POST['username_login'])) {
        $qUserName = "SELECT * FROM `user` WHERE `username` = :username";
        $korisnici = $konektor->prepare($qUserName);
        $korisnici->execute(array(
            ':username' => $_POST['username_login']
        ));
        //prebrojavanje username u bazi
        if ($korisnici->rowCount() == 1) {
            //prijava korisnika
        } elseif ($korisnici->rowCount() >= 2) {
            //greska u sistemu
            $err .= "Doslo je od greske kontaktirajte admina sajta\\n";
        } else {
            $err .= "Username ne postoji u bazi\\n";
        }
    } else {
        $err .= "Morate uneti Username\\n";
    }

    //provera passworda
    if (!empty($_POST['password_login'])) {
        if (isset($_POST['username_login'])) {
            $qAccount = "SELECT * FROM user WHERE `username` = :username AND `password` = :pass";
            $korisnici = $konektor->prepare($qAccount);
            $korisnici->execute(array(
                ':username' => $_POST['username_login'],
                ':pass' => md5($_POST['password_login'])
            ));
            //prebrojavanje username-passworda u bazi
            if ($korisnici->rowCount() == 1) {
                //prijava korisnika
                echo "super";
            } elseif ($korisnici->rowCount() >= 2) {
                //greska u sistemu
                $err .= "Doslo je od greske kontaktirajte admina sajta\\n";
                
            } else {
                $err .= "Password je netacan\\n";
                        }
        }
    } else {
        $err .= "Morate uneti Password\\n";
        
    }
    //da li postoji greska
    if ($err == "") {
        //ne postoji greska , vrsi se prijava
        echo "Uspesno ste prijavljeni na sajt\\n";
        $qLog = $korisnici->fetchAll(PDO::FETCH_OBJ);

        foreach($qLog as $acc){
            $nalog = $acc->user_id;
        }
        $_SESSION['id'] = $nalog;
        header("Location:index.php");
    } else {
        echo "<script type='text/javascript'>alert('$err');</script>";
    }
}

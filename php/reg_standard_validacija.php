<?php
  //fajl za registraciju standardnog korisnika
    // require_once("connect.php");
     $err="";
     if(isset($_POST['registracija_standard']))
     {
         if(!empty($_POST['username_standard']))
         {
             $qUsername = "SELECT * FROM `user` WHERE `username` = :username";
             $korisnici = $konektor->prepare($qUsername);
             $korisnici->execute(array(
                 ':username'=>$_POST['username_standard']
             ));
             if($korisnici->rowCount()){
                 $err .= "- Username postoji u bazi\\n";
             }
             else{
                 $username = $_POST['username_standard'];
             }
         }
         else{
             $err .= "- Morate uneti Username\\n";
         }
         if(empty($_POST['password_standard']))
         {
             $err .= "- Morate uneti Password\\n";
         }
         if(empty($_POST['repassword_standard']))
         {
             $err .= "- Morate uneti ponovljeni Password\\n";
         }
         //provera podudaranja password i confirm password
         if(!empty($_POST['password_standard']) && !empty($_POST['repassword_standard']) )
         {
                     if($_POST['password_standard'] == $_POST['repassword_standard'])
                     {
                         $password = md5($_POST['password_standard']);
                     }
                     else{
                         $err .= "Psasword i Confirm Password moraju biti jednaki\\n";
                     }
         }
 
         if(!empty($_POST['email_standard']))
         {
             $qEmail = "SELECT * FROM `user` WHERE `email` = :email";
             $kor = $konektor->prepare($qEmail);
             $kor->execute(array(
                 ':email'=>$_POST['email_standard']
             ));
             if($kor->rowCount()){
                 $err .= "- Email postoji u bazi\\n";
             }
             else{
                 $email = $_POST['email_standard'];
             }                 
         }
         else{
             $err .= "- Morate uneti Email\\n";
         }
         if(!empty($_POST['ime_standard']))
         {
             $ime = $_POST['ime_standard'];
         }
         else{
             $err .= "- Morate uneti Ime i Prezime\\n";
         }
         
 
         if($err <> ""){
            echo "<script type='text/javascript'>alert('$err');</script>";
         }
         else{
             $active = 1;
             $qk = "
             INSERT INTO user
             SET `username` = :username,
                 `email` = :email,
                 `password` = :password,
                 `ime_prezime` = :ime_prezime,
                 `is_active` = :is_active
             ";
             $k = $konektor->prepare($qk);
             $k->execute(array(
                 ':username'=>$username,
                 ':email'=>$email,
                 ':password'=>$password,
                 ':ime_prezime'=>$ime,
                 ':is_active'=>$active
             ));
             //dodavanje role korisniku
            $st = 1;
             $posledni_id = $konektor->lastInsertId();
             echo "$posledni_id";
             
             $qr = "INSERT INTO user_role
                    SET `user_id` = :korisnik,
                        role_id = :rola
                    ";
             $upit = $konektor->prepare($qr);
             $upit->execute(array(
                 ':korisnik'=>$posledni_id,
                 ':rola'=>$st
             ));       
             echo "Uspesno ste registrovani !";
             header("Location:index.php?opcija=login");
         }
     }

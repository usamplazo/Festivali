<?php
  //fajl za registraciju standardnog korisnika
    // require_once("connect.php");
     $err="";
     if(isset($_POST['registracija_premium']))
     {
         if(!empty($_POST['username_premium']))
         {
             $qUsername = "SELECT * FROM `user` WHERE `username` = :username";
             $korisnici = $konektor->prepare($qUsername);
             $korisnici->execute(array(
                 ':username'=>$_POST['username_premium']
             ));
             if($korisnici->rowCount()){
                 $err .= "- Username postoji u bazi\\n";
             }
             else{
                 $username = $_POST['username_premium'];
             }
         }
         else{
             $err .= "- Morate uneti Username\\n";
         }
         if(empty($_POST['password_premium']))
         {
             $err .= "- Morate uneti Password\\n";
         }
         if(empty($_POST['repassword_premium']))
         {
             $err .= "- Morate uneti ponovljeni Password\\n";
         }
         //provera podudaranja password i confirm password
         if(!empty($_POST['password_premium']) && !empty($_POST['repassword_premium']) )
         {
                     if($_POST['password_premium'] == $_POST['repassword_premium'])
                     {
                         $password = md5($_POST['password_premium']);
                     }
                     else{
                         $err .= "Password i Confirm Password moraju biti jednaki\\n";
                     }
         }
 
         if(!empty($_POST['email_premium']))
         {
             $qUsername = "SELECT * FROM `user` WHERE `email` = :email";
             $korisnici = $konektor->prepare($qUsername);
             $korisnici->execute(array(
                 ':email'=>$_POST['email_premium']
             ));
             if($korisnici->rowCount()){
                 $err .= "- Email postoji u bazi\\n";
             }
             else{
                 $email = $_POST['email_premium'];
             }                 
         }
         else{
             $err .= "- Morate uneti Email\\n";
         }
         if(!empty($_POST['ime_premium']))
         {
             $ime = $_POST['ime_premium'];
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
             $st = 2;
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
             header("Location:index.php?opcija=templates/kartica_premium");
         }
     }

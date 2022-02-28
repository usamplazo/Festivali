<?php
//profilna stranica
if (isset($_GET['pid'])) {
    //profil drugog registrovanog korisnika
    echo "Nemate prava pistupa drugim korisnicima";
} else {
    //licni profil logovanog korisnika
    include "templates/navbar_prijavljeni.php";
    $qKor = "SELECT * FROM `user` WHERE `user_id` = :korisnik";
    $profil =  $konektor->prepare($qKor);
    $profil->execute(array(
        ':korisnik' => $_SESSION['id']
    ));
    if (isset($_SESSION['id'])) {
        if ($profil->rowCount()) {
            //prikaz profila (mogu videti samo prijavljeni korisnici)
            $fetchProf = $profil->fetchAll(PDO::FETCH_OBJ);
            foreach ($fetchProf as $p) {
?>
                <div class="row justify-content-center ">
                    <div class="comment-form-wrap pt-5 " style="width:500px; height:800px;">
                        <div class="comment-form p-5 bg-dark" style="padding-bottom: 40px;">
                            <h1 class="text-center" style="font-family: fantasy;">PROFIL</h1>
                            <form method="POST" action="index.php?opcija=profil">
                                <br />
                                <span class="subheading">USERNAME:</span>
                                <label style="display:inline-block; width:100px;"></label><label><em><strong><?php echo $p->username; ?></strong></em></label><br/>
                                <label style="display:inline-block; width:100px;">EMAIL:</label>
                                <label><em><strong><?php echo $p->email; ?></strong></em></label><br/>
                                <label>IME PREZIME:&nbsp;</label>
                                <input type='text' class="form-control" placeholder='<?php echo $p->ime_prezime; ?>' name='ime_prezime' /><br/>
                                <input style="display:block; margin:0 auto;" type='submit' class="btn btn-primary" value='Azuriraj' name='azuriraj'>
                            </form>
                            <br />
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="index.php?opcija=obrisi_nalog">OBRISI NALOG</a><br />
                                </div>

                            <?php
                        }
                        $sel = "SELECT role_id FROM user_role WHERE user_id = " . $_SESSION['id'];
                        $izvrsi = $konektor->query($sel)->fetch(PDO::FETCH_ASSOC);
                        if ($izvrsi['role_id'] == 1) {
                            ?>
                                  <div class="col-md-6 text-right" >
                                    <a href="index.php?opcija=templates/kartica_premium">PREBACI PREMIUM</a>
                                  </div>
                            <?php } else { ?>
                                <div class="col-md-6 text-right" >
                                    <a href="index.php?opcija=php/prebaci_standard" onclick="pitanje()">PREBACI STANDARD</a>
                                </div>

                <?php
                        }
                    }
                } else {
                    echo "- Nemate pravo da vidite stranicu ukoliko niste prijavljeni na sajt";
                }
                //izmena imena logovanog korisnika
                if (isset($_POST['azuriraj'])) {
                    if (!empty($_POST['ime_prezime'])) {
                        $qUpdate = "UPDATE user  SET `ime_prezime` = :iprez WHERE `user_id` = :korisnik";
                        $kor = $konektor->prepare($qUpdate);
                        $kor->execute(array(
                            ':iprez' => $_POST['ime_prezime'],
                            ':korisnik' => $_SESSION['id']
                        ));
                        //refresh stranice i odgovarajuca poruka
                
                        $er =  "Profil je izmenjen!";
                        echo "<script type='text/javascript'> alert('$er')</script>";
                        echo("<meta http-equiv='refresh' content='1'>");
                     
                    } else {
                        $err = "Morate uneti ime za izmenu";
                        echo "<script type='text/javascript'>alert('$err');</script>";
                        echo("<meta http-equiv='refresh' content='1'>");
                    }
                }
            }
                ?>
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                    function pitanje() {
                        confirm("Da li ste sigurni da zelite da se prebacite na STANDARD paket ?")
                    }
                </script>
<?php include "templates/navbar_prijavljeni.php";
$qKor = "SELECT * FROM `user`
             JOIN user_role ON user.user_id = user_role.user_id
             JOIN role ON role.role_id = user_role.role_id
             WHERE user.`user_id` = :korisnik";
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
            <br/>
            <br />
            <div class="row justify-content-center ">
                <div class="comment-form-wrap pt-5 " style="width:500px; height:800px;">
                    <div class="comment-form p-5 bg-dark" style="padding-bottom: 40px;">
                        <h1 class="text-center" style="font-family: fantasy;">BRISANJE PROFILA</h1>
                        <form method="POST" action="index.php?opcija=obrisi_nalog">
                            <br/>
                            <label style="display:inline-block; width:150px;">TIP: </label><label> <em><?php echo $p->role_name; ?></em></label><br>
                            <label style="display:inline-block; width:150px;">IME:  </label><label>  <em><?php echo $p->ime_prezime; ?></em></label><br>
                            <label style="display:inline-block; width:150px;">USERNAME:  </label><label> <em><?php echo $p->username; ?></em></label><br>
                            <label style="display:inline-block; width:150px;">EMAIL: </label><label> <em><?php echo $p->email; ?></em></label><br>
                            <br/>
                            <div class="row d-flex justify-content-center">
                            <input type='submit' class="btn btn-primary" value='Potvrdi BRISANJE' name='brisi_nalog'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php
        }
    }
    if (isset($_POST['brisi_nalog'])) {
        $qobr = "DELETE FROM user WHERE `user_id` = :korisnik";
        $upit_brisanje = $konektor->prepare($qobr);
        $upit_brisanje->execute(array(
            ':korisnik' => $_SESSION['id']
        ));
        header("Location:index.php?opcija=logout");
    }
}
?>
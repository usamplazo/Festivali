<?php
if ($_SESSION['id']) {
    include "templates/navbar_prijavljeni.php";
} else {
    include "templates/navbar_odjavljeni.php";
}
$prikaz = "SELECT * FROM kred_kartice 
               JOIN user ON user.user_id = kred_kartice.user_id
               WHERE kred_kartice.user_id = " . $_SESSION['id'];
$upit = $konektor->query($prikaz)->fetch(PDO::FETCH_ASSOC);

?>

<div class="row justify-content-center ">
    <div class="comment-form-wrap pt-5 " style="width:500px; height:800px;">
        <div class="comment-form p-5 bg-dark">
            <h1 class="text-center" style="font-family: fantasy;">PREBACI NA STANDARD</h1>
            <br />
            <form method="post" action="index.php?opcija=php/prebaci_standard">
                <label style="display:inline-block; width:150px;">Usename: </label><label> <?php echo $upit['username']; ?></label><br />
                <label style="display:inline-block; width:150px;">Email: </label><label> <?php echo $upit['email']; ?></label><br />
                <label style="display:inline-block; width:150px;">Vlasnik Kartice: </label><label> <?php echo $upit['vlasnik_kartice']; ?></label><br />
                <label style="display:inline-block; width:150px;">Broj Kartice: </label><label> <?php echo $upit['broj_kartice']; ?></label><br />
                <label style="display:inline-block; width:150px;">CVV: </label><label> <?php echo $upit['cvv']; ?></label><br />
                <label style="display:inline-block; width:150px;">Datum Isteka: </label><label> <?php echo $upit['datum_isteka']; ?></label><br />
                <br />
                <div class="row  d-flex justify-content-center">
                    <input type="submit" name="ukloni" class="btn btn-primary" value="Prebaci" />
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ukloni'])) {
    $r = 1;
    $azuriraj = "UPDATE user_role
                    SET role_id = $r
                    WHERE `user_id` = :u";
    $izvrsi = $konektor->prepare($azuriraj);
    $izvrsi->execute(array(
        ':u' => $_SESSION['id']
    ));
    $obrisi = "DELETE FROM kred_kartice
                  WHERE user_id = :u";
    $upit = $konektor->prepare($obrisi);
    $upit->execute(array(
        ':u' => $_SESSION['id']
    ));
    header("Location:index.php");
}

?>
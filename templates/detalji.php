<?php
if (isset($_SESSION['id'])) {
    include "templates/navbar_prijavljeni.php";
}

if (isset($_GET['f_id'])) {
    //parametar url-a koji cini id festivala
    $selekcija = "SELECT * FROM festival JOIN odrzavanje
                     ON festival.festival_id = odrzavanje.festival_id JOIN lokacija
                     ON lokacija.lokacija_id = odrzavanje.lokacija_id
                     WHERE festival.festival_id =" . $_GET['f_id'];
    $festival = $konektor->query($selekcija)->fetch(PDO::FETCH_ASSOC);
?>
    <br />
    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-about-section">
        <div class="container-fluid px-0">
            <div class="row d-md-flex text-wrapper">
                <div class="one-half img" style="background-image: url('<?php echo $festival['publika'] ?>');"></div>
                <div class="one-half half-text d-flex justify-content-end align-items-center">
                    <div class="text-inner pl-md-5">
                        <span class="subheading">
                            <?php echo $festival['grad'];?>
                        </span>
                        <h3 class="heading" style="font-family: fantasy;">
                            <?php echo $festival['naziv']; ?>
                            <img src="<?php echo $festival['logo']; ?>" style="width:100px; height: 100px;">
                        </h3>
                        <p><?php echo $festival['opis']; ?></p>
                        <ul>
                            <li><span class="ion-ios-checkmark-circle mr-2"></span><i>Datum pocetka:    </i><strong><?php echo date("d/m/Y", strtotime($festival['datum_pocetka'])); ?></strong></li>
                            <li><span class="ion-ios-checkmark-circle mr-2"></span><i>Datum kraja:  </i><strong><?php echo date("d/m/Y", strtotime($festival['datum_kraja'])); ?></strong></li>
                            <li><span class="ion-ios-checkmark-circle mr-2"></span><i>Lokacija:     </i><strong><?php echo $festival['naziv_lokacije'];?></strong></li>
                            <li><span class="ion-ios-checkmark-circle mr-2"></span><i>Kapacitet:    </i><strong><?php echo $festival['kapacitet']; ?></strong></li>
                        </ul>
                        <?php
                        if (isset($_SESSION['id'])) {
                            $qp = "SELECT * FROM user_role WHERE user_id = ".$_SESSION['id'];
                            $izvrsi = $konektor->query($qp)->fetch(PDO::FETCH_ASSOC);
                            //proveri da li je korisnik premium
                            if($izvrsi['role_id'] == 2)
                            {
                        ?>
                            <a href="index.php?opcija=karta_premium&odrz_id=<?php echo $festival['odrzavanje_id']; ?>" class="btn btn-light py-3 px-4" onclick="pitanje();">Rezervisi kartu </a>
                        <?php
                            }else
                            {
                                ?>
                            <a href="index.php?opcija=templates/plati_standard&odrz_id=<?php echo $festival['odrzavanje_id']; ?>" class="btn btn-light py-3 px-4" onclick="pitanje();">Rezervisi kartu </a>
                             
                                <?php
                                   $_SESSION['odrz'] = $festival['odrzavanje_id'];
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br />
    <br />
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>

    </div>

<?php
}

?>

<script>
    function pitanje(){
        confirm("Da li zelite da rezervisete kartu ?");
    }
</script>
<?php
$qf = "SELECT * FROM festival JOIN odrzavanje ON festival.festival_id = odrzavanje.festival_id
      JOIN lokacija ON odrzavanje.lokacija_id = lokacija.lokacija_id";
$pretraga = $konektor->query($qf);
$rez = $pretraga->fetchAll(PDO::FETCH_OBJ);
foreach ($rez as $r) {
?>
    <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="model-entry">
            <div class="model-img" style="background-image: url(<?php echo $r->poster; ?>);">
                <div class="name text-center">
                    <h3><a  href="model-single.html"></a></h3>
                </div>
                <div id="festivali" class="text text-center">
                    <h3><a href="index.php?opcija=templates/detalji&f_id=<?php echo $r->festival_id?>"><?php echo $r->naziv; ?><br></a></h3>
                    <div class="d-flex models-info">
                        <div class="box">
                            <p>Kapacitet</p>
                            <span><?php echo $r->kapacitet; ?></span>
                        </div>
                        <div class="box">
                            <p>Grad</p>
                            <span><?php echo $r->grad;?></span>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
}



?>
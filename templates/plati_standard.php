<?php
    if($_SESSION['id']){
        include "templates/navbar_prijavljeni.php";
    }
    else{
        include "templates/navbar_odjavljeni.php";
    }

    include "php/rezervacija.php";
?>
<div class="page" id="nestati">
    <br />
    <div class="row" id="podaci_kartica" style="padding-top: 150px; padding-bottom:200px;">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <form method="post" action="index.php?opcija=templates/plati_standard&odrz_id=<?php echo $_SESSION['odrz'];?>">
            <div class='row'>
                                <div class='col-md-10'>
                    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                    <h1 class="text-center" style="font-family: fantasy;">Plati kartu</h1>
                        <div class='form-row'>
                            <div class='col-md-12 form-group'>
                                <input autocomplete='off' class='form-control' placeholder='Vlasnik Kartice' id="vlasnik" name="vlasnik" type='text'>

                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-12 form-group'>
                                <input autocomplete='off' class='form-control' placeholder='Broj Kartice - 16 cifara' id="brojKartice" name="broj" type='text'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-5 form-group cvc '>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='CVV - 3 cifre' id="cvv" name="cvv" type='text'>
                            </div>
                            <div class='col-md-7 form-group expiration '>
                                <input class='form-control' placeholder='MM' type='date' placeholder="Datum Isteka" name="datum" id="datum" required>
                            </div>

                        </div>
                        <div class='form-row'>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-12 form-group'>
                                <input name="potvrdi_placanje" class='form-control btn btn-primary submit-button' type='submit' value="Plati(2000 RSD)" onclick="proveri()" />
                            </div>
                        </div>
                </div>


            </div>
        </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<div style="display:none;" id="otkriti">
</div>
<script type="text/javascript">
    function proveri() {
        var testTekst = /^[a-zA-Z\s]*$/;
        var testBrojKartice = /^[0-9]{16}$/;
        var testCVV = /^[0-9]{3}$/;
        var pokupiTekst = document.getElementById("vlasnik").value;
        var pokupiBrojKartice = document.getElementById("brojKartice").value;
        var pokupiCVV = document.getElementById("cvv").value;
        var datum = document.getElementById("datum").value;
        var rezultat1 = pokupiTekst.match(testTekst);
        var rezultat2 = pokupiBrojKartice.match(testBrojKartice);
        var rezultat3 = pokupiCVV.match(testCVV);
        if (rezultat1 == null || rezultat2 == null || rezultat3 == null || datum < Date.now()) {
            alert("Morate uneti ispravne podatke za placanje")
            location.reload();
        } else {
            alert("Podaci su ispravni")
            var nestanak = document.getElementById("nestati").style.display = "none";
        }
    }
</script>
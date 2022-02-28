<?php
if (empty($_SESSION['id'])) {
    include "php/dodaj_karticu.php";
    include "templates/navbar_odjavljeni.php";
} else {
    include "php/prebaci_premium.php";
    include "templates/navbar_prijavljeni.php";
} ?>

<div class="page">
    <br />
    <br />
    <br />
    <div class="row" id="podaci_kartica" style="padding-top: 60px; padding-bottom: 220px;">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class='row'>
                <div class='col-md-10'>
                    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                    <h1 class="text-center" style="font-family: fantasy;">Podaci za plaćanje članstva</h1>
                    <form accept-charset="UTF-8" action="index.php?opcija=templates/kartica_premium" method="post">
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
                            <div class='col-md-5 form-group'>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='CVV - 3 cifre' id="cvv" name="cvv" type='text'>
                            </div>
                            <div class='col-md-7 form-group '>
                                <input class='form-control'  type='date' placeholder="Datum Isteka" name="datum" id="datum_pokupi" required >
                            </div>

                        </div>
                        <div class='form-row'>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-12 form-group'>
                                <input name="potvrdi_placanje" value ="Plati (500 RSD)" class='form-control btn btn-primary submit-button' type='submit' value="Potvrdi" onclick="proveri()" />
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>



<script type="text/javascript">
    function proveri() {
        var testTekst = /\w/;
        var testBrojKartice = /^[0-9]{16}$/;
        var testCVV = /^[0-9]{3}$/;
        var pokupiTekst = document.getElementById("vlasnik").value;
        var pokupiBrojKartice = document.getElementById("brojKartice").value;
        var pokupiCVV = document.getElementById("cvv").value;
        var rezultat1 = pokupiTekst.match(testTekst);
        var rezultat2 = pokupiBrojKartice.match(testBrojKartice);
        var rezultat3 = pokupiCVV.match(testCVV);
        var datum = document.getElementById("datum_pokupi").value;
        if (rezultat1 == null || rezultat2 == null || rezultat3 == null || datum < Date.now()) {
            alert("Morate uneti ispravne podatke za placanje")
        }
    }
</script>
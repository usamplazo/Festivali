<?php
    include "php/rezervacija_premium.php";
?>
<!---->
<div class="container" style="padding-bottom: 150px;"> 
<a href="index.php" class="nav-link">< POCETAK</a>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6 text-center">
                            <img src="<?php echo $sss['logo']?>" style="width:150px; height:150px;">
                        </div>

                        <div class="col-md-6 text-left text-dark">
                            <p class="font-weight-bold mb-4">Informacije o korisniku</p>
                            <p class="mb-1"><?php echo $sss['ime_prezime']?></p>
                            <p class="mb-1"><?php echo $sss['email']?></p>
                            <p class="mb-1"><?php echo $sss['username']?></p>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Naziv</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Grad</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Lokacija</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Datum Pocetka</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Datum Kraja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $sss['karta_id']; ?></td>
                                        <td><?php echo $sss['naziv']; ?></td>
                                        <td><?php echo $sss['grad']; ?></td>
                                        <td><?php echo $sss['naziv_lokacije']; ?></td>
                                        <td><?php echo date("d/m/Y", strtotime($sss['datum_pocetka'])); ?></td>
                                        <td><?php echo date("d/m/Y", strtotime($sss['datum_kraja'])); ?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-1">
                    <div class="py-3 px-5 text-center">
                            <div class="mb-2"><h2>CENA</h2></div>
                            <div class="h4 font-weight-light">2000 RSD</div>
                        </div>    
                    <div class="py-3 px-5 text-center">
                            <div class="mb-2"><h3>PREMIUM KORISNIK</h3></div>
                            <div class="h4 font-weight-light">BACKSTAGE PASS</div>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
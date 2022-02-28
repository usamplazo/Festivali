<?php
require("php/reg_standard_validacija.php");
?>
<div id="colorlib-page">
    <section class="ftco-section contact-section">
        <div class="container mt-1">
            <div class="row block-9">
                <div class="col-md-3 order-last contact-info ftco-animate">
                </div>
                <div class="col-md-3 order-first"></div>
                <div class="col-md-6  ftco-animate">
                    <h1 class="text-center" style="font-family: fantasy;">REGISTRACIJA STANDARD</h1>
                    <form method="POST" action="index.php?opcija=register_standard">
                        <div class="form-group">
                            <input autocomplete='off' type="text" class="form-control" placeholder="Username" name="username_standard">
                        </div>
                        <div class="form-group">
                            <input autocomplete='off' type="password" class="form-control" placeholder="Password" name="password_standard">
                        </div>
                        <div class="form-group">
                            <input autocomplete='off' type="password" class="form-control" placeholder="Confirm Password" name="repassword_standard">
                        </div>
                        <div class="form-group">
                            <input autocomplete='off' type="email" class="form-control" placeholder="Email" name="email_standard">
                        </div>
                        <div class="form-group">
                            <input autocomplete='off' type="text" class="form-control" placeholder="Ime Prezime" name="ime_standard">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <input type="submit" value="Registruj se" name="registracija_standard" class="btn btn-primary py-3 px-5" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
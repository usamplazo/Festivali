<?php
require("php/login_validacija.php");
?>
<div id="colorlib-page">
    <section class="ftco-section contact-section">
        <div class="container mt-5">
            <div class="row block-9 justify-content-center">
                <div class="col-md-3 order-last contact-info ftco-animate">
                </div>
                <div class="col-md-6 ftco-animate">
                    <br/><br/><br/>
                    <h1 class="text-center" style="font-family: fantasy;">PRIJAVI SE</h1>
                    <form method="POST" action="index.php?opcija=login">
                        <div class="form-group">
                            <input autocomplete='off' type="text" class="form-control" placeholder="Username" name="username_login">
                        </div>
                        <div class="form-group">
                            <input autocomplete='off' type="password" class="form-control" placeholder="Password" name="password_login">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <input type="submit" value="Potvrdi" name="login" class="btn btn-primary py-3 px-5" />
                        </div>
                    </form>
                </div>
                <div class="col-md-3 order-first"></div>
               
            </div>
        </div>
    </section>
</div>
<br>
<br>
<br>
<br>
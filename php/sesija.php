<?php
//dinamicka stranica
session_start();
//povezivanje na bazu
require_once("php/connect.php");
    if (isset($_SESSION['id'])) {
        //sesija postoji
    ?>
        <?php
        if (isset($_GET['opcija'])) {
            $fajl = $_GET['opcija'] . ".php";
            if (file_exists($fajl)) {
                include_once($fajl);
            } else {
                echo "Trazena stranice ne postoji.Vratite se na <a href='index.php'>POCETNU STRANICU</a>";
            }
        } else {
            include "templates/navbar_prijavljeni.php";
            
        }
    } else {
        //sesija ne postoji
        include "templates/navbar_odjavljeni.php";
        ?>

    <?php
        if (isset($_GET['opcija'])) {
            $fajl = $_GET['opcija'] . ".php";
            if (file_exists($fajl)) {
                include_once($fajl);
            } else {
                echo "Trazena stranice ne postoji.Vratite se na <a href='index.php'>POCETNU STRANICU</a>";
            }
        } else {
            
           //sve je uspesno obavljeno , otvara se pcetna strana
            
        }
    }

    ?>


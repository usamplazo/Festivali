<?php
try{
    $konektor = new PDO('mysql: host=127.0.0.1;dbname=muzicki_festivali;port=3306', 'root', '');
    $konektor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
    die();
}
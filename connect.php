<?php

global $dbh;

try {
    $dbh = new PDO('mysql:host=localhost;dbname=000764979', "000764979", "19971201");
} catch (Exception $e) {
    die('Could not connect to DB: ' . $e->getMessage());
}

$dbh = null;
?>
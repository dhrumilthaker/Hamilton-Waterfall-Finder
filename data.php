<?php

require_once('connect.php');

$result_array = array();

    $dbh = new PDO('mysql:host=localhost;dbname=000764979', "000764979", "19971201");



/* SQL query to get results from database */
$sql = "SELECT * FROM mytable";

$result = $dbh->query($sql);
if($result->rowCount() > 0 && !empty($result)) // first error occurs here
{
    while( $row = $result->fetch(PDO::FETCH_ASSOC) ) {
        array_push($result_array, $row);
    }
}
/* send a JSON encded array to client */
echo json_encode($result_array);

$dbh->close();    
?>

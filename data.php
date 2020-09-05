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



//$lat = filter_input(INPUT_POST, "LATITUDE", FILTER_SANITIZE_SPECIAL_CHARS);
//$lng = filter_input(INPUT_POST, "LONGITUDE", FILTER_SANITIZE_SPECIAL_CHARS);
    
//$searchCommand = SELECT id, ( 3959 * acos( cos( radians(37) ) * cos( radians( lat ) )
//  * cos( radians( lng ) - radians(-122) ) + sin( radians(37) ) 
//  * sin( radians( lat ) ) ) ) AS distance
//FROM TABLE 2
//HAVING distance < 25
//ORDER BY distance LIMIT 0 , 20;





    
?>

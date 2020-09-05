<?php

/* 
   Author: Dhrumil Thaker
   Date: Oct-23-2018
   
   I, Dhrumil Thaker, student number 000764979, certify that all code submitted is my own work; 
   that I have not copied it from any other source.  
   I also certify that I have not allowed my work to be copied by others.
 
   This php file include logic to insert information in student_marks_table.  
 */
include "connect.php";

$dbh = new PDO('mysql:host=localhost;dbname=000764979', "000764979", "19971201");

//variables of waterfall's information
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
$alternate_name = filter_input(INPUT_POST, "alternate_name", FILTER_SANITIZE_SPECIAL_CHARS);
$community = filter_input(INPUT_POST, "community", FILTER_SANITIZE_SPECIAL_CHARS);
$type= filter_input(INPUT_POST, "type", FILTER_SANITIZE_SPECIAL_CHARS);
$ranking = filter_input(INPUT_POST, "ranking", FILTER_SANITIZE_SPECIAL_CHARS);
$cluster_area = filter_input(INPUT_POST, "cluster_area", FILTER_SANITIZE_SPECIAL_CHARS);
$ownership = filter_input(INPUT_POST, "ownership", FILTER_SANITIZE_SPECIAL_CHARS);
$access_area = filter_input(INPUT_POST, "access_area", FILTER_SANITIZE_SPECIAL_CHARS);
$longitude = filter_input(INPUT_POST, "longitude", FILTER_SANITIZE_SPECIAL_CHARS);
$latitude = filter_input(INPUT_POST, "latitude", FILTER_SANITIZE_SPECIAL_CHARS);

//insert information, parameter set
$insertCommand = "INSERT INTO mytable (NAME, ALTERNATE_NAME, COMMUNITY, TYPE, RANKING, CLUSTER_AREA, OWNERSHIP, ACCESS_FROM, LONGITUDE, LATITUDE) VALUES ('$name', '$alternate_name', '$community', '$type', '$ranking', '$cluster_area', '$ownership', '$access_area', '$longitude', '$latitude')";
$stmt = $dbh->prepare($insertCommand);
if ($stmt->execute() ) {
    $message = "Waterfall information Inserted. : {$stmt->rowCount()}.";
} else {
    $message = "Information couldn't inserted";
}
?>
<!--print output using html code-->
<html>

<head>
    <title>Injected</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1 align=center>Result</h1>
        <p><?=$message?></p>
        <table id="table" class="table">
            <thead>
                <tr>
                    <th scope="col">Fall Name</th>
                    <th scope="col">Alternate Name</th>
                    <th scope="col">Community</th>
                    <th scope="col">Type</th>
                    <th scope="col">Ranking</th>
                    <th scope="col">Cluster Area</th>
                    <th scope="col">Ownership</th>
                    <th scope="col">Access Area</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Latitude</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</body>
<script>
    var empTable = document.getElementById("table");
    var tableRow = empTable.insertRow(-1);
    var firstCell = tableRow.insertCell(0);
    var secondCell = tableRow.insertCell(1);
    var thirdCell = tableRow.insertCell(2);
    var fourthCell = tableRow.insertCell(3);
    var fifthCell = tableRow.insertCell(4);
    var sixthCell = tableRow.insertCell(5);
    var seventhCell = tableRow.insertCell(6);
    var eighthCell = tableRow.insertCell(7);
    var ninthCell = tableRow.insertCell(8);
    var tenthCell = tableRow.insertCell(9);

    firstCell.innerHTML = "<?php echo $name ?>";
    secondCell.innerHTML = "<?php echo $alternate_name ?>";
    thirdCell.innerHTML = "<?php echo $community ?>";
    fourthCell.innerHTML = "<?php echo $type ?>";
    fifthCell.innerHTML = "<?php echo $ranking ?>";
    sixthCell.innerHTML = "<?php echo $cluster_area ?>";
    seventhCell.innerHTML = "<?php echo $ownership ?>";
    eighthCell.innerHTML = "<?php echo $access_area ?>";
    ninthCell.innerHTML = "<?php echo $longitude ?>";
    tenthCell.innerHTML = "<?php echo $latitude ?>";

</script>

</html>

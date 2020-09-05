<?php

require_once('connect.php');

$conn = new mysqli("localhost","000764979","19971201","000764979");


$output = '';
/* SQL query to get results from database */
$sql = "SELECT NAME,TYPE,COMMUNITY FROM mytable WHERE NAME LIKE '%".$_GET["search"]."%'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
       $output .= '<div class="table-responsive">
<table class="table table bordered">
<tr>
<th>WaterFall</th>
<th>Type</th>
<th>Area</th>
</tr>';
    
    while($row = $result->fetch_assoc()){

            $output .= '
<tr>
<td>'.$row["NAME"].'</td>
<td>'.$row["TYPE"].'</td>
<td>'.$row["COMMUNITY"].'</td>
</tr>
';
        }

    echo $output;
}
else{
    echo 'Data Not Found';
}
    
?>

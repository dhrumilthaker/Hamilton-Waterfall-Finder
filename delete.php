<?php
/* 
   Author: Dhrumil Thaker
   Date: Sep-19-2018
   
   I, Dhrumil Thaker, student number 000764979, certify that all code submitted is my own work; 
   that I have not copied it from any other source.  
   I also certify that I have not allowed my work to be copied by others.
 
   This php file include logic to delete student information in student_marks_table.  
 */

include "connect.php";

$dbh = new PDO('mysql:host=localhost;dbname=000764979', "000764979", "19971201");

// delete ID using if-else
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
$deletecommand = "DELETE FROM mytable WHERE NAME=$name";//delete command to delete ID
$stmt = $dbh->prepare($deletecommand);//prepare the delete command
if ($stmt->execute() ) {
    $message = "Name received: $name. Number of rows deleted: {$stmt->rowCount()}.";//delete the ID and shows how many row affected
} else {
    $message = "watefall $name could not be deleted.";
}
?>
<!--hrml code to print output.-->
<html>
    <head>
        <title>Injected</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Result</h1>
        <p><?=$message?></p>
    </body>
</html>
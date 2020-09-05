<?php

/* 
   Author: Dhrumil Thaker
   Date: Oct-23-2018
   
   I, Dhrumil Thaker, student number 000764979, certify that all code submitted is my own work; 
   that I have not copied it from any other source.  
   I also certify that I have not allowed my work to be copied by others.
 
   This php file include logic to insert,update and delete information in student_marks_table.  
 */
?>

<html>

<head>
    <title>Lab 3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1 align=center>Enter Waterfall Information to Insert</h1>
        <form class="form-group" id="waterfallInsert" action="insert.php" method="post">
            <div class="form-group row">
                <label for="usr" class="col-sm-2 col-form-label">Waterfall Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="ABC Falls" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="emp_id" class="col-sm-2 col-form-label">Alternate Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alternate_name" name="alternate_name">
                </div>
            </div>
            <div class="form-group row">
                <label for="dept" class="col-sm-2 col-form-label">Community:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="community" name="community" placeholder="Hamilton | Stoneycreek | Flamborough" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="bonus" class="col-sm-2 col-form-label">Type:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="type" name="type" placeholder="Cascade or Waterfall" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="dept" class="col-sm-2 col-form-label">Ranking:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ranking" name="ranking" placeholder="A | B | C">
                </div>
            </div>
            <div class="form-group row">
                <label for="dept" class="col-sm-2 col-form-label">Cluster Area:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cluster_area" name="cluster_area" placeholder="Chedoke | Spencer-Logie's">
                </div>
            </div>
            <div class="form-group row">
                <label for="dept" class="col-sm-2 col-form-label">Ownership:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ownership" name="ownership" placeholder="public | private" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="dept" class="col-sm-2 col-form-label">Access Area:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="access_area" name="access_area" placeholder="Centennial Pky.">
                </div>
            </div>
            <div class="form-group row">
                <label for="dept" class="col-sm-2 col-form-label">Longitude:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="00.000000000">
                </div>
            </div>
            <div class="form-group row">
                <label for="dept" class="col-sm-2 col-form-label">Latitude:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="00.000000000">
                </div>
            </div>
            <input type="submit" id="submit" class="btn btn-primary" value="Submit Form" align="center">
        </form>
    </div>
    <div class="container">
        <h1 align=center>Enter Waterfall Name to Update</h1>
        <form class="form-group" id="waterFallUpdate" action="update.php" method="post">
            <div class="form-group row">
                <label for="usr" class="col-sm-2 col-form-label">Waterfall Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="ABC Falls" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="emp_id" class="col-sm-2 col-form-label">Access From:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="access_area" name="access_area">
                </div>
            </div>
            <div class="form-group row">
                <label for="emp_id" class="col-sm-2 col-form-label">Ownership:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ownership" name="ownership" placeholder="public | private" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="emp_id" class="col-sm-2 col-form-label">Type:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="type" name="type" placeholder="Cascade or Waterfall" required>
                </div>
            </div>
            <input type="submit" id="submit" class="btn btn-primary" value="Submit Form">
        </form>
    </div>

    <div class="container">
        <h1 align=center>Enter Waterfall Name to Delete</h1>
        <form class="form-group" id="waterFallDelete" action="delete.php" method="post">
            <div class="form-group row">
                <label for="usr" class="col-sm-2 col-form-label">Waterfall Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="ABC Fall" required>
                </div>
            </div>
            <input type="submit" id="submit" class="btn btn-primary" value="Submit Form" align=center>
        </form>
    </div>
</body>

</html>

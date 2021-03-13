<?php
//including the database connection file
include("database.php");

//getting id of the data from url
$ID = $_GET['ID'];

//deleting the row from table
$result = mysqli_query($connection, "DELETE FROM appointment WHERE ID=$ID");

//redirecting to the display page (index.php in our case)
header("Location:viewall.php");
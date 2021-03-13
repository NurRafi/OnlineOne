<?php
//Including the database connection file
include_once("database.php");

//Fetching data in descending order (latest entry first)
$result = mysqli_query($connection, "SELECT * FROM appointment ORDER BY ID DESC");
?>

    <html>
<head>
    <title>Appointment List</title>
</head>

<body>
<a href="add.html">Add New Appointment</a><br><a href="search.php">Search for Appointments</a><br/><br/>

<table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td>Doctor's Name</td>
        <td>Patient's Name</td>
        <td>Appointment Date</td>
        <td>Update</td>
    </tr>
    <?php
    while ($res = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $res['DOCTOR_NAME'] . "</td>";
        echo "<td>" . $res['PATIENT_NAME'] . "</td>";
        echo "<td>" . $res['DATE'] . "</td>";
        echo "<td><a href=\"edit.php?ID=$res[ID]\">Edit</a> | <a href=\"delete.php?ID=$res[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
</table>
</body>
    </html><?php

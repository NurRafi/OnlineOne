<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for Appointments</title>
</head>

<body>
<form action="" method="post">
    <input type="text" placeholder="Search" name="search">
    <button type="submit" name="submit">Search</button>
</form>
</body>

</html>
<?php
include_once("database.php");

if (isset($_POST['submit'])) {
    $searchValue = $_POST['search'];
    $sql = "SELECT * FROM appointment WHERE DATE LIKE '%$searchValue%'";
    $result = $connection->query($sql);
    ?>
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Doctor's Name</td>
            <td>Patient's Name</td>
            <td>Appointment Date</td>
        </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['DOCTOR_NAME'] . "</td>";
        echo "<td>" . $row['PATIENT_NAME'] . "</td>";
        echo "<td>" . $row['DATE'] . "</td><br>";
    }
}
?>
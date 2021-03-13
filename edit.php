<?php
// including the database connection file
include_once("database.php");

if (isset($_POST['update'])) {
    $ID = $_POST['ID'];

    $DOCTOR_NAME = $_POST['DOCTOR_NAME'];
    $PATIENT_NAME = $_POST['PATIENT_NAME'];
    $DATE = $_POST['DATE'];

    // checking empty fields
    if (empty($$DOCTOR_NAME) || empty($PATIENT_NAME) || empty($DATE)) {
        if (empty($DOCTOR_NAME)) {
            echo "<font color='red'>Doctor's Name field is empty.</font><br/>";
        }

        if (empty($PATIENT_NAME)) {
            echo "<font color='red'>Patient's Name field is empty.</font><br/>";
        }

        if (empty($DATE)) {
            echo "<font color='red'>Date field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($connection, "UPDATE appointment SET DOCTOR_NAME='$DOCTOR_NAME',PATIENT_NAME='$PATIENT_NAME',DATE='$DATE' WHERE ID=$ID");

        //redirecting to the display page.
        header("Location: viewall.php");
    }
}
?>
<?php
//getting ID from url
$ID = $_GET['ID'];

//selecting data associated with this particular id
$result = mysqli_query($connection, "SELECT * FROM appointment WHERE ID=$ID");

while ($res = mysqli_fetch_array($result)) {
    $DOCTOR_NAME = $res['DOCTOR_NAME'];
    $PATIENT_NAME = $res['PATIENT_NAME'];
    $DATE = $res['DATE'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
<a href="viewall.php">View Appointments</a>
<br/><br/>

<form name="form_edit" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>Doctor's Name</td>
            <td><input type="text" name="DOCTOR_NAME" value="<?php echo $DOCTOR_NAME; ?>"></td>
        </tr>
        <tr>
            <td>Patient's Name</td>
            <td><input type="text" name="PATIENT_NAME" value="<?php echo $PATIENT_NAME; ?>"></td>
        </tr>
        <tr>
            <td>Appointment Date</td>
            <td><input type="text" name="DATE" value="<?php echo $DATE; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="ID" value=<?php echo $_GET['ID']; ?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>
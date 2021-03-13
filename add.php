<html>
<head>
    <title>Add Appointment Data</title>
</head>

<body>
<?php
include_once("database.php"); //including the database connection file

if (isset($_POST['submit'])) {
    $DOCTOR_NAME = $_POST['DOCTOR_NAME'];
    $PATIENT_NAME = $_POST['PATIENT_NAME'];
    $DATE = $_POST['DATE'];

    //Checking for empty fields
    if (empty($DOCTOR_NAME) || empty($PATIENT_NAME) || empty($DATE)) {
        if (empty($DOCTOR_NAME)) {
            echo "<font color='red'>Doctor's Name field is empty.</font><br/>";
        }

        if (empty($PATIENT_NAME)) {
            echo "<font color='red'>Patient's Name field is empty.</font><br/>";
        }

        if (empty($DATE)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }

        //Linking to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        //If all the fields are filled (not empty)
        //Insert data to database
        $result = mysqli_query($connection, "INSERT INTO appointment(DOCTOR_NAME,PATIENT_NAME,DATE) VALUES('$DOCTOR_NAME','$PATIENT_NAME','$DATE')");

        //Display success message
        echo "<font color='green'>Appointment data added successfully.";
        echo "<br/><a href='viewall.php'>View appointment list.</a>";
    }
}
?>
</body>
</html>
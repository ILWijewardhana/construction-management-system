<?php
require 'config.php';

$firstname = $_POST['fName'];
$lastname = $_POST['lName'];
$gender = $_POST['gender'];
$date = $_POST['date'];
$month = $_POST['month'];
$year = $_POST['year'];
$dobTemp = "$month/$date/$year";
$dob = date('Y-m-d', strtotime($dobTemp));
$address = $_POST['address'];
$country = $_POST['country'];
$number = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO register (fName, lName, gender, dob, address, country, mobileNo, email, password) VALUES ('$firstname', '$lastname', '$gender', '$year-$month-$date', '$address', '$country', '$number', '$email', '$password')";

$result = $con->query($sql);
if(!$result)
{
    echo "Error: " . $sql . "<br>" . $con->error;
    $con->close();
    exit();
}

echo "<script>
        alert(\"Account created successfully\");
        window.location.href = \"login.html\"
    </script>";
$con->close();
?>
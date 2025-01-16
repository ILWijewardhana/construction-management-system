<?php
require 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$code = $_POST['code'];

$sql = "SELECT * FROM employeedetails;";

$result = $con->query($sql);

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc())
    {
        if($row['username'] == $username)
        {
            if($row['password'] == $password)
            {
                if($row['code'] == $code)
                {
                    session_start();
                    $_SESSION['employeeID'] = $row['no'];
                    header("Location: employee.php");
                    $con->close();
                    exit();
                }
            }
        }
    }
    echo 
    "<script>
    alert(\"Wrong credentials!\");
    window.location.href = \"employeeLogin.html\";
    </script>";
}
else
{
    echo"<script>alert(\"No results found on the employee table\")</script>";
}

$con->close();
?>
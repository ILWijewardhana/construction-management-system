<?php
require 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM register;";

$result = $con->query($sql);

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc())
    {
        if($row['email'] == $email)
        {
            if($row['password'] == $password)
            {
                session_start();
                $_SESSION['clientID'] = $row['no'];
                header("Location: userProfile.php");
                $con->close();
                exit();
            }
        }
    }
    echo 
    "<script>
    alert(\"Wrong credentials!\");
    window.location.href = \"login.html\";
    </script>";
}
else
{
    echo"<script>alert(\"No results found on the register table\")</script>";
}
$con->close();
?>
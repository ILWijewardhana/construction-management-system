<?php
require 'config.php';

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $priority = $_POST['priority'];
    $description = $_POST['description'];

    $sql = "INSERT INTO customersupport (email, priority, description) VALUES ('$email', '$priority', '$description');";

    $result = $con->query($sql);

    if(!$result)
    {
        echo "Error while inserting data.";
        exit();
    }
    else
    {
        echo "<script>
                alert(\"Submitted Successfully\");
                window.location.href = \"customerSupport.html\"
            </script>";
    }
}
?>
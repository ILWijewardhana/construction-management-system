<?php
require 'config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM employeedetails WHERE no = $id";
    $result = $con->query($sql);

    if($result) {
        echo "<script>
                alert(\"Employee Deleted Successfully\");
                window.location.href = \"manageEmployee.php\"
            </script>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

}
?>
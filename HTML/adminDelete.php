<?php
require 'config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM admindetails WHERE no = $id";
    $result = $con->query($sql);

    if($result) {
        echo "<script>
                alert(\"Admin Deleted Successfully\");
                window.location.href = \"manageAdmin.php\"
            </script>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
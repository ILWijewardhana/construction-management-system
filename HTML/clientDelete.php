<?php
require 'config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM register WHERE no = $id";
    $result = $con->query($sql);

    if($result) {
        echo "<script>
                alert(\"Client Profile Deleted Successfully\");
                window.location.href = \"manageClients.php\"
            </script>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
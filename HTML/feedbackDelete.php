<?php
require 'config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM feedback WHERE Text = '$id'";
    $result = $con->query($sql);

    if($result) {
        echo "<script>
                alert(\"Feedback Deleted Successfully\");
                window.location.href = \"feedback.php\"
            </script>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
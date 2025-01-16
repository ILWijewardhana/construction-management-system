<?php
require 'config.php';
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $text = $_POST['text'];

    $sql = "UPDATE feedback SET fName = '$firstname', lName = '$lastname', Email = '$email', Text = '$text' WHERE Text = '$id'";

    $result = $con->query($sql);
    if($result) 
    {
        echo "<script>
                alert(\"Feedback Edited Successfully\");
                window.location.href = \"feedback.php\"
            </script>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM feedback WHERE Text = '$id'";

    $result = $con->query($sql);

    if($result->num_rows > 0) {
        $result = $result->fetch_assoc();
            $fname = $result['fName'];
            $lname = $result['lName'];
            $email = $result['Email'];
            $text = $result['Text'];
    }
}
$con->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>feedback update form</title>
        <style>
            h1 {
                font-size: 2vw;
                margin-left: 4%;
            }
            fieldset {
                width: 20%;
                border-radius: 10px;
            }
            form {
                font-size: 1vw;
            }
        </style>
    </head>
</html>
    <body>
        <h1>Feedback Update</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <fieldset>
                <input type="hidden" name="id" value="<?php echo $id; ?>"><br><br>

                First Name:<br>
                <input type="text" name="fname" value="<?php echo $fname; ?>" required><br><br>

                Last Name:<br>
                <input type="text" name="lname" value="<?php echo $lname; ?>" required><br><br>

                Email:<br>
                <input type="text" name="email" value="<?php echo $email; ?>" required><br><br>

                Text:<br>
                <textarea rows="5" name="text"><?php echo $text; ?></textarea><br><br>

                <input type="submit" value="Save Changes" name="update">
            </fieldset>
        </form>
    </body>
</html>

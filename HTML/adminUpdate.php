<?php
require 'config.php';
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $bio = $_POST['bio'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $code = $_POST['code'];

    $sql = "UPDATE admindetails SET fName = '$firstname', lName = '$lastname', bio = '$bio', address = '$address', email = '$email', phone = '$phone',  username = '$username', password = '$password', code = '$code' WHERE no = '$id'";

    $result = $con->query($sql);
    if($result) 
    {
        echo "<script>
                alert(\"Record Edited Successfully\");
                window.location.href = \"manageAdmin.php\"
            </script>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM admindetails WHERE no = '$id'";

    $result = $con->query($sql);

    if($result->num_rows > 0) {
        $result = $result->fetch_assoc();
            $fname = $result['fName'];
            $lname = $result['lName'];
            $bio = $result['bio'];
            $address = $result['address'];
            $email = $result['email'];
            $phone = $result['phone'];
            $uname = $result['username'];
            $pw = $result['password'];
            $cd = $result['code'];
    }
}
$con->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin update form</title>
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
        <h1>Admin Update</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <fieldset>
                <input type="hidden" name="id" value="<?php echo $id; ?>"><br><br>

                First Name:<br>
                <input type="text" name="fname" value="<?php echo $fname; ?>" required><br><br>

                Last Name:<br>
                <input type="text" name="lname" value="<?php echo $lname; ?>" required><br><br>

                Bio:<br>
                <textarea rows="5" name="bio"><?php echo $bio; ?></textarea><br><br>

                Address:<br>
                <textarea rows="5" name="address"><?php echo $address; ?></textarea><br><br>

                Email:<br>
                <input type="text" name="email" value="<?php echo $email; ?>" required><br><br>

                Phone:<br>
                <input type="text" name="phone" value="<?php echo $phone; ?>" pattern="\d{10}" title="Phone number should have 10 digits." required><br><br>

                Username:<br>
                <input type="text" name="username" value="<?php echo $uname; ?>" required><br><br>

                Password:<br>
                <input type="text" name="password" value="<?php echo $pw; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br><br>

                Code:<br>
                <input type="text" name="code" value="<?php echo $cd; ?>" pattern="[A-Z][A-Z]\d{3}" title="Admin code should be a 5 letter code with 2 uppercase letters in the beginning and 3 numbers in the end." required><br><br><br>

                <input type="submit" value="Save Changes" name="update">
            </fieldset>
        </form>
    </body>
</html>
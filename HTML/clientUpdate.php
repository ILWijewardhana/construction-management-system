<?php
require 'config.php';
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $gender = $_POST['gender'];
    $bio = $_POST['bio'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE register SET fName = '$firstname', lName = '$lastname', gender = '$gender', bio = '$bio', address = '$address', country = '$country', mobileNo = '$phone', email = '$email', password = '$password' WHERE no = '$id'";

    $result = $con->query($sql);
    if($result) 
    {
        echo "<script>
                alert(\"Client Information Edited Successfully\");
                window.location.href = \"manageClients.php\"
            </script>";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM register WHERE no = '$id'";

    $result = $con->query($sql);

    if($result->num_rows > 0) {
        $result = $result->fetch_assoc();
            $fname = $result['fName'];
            $lname = $result['lName'];
            $gender = $result['gender'];
            $bio = $result['bio'];
            $address = $result['address'];
            $country = $result['country'];
            $phone = $result['mobileNo'];
            $email = $result['email'];
            $pw = $result['password'];
    }
}
$con->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Client infomation update form</title>
        <style>
            h1 {
                font-size: 2vw;
                margin-left: 39%;
            }
            fieldset {
                width: 30%;
                border-radius: 10px;
                position: relative;
                left: 50%;
                transform: translate(-50%);
            }
            form {
                font-size: 1vw;
            }
            form input[type="text"] {
                width: 40%;
            }
            form textarea {
                width: 40%;
            }
        </style>
    </head>
</html>
    <body>
        <h1>Client infomation Update</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <fieldset>
                <input type="hidden" name="id" value="<?php echo $id; ?>"><br><br>

                First Name:<br>
                <input type="text" name="fname" value="<?php echo $fname; ?>" required><br><br>

                Last Name:<br>
                <input type="text" name="lname" value="<?php echo $lname; ?>" required><br><br>

                Gender:<br>
                <label><input type="radio" name="gender" value="Male" required>Male</label><br>
                <label><input type="radio" name="gender" value="Female" required>Female</label><br><br>

                Bio:<br>
                <textarea rows="5" name="bio"><?php echo $bio; ?></textarea><br><br>

                Address:<br>
                <textarea rows="5" name="address"><?php echo $address; ?></textarea><br><br>

                Coutry:<br>
                <textarea rows="5" name="country"><?php echo $country; ?></textarea><br><br>

                Contact Number:<br>
                <input type="text" name="phone" value="<?php echo $phone; ?>" pattern="\d{10}" title="Phone number should have 10 digits." required><br><br>

                Email:<br>
                <input type="text" name="email" value="<?php echo $email; ?>" required><br><br>

                Password:<br>
                <input type="text" name="password" value="<?php echo $pw; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br><br>

                <input type="submit" value="Save Changes" name="update">
            </fieldset>
        </form>
    </body>
</html>

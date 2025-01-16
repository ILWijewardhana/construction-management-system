<?php
    require 'config.php';

    if(isset($_POST['submit']))
    {
        $first_name = $_POST['fName'];
        $last_name = $_POST['lName'];
        $code = $_POST['code'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $sql = "INSERT INTO employeedetails (fName, lName, email, phone, username, password, code) VALUES ('$first_name', '$last_name', '$email', '$phone', '$username', '$password', '$code')";

        $result = $con->query($sql);
        
        if($result)
        {
            echo "<script>
                    alert(\"Employee Added Successfully\");
                    window.location.href = \"manageEmployee.php\"
                </script>";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
?>


<!DOCTYPE html>
<html>

  <head>
    <title>Employee Manage | Nova Constructions</title>
    <link rel="stylesheet" href="../CSS/manageEmployee.css">
    <script src="../JS/passwordCheck.js"></script>
  </head>

  <body>
    <img src="../images/logo.png" id="logo" alt="company logo">
    <img src="../images/title.png" id="title" alt="company title">

    <div class="navBarDiv">

        <div class="search">
        <form style="height: 100%;" onsubmit="return false">
            <input type="search" placeholder="Search in our website..." id="searchBar" onsearch="search()">
            <img src="../images/search.png"> 
            <script src="../JS/searchBar.js"></script>
            <input type="submit" id="searchSubmit">
        </form>
        </div>

        <img src="../images/lightMode.png" alt="sunImage" id="theme">
        <script src="../JS/darkMode.js"></script>

    </div>

    <div class="empReg">
        <h1>New Employee Register</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return userRegisterPasswordCheck()">
          <label for="fName">First Name</label>
          <label for="lName" class="lnameLable">Last Name</label><br>
          <input type="text" id="fName" name="fName" placeholder="FIRST NAME" required>
          <input type="text" id="lName" name="lName" placeholder="LAST NAME" required><br><br>

          <label for="code">Employee Code</label>
          <label for="username" class="usernameLable">Username</label><br>
          <input type="text" id="code" name="code" placeholder="EMPLOYEE CODE" pattern="[A-Z][A-Z]\d{3}" title="Admin code should be a 5 letter code with 2 uppercase letters in the beginning and 3 numbers in the end." required>
          <input type="text" id="username" name="username" placeholder="USERNAME" required><br><br>

          <label for="email">E-mail</label>
          <label for="phone" class="phoneLabel">Mobile No</label><br>
          <input type="text" id="email" name="email" placeholder="E-MAIL" required>
          <input type="text" id="phone" name="phone" placeholder="MOBILE NO" required><br><br>
          
          <label for="password">Password</label>
          <label for="rPassword" class="rPasswordLable">Re-Enter Password</label><br>
          <input type="text" id="password" name="password" placeholder="PASSWORD" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <input type="text" id="rPassword" name="password" placeholder="RE-ENTER PASSWORD" required><br><br><br><br>

          <input type="submit" value="Create Account" name="submit">
        
        </form>
    </div>

    <div class="currentEmployees">
        <h1>Current Employees</h1>
        <?php
            $sql = "SELECT * FROM employeedetails";
            $result = $con->query($sql);

            if($result->num_rows>0) {
                echo "<table>";
                while($row = $result->fetch_assoc()) {
                   echo "
                    <tr>
                        <td class=\"tableHead\">Username:</td>
                        <td>$row[username]</td>
                        <td rowspan=\"2\"><a href=\"employeeUpdate.php?id=$row[no]\"><button>Update</button></a>
                            <a href=\"employeeDelete.php?id=$row[no]\"><button>Delete</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"tableHead\">Password:</td>
                        <td>$row[password]</td>
                    </tr><tr><td>&nbsp;</td><tr>";
                }
                echo "</table>";
            }
        ?>
    </div>

    <footer>
      <table width="30%" class="footerTable">
        <tr>
          <td width="20%">Contact Us,</td>
          <td width="10%"><img src="../images/email.png" width="80%"></td>
          <td style="white-space:nowrap; text-align: left;">novaconstructions@gmail.com</td>
        </tr>
        <tr>
          <td></td>
          <td><img src="../images/phone.png" width="55%"></td>
          <td style="text-align: left;">+94 (70) 123 4567</td>
        </tr>
      </table><br>
  
      <table width="30%" class="footerTable footerTableHover">
        <tr>
          <td>Follow Us On,</td>
          <td width="10%"><a href="https://www.facebook.com/" target="_blank"><img src="../images/facebook.png" class="fb"></a></td>
          <td width="10%"><a href="https://www.instagram.com/" target="_blank"><img src="../images/insta.png" class="insta"></a></td>
          <td width="10%"><a href="https://www.youtube.com/" target="_blank"><img src="../images/youtube.png" class="yt"></a></td>
          <td width="10%"><a href="https://www.tiktok.com/en/" target="_blank"><img src="../images/tiktok.png" class="tiktok"></a></td>
          <td width="60%"></td>
        </tr>
      </table><br>
  
      <div class="address">
        <h2>NOVA Constructions (pvt) Ltd</h2>
        <p>Street: 568 Havelock Road,<br>06th Lane, Colombo</p>
      </div>
  
      <div class="hyperLinks">
        <p>
          <a href="aboutUs.html">About Us</a> |
          <a href="contactUs.html">Contact Us</a> |
          <a href="FAQ.html">FAQ</a> |
          <a href="customerSupport.html">Customer Support</a> |
          <a href="feedback.php">Customer Feedback</a>
        </p>
      </div>
  
      <div class="bottomLogo">
        <img src="../images/logo.png">
        <p>&copy; 2023 NOVA Constructions. All rights reserved.</p>
      </div>
  
    </footer>
  </body>
</html>
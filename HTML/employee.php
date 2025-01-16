<?php
require 'config.php';
session_start();
$empID = $_SESSION['employeeID'];

$sql = "SELECT * FROM employeedetails WHERE no = $empID";
$result = $con->query($sql);
if(!$result)
{
  echo "error";
  exit();
}

$result = $result->fetch_assoc();

?>


<!DOCTYPE html>
<html>

  <head>
    <title>Employee Profile | NOVA Constructions</title>
    <link rel="stylesheet" href="../CSS/worker.css">
    <script src="../JS/prompt.js"></script>
    <script src="../JS/passwordCheck.js"></script>
  </head>

  <body>
    <img src="../images/logo.png" id="logo" alt="company logo">
    <img src="../images/title.png" id="title" alt="company title">
    
  <div class="wname">  
    <img src="../images/pp.png" id="pImg" alt="profile image">
	  <h3><?php echo $result['fName'].' '.$result['lName'];?></h3>
  </div>	

    <div class="navBarDiv">
    <ul class = "nav">
        <li><a href = "home.html">Home</a></li>
        <li><a href = "aboutUs.html">Who we are</a></li>
        <li><a href = "whatWeDo.html">What we do</a></li>
        <li><a href = "contactUs.html">Contact Us</a></li>
        <li><a href = "ourWork.html">Our Work</a></li>
      </ul>

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

<!-- worker bio-->
	
	<div id="worker">
	  <h2><?php echo $result['fName'].' '.$result['lName'];?></h2>
	  <a href="home.html"><button class="logoutp">log out</button></a>
	   <img src="../images/pp.png" class="wpf" alt="worker">
	  <script>
      var epalert = document.getElementById("epalert");
      epalert.addEventListener("click", function() {
           alert("Your profile changed ");
       });
    </script>
    <h4>Bio</h4>
	<hr>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <textarea id="Bio" name="bio"><?php echo $result['bio'];?></textarea>
    <button type="submit" name="update" class="updateBTN">Update</button>
    <button type="submit" name="delete" class="deleteBTN">Delete</button>
  </form>
   
    </div>


    <!--PHP for update button-->

<?php
if(isset($_POST['update']))
{
  $bio = $_POST['bio'];
  $sql = "UPDATE employeedetails SET bio = '$bio' WHERE no = $empID;";
  $result2 = $con->query($sql);
  if(!$result2)
  {
    echo "Error occured while updating bio";
    exit();
  }
  echo "<script>window.location.href = \"employee.php\";</script>";
}
?>

<!--PHP for delete button-->

<?php
if(isset($_POST['delete']))
{
  $bio = NULL;
  $sql = "UPDATE employeedetails SET bio = NULL WHERE no = $empID;";
  $result3 = $con->query($sql);
  if(!$result3)
  {
    echo "Error occured while deleting bio";
    exit();
  }
  echo "<script>window.location.href = \"employee.php\";</script>";  
}
?>

<?php
$fname = $result['fName'];
$lname = $result['lName'];
$address = $result['address'];
$email = $result['email'];
$phone = $result['phone'];
$password = $result['password'];
?>

	
<!-- information-->	
  <div class="info">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h2>Personal Information</h2>
      <h4>Update your personal information</h4>
      <label for="fName">First Name</label>
      <input type="text" id="fName" name="fname" value="<?php echo $fname?>"  class="textbox">
  
      <label for="lName">Last Name</label>
      <input type="text" id="lName" name="lname" value="<?php echo $lname?>"  class="textbox"><br>
  
      <label for="Address">Address</label>
      <textarea id="Address" name="address"><?php echo $address?></textarea><br><br>
  
      <label for="email">Email Address</label>
      <img src="../images/m1.png" alt="email icon" class="emailIcon">
      <input type="text" id="email" name="email" value="<?php echo $email?>"  class="textbox">
  
      <label for="pNo">Phone number</label>
      <img src="../images/pi.png" alt="phone icon" class="phoneIcon">
      <input type="text" id="pNo1" name="phone" value="<?php echo $phone?>"  class="textbox">
      <input type="submit" name="PIsubmit" value="Save Changes" id="scalert">
    </form>
   </div>

<!--PHP for changing personal infomation-->

<?php
if(isset($_POST['PIsubmit']))
{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  $sql = "UPDATE employeedetails SET fName = '$fname', lName = '$lname', address = '$address', email = '$email', phone = '$phone' WHERE no = $empID";

  $result2 = $con->query($sql);

  if(!$result2)
  {
    echo "<script>alert(\"Error occured while updating data.\")</script>";
  }
  else
  {
    echo "<script>window.location.href = \"employee.php\";</script>";
  }

}

?>


<!--Security-->

  <div class="secu">
    <form onsubmit="return checkPasswordOnChange()" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h2>Security Information</h2>
      <h4>Your new password must be different from previous used password</h4>
  
      <label for="currentPassword">Current Password</label>
      <img src="../images/l1.png" alt="phone icon" class="lockIcon">
      <input type="password" id="currentPassword" name="currentPassword" placeholder="Current Password" class="textbox" required><br>
  
      <label for="newPassword">New Password</label>
      <img src="../images/l1.png" alt="phone icon" class="lockIcon">
      <input type="password" id="newPassword" name="newPassword" placeholder=" New Password" class="textbox" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
  
      <label for="confirmNewPassword">Confirm New Password</label>
      <img src="../images/l1.png" alt="phone icon" class="lockIcon">
      <input type="password" id="confirmNewPassword" name="password" placeholder="Confirm New Password" class="textbox" required>
      <input type="hidden" id="oldPassword" value="<?php echo $password?>">
  
      <input type="submit" name="Ssubmit" value="Save Changes" id="scalert">
    </form>
  </div>


<!--PHP for changing security infomation-->

<?php
if(isset($_POST['Ssubmit']))
{
  $newP = $_POST['newPassword'];

  $sql = "UPDATE employeedetails SET password = '$newP' WHERE no = $empID";

  $result2 = $con->query($sql);

  if(!$result2)
  {
    echo "<script>alert(\"Error occured while updating password.\")</script>";
  }
  else
  {
    echo "<script>alert(\"Password has changed successfully!\");</script>";
    echo "<script>window.location.href = \"employee.php\";</script>";
  }

}
$con->close();
?>


 <!--Current project-->

  <div class="cpr">
    <h2>New project</h2>
    <textarea id="project">golden Towers is a new high-rise mixed-use development project. The complex consists of a high-rise tower with commercial spaces on the ground floor and luxury residential units on the upper floors. The ambitious $45 million project is expected to be completed in 24 months. You will also be entrusted with the management of the project.</textarea> 

</div> 

<!--project update-->

  <div class="pru">
    <h2>My project</h2>
    <textarea id="project Update">I am pleased to provide you with an update on the progress of the stadium project. As of October 23, 2023, we have made significant strides in the construction phase, and the project remains on track to meet our goals and deadlines.</textarea>
</div>

<!--footer-->
		
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
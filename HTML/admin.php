<?php
require 'config.php';
session_start();
$adminID = $_SESSION['adminID'];

$sql = "SELECT * FROM admindetails WHERE no = $adminID";
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
    <title>Admin Profile | NOVA Constructions</title>
    <link rel="stylesheet" href="../CSS/admin.css">
  </head>

  <body>
    <img src="../images/logo.png" id="logo" alt="company logo">
    <img src="../images/title.png" id="title" alt="company title">
    
  <div class="Aname">  
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

<!-- Admin bio-->

    <div id="admin">
      <h2><?php echo $result['fName'].' '.$result['lName'];?></h2>
      <a href="home.html"><button class="alogoutp">log out</button></a>
      <img src="../images/pp.png" class="apf" alt="worker">
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
  $sql = "UPDATE admindetails SET bio = '$bio' WHERE no = $adminID;";
  $result2 = $con->query($sql);
  if(!$result2)
  {
    echo "Error occured while updating bio";
    exit();
  }
  echo "<script>window.location.href = \"admin.php\";</script>";
}
?>

<!--PHP for delete button-->

<?php
if(isset($_POST['delete']))
{
  $bio = NULL;
  $sql = "UPDATE admindetails SET bio = NULL WHERE no = $adminID;";
  $result3 = $con->query($sql);
  if(!$result3)
  {
    echo "Error occured while deleting bio";
    exit();
  }
  echo "<script>window.location.href = \"admin.php\";</script>";
  $con->close();
  
}
?>

<!-- charts-->	

  <div class="cons">
     <h2>Constructions</h2>
     <hr>
  	 
  <div class="pchart1">
  <h4>Worked Labours</h4>
  <img src="../images/piechart1.png" class="pie1" alt="chart1"></div>
    
   <div class="pchart2"> 
   <h4>Total Revenue</h4>
   <img src="../images/piechart2.png" class="pie2" alt="chart2"></div>
   <div class="pchart3">
   <h4>Project Finished</h4>   
   <img src="../images/piechart3.png" class="pie3" alt="chart3"></div> 
   </div>
   
   <div class="linechart">
   <h4>Work Overview</h4>
   <img src="../images/chart4.png" class="linechar" alt="linechart"></div>
   </div><br><br><br><br>
   
<!-- manage account -->

<div class="accountManage">
  <h1>Manage Users</h1>
  <hr>
  <a href="manageAdmin.php"><button class="adminBtn">Manage Admins</button></a>
  <a href="manageEmployee.php"><button>Manage Employees</button></a>
  <a href="manageClients.php"><button>Manage Clients</button></a>
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
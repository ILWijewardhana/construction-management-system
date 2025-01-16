<!DOCTYPE html>
<html>

  <head>
    <title>Client Manage | Nova Constructions</title>
    <link rel="stylesheet" href="../CSS/manageClients.css">
    <style>
        
    </style>
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

        <h1 class="clientHeader">Current Clients</h1>
        <?php
            require 'config.php';
            $sql = "SELECT * FROM register";
            $result = $con->query($sql);

            if($result->num_rows>0) {
                echo "<table class=\"clientTable\">
                        <tr>
                            <th>Email</th><th>Password</th><th>Update</th><th>Delete</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                   echo "
                    <tr>
                        <td>$row[email]</td>
                        <td>$row[password]</td>
                        <td><a href=\"clientUpdate.php?id=$row[no]\" class=\"tableUpdate\">Update</a>
                        <td><a href=\"clientDelete.php?id=$row[no]\" class=\"tableDelete\">Delete</a>
                    </tr>";
                }
                echo "</table>";
            }
        ?>


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
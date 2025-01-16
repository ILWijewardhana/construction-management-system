<?php
    require 'config.php';

    if(isset($_POST['submit']))
    {
      $first_name = $_POST['fName'];
      $last_name = $_POST['lName'];
      $email = $_POST['email'];
      $feedback = $_POST['feedbackText'];

      $sql = "INSERT INTO feedback (fName, lName, Email, Text) VALUES ('$first_name', '$last_name', '$email', '$feedback')";

      $result = $con->query($sql);
      
      if(!$result)
      {
          echo "Error: " . $sql . "<br>" . $con->error;
      }
    }

    $con->close();

?>


<!DOCTYPE html>
<html>

  <head>
    <title>Customer Feedback | Nova Constructions</title>
    <link rel="stylesheet" href="../CSS/feedback.css" media="screen">
    <style>
      /* php styles */
      .phpTable {
        font-size: 1.3vw;
        position: relative;
        width: 70%;
        border: 2px solid black;
        border-collapse: collapse;
        left: 50%;
        transform: translate(-50%);
        margin-top: 4%;
        color: var(--secondary-color);
      }
      .phpTable td, .phpTable th {
        border: 2px solid black;
        text-align: left;
        padding: .9%;
        border-color: var(--secondary-color);
      }
      .phpHeader {
        color: var(--secondary-color);
        margin-top: 5%;
        font-size: 2vw;
        text-align: center;
        text-decoration: underline;
      }
      .tableHyper {
        color: var(--secondary-color);
        text-decoration: none;
        cursor: pointer;
      }
      .tableHyper:hover {
        text-decoration: underline;
      }
    </style>
  </head>

  <body>
    <img src="../images/logo.png" id="logo" alt="company logo">
    <img src="../images/title.png" id="title" alt="company title">
    <img src="../images/profileImage.png" id="pImg" alt="profile image"><br>
    <a href="register.html"><img src="../images/signup.png" id="signup" alt="signup button"></a>
    <a href="Login option.html"><img src="../images/signin.png" id="signin" alt="signin button"></a>

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
	
    <div id="fform">
	  <h1>Feedback Form</h1>
    <form class="structure" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <label for="name">Name:</label><br>
      <input type="text" id="name" placeholder="First" name="fName">
      <input type="text" id="name" placeholder="Last" name="lName"><br><br><br>

      <label for="email">Email:</label><br>
      <input type="text" id="email" placeholder="Email" name="email"><br><br><br>

      <label for="textarea">Feedback:</label><br>
      <textarea id="textarea" name="feedbackText"></textarea><br><br>
    
      <button type="submit" name="submit">submit</button> 
	 
    </form>
    </div>


    <?php
            require "config.php";

            $sql = "SELECT * FROM feedback";
            $result = $con->query($sql);

            if($result->num_rows>0) {
                echo "<h1 class=\"phpHeader\">Previous Feedbacks</h1>";
                echo "<table class=\"phpTable\"><tr><th>Name</th><th>Email</th><th>Feedback</th><th>Change</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>$row[fName] $row[lName]</td>";
                    echo "<td>$row[Email]</td>";
                    echo "<td>$row[Text]</td>";
                    echo "<td><a href=\"feedbackUpdate.php?id=$row[Text]\" class=\"tableHyper\">Edit</a>&emsp;<a href=\"feedbackDelete.php?id=$row[Text]\" class=\"tableHyper\">Delete</a></td></tr>";
                }
                echo "</table>";
            }
            $con->close();
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
          <a href="feedback.php" class="currentFooter">Customer Feedback</a>
        </p>
      </div>
  
      <div class="bottomLogo">
        <img src="../images/logo.png">
        <p>&copy; 2023 NOVA Constructions. All rights reserved.</p>
      </div>
  
    </footer>
 
  </body>

</html>

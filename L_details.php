<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,intial-scale=1">
    <meta http-equiv="X-UA-Comptible" content="IE=edge">
	<title>LMS</title>
  <link rel="shortcut icon" type="image/png" href="img/scales-of-justice-icon-512-244111.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="rel1.css">

	<script src="js/jquery.min.js"></script>
	</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" class="w3-light-grey">
<nav class="navbar navbar-default navbar-fixed-top navbar-expand-sm">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand text-light">LMS</a> 
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
			</button>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
            <li>
                    <div class="dropdown">
                        <button class="dropbtn">LAW'S INFORMATION</button>
                        <div class="dropdown-content">
                            <a href="CRIMINAL.PHP" class="ä_drop">CRIMINAL</a><br>
                            <a href="CORPORATE.php" class="ä_drop">CORPORATE</a><br>
                            <a href="#" class="ä_drop">CIVIL</a><br>
                            <a href="#" class="ä_drop">COMERCIAL</a><br>
                        </div>            
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn" >CASE</button>
                        <div class="dropdown-content">
                            <a href="#">ADD CASE</a>
                            <a href="#">CURRENT CASE</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn" onclick="location.href='clogout.php';" type="button">LOG OUT</button>
                    </div>
                </li>
            </ul>
		</div>
	</div>
</nav>


  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-black w3-card-4">
        <div class="w3-display-container">
          <img src="img/sapan-r-patel-advocate.jpg" style="width:100%" alt="Avatar">
          <input type="file" id="file1" name="image" accept="image/*" capture style="display:none"/>
          <img src="img/iphone-camera-icon-150x150.jpg" id="upfile1" style="cursor:pointer" type="submit" />
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2>Jane Doe</h2>
          </div>
        </div>
        <div class="w3-container">
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-black"></i>Designer</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-black"></i><a href="https://goo.gl/maps/GdWcVydX79Q2"> V V NAGAR, INDIA</a></p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-black"></i>ex@mail.com</p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-black"></i>1224435534</p>
          <hr>

          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-black"></i>Skills</b></p>
          <p>Commercial awareness</p>
          <p>Communication</p>
          <p>Time management</p>
          <br>

          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-black"></i>Languages</b></p>
          <p>English</p>
          <p>Hindi</p>
          <p>Tamil</p>
          
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-black w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-black"></i>Work Experience</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Front End Developer / w3schools.com</b></h5>
          <h6 class="w3-text-black"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jan 2015 - <span class="w3-tag w3-black w3-round">Current</span></h6>
          <p>Lorem ipsum dolor sit amet. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Web Developer / something.com</b></h5>
          <h6 class="w3-text-black"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Mar 2012 - Dec 2014</h6>
          <p>Consectetur adipisicing elit. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Graphic Designer / designsomething.com</b></h5>
          <h6 class="w3-text-black"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jun 2010 - Mar 2012</h6>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p><br>
        </div>
      </div>

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-black"></i>Education</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>W3Schools.com</b></h5>
          <h6 class="w3-text-black"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
          <p>Web Development! All I need to know in one place</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>London Business School</b></h5>
          <h6 class="w3-text-black"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2015</h6>
          <p>Master Degree</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>School of Coding</b></h5>
          <h6 class="w3-text-black"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2010 - 2013</h6>
          <p>Bachelor Degree</p><br>
        </div>
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->


<footer class="w3-container w3-black w3-center w3-margin-top">
  <p>Find me on social media.</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  
  <i class="fa fa-google-plus-square w3-hover-opacity"></i>
  
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  
</footer>

</body>
</html>

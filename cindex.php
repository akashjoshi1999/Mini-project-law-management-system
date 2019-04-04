<?php
session_start();
    if(!($_SESSION["email"]==2 ))
    {
        //echo "HelloWorld";
        header("Location: mainLMS_layout.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,intial-scale=1">
    <meta http-equiv="X-UA-Comptible" content="IE=edge">
	<title>LMS</title>
    <link rel="shortcut icon" type="image/png" href="img/scales-of-justice-icon-512-244111.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/rel2.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div class="bg">
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
                    <button class="dropbtn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" type="button">SEARCH</button>
                </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">LAW'S INFORMATION</button>
                        <div class="dropdown-content">
                            <a href="CRIMINAL.PHP" class="a_drop">CRIMINAL</a>
                            <a href="CORPORATE.php" class="a_drop">CORPORATE</a>
                            <a href="CIVIL.php" class="a_drop">CIVIL</a>
                            <a href="COMMERCIAL.php" class="a_drop">COMERCIAL</a>
                        </div>            
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn" onclick="location.href='response.php';" type="button">CASE</button>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn" onclick="location.href='clogout.php';" type="button">LOG OUT</button>
                    </div>
                </li>
            </ul>
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                
                <div class="container">
                <form class="modal-content" action="search_validation.php" method="post">
                    <hr>
                    <p><b><center>Search the lawyer</center></b></p>
                    <hr>
                    <input type="text" placeholder="Enter Name" name="name" class="setbox"><br>
                    <input type="text" placeholder="Enter Location" name="location" class="setbox"><br>
                    <select id="law" name="law" style="width: 300px; font-size:15px;">                      
		                <option>--profession--</option>
		                <option value="Civil">Civil</option>
		                <option value="Labor law">Labor law</option>
                        <option value="Family law">Family law</option>
                        <option value="Corporate & Commercial">Corporate & Commercial</option>
                        <option value="Bankruptcy & Insolvency">Bankruptcy & Insolvency</option>
                        <option value="Motor vahicle">Motor vahicle</option>
                        <option value="Immigration">Immigration</option>
                        <option value="GST">GST</option>
                        <option value="Marrriage/Divorce,Child custody">Marrriage/Divorce,Child custody</option>
                        <option value="Information Technology Software & Technology">Information Technology Software & Technology</option>
	                </select><br><br>
                    <input type="text" name="expert" placeholder="Enter experience" class="setbox"><br><br>
                    
                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <button type="submit" class="search" name="sdata">Search</button>
                    </div>
                </div>
                </form>
            </div>
            <script>
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event)
            {
                if (event.target == modal)
                {
                    modal.style.display = "none";
                }
            }
            </script>
		</div>
    </div>
</nav>
</div>
</body>
</html>
<?php 
require "conn.php";
session_start();
    $id = $_SESSION["l_email"];
    $c_name =array(); $counter=0;
    $sql = "SELECT * FROM lawyer_res WHERE lawyer_email = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                $c_name[$counter++] = $row;
            }
        }
        else
         {
            echo "0 results";
         }
	echo "<br><br><br><center><from><table>";
	for($row=0;$row<$counter;$row++)
	{
		echo "<tr>";
        echo "<td>".($row+1)."</td><td>".$c_name[$row]["name"]."<input type='hidden' name='client_email' value='$c_name[$row]['email']'></td><td><button class='dropbtn' onclick='location.href='details_response.php';' style='width:auto' name='accept'>ACCEPT</td>";
        echo "<td><button class='dropbtn' style='width:auto' name='acceptreject'>REJECT</td>";
		echo "</tr>";
    }
    echo "</table></from></center>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
table,td{
    border:1px solid black;
    padding: 10px;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,intial-scale=1">
    <meta http-equiv="X-UA-Comptible" content="IE=edge">
	<title>LMS</title>
    <link rel="shortcut icon" type="image/png" href="img/scales-of-justice-icon-512-244111.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/rel2.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
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
                        <button class="dropbtn" onclick="location.href='appointment.php';" type="button">APPPOINTMENT</button>
                </div>
            </li>
            <li>
                <div class="dropdown">
                        <button class="dropbtn" onclick="location.href='payment.php';" type="button">PAYMENT</button>
                </div>
            </li>
            <li>
                <div class="dropdown">
                <button class="dropbtn" onclick="location.href='law_profile.php';" type="button">PROFILE</button>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <button class="dropbtn" onclick="location.href='llogout.php';" type="button">LOG OUT</button>
                </div>
            </li>
            </ul>
		</div>
    </div> 
</nav>
</body>
</html>
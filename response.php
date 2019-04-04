<?php 
    require "conn.php";
    $e_id = $_POST["email_id"];
    if(isset($_POST["reject"]))
    {
        $result = "lawyer declined your request please apply for another lawyer";
        $c_name = null; $c_mobile = null; $c_email = null;
        $l_name = null; $l_mobile = null; $l_email = null;
        $details = null;
    }
    elseif(isset($_POST["accept"]))
    {
        session_start();
        $id = $_SESSION["email"];
        $sql = "SELECT * FROM lawyer_res WHERE id ='$id' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                $c_name = $row["name"];
                $c_email = $row["email"];
                $c_mobile = $row["mobile"];
                $details = $row["details"];
            }
        }
        else
         {
            echo "0 results";
         }
         $sql2 = "SELECT * FROM lawyerreg WHERE email ='$e_id' ";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) 
        {
            while($row2 = $result2->fetch_assoc())
            {
                $l_name = $row2["name"];
                $l_mobile = $row2["mobile"];
            }
        }
        else
         {
            echo "0 results";
         }
        $conn->close();
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
                        <button class="dropbtn" onclick="location.href='clogout.php';" type="button">LOG OUT</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<h4><?php echo $result; ?></h4>
<div class="container">
    <form class="modal-content" action="#" method="post">
        <hr>
        <p><b><center>RECIEPT</center></b></p>
        <hr>
        Client name:
        <input type="text" value=<?php echo $c_name; ?> class="setbox"><br><br>
        Client email ID:
        <input type="text" value="<?php echo $c_email; ?>" class="setbox"><br><br>
        Client Mobile No. :
        <input type="text" value="<?php echo $c_mobile; ?>" class="setbox"><br><br>
        Case Details :
        <input type="text" value="<?php echo $details; ?>" class="setbox"><br><br>
        Lawyer name:
        <input type="text" value="<?php echo $l_name; ?>" class="setbox"><br><br>
        Lawyer email ID:
        <input type="text" value="<?php echo $e_id; ?>" class="setbox"><br><br>
        Lawyer Mobile No. :
        <input type="text" value="<?php echo $l_mobile; ?>" class="setbox"><br><br>                                                                                                                     
    </form>
    </div>
</div>
</body>
</html>
<?php
  require "conn.php";
  $id = $_POST["ID_NO"];
  $cnameErr = $cmyemailErr = $cmobileErr = $detailsErr ="";
  if(isset($_POST["L_details"]))
  {
    $sql = "SELECT * FROM search_lawyer WHERE email ='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            $profile = $row["dp"];
            $name = $row["name"];
            $designation = $row["designation"];
            $location = $row["location"];
            $email = $row["email"];
            $mobile = $row["mobile"];
            $address_office = $row["office"];
            $date = $row["date"];
            $college = $row["college"];
            $college_date = $row["college_date"];
            $school = $row["school"];
            $school_date = $row["school_date"];
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
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="rel1.css">

	<script src="js/jquery.min.js"></script>
	</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" class="w3-light-grey">
<div class="w3-row-padding"><br>
    <div class="w3-third">
        <div class="w3-white w3-text-black w3-card-4">
            <div class="w3-display-container">
				<img src="img/sapan-r-patel-advocate.jpg" style="width:485px; height:232px;" alt="Avatar">
				<input type="file" id="file1" name="image" accept="image/*" capture style="display:none"/>
				
				<div class="w3-display-bottomleft w3-container w3-text-black">
					<h2><?php echo $name; ?></h2> 
				</div>
			</div>
            <div class="w3-container">
				<p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-black"></i><?php echo $designation; ?></p>
				<p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-black"></i><?php echo $location; ?></p>
				<p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-black"></i><?php echo $email; ?></p>
				<p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-black"></i><?php echo $mobile; ?></p>
				<hr>
				<p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-black"></i>Languages</b></p>
				<p>English</p>
				<p>Hindi</p>
				<p>Tamil</p>
				<br>	
            </div>
        </div>
    </div>
    <div class="w3-twothird">
        <div class="w3-container w3-card w3-white w3-margin-bottom">
            <h2 class="w3-text-black w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-black"></i>Work Experience</h2>
            <div class="w3-container">
				<h5 class="w3-opacity"><b><?php echo $designation; ?>/<?php echo $address_office; ?></b></h5>
				<h6 class="w3-text-black"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $date; ?> <span class="w3-tag w3-black w3-round">Current</span></h6>
				<hr>
			</div>
		</div>
		<div class="w3-container w3-card w3-white">
			<h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-black"></i>Education</h2>
			<div class="w3-container">
				<h5 class="w3-opacity"><b><?php echo $college; ?></b></h5>
				<h6 class="w3-text-black"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $college_date;?></h6>
				<p>master degree</p>
				<hr>
			</div>
			<div class="w3-container">
				<h5 class="w3-opacity"><b><?php echo $school; ?></b></h5>
				<h6 class="w3-text-black"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $school_date;?></h6>
				<p>Bachelor Degree</p><br>
			</div>
		</div>
	</div>
	<div>
		<button class="dropbtn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" type="button">Approch</button>
	</div>
	<div id="id01" class="modal">
		<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="container">
			<form class="modal-content" action="submit_response.php" method="post">
			<hr style="color:blue">
			<p><b><center>FILL THE DETAILS ABOUT CASE</center></b></p>
			<hr>
            <input type="hidden" name="id_transfer" value="<?php echo $id; ?>">
			<input type="text" placeholder="Enter Name" name="name" class="setbox"><br>
			<span class = "error"> <?php echo $cnameErr; ?></span> <br>
			<input type="text" placeholder="Enter Email" name="email" class="setbox"><br>
			<span class = "error"> <?php echo $cmyemailErr; ?></span> <br>
            <input type="text" name="mobile" placeholder="Enter Mobile No." class="setbox"><br><br>
            <span class = "error"> <?php echo $cmobileErr; ?></span> <br>
            <textarea rows="4" cols="50" name="case_detail" placeholder="description about case..."></textarea>    
            <span class = "error"> <?php echo $detailsErr; ?></span> <br>
            <div class="clearfix">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="submit" class="search" name="res_submit">Approch</button>
            </div>
			</form>
        </div>
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
  
</body>
</html>

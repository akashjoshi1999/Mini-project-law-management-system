<?php
  require "conn.php";
  session_start();
  $id = $_SESSION["l_email"];
  $nameErr = $emailErr = $desiErr =$locationErr =$mobileErr =$officeAdErr = $dateErr =$collegeErr =$collegeYErr= $schoolErr= $schoolYErr ="";
    $sql = "SELECT * FROM search_lawyer WHERE email ='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $profile = $row["dp"];
            $name = $row["name"];
            $desi = $row["designation"];
            $location = $row["location"];
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
    }/*
    session_start();
    $_SESSION["mail"] = '$email';
    $conn->close();*/
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


 <!-- The Grid -->
 <div class="w3-row-padding">
  
  <!-- Left Column -->
  <div class="w3-third">
  
    <div class="w3-white w3-text-black w3-card-4">
      <div class="w3-display-container">
        <img src="<?php echo $profile; ?>" style="width:100%" alt="Avatar">
        <input type="file" id="file1" name="image" accept="image/*" capture style="display:none"/>
        <img src="img/iphone-camera-icon-150x150.jpg" id="upfile1" style="cursor:pointer" type="submit" />
        <div class="w3-display-bottomleft w3-container w3-text-black">
          <h2><?php echo $name; ?></h2> 
        </div>
      </div>
      <div class="w3-container">
        <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-black"></i><?php echo $desi; ?></p>
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
    </div><br>

  <!-- End Left Column -->
  </div>

  <!-- Right Column -->
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

  <!-- End Right Column -->
  </div>
  
<!-- End Grid -->
</div>
<div>
    <button class="dropbtn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" name="l_update" type="button">UPDATE</button>
</div>
<div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="container">
        <form class="modal-content" action="update_lawyer.php" method="post">
        <hr>
            <img src="<?php echo $profile; ?>" style="width:50px; height:50px;" alt="Avatar">
            <input type="file" name="image_law" id="files" class="hidden"><label for="files">upload profile</label><br>
        name:
          <input type="text" value="<?php echo $name; ?>" name="name" class="setbox">
          <span class = "error"> <?php echo $nameErr; ?></span><br><br>
         Designation: <input type="text" value=<?php echo $desi; ?> name="designation" class="setbox">
          <span class = "error"> <?php echo $desiErr; ?></span><br><br>
          Location:<input type="text" value="<?php echo $location; ?>" name="loct" class="setbox">
          <span class = "error"> <?php echo $locationErr; ?></span><br><br>
          Email ID:<input type="text" value="<?php echo $email; ?>" name="email"  class="setbox">
             <span class = "error"> <?php echo $emailErr; ?></span><br><br>
        Mobile No: <input type="text" value="<?php echo $mobile; ?>" name="mobile"  class="setbox">
             <span class = "error"> <?php echo $mobileErr; ?></span><br><br>
             Office Address:<input type="text" value="<?php echo $address_office; ?>" name="office_add"  class="setbox">
             <span class = "error"> <?php echo $officeAdErr; ?></span><br><br>
             joinig date :<input type="text" value="<?php echo $date; ?>" name="date"  class="setbox">
             <span class = "error"> <?php echo $dateErr; ?></span>  <br><br>
             College Name:<input type="text" value="<?php echo $college; ?>" name="college"  class="setbox">
             <span class = "error"> <?php echo $collegeErr; ?></span><br><br>
             College passing year:<input type="text" value="<?php echo $college_date; ?>" name="college_year"  class="setbox">
             <span class = "error"> <?php echo $collegeYErr; ?></span><br> <br>
             School Name:<input type="text" value="<?php echo $school; ?>" name="school"  class="setbox">
             <span class = "error"> <?php echo $schoolErr; ?></span><br><br>
             School passing year:<input type="text" value="<?php echo $school_date; ?>" name="school_year"  class="setbox">
             <span class = "error"> <?php echo $schoolYErr; ?></span><br><br>
                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <button type="submit" class="search" name="l_update">UPDATE</button>
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
</body>
</html>
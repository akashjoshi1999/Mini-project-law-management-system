<?php 
require "conn.php";
$cnameErr = $cmyemailErr = $clocationErr = $cmobileErr = $cpassErr = "";
$cname = $cmyemail = $clocation = $cmobile = "";

session_start();
    if(isset($_SESSION['email']))
    {
        //echo "<h1>HelloWorld</h1>";
        header("Location: cindex.php");
    }
  if(isset($_POST["csign"]))
{
	  $cpassword_1 = $_POST["cpass"]; 
  $cpassword_2 = $_POST["cpassword"];
    if (empty($_POST["cname"])) 
	{
        $cnameErr = "Name is required";
    }
    else
	{
        $cname = $_POST["cname"]; 
        if (!preg_match("/^[a-zA-Z ]*$/",$cname)) {
          $cnameErr = "Only letters and white space allowed"; 
        }
		else
		{
			if (empty($_POST["cemail"])) 
			{
				$cmyemailErr = "Email is required";
			}
			else
			{
				$cmyemail = test_input($_POST["cemail"]);
				if (!filter_var($cmyemail, FILTER_VALIDATE_EMAIL)) 
				{
					$cmyemailErr = "Invalid email format"; 
				}
				else
				{
					if (empty($_POST["cmobile"])) 
					{
						$cmobileErr = "Enter Valid mobile number";
					}
					else 
					{
						$cmobile = $_POST["cmobile"];
						if (empty($_POST["clocation"]))
						{
							$clocationErr = "enter valid location";
						}
						else
						{
							$clocation = $_POST["clocation"];
							if($cpassword_1!=$cpassword_2)
							{
								$cpassErr="password are not same";
							}
							else
							{
								$sql = "INSERT INTO clientreg ( name, email, mobile, location, password)
								VALUES ('$cname', '$cmyemail', '$cmobile','$clocation','$cpassword_1')";
								$createdb = "record created succesfully";
								if ($conn->query($sql) === TRUE)
								{
                  session_start();
                  $_SESSION["id_email"] = $cmyemail;
									header('Location: cindex.php');
								}
								else 
								{
									echo  "".$conn->error;
								}	
							}
						}
					}
				}					
			}
		}
    }
}
 function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }

  //for lawyer verification
$lnameErr = $lmyemailErr = $llocationErr = $lmobileErr = $lpassErr = "";
$lname = $lmyemail = $llocation = $lmobile = "";

if(isset($_POST["lsign"]))
{
	  $lpassword_1 = $_POST["lpass"]; 
    $lpassword_2 = $_POST["lpassword"];
    if (empty($_POST["lname"])) 
	  {
        $nameErr = "Name is required";
    }
    else
	  {
        $lname = $_POST["lname"]; 
        if (!preg_match("/^[a-zA-Z ]*$/",$lname)) 
        {
          $lnameErr = "Only letters and white space allowed"; 
        }
		    else
		    {
			     if (empty($_POST["lemail"])) 
			      {
				      $lmyemailErr = "Email is required";
			      }
			  else
			  {
				  $lmyemail = test_input($_POST["lemail"]);
				  if (!filter_var($lmyemail, FILTER_VALIDATE_EMAIL)) 
				  {
					  $lmyemailErr = "Invalid email format"; 
				  }
				  else
				  {
					  if (empty($_POST["lmobile"])) 
					  {
						  $lmobileErr = "Enter Valid mobile number";
					  }
					  else 
					  {
						  $lmobile = $_POST["lmobile"];
						  if (empty($_POST["llocation"]))
						  {
							  $llocationErr = "enter valid location";
						  }
						  else
						  {
                $llocation = $_POST["llocation"];
                $target = "img/".basename($_FILES['image']['name']);
                $file = $_FILES['image']['name'];
                
                  if($lpassword_1!=$lpassword_2)
							    {
								    $lpassErr="password are not same";
							    }
							    else
							    {
                   session_start();
                   $_SESSION["l_email"] = '$lmyemail';
                    $sql1 = "INSERT INTO lawyerreg ( name, email, mobile,image, location, password) 
                    VALUES ('$lname', '$lmyemail', '$lmobile','$file','$llocation','$lpassword_1')";
                    if ($conn->query($sql1) === TRUE AND move_uploaded_file($_FILES['image']['tmp_name'],$target))
                        /*{
                          if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
                          {
                            header('Location: lindex.php');
                          }
                          else{
                            echo "image is not selected";
                          }*/
                          {
                            echo "<script>window.top.location='lindex.php'</script>";
                          }
                        
								        else 
								        {
									        echo  "".$conn->error;
                        }
                    
                  }
                } 	
							}
						}
					}
				}					
			}
    }
  
    $co_email = $co_name ="";
    $co_emailErr = $co_nameErr ="";
    if(isset($_POST["contact"]))
    {
      echo "hii";
      $co_comment=test_input($_POST["contact_comments"]);
      if(empty($_POST["contact_name"]))
      {
        $co_nameErr = "name is required";
      }
      else
      {
        $co_name=test_input($_POST["contact_name"]);
        
        if(empty($_POST["contact_email"]))
        {
          $co_emailErr = "email is required";
        }     
        else
        {
           $co_email = test_input($_POST["contact_email"]);
           if (!filter_var($co_email, FILTER_VALIDATE_EMAIL)) 
           {
              $co_emailErr = "Invalid email format"; 
           }
          else
           {
            $sql3 = "INSERT into contact (name,email,comments) VALUES ('$co_name','$co_email','$co_comment')" ;
            $message = "send succesfully";
            if ($conn->query($sql3) === TRUE)
            {
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else 
            {
              echo  "".$conn->error;
            }	
          }
        }
      }
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
    <link rel="stylesheet" href="rel1.css">
	<script src="js/jquery.min.js"></script>
	</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div>
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
				<li><a href="#home">HOME</a></li>
				<li><a href="#about">ABOUT</a></li>
				<li><a href="#register">REGISTER</a></li>
				<li><a href="#login">LOGIN</a></li>
				<li><a href="#contact">CONTACT</a></li>
			</ul>
		</div>
	</div>
</nav>


<div class="jumbotron" id="home" >
  <h1 style="text-align:text-left">Justice delayed</h1> 
  <h1 style="text-align:center">is justice denied</h1>
</div>
</div>

<div id="about" class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-8">
      <h2>About LMS</h2><br>
      <h4>Lawyer Management System software is software designed to manage 
	  a law firm's case and client records, billing and bookkeeping, schedules and appointments,
	  deadlines, computer files and to facilitate any compliance requirements such as with 
	  document retention policies and courts' electronic filing systems.</h4><br>
      <p>Case Management Software, used properly, improves efficiency, provides for conflict checking, 
	  and enables a law office to not have to search for the physical file each time a client 
	  calls with questions, thereby helping to reduce the need for callbacks since the client
	  can get answers on an as needed basis at the time of their inquiry.</p>
      
    </div>
	<div class="col-sm-4">
       <img style="max-width:400px; margin-top: 12px;"
        src="img/lawyer-logo.jpg">
    </div>
  </div>
</div>



<div id="register" class="container-fluid text-center bg-grey">
	<h2>SIGN UP</h2><br>
	<h4>ENTER BELOW DETAILS</h4>
	<div class="row text-center slideanim">
		<div class="col-sm-2">
		</div>
		
		<div class="col-sm-4">
			<div class="panel panel-default text-center">
				<div class="panel-heading"><h1>Client</h1></div>
				<form action="<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
					<div class="panel-body">
						<input type="text" name="cname" placeholder="Enter name"style="text-align:center"><br>
            <span class = "error"> <?php echo $cnameErr; ?></span> <br>
						<input type="email" name="cemail" placeholder="Enter email"style="text-align:center"><br>
            <span class = "error"> <?php echo $cmyemailErr; ?></span>  <br>
						<input type="text" name="cmobile" placeholder="Enter  mobile"style="text-align:center"><br>
            <span class = "error"> <?php echo $cmobileErr; ?></span>  <br>
						<input type="text" name="clocation" placeholder="Enter location"style="text-align:center"><br>
					  <span class = "error"> <?php echo $clocationErr; ?></span>  <br>
						<input type="password" name="cpass" placeholder="Enter password" style="text-align:center"><br>
            <span class = "error"> <?php echo $cpassErr; ?></span>  <br>
						<input type="password" name="cpassword" placeholder="Enter confirm password" style="text-align:center">
					</div>
					<div class="panel-footer">
						<button class="btn btn-lg" name="csign">sign in</button>
					</div>
				</form>
			</div>
		</div>
		
		<div class="col-sm-4">
			<div class="panel panel-default text-center">
				<div class="panel-heading"><h1>Lawyer</h1></div>
				<form action="<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" enctype="multipart/form-data">
					<div class="panel-body">
						<input type="text" name="lname" placeholder="Enter name"style="text-align:center"><br>
            <span class = "error"> <?php echo $lnameErr; ?></span> <br>
						<input type="email" name="lemail" placeholder="Enter email"style="text-align:center"><br>
            <span class = "error"> <?php echo $lmyemailErr; ?></span> <br>
						<input type="text" name="lmobile" placeholder="Enter  mobile"style="text-align:center"><br>
            <span class = "error"> <?php echo $lmobileErr; ?></span> <br>
						upload degree of graduation:<br>
						<input type="file" name="image" id="files" class="hidden" ><label for="files">select file</label><br>
            <!--<span class = "error"> <?//php echo $lfileErr; ?></span>--> 
						<input type="text" name="llocation" placeholder="Enter location"style="text-align:center"><br>
            <span class = "error"> <?php echo $llocationErr; ?></span> <br>
						<input type="password" name="lpass" placeholder="Enter password"style="text-align:center"><br>
            <span class = "error"> <?php echo $lpassErr; ?></span> <br>
						<input type="password" name="lpassword" placeholder="Enter confirm password"style="text-align:center">
					</div>
					<div class="panel-footer">
						<button class="btn btn-lg" name="lsign">sign in</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-2">
		</div>
  </div><br>    
    
  </div>
</div>


<div id="login" class="container-fluid">
  <div class="text-center">
    <h2>LOGIN</h2>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Admin</h1>
        </div>
        
			<form action="alogin.php" method="post">
      <div class="panel-body">
				<input type="text" name="alogemail" placeholder="Email id"style="text-align:center"><br><br>
				<input type="password" name="alogpass" placeholder="Password"style="text-align:center"><br><br>
			  </div>
        <div class="panel-footer">
          <button class="btn btn-lg" name="alogin">log in</button>
        </div>
      </form>
      
        
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Client</h1>
        </div>
			<form action="clogin.php" method="post">
      <div class="panel-body">
				<input type="text" name="clogemail" placeholder="Email id" style="text-align:center"><br><br>
				<input type="password" name="clogpass" placeholder="Password" style="text-align:center"><br><br>
        </div>
        <div class="panel-footer">
          <button class="btn btn-lg" name="clogin">log in</button>
        </div>
      </form>
        
        
      </div>      
    </div>       
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Lawyer</h1>
        </div>
        
			<form action="llogin.php" method="post">
      <div class="panel-body">
				<input type="text" name="llogemail" placeholder="Email id"style="text-align:center"><br><br>
				<input type="password" name="llogpass" placeholder="Password"style="text-align:center"><br><br>
        </div>
        <div class="panel-footer">
          <button class="btn btn-lg" name="llogin">log in</button>
        </div>
      </form>
      </div>      
    </div>    
  </div>
</div>


<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span><a href="https://goo.gl/maps/GdWcVydX79Q2"> V V NAGAR, INDIA</a></p>
      <p><span class="glyphicon glyphicon-phone"></span><a href="tel: +911234567895">(+91) 1234567895</a></p>
      <p><span class="glyphicon glyphicon-envelope"></span><a href="mailto:amj61998gmail.com"> amj61998gmail.com</a></p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <form action="<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="contact_name" placeholder="Name" type="text">
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="contact_email" placeholder="Email" type="email" >
        </div>
      </div>
      <textarea class="form-control" id="comments" name="contact_comments" placeholder="Comment" rows="5"></textarea><br>
      <span class = "error"> <?php echo $co_nameErr; ?></span>
      <span class = "error"> <?php echo $co_emailErr; ?></span>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit" name="contact">Send</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})


</script>

</body>
</html>
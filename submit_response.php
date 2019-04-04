<?php 
    require "conn.php";
    $cnameErr = $cmyemailErr = $cmobileErr = $detailErr="";
    $cname = $cmyemail = $cmobile = $detail ="";
	$id = $_POST["id_transfer"];
if(isset($_POST["res_submit"]))
{
    if (empty($_POST["name"])) 
	{
        $cnameErr = "Name is required";
    }
    else
	{
        $cname = $_POST["name"]; 
        if (!preg_match("/^[a-zA-Z ]*$/",$cname)) {
          $cnameErr = "Only letters and white space allowed"; 
        }
		else
		{
			if (empty($_POST["email"])) 
			{
				$cmyemailErr = "Email is required";
			}
			else
			{
				$cmyemail = test_input($_POST["email"]);
				if (!filter_var($cmyemail, FILTER_VALIDATE_EMAIL)) 
				{
					$cmyemailErr = "Invalid email format"; 
				}
				else
				{
					if (empty($_POST["mobile"])) 
					{
						$cmobileErr = "Enter Valid mobile number";
					}
					else 
					{
						$cmobile = $_POST["mobile"];
                            if(empty($_POST["case_detail"]))
                            {
                                $detailErr = "enter the case details";
                            }
                            else
                            {
                                $detail = $_POST["case_detail"];
                                $sql = "INSERT INTO lawyer_res (name, email, mobile, details, lawyer_email)
								VALUES ('$cname', '$cmyemail', '$cmobile', '$detail', '$id')";
								if ($conn->query($sql) === TRUE)
								{
									#session_start();
									#$_SESSION["email"] = '$cmyemail';
									$prompt = "successfully sent";
									if($prompt)
									header('Location: cindex.php');	
									/*echo '<script language="javascript">';
									echo 'alert("successfully sent")';
									echo '</script>';									
									sleep(5);
									header('Location: cindex.php');*/
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
 function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }
?>
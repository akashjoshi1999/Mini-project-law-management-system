<?php
  require "conn.php";
  session_start();
  $id = $_SESSION["l_email"];
  if(isset($_POST["l_update"]))
{	if (empty($_POST["name"])) 
	{   $nameErr = "Name is required";  }
    else
	{   $law_name = $_POST["name"]; 
        if (!preg_match("/^[a-zA-Z ]*$/",$law_name)) 
        {  $nameErr = "Only letters and white space allowed"; }
		else
		{   if(empty($_POST["designation"]))
			{	$desiErr = "Desiganation is required";}
			else
			{	$designation_in = $_POST["designation"];
				if (!preg_match("/^[a-zA-Z ]*$/",$designation_in)) 
				{  $desiErr = "Only letters and white space allowed"; }
				else
				{  if (empty($_POST["loct"]))
					{	$clocationErr = "enter valid location";	}
					else
					{	$law_location = $_POST["loct"];
						if (empty($_POST["mobile"])) 
						{	$mobileErr = "Enter Valid mobile number";}
								else 
								{	$law_mobile = $_POST["mobile"];
									if (empty($_POST["office_add"])) 
									{   $officeAdErr = "Office Name is required";  }
									else
									{   $offi_name = $_POST["office_add"]; 
										if (!preg_match("/^[a-zA-Z ]*$/",$offi_name)) 
										{  $officeAdErr = "Only letters and white space allowed"; }
										else
										{   if (empty($_POST["date"]))
											{	$dateErr = "enter valid date";	}
											else
											{	$law_date = $_POST["date"];
												if (empty($_POST["college"])) 
												{   $collegeErr = "College Name is required";  }
												else
												{   $law_college = $_POST["college"]; 
													if (!preg_match("/^[a-zA-Z ]*$/",$law_college)) 
													{  $collegeErr = "Only letters and white space allowed"; }
													else
													{   if (empty($_POST["college_year"]))
														{	$collegeYErr = "enter valid year";	}
														else
														{	$law_college_year = $_POST["college_year"];
															if (empty($_POST["school"])) 
															{   $schoolErr = "school Name is required";  }
																else
																{   $law_school_name = $_POST["school"]; 
																	if (!preg_match("/^[a-zA-Z ]*$/",$law_school_name)) 
																	{  $schoolErr = "Only letters and white space allowed"; }
																	else
																	{   if (empty($_POST["school_year"]))
																		{	$schoolYErr = "enter valid passing year";	}
																		else
																		{	
																			$law_school_year = $_POST["school_year"];
																			$sql1 = "UPDATE search_lawyer SET designation='$designation_in',
																			location ='$law_location',mobile='$law_mobile',
																			office='$offi_name',date='$law_date',
																			college='$law_college',college_date='$law_college_year',
																			school='$law_school_name',school_date='$law_school_year' WHERE email = '$id'";
																			if ($conn->query($sql1))
																			{ echo "<script>window.top.location='law_profile.php'</script>";
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
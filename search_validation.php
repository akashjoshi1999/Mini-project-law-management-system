<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,intial-scale=1">
    <meta http-equiv="X-UA-Comptible" content="IE=edge">
    <title>LMS</title>
  <link rel="shortcut icon" type="image/png" href="img/scales-of-justice-icon-512-244111.png">
    <style>
    img{
        width:33%;
        height:300px;
    }
    button{
        background:#14a020;
    }
    table, td {
  border: 1px solid black;
}
    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="background-color:#818181">

<?php
    require "conn.php";
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $locationErr=$nameErr = "";
    
    $s_name=$s_location=$s_add=$s_experience="";
    $s_expert = $_POST["expert"];
    $s_profession = $_POST["law"];
if(isset($_POST["sdata"]))
{
    if(empty($_POST["name"]))
    {
        
        if(empty($_POST["location"]))
        {
            $locationErr = $nameErr = "enter location or name of lawyer eitrer botr details";
        }
        else
        {
            
			$s_location = test_input($_POST["location"]);
			$sql = "SELECT * FROM search_lawyer WHERE location = '$s_location' OR experience='$s_expert' OR law = '$s_profession'";
            $res = $conn->query($sql);
            echo "<h2>Searched Lawyer</h2>";
            if ($res->num_rows > 0)
            {
                echo "<div class='container-fluid'>";
                echo "<div class='row'>";
                    while($row = $res->fetch_assoc()) { 
                        echo "<form action='L_details.php' method='post'>";
                        echo "<table class='table table-striped'>";
                        echo "<tr><td>";
                        echo "<img src=";
                        echo 'img/sapan-r-patel-advocate.jpg'.">";
                        echo "</td><td><table>";
                        echo "<tr><td><br><br>";
                        echo "Email ID:";
                        echo "<input type='text'";
                        echo "value=".$row["email"]."></td></tr>";
                        echo "<input type='hidden'";
                        echo "value=".$row["email"];
                        echo " name='ID_NO'".">";
                        echo "<tr><td>Name :";
                        echo "<input type='text'";
                        echo "value=".$row["name"];
                        echo "></td></tr>";
                        echo "<tr><td>Location :";
                        echo "<input type='text'";
                        echo "value=".$row["location"];
                        echo "></td></tr>";
                        echo "<tr><td>Professionality :";
                        echo "<input type='text'";
                        echo "value=".$row["law"];
                        echo "></td></tr>";
                        echo "<tr><td>Experience :";
                        echo "<input type='text'";
                        echo "value=".$row["experience"];
                        echo "></td></tr>";
                        echo "</table></td><td><br><br><br>";
                            echo "<button class='btn btn-lg'";
                            echo "name='L_details'>Enquire now</button>";
                        echo "</td></tr>";
                        echo "</table></form>";
                    }
                echo "</div>";
                echo "</div>";
            }
            else
			{
                echo "No details found, please check your details and try again";
            }
            $conn->close();
        }
    }
    else
    {
        if(empty($_POST["location"]))
        {
            $loactionErr = $nameErr = "enter location or name of lawyer eitrer botr details";
            $s_name = test_input($_POST["name"]);
            $sql = "SELECT * FROM search_lawyer WHERE name = '$s_name' OR experience='$s_expert' OR law = '$s_profession'";
            $res = $conn->query($sql);
            echo "<h2>Searched Lawyer</h2>";
            if ($res->num_rows > 0)
            {
                echo "<div class='container-fluid'>";
                echo "<div class='row'>";
                    while($row = $res->fetch_assoc()) {
                        
                        echo "<form action='L_details.php' method='post'>";
                        echo "<table class='table table-striped'>";
                        echo "<tr><td><br><br>";
                        echo "<img src=";
                        echo 'img/sapan-r-patel-advocate.jpg'.">";
                        echo "</td><td><table>";
                        echo "<tr><td>";
                        echo "Email ID:";
                        echo "<input type='text' value=".$row["email"]."></td></tr>";
                        echo "<input type='hidden' ";
                        echo "value=".$row["email"];
                        echo " name='ID_NO'"."><br>";
                        echo "<tr><td>Name :";
                        echo "<input type='text' ";
                        echo "value=".$row["name"];
                        echo "></td></tr>";
                        echo "<tr><td>Location :";
                        echo "<input type='text' ";
                        echo "value=".$row["location"];
                        echo "></td></tr>";
                        echo "<tr><td>Professionality :";
                        echo "<input type='text' ";
                        echo "value=".$row["law"];
                        echo "></td></tr>";
                        echo "<tr><td>Experience :";
                        echo "<input type='text'";
                        echo "value=".$row["experience"];
                        echo "></td></tr>";
                        echo "</table></td><td><br><br><br>";
                            echo "<button class='btn btn-lg'";
                            echo "name='L_details'>Enquire now</button>";
                        echo "</td></tr>";
                        echo "</table></form>";
                    }
                echo "</div>";
                echo "</div>";
            }
            else
			{
                echo "No details found, please check your details and try again";
            }
            $conn->close();
        }
		else
        {
            $s_name = test_input($_POST["name"]);
            $s_location = test_input($_POST["location"]);
            $sql = "SELECT * FROM search_lawyer WHERE location = '$s_location' OR experience='$s_expert' OR name='$s_name' OR law = '$s_profession'";
            $res = $conn->query($sql);
            echo "<h2>Searched Lawyer</h2>";
            if($res){
                
                if ($res->num_rows > 0)
            {
                echo "<div class='container-fluid'>";
                echo "<div class='row'>";
                    while($row = $res->fetch_assoc()) {
                        
                        echo "<form action='L_details.php' method='post'>";
                        echo "<table class='table table-striped'>";
                        echo "<tr><td><br><br>";
                        echo "<img src=";
                        echo 'img/sapan-r-patel-advocate.jpg'.">";
                        echo "</td><td><table>";
                        echo "<tr><td>";
                        echo "Email ID:";
                        echo "<input type='text'";
                        echo "value=".$row["email"]."></td></tr>";
                        echo "<input type='hidden'";
                        echo "value=".$row["email"];
                        echo " name='ID_NO'"."><br><br>";
                        echo "<tr><td>Name :";
                        echo "<input type='text'";
                        echo "value=".$row["name"];
                        echo "></td></tr>";
                        echo "<tr><td>Location :";
                        echo "<input type='text'";
                        echo "value=".$row["location"];
                        echo "></td></tr>";
                        echo "<tr><td>Professionality :";
                        echo "<input type='text'";
                        echo "value=".$row["law"];
                        echo "></td></tr>";
                        echo "<tr><td>Experience :";
                        echo "<input type='text'";
                        echo "value=".$row["experience"];
                        echo "></td></tr>";
                        echo "</table></td><td><br><br><br>";
                            echo "<button class='btn btn-lg'";
                            echo "name='L_details'>Enquire now</button>";
                        echo "</td></tr>";
                        echo "</table></form>";
                    }
                echo "</div>";
                echo "</div>";
            }
            else
			{
                echo "No details found, please check your details and try again";
            }
        }
            else{
                echo "".$res;
            }
                $conn->close();
            
        }
    }
}
echo "<br><br>".$row["name"];
?>
</html>
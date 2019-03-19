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
			$sql = "SELECT * FROM search_lawyer WHERE location = '$s_location' AND experience='$s_expert' AND law = '$s_profession'";
            $res = $conn->query($sql);
            echo "<h2>Searched Lawyer</h2>";
            if ($res->num_rows > 0)
            {
                echo "<div class='container-fluid'>";
                echo "<div class='row'>";
                    while($row = $res->fetch_assoc()) { 
                        echo "<form action='L_details.php' metrod='post'>";
                        echo "<table class='table table-striped'>";
                        echo "<tr><td><div class='col-sm-4'>";
                        echo "<img src=";
                        echo $row["photo"].">";
                        echo "</div></td></tr>";
                        echo "<tr><td>";
                        echo "<div class='col-sm-5'>";
                        echo "ID No. :";
                        echo "<input type='text'";
                        echo "value=".$row["id"];
                        echo "><br><br>";
                        echo "<input type='hidden'";
                        echo "value=".$row["id"];
                        echo "name='ID_NO'".">";
                        echo "Name :";
                        echo "<input type='text'";
                        echo "value=".$row["name"];
                        echo "><br><br>";
                        echo "Location :";
                        echo "<input type='text'";
                        echo "value=".$row["location"];
                        echo "><br><br>";
                        echo "Professionality :";
                        echo "<input type='text'";
                        echo "value=".$row["law"];
                        echo "><br><br>";
                        echo "Experience :";
                        echo "<input type='text'";
                        echo "value=".$row["experience"];
                        echo "><br>";
                        echo "</div></td></tr><tr><td>";
                        echo "<div class='col-sm-3'>";
                            echo "<button class='btn btn-lg'";
                            echo "name='L_details'>Enquire now</button>";
                        echo "</div></td></tr>";
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
            $sql = "SELECT * FROM search_lawyer WHERE name = '$s_name' AND experience='$s_expert' AND law = '$s_profession'";
            $res = $conn->query($sql);
            echo "<h2>Searched Lawyer</h2>";
            if ($res->num_rows > 0)
            {
                echo "<div class='container-fluid'>";
                echo "<div class='row'>";
                    while($row = $res->fetch_assoc()) {
                        
                        echo "<form action='L_details.php' metrod='post'>";
                        echo "<table class='table table-striped'>";
                        echo "<tr><td><div class='col-sm-4'>";
                        echo "<img src=";
                        echo $row["photo"].">";
                        echo "</div></td></tr>";
                        echo "<tr><td>";
                        echo "<div class='col-sm-5'>";
                        echo "ID No. :";
                        echo "<input type='text'";
                        echo "value=".$row["id"];
                        echo "><br><br>";
                        echo "<input type='hidden'";
                        echo "value=".$row["id"];
                        echo "name='ID_NO'".">";
                        echo "Name :";
                        echo "<input type='text'";
                        echo "value=".$row["name"];
                        echo "><br><br>";
                        echo "Location :";
                        echo "<input type='text'";
                        echo "value=".$row["location"];
                        echo "><br><br>";
                        echo "Professionality :";
                        echo "<input type='text'";
                        echo "value=".$row["law"];
                        echo "><br><br>";
                        echo "Experience :";
                        echo "<input type='text'";
                        echo "value=".$row["experience"];
                        echo "><br>";
                        echo "</div></td></tr><tr><td>";
                        echo "<div class='col-sm-3'>";
                            echo "<button class='btn btn-lg'";
                            echo "name='L_details'>Enquire now</button>";
                        echo "</div></td></tr>";
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
            $sql = "SELECT * FROM search_lawyer WHERE location = '$s_location' AND experience='$s_expert' AND name='$s_name' AND law = '$s_profession'";
            $res = $conn->query($sql);
            echo "<h2>Searched Lawyer</h2>";
            if($res){
                
                if ($res->num_rows > 0)
            {
                echo "<div class='container-fluid'>";
                echo "<div class='row'>";
                    while($row = $res->fetch_assoc()) {
                        
                        echo "<form action='L_details.php' metrod='post'>";
                        echo "<table class='table table-striped'>";
                        echo "<tr><td><div class='col-sm-4'>";
                        echo "<img src=";
                        echo $row["photo"].">";
                        echo "</div></td></tr>";
                        echo "<tr><td>";
                        echo "<div class='col-sm-5'>";
                        echo "ID No. :";
                        echo "<input type='text'";
                        echo "value=".$row["id"];
                        echo "><br><br>";
                        echo "<input type='hidden'";
                        echo "value=".$row["id"];
                        echo "name='ID_NO'".">";
                        echo "Name :";
                        echo "<input type='text'";
                        echo "value=".$row["name"];
                        echo "><br><br>";
                        echo "Location :";
                        echo "<input type='text'";
                        echo "value=".$row["location"];
                        echo "><br><br>";
                        echo "Professionality :";
                        echo "<input type='text'";
                        echo "value=".$row["law"];
                        echo "><br><br>";
                        echo "Experience :";
                        echo "<input type='text'";
                        echo "value=".$row["experience"];
                        echo "><br>";
                        echo "</div></td></tr><tr><td>";
                        echo "<div class='col-sm-3'>";
                            echo "<button class='btn btn-lg'";
                            echo "name='L_details'>Enquire now</button>";
                        echo "</div></td></tr>";
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
?>
</html>
<?php
    require "conn.php";
    $pass_1 = $_POST["llogpass"];
    if(isset($_POST["llogin"]))
    {
        $id = test_input($_POST["llogemail"]);
		if (!filter_var($id, FILTER_VALIDATE_EMAIL)) 
		{
			echo "invalid email";
		}
		else
		{
            $sql = "SELECT password FROM lawyerreg WHERE email = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc())
                {
                    $pass = $row["password"];
                    if($pass == $pass_1)
                    { 
                        session_start();
                        $_SESSION["llogesmil"]=$id;
                        header('Location: lindex.php');
                    }
                }
            }
            else
            {
                echo "0 results";
            }
            $conn->close();
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
?>
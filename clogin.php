<?php
    require "conn.php";
    $pass_1 = $_POST["clogpass"];
    if(isset($_POST["clogin"]))
    {
        $id = test_input($_POST["clogemail"]);
		if (!filter_var($id, FILTER_VALIDATE_EMAIL)) 
		{
			echo "invalid email";
		}
		else
		{
            $sql = "SELECT password FROM clientreg WHERE email = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc())
                {
                    $pass = $row["password"];
                    if($pass == $pass_1)
                    {
                        session_start();
                        $_SESSION["email"]=2;
                        header('Location: cindex.php');
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
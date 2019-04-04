<?php
$conn = mysqli_connect("localhost","root","","test");
$lawyer_email = $_GET["lawyer_email"];
$query = "Select client_email from payment where lawyer_email like '$lawyer_email'";
$result = $conn->query($query);
while($row = mysqli_fetch_array($result))
{
	echo "<a href='lawyer2.php?lawyer_email=$lawyer_email&client_email=$row[0]'>$row[0]</a>";
}
?>
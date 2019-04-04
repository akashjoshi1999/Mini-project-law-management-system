<?php
$conn = mysqli_connect("localhost","root","","test");
?>
<form method="POST">
Enter lawyer email: <input type="text" name="lawyer_email"/><br/>
Enter client email: <input type="text" name="client_email"/><br/>
Enter case details: <input type="text" name="case_details"/><br/>
<input type="submit" name="submit" value="submit"/>
</form>
<?php
if(isset($_POST["submit"])){
	$lawyer_email=$_POST["lawyer_email"];
	$client_email=$_POST["client_email"];
	$case_details=$_POST["case_details"];
	$query = "Insert into payment(lawyer_email, client_email, case_details) values('$lawyer_email', '$client_email', '$case_details')";
	$conn -> query($query);
	echo "REQUEST SUBMITTED";
}
?>
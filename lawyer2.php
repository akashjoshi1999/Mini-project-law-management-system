<?php
$conn = mysqli_connect("localhost","root","","test");
if(!isset($_POST["submit"])){
$lawyer_email = $_GET["lawyer_email"];
$client_email = $_GET["client_email"];
$query = "Select case_details from payment where lawyer_email like '$lawyer_email' and client_email like '$client_email'";
$result = $conn->query($query);
$row = mysqli_fetch_array($result);
echo "CASE DETAILS: ";
echo $row[0];
}
?>
<form method="POST">
<input type="hidden" name="lawyer_email" value="<?php echo $lawyer_email ?>"  />
<input type="hidden" name="client_email" value="<?php echo $client_email ?>"  />
Enter quotation: <input type="text" name="amount"/>
<input type="submit" name="submit" value="submit"/>
</form>
<?php
if(isset($_POST["submit"])){
	$client_email = $_POST["client_email"];
	$lawyer_email = $_POST["lawyer_email"];
	$amount = $_POST["amount"];
	$query = "Update payment set payment=$amount where lawyer_email like '$lawyer_email' and client_email like '$client_email'";
	$conn->query($query);
	header("Location:submitted.php");
}
?>

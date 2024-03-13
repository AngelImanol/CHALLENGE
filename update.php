<?php
// include database connection file
include "config.php";

//Fungsi untuk mencegah inputan karakter yang tidak sesuai
function input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$name = input($_POST["name"]);
	$username = input($_POST["username"]);
	$email = input($_POST["email"]);
	$phone = input($_POST["phone"]);
	$jobs = input($_POST["jobs"]);
		
	// update user data
	$result = mysqli_query($conn, "UPDATE users SET name='$name',username='$username',email='$email',phone='$phone',jobs='$jobs' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$name = $user_data['name'];
	$email = $user_data['email'];
	$mobile = $user_data['mobile'];
}
?>
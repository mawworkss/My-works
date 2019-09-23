<?php 
session_start();
$name = "";
$surname = "";
$email = "";
$id = 0;
$edit_state = false;

$db = mysqli_connect('localhost','root','', 'users1');
if (isset($_POST['save'])) {
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];

	$query = "INSERT INTO info (name,surname,email) VALUES ('$name', '$surname', '$email')"; 
	mysqli_query($db, $query);
	$_SESSION['msg'] = "Saved";
    header('Location: index.php'); 

}

if (isset($_POST['update'])) {
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$surname = mysqli_real_escape_string($db, $_POST['surname']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$id = mysqli_real_escape_string($db, $_POST['id']);

	mysqli_query($db, "UPDATE info SET name='$name', surname='$surname', email='$email' WHERE id = '$id'");
	$_SESSION['msg'] = "Updated";
	header('Location: index.php');


  

}
if(isset($_GET['del'])){
	$id = $_GET['del'];
	mysqli_query($db, "DELETE from info WHERE id=$id");
	$_SESSION['msg'] = "Deleted";
	header('Location: index.php');

}


	$results = mysqli_query($db, "SELECT * from info");
?>
<?php include('server.php'); 

if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$edit_state = true;

	$rec = mysqli_query($db, "SELECT * from info where id = $id");
	$record = mysqli_fetch_array($rec);
	$name = $record['name'];
	$surname = $record['surname'];
	$email = $record['email'];
	$id = $record['id'];

}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php if(isset($_SESSION['msg'])): ?>
		<div class="msg">
			<?php 
				echo  $_SESSION['msg'];
				unset($_SESSION['msg']);
			?>
		</div>
	<?php endif ?>

	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Surname</th>
				<th>Email</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['surname']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td>
						<a style="text-decoration: none; padding: 2px 5px; background: #2E8B57;	color: white; border-radius: 3px;" href="index.php?edit=<?php echo $row['id']; ?> ">Edit</a>
					</td>
					<td>
						<a style="text-decoration: none; padding: 2px 5px; background: #800000;	color: white; border-radius: 3px;" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
			<tr>
				<td>Saltanat</td>
				<td>Makhatayeva</td>
				<td>Makhatayeva@gmail.com</td>
				<td>
					<a style="text-decoration: none; padding: 2px 5px; background: #2E8B57;	color: white; border-radius: 3px;" href="#">Edit</a>
				</td>
				<td>
					<a style="text-decoration: none; padding: 2px 5px; background: #800000;	color: white; border-radius: 3px;" href="#">Delete</a>
				</td>
			</tr>
		</tbody>
	</table>
	<form method="post" action="server.php">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Surname</label>
			<input type="text" name="surname" value="<?php echo $surname; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		
		<div class="input-group">
			<?php if($edit_state == false): ?>
				<button type="submit" name="save" class="btn">Save</button>
			<?php else: ?>
				<button type="submit" name="update" class="btn">Update</button>
			<?php endif ?>
		</div>
	</form>

</body>
</html>
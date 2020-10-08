<?php
	include "dbconnect.php";
	$ids = $_GET["id"];
	$showquery = "SELECT * FROM `note` WHERE `s.no` = $ids";
	$showdata = mysqli_query($conn,$showquery);
	$arrdata = mysqli_fetch_array($showdata);

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include "dbconnect.php";
		$title = $_POST["title"];
		$description = $_POST["description"];
		$sql = "UPDATE `note` SET `title` = $title , `description` = $description WHERE `note`.`s.no` = $ids";
		$result = mysqli_query($conn,$sql);
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>welcome</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<h2>Welcome to I-NOTES</h2>
		<div class="wrapper">
			<form action="/crud/crud.php" method="POST">
				<label for="Title" class="label1">Title :
					<textarea name="title" id="Title" cols="40" rows="2"><?php echo $arrdata['title'];?></textarea>
				</label>
				<label for="Desc">Description :
					<textarea name="description" id="Desc" cols="40" rows="5"><?php echo $arrdata['description'];?></textarea>
				</label>
				<button type="submit" class="btn">Update Notes</button>
			</form>
		</div>
</body>
</html>
<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include "dbconnect.php";
		$title = $_POST["title"];
		$description = $_POST["description"];
		$sql = "INSERT INTO `note` (`title`, `description`, `data`) VALUES ('$title', '$description', current_timestamp())";
		$result = mysqli_query($conn,$sql);
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>I-Notes</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<h2>Welcome to I-NOTES</h2>
		<div class="wrapper">
			<form action="/crud/crud.php" method="POST">
				<label for="Title" class="label1">Title :
					<textarea name="title" id="Title" cols="40" rows="2"></textarea>
				</label>
				<label for="Desc">Description :
					<textarea name="description" id="Desc" cols="40" rows="5"></textarea>
				</label>
				<button type="submit" class="btn">Add Notes</button>
			</form>
		</div>
		<section class="tab">
			<table>
			<tr>
				<th>S.No</th>
				<th>Title</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
			<?php
				include "dbconnect.php";
				$sql = "Select * from note";
				$result = mysqli_query($conn,$sql);
				$num = mysqli_num_rows($result);
				$i=1;
				while($row = mysqli_fetch_assoc($result))
				{
					?>
					<tr>
						<td><?php echo $i; $i++;?></td>
						<td><?php echo $row['title'];?></td>
						<td><?php echo $row['description'];?></td>
						<td><a class="col1" href="update.php?id=<?php echo $row['s.no'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a class="col2" href="delete.php?id=<?php echo $row['s.no'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>
					<?php		
				}
			?>
		</table>
		</section>
	</body>
</html>
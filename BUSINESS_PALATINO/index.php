<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1 style="color: red;">Welcome To Explore Your Beauty Destination. Add a Store!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">Store Name</label> 
			<input type="text" name="store_name">
		</p>
		<p>
			<label for="locations">Location</label> 
			<input type="text" name="locations">
		</p>
		<p>
			<label for="contactName">Contact Name</label> 
			<input type="text" name="contact_name">
		</p>
			<input type="submit" name="insertStoreBtn">
		</p>
	</form>
	<?php $getAllStore = getAllStore($pdo); ?>
	<?php foreach ($getAllStore as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>Store ID: <?php echo $row['store_id']; ?></h3>
		<h3>Store Name: <?php echo $row['store_name']; ?></h3>
		<h3>Location: <?php echo $row['locations']; ?></h3>
		<h3>Contact Name: <?php echo $row['contact_name']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>

		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewcustomers.php?store_id=<?php echo $row['store_id']; ?>">View Customer</a>
			<a href="editstores.php?store_id=<?php echo $row['store_id']; ?>">Edit</a>
			<a href="deletestores.php?store_id=<?php echo $row['store_id']; ?>">Delete</a>
		</div>

	</div> 
	<?php } ?>
</body>
</html>
<?php  

require 'config/config.php';
require 'models/Database.php';

$id = $_POST["id"] ?? null;
$label = $_POST["label"] ?? null;
$type = $_POST["type"] ?? null;

if ($id && $label && $type) {

	$db = new Database($dsn);
	$db->update($label, $type, $id);

}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Update</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="favicon.ico">
</head>

<body id="body">

	<?php include "view/header.php";?>

	<?php include "view/links.php";?>

	<div class="search">
		<h1>Update row</h1>
		<form action="update.php" method="post">
			<input type="text" name="id" placeholder="Id...">
			<input type="text" name="label" placeholder="Label...">
			<input type="text" name="type" placeholder="Type...">
			<input type="submit" value="Update">
		</form>
	</div>


	<?php include "view/footer.php";?>

	<img id="duck" class="duck" src="img/duck.png" alt="duck image">

	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
<?php  

require 'config/config.php';
require 'models/Database.php';

$id = $_POST["id"] ?? null;

if ($id) {

	$db = new Database($dsn);
	$db->delete($id);

}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DELTE</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="favicon.ico">
</head>

<body id="body">

	<?php include "view/header.php";?>

	<?php include "view/links.php";?>

	<div class="search">
		<h1>Delete row</h1>
		<form action="delete.php" method="post">
			<input type="text" name="id" placeholder="Id...">
			<input type="submit" value="Delete">
		</form>
	</div>


	<?php include "view/footer.php";?>

	<img id="duck" class="duck" src="img/duck.png" alt="duck image">

	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
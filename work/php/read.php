<?php  

require 'config/config.php';
require 'models/Database.php';

$db = new Database($dsn);
$res = $db->read();

?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Read</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="favicon.ico">
</head>

<body id="body">

	<?php include "view/header.php";?>


	<div class="result">
		<h1>Read table</h1>
		<table>
			<tr>
				<th>Id</th>
				<th>Label</th>
				<th>Type</th>
			</tr>

			<?php foreach ($res as $row) : ?>
				<tr>
					<td><?= $row["id"] ?></td>
					<td><?=	$row["label"] ?></td>
					<td><?= $row["type"] ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>

	<?php include "view/footer.php";?>

	<img id="duck" class="duck" src="img/duck.png" alt="duck image">

	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
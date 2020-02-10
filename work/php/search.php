<?php  

require 'config/config.php';
require 'models/Database.php';

$input = $_GET["search"] ?? null;

if ($input) {

	$db = new Database($dsn);
	$res = $db->search($input);
}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Search</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="favicon.ico">
</head>

<body id="body">

	<?php include "view/header.php";?>

	<?php include "view/links.php";?>

	<div class="search">
		<h1>Search database</h1>
		<form action="search.php" method="get">
			<input type="text" name="search"><input type="submit" value="Search">
		</form>
	</div>

	<div class="result">
		<?php if ($input) : ?> 

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
		<?php endif; ?>
	</div>

	<?php include "view/footer.php";?>

	<img id="duck" class="duck" src="img/duck.png" alt="duck image">

	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
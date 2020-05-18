<?php
/*
var_dump (ini_get("error_reporting"));
var_dump (E_ALL);
error_reporting (E_ALL);
*/

require "config.php";


$stm = $pdo->query("SELECT * FROM books");

$rows = $stm->fetchAll();


$books = $pdo->query("SELECT * FROM books")
	     ->fetchAll();

?>
<table>
	<tr>
		<th>jmeno</th>
		<th>evid. number</th>
	</tr>
	<?php foreach ($books as $book) { ?>
	<tr>
		<td><?= $book["name"] ?></td>
		<td><?= $book["rec_number"] ?></td>
	</tr>
	<?php } ?>
</table>




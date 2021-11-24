<html>
<head>
<title>List Notes</title>
<link rel='stylesheet' href="css/standard.css">
<link rel='stylesheet' href="css/tac.css">
<link rel='stylesheet' href="css/jquery-ui.css">

</head>
<body>
<br><h3><center>List of ALL notes</center></h3>

<?php
$database="db/notes-db";
$db = new SQLite3($database);

$result = $db->query('SELECT * FROM notes ORDER BY id') or die('Query failed');
?>
<center>
<table border=1>
	<tr><th>Note #</th><th> Vendor </th><th> Component </th><th> Title </th></tr>
<?php

$id=0;

while ($row = $result->fetchArray())
{
  echo "<tr><td><a href=list_note_number.php?id={$row['id']}>{$row['id']}</a></td><td>{$row['Vendor']}</td><td>{$row['Component']}</td><td>{$row['Title']}</td></tr>";
}

?>

</table>
<br>
<td><form  action=index.php method=POST>
<input type=submit value=Home></form>
<br><br>
</center>
</body>
</html>

<html>
<head>
<title>Admin List Notes</title>
<link rel='stylesheet' href="../css/standard.css">
<link rel='stylesheet' href="../css/tac.css">
<link rel='stylesheet' href="../css/jquery-ui.css">
</head>
<center>
<br><h2>List of ALL notes on <font color=red>deleted</font> table</h2>

<?php
$database="../db/notes-db";
$db = new SQLite3($database);

$result = $db->query('SELECT * FROM deleted ORDER by id') or die('Query failed');
?>
<table border=1>
	<tr><th>Note #</th><th> Vendor </th><th> Component </th><th> Title </th></tr>
<?php
while ($row = $result->fetchArray())
{
  echo "<tr><td><a target=_blank href=list_note_number.php?Table=deleted&id={$row['id']}>{$row['id']}</a></td><td>{$row['Vendor']}</td><td>{$row['Component']}</td><td>{$row['Title']}</td></tr>";
}


?>
</table>
<br>
<input type="button" value="Close Window" onclick="self.close()">
</center>
</body>
</html>

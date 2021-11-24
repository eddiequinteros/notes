<html>
<head>
<title>Note Deletion</title>
<link rel='stylesheet' href="../css/standard.css">
<link rel='stylesheet' href="../css/tac.css">
<link rel='stylesheet' href="../css/jquery-ui.css">
</head>
<center>

<?php
$id=$_POST['id'];
$database="../db/notes-db";
$db = new SQLite3($database);

$myquery="DELETE FROM deleted WHERE id = '$id'";
$result = $db->query($myquery) or die('Query failed');

$myquery ="INSERT INTO deleted_note_number VALUES ('$id')";
$result = $db->query($myquery) or die('Failed to save the note number into the deleted_note_number table');

print("<br><h3>Note $id has been deleted from <font color=red>deleted</font> table</h3>");
?>
<form  action=index.php method=POST>
<input type=submit value=Home></form>

</center>
</body>
</html>

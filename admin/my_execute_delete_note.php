<html>
<head>
<title>Admin Note Deletion</title>
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

print("<br><h3>Note $id has been deleted from <font color=red>deleted</font> table</h3>");
?>

<input type="button" value="Close this window" onclick="self.close()">
</center>
</body>
</html>

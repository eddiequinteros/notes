<html>
<head>
<title>Delete Note from deleted table</title>
<link rel='stylesheet' href="../css/standard.css">
<link rel='stylesheet' href="../css/tac.css">
<link rel='stylesheet' href="../css/jquery-ui.css">
</head>
<center>
<?php
$id=$_POST['id'];

$database="../db/notes-db";
$db = new SQLite3($database);

$myquery="SELECT * FROM deleted WHERE id = '$id'";
$result = $db->query($myquery) or die('Query failed');
$howmany=count($result->fetchArray());

if($howmany > 3)
{
  print("<br><h3>Are you sure you want to delete note $id</h3>");
?>
<table>
<tr>
<td><form  action="my_execute_delete_note.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="submit" value="YES"></td>
</form></td>
<td><form  action="cancel_delete_note.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="submit" value="NO"></td>
</form></td>
</tr>
</table>
<?php
}
else
{
  echo "<br><h3>Note $id does not exist</h3><br>";
?>
 <input type="button" value="Close Window" onclick="self.close()">
<?php
}
?>
</center>
</body>
</html>

<html>
<head>
<title>Restore a Note</title>
<link rel='stylesheet' href="../css/standard.css">
<link rel='stylesheet' href="../css/tac.css">
<link rel='stylesheet' href="../css/jquery-ui.css">
</head>
<center>
<?php
$id=$_POST['id'];
$Table=$_POST['Table'];

$database="../db/notes-db";
$db = new SQLite3($database);

switch($Table)
{
	case "notes":
		$Table_out="notes";
		$Table_in="deleted";
		$myquery="SELECT * FROM notes WHERE id = '$id'";
		$result = $db->query($myquery) or die('Failed to get note from notes');
		while ($row = $result->fetchArray())
		{
        		$id="{$row['id']}";
        		$Date="{$row['Date']}";
        		$Email="{$row['Email']}";
        		$Vendor="{$row['Vendor']}";
        		$Component="{$row['Component']}";
        		$Title="{$row['Title']}";
        		$Description="{$row['Description']}";
		}

		$myquery1 ="INSERT INTO deleted VALUES ('$id', '$Date', '$Email', '$Vendor', '$Component', '$Title', '$Description')";
		$myquery2="DELETE FROM notes WHERE id = '$id'";
		break;

	case "deleted":
		$Table_out="deleted";
		$Table_in="notes";
		$myquery="SELECT * FROM deleted WHERE id = '$id'";
		$result = $db->query($myquery) or die('Failed to get note from deleted');
		while ($row = $result->fetchArray())
		{
        		$id="{$row['id']}";
        		$Date="{$row['Date']}";
        		$Email="{$row['Email']}";
        		$Vendor="{$row['Vendor']}";
        		$Component="{$row['Component']}";
        		$Title="{$row['Title']}";
        		$Description="{$row['Description']}";
		}

		$myquery1 ="INSERT INTO notes VALUES ('$id', '$Date', '$Email', '$Vendor', '$Component', '$Title', '$Description')";
		$myquery2="DELETE FROM deleted WHERE id = '$id'";
		break;
}


$result=$db->query($myquery1) or die('Note move operation failed');

$result = $db->query($myquery2) or die('Note deletion operation failed');

print("<br><h3>Note <a href=list_note_number.php?Table=$Table_in&id=$id>$id</a> has been moved from $Table_out into $Table_in</h3>");

?>
<input type="button" value="Close this window" onclick="self.close()">
</center>
</body>
</html>


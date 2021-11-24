<html>
<head>
<title>Execute Note Deletion</title>
<link rel='stylesheet' href="css/standard.css">
<link rel='stylesheet' href="css/tac.css">
<link rel='stylesheet' href="css/jquery-ui.css">

</head>
<body>
<center>

<?php
$id=$_POST['id'];
$database="db/notes-db";
$db = new SQLite3($database);

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

$result=$db->query($myquery1) or die('Note move to deleted operation failed');


$myquery2="DELETE FROM notes WHERE id = '$id'";


$myquery="DELETE FROM notes WHERE id = '$id'";
$result = $db->query($myquery) or die('Deletion failed');

print("<br><h3>Note $id has been deleted, $Email will receive an email notification</h3>");
$email_cmd="mail -s \"Note $id has been deleted\" $Email < note_deleted_email.txt";

exec($email_cmd);
echo "<input type=button value=\"Close Window\" onclick=self.close()>";

?>

</center>
</body>
</html>

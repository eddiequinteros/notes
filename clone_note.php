<html>
<head>
<title>Clone Note</title>
<link rel='stylesheet' href="css/standard.css">
<link rel='stylesheet' href="css/tac.css">
<link rel='stylesheet' href="css/jquery-ui.css">

<script language="javascript" type="text/javascript">
function change_text() {
        var newdesc = document.myform.Description.value;
        document.myform.Description.value = newtdesc;
}
</script>

</head>
<body>
<center>
<?php
$id=$_POST['id'];

$database="db/notes-db";
$db = new SQLite3($database);
$myquery="SELECT * FROM notes WHERE id = '$id'";
$result = $db->query($myquery) or die('Query failed');
while ($row = $result->fetchArray())
{
	$Email="{$row['Email']}";
	$Date="{$row['Date']}";
	$Vendor="{$row['Vendor']}";
	$Component="{$row['Component']}";
	$Title="{$row['Title']}";
	$Description="{$row['Description']}";
	print("<h3>Cloning note # $id</h3>");
	print("Fields with <font color=red> * </font> must be filled"); 
}
if(strcmp("", $Component))
{
?>


<form name="note" action="submit_new_note.php" method="POST"  onSubmit="return change_text();">
<table border=1>
  <tr><td><font color="red"> * </font>Your Email:</td><td><input type=text size=50 name="Email"></td></tr>
  <tr><td><font color="red"> * </font>Vendor:</td>
     <td><select name=Vendor size=1>
	<option><?php echo $Vendor; ?></option>
     </select></td></tr>
  <tr><td><font color="red"> * </font>Component:</td><td><input type=text name="Component" value="<?php echo $Component; ?>"></td></tr>
  <tr><td><font color="red"> * </font>title:</td><td><input type=text name="Title" size=50 value="<?php echo $Title; ?>"></td></tr>
  <tr><td>
        <font color="red"> * </font>Description:</td>
        <td><textarea name=Description rows="30" cols="80"><?php echo $Description; ?></textarea></td></tr>
</table>
<table>
<tr><td><input type="submit" value="Submit"></td>
</form>
<td><input type="button" value="Cancel" onclick="self.close()"></td>
</tr>
</table>
<?php
}
else
{
    echo "<h3>Note $id does not exist</h3><br>";
?>
 <input type="button" value="Close Window" onclick="self.close()">
<?php
}
?>

</center>
</body>
</html>

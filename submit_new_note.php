<html>
<head>
<title>Submit a New Note</title>
<link rel='stylesheet' href="css/standard.css">
<link rel='stylesheet' href="css/tac.css">
<link rel='stylesheet' href="css/jquery-ui.css">
<script>
function goBack()
  {
  window.history.back()
  }
</script>
</head>
<body>
<center>

<?php
$Email=$_POST['Email'];
$Vendor=$_POST['Vendor'];
$Component=$_POST['Component'];
$Title=$_POST['Title'];
$Description=$_POST['Description'];

if(!strcmp("", $Email) || !strcmp("",$Vendor) || !strcmp("", $Component) || !strcmp("", $Title) || !strcmp("", $Description))
{
	echo "<br>Please click Go Back and fill ALL required fields ";
	echo "<button onclick=goBack()>Go Back</button>";
}


else
{
	date_default_timezone_set('UTC');
	$Date=date("F j, Y, g:i a");

// this replacemt of ' for "&#39;" 
// is because the database creating fails when text has a ' in it

	$Description=str_replace("'","&#39;",$Description);

	$desc=$Description;
	$mytest=str_replace("<body", "", $Description);
	if(!strcmp($mytest, $Description)) {
		$desc="<pre><font size=4>".$Description."</font></pre>";
        }


	$database = "db/notes-db";
	$db = new SQLite3($database);

// Get the number of a deleted note first to recycle numbers
// if no id available then
// Get the number from table last_number -> id
	$id=0;
        $myquery="SELECT id FROM deleted_note_number";
        $result = $db->query($myquery);
        while ($row = $result->fetchArray())
        {
                $id="{$row['id']}";
        }
// delete the id from deleted_note_number table if we got one
        if($id) {
		$myquery="DELETE FROM deleted_note_number WHERE id = '$id'";	
		$result = $db->query($myquery) or die('Deletion of deleted_note_number failed');
	}
	else {
		$myquery="SELECT id FROM last_number";
		$result = $db->query($myquery) or die('Failed to get note number');
		while ($row = $result->fetchArray())
		{
        		$id="{$row['id']}";
		}
		$new_id = $id + 1;
		$myquery="UPDATE last_number SET id='$new_id' WHERE id='$id'";
		$result=$db->query($myquery) or die('Error could not update id to last number');
	}

	$myquery ="INSERT INTO notes VALUES ('$id', '$Date', '$Email', '$Vendor', '$Component', '$Title', '$Description')";
	$db->query($myquery) or die('Note Creation failed go back to examine your text');

	print("<h2>Note Creation Success</h2>");

	print("<table border=1>
		<tr><td>Note #:</td><td>$id</td></tr>
		<tr><td>Date of creation:</td><td>$Date</td></tr>
		<tr><td>Email:</td><td>$Email</td></tr>
		<tr><td>Vendor:</td><td>$Vendor</td></tr>
		<tr><td>Component:</td><td>$Component</td></tr>
		<tr><td>Title:</td><td>$Title</td></tr>
		<tr><td>Description:</td><td>$desc</td></tr>
		</table>");
	print("<br> <table>
		<tr>
			<td><form  action=edit_note.php method=POST>
			<input type=hidden name=id value=$id>
			<input type=submit value=Edit Note>
			</form></td>
			</td><td><form  action=confirm_delete_note.php method=POST>
			<input type=hidden name=id value=$id>
			<input type=submit value=Delete Note></td>
			</form></td>
			<td><form  action=index.php method=POST>
			<input type=submit value=Home></form>
		</tr>
		</table>");
?>
<?php
}
?>
</center>
</body>
</html>




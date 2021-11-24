<html>
<head>
<title>Edit Note</title>
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
$result = $db->query($myquery) or die('Query failed note $id does not exist');
while ($row = $result->fetchArray())
{
	$id="{$row['id']}";
	$Email="{$row['Email']}";
	$Date="{$row['Date']}";
	$Vendor="{$row['Vendor']}";
	$Component="{$row['Component']}";
	$Title="{$row['Title']}";
	$Description="{$row['Description']}";
	print("<center><h3>Editing note # $id</h3>");
}


if(strcmp("", $Email))
{
	print("<form name=note action=submit_edited_note.php method=POST onSubmit=return change_text\(\);>");
	print("<table border=1>
		<tr><td>Note #:</td><td><input type=hidden name=id value=$id>$id</td></tr>
		<tr><td>Date of creation:</td><td><input type=hidden name=Date value=\"$Date\">$Date</td></tr>
		<tr><td>Email:</td><td><input type=hidden name=Email value=$Email>$Email</td></tr>
		<tr><td><font color=red> * </font>Vendor:</td>
    			    <td><select name=Vendor size=1>
				<option>$Vendor</option>
        			<option> House </option>
        			<option> Car </option>
        			<option> Boat </option>
        			<option> Doctors </option>
        			<option> Banks </option>
        			<option> Other </option>
     				</select></td></tr>
		<tr><td><font color=red> * </font>Component:</td><td><input type=text name=Component value=$Component></td></tr>
		<tr><td><font color=red> * </font>Title:</td><td><input type=text name=Title value=\"$Title\"></td></tr>
		<tr><td><font color=red> * </font>Description:</td>
		    <td><textarea name=Description rows=30 cols=80>$Description</textarea></td></tr>
	      </table>

	      <table>
		<tr><td><input type=submit value=Submit></td>
	      </form>");
	 	print("<td><form  action=index.php method=POST>
  		<input type=submit value=Cancel></form></td>
	      </tr>
	      </table>");
}
else
{
	echo "<br><h2>Note $id does not exist</h2><br>";
 	echo "<input type=button value=\"Close Window\" onclick=self.close()>";
}
?>
</center>
</body>
</html>

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
	$id=rand();
	date_default_timezone_set('UTC');
	$Date=date("F j, Y, g:i a");

// this replacemt of ' for "&#39;" 
// is because the database creating fails when text has a ' in it

	$Description=str_replace("'","&#39;",$Description);

	$desc=$Description;
	$mytest=str_replace("<body", "", $Description);
	if(!strcmp($mytest, $Description)) {
//        	$desc=str_replace("\n", "<br>", $Description);
	        $desc="<pre><font size=4>".$Description."</font></pre>";
}


	$database = "db/notes-db";

	$db = new SQLite3($database);
	$myquery ="INSERT INTO notes VALUES ('$id', '$Date', '$Email', '$Vendor', '$Component', '$Title', '$Description')";
	$db->query($myquery) or die('Create db failed go back to examine your text');

	print("<h2>Note Creation Success</h2>");

	print("<table border=1>
		<tr><td>Note #:</td><td>$id</td></tr>
		<tr><td>Date of creation:</td><td>$Date></td></tr>
		<tr><td>Email:</td><td>$Email</td></tr>
		<tr><td>Vendor:</td><td>$Vendor</td></tr>
		<tr><td>Component:</td><td>$Component</td></tr>
		<tr><td>title:</td><td>$Title</td></tr>
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
		</tr>
		</table>");
?>
		<input type="button" value="Close Window" onclick="self.close()">
<?php
}
?>
</center>
</body>
</html>




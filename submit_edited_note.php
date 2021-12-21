<html>
<head>
<title>Submit an Edited Note</title>
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
	$id=$_POST['id'];
	$Date=$_POST['Date'];
	$Email=$_POST['Email'];
	$Vendor=$_POST['Vendor'];
	$Component=$_POST['Component'];
	$Title=$_POST['Title'];
	$Description=$_POST['Description'];
	
	if(!strcmp("", $Email) || !strcmp("",$Vendor) || !strcmp("", $Component) || !strcmp("", $Title) || !strcmp("", $Description))
	{
	        echo "<br>Please click Go Back and enter a Description ";
	        echo "<button onclick=goBack()>Go Back</button>";
	}
	else
	{
	$database = "db/notes-db";
	
	$Description=str_replace("'","&#39;",$Description);
	
	$desc=$Description;
	$mytest=str_replace("<body", "", $Description);
	if(!strcmp($mytest, $Description)) {
		$desc="<pre><font size=4>".$Description."</font></pre>";
	}
	
	
	$db = new SQLite3($database);
	$myquery="UPDATE notes SET Vendor = '$Vendor' WHERE id = '$id'";
	$db->query($myquery) or die('Edition failed go back to examine your text');
	$myquery="UPDATE notes SET Component = '$Component' WHERE id = '$id'";
	$db->query($myquery) or die('Edition failed go back to examine your text');
	$myquery="UPDATE notes SET Title = '$Title' WHERE id = '$id'";
	$db->query($myquery) or die('Edition failed go back to examine your text');
	$myquery="UPDATE notes SET Description = '$Description' WHERE id = '$id'";
	$db->query($myquery) or die('Edition failed go back to examine your text');
	
	echo "<h2><center>Edition on note $id succeeded</center></h2>";
	
	print("<table border=1>
	  <tr><td>Note #:</td><td>$id</td></tr>
	  <tr><td>Date of creation:</td><td>$Date</td></tr>
	  <tr><td>Email:</td><td>$Email</td></tr>
	  <tr><td>Vendor:</td><td>$Vendor</td></tr>
	  <tr><td>Component:</td><td>$Component</td></tr>
	  <tr><td>Title:</td><td>$Title</td></tr>
	  </table>
	  <br>
	  <table border=1>
	  <tr><td>Description:</td></tr><tr><td>$desc</td></tr>
	</table>");
	print("<br>
	<table>
	<tr>
	<td><form  action=edit_note.php method=POST>
	<input type=hidden name=id value=$id>
	<input type=submit value=\"Edit Note\">
	</form></td>
	
	<td><form  action=confirm_delete_note.php method=POST>
	<input type=hidden name=id value=$id>
	<input type=submit value=\"Delete Note\"></td>
	</form></td>
	<td><form  action=clone_note.php method=POST>
	<input type=hidden name=id value=$id>
	<input type=submit value=\"Clone Note\"></td>
	</form></td>
	</tr>
	</table>");
?>
        <td><form  action=index.php method=POST>
        <input type=submit value=Home></td>
        </form></td>
	<?php
	}
	?>
</center>
</body>
</html>
	
	
	

<html>
<head>
<title>Admin List a Note</title>
<link rel='stylesheet' href="../css/standard.css">
<link rel='stylesheet' href="../css/tac.css">
<link rel='stylesheet' href="../css/jquery-ui.css">
</head>
<center>
<?php
$Table=$_GET['Table'];
$id=$_GET['id'];


$database="../db/notes-db";
$db = new SQLite3($database);

$myquery="SELECT * FROM $Table WHERE id = '$id'";

$result = $db->query($myquery) or die('Query failed');
while ($row = $result->fetchArray())
{
  print "<br><h3>Details for Note $id on table <font color=red>$Table</font></h3>";
  $id="{$row['id']}";  
  $Date="{$row['Date']}";  
  $Email="{$row['Email']}";  
  $Vendor="{$row['Vendor']}";  
  $Component="{$row['Component']}";  
  $Title="{$row['Title']}";  
  $Description="{$row['Description']}";
  $mytest=str_replace("<body", "", $Description);
  if(!strcmp($mytest, $Description)) {
	$Description="<pre><font size=4>".$Description."</font></pre>";
  }
}


if(strcmp("",$Email))
{
  echo "<table border=1>
    <tr><td>Note #:</td><td>$id</td></tr>
    <tr><td>Date of creation:</td><td>$Date</td></tr>
    <tr><td>Email:</td><td><a href=mailto:$Email>$Email</a></td></tr>
    <tr><td>Vendor:</td><td>$Vendor</td></tr>
    <tr><td>Component:</td><td>$Component</td></tr>
    <tr><td>title:<br></td><td>$Title</td></tr>
    <tr><td>Description:<br></td><td>$Description</td></tr>
    </table>";

  echo "<br>
  <table>
<!--
  <tr>
  <td><form  action=edit_note.php method=POST>
  <input type=hidden name=id value=$id>
  <input type=submit value=\"Edit Note\">
  </form></td>
-->

  <td><form  action=restore_note.php method=POST>
  <input type=hidden name=id value=$id>
  <input type=hidden name=Table value=$Table>
  <input type=submit value=\"Restore Note\">
  </form></td>
  <td><form  action=confirm_delete_note.php method=POST>
  <input type=hidden name=id value=$id>
  <input type=submit value=\"Delete Note\">
  </form></td>
  </table>";
  echo "<input type=button value=\"Close Window\" onclick=self.close()>";
}
else
{
  echo "<h3>Note $id does not exist</h3><br>";
  echo "<input type=button value=\"Close Window\" onclick=self.close()>";
}
?>
</center>
</body>
</html>

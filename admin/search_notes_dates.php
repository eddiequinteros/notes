<html>
<head>
<title>Admin Search Notes Result</title>
<link rel='stylesheet' href="../css/standard.css">
<link rel='stylesheet' href="../css/tac.css">
<link rel='stylesheet' href="../css/jquery-ui.css">
<script>
function goBack()
  {
  window.history.back()
  }
</script>
</head>
<?php
$Table=$_POST['Table'];
$From_Month=$_POST['From_Month'];
$From_Year=$_POST['From_Year'];


$database="../db/notes-db";
$db = new SQLite3($database);

$myquery="SELECT * FROM $Table WHERE ";

$querystr="";

$myquery.=" Date LIKE '%$From_Month%'";
$myquery.=" AND Date LIKE '%$From_Year%'";
$querystr.=" Notes submitted on $From_Month $From_Year";

print "<br><center><h2>Results on notes search with criteria  </h2>";
print("<h3>Working with table <font color=red>$Table</font></h3>");
print "<h4>$querystr</h4>";

$result = $db->query($myquery)  or die('Query failed');

$mytest=1;
while ($row = $result->fetchArray())
{
	if($mytest) {
	print "<table border=1> <tr><th>Note #</th><th>Vendor</th><th>Component</th><th>Title</th></tr>";
	$mytest=0;
	}
	echo "<tr>
	<td><a target=_blank href=list_note_number.php?Table=$Table&id={$row['id']}>{$row['id']}</a></td>
	<td>{$row['Vendor']}</td>
	<td>{$row['Component']}</td>
	<td>{$row['Title']}</td></tr>";
}

if($mytest)
        print "<br><h3>Sorry no notes found matching the search criteria</h3>";

echo "</table> 
<br>
<table>
<tr><td><input type=button value=\"Close Window\" onclick=self.close()></td>
<td><button onclick=goBack()>Go Back</button></td></tr>
</table>";
?>
</center>
</body>
</html>

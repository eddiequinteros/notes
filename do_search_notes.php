<html>
<head>
<title>Search Notes Result</title>
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
<?php
$Vendor=$_POST['Vendor'];
$Component=$_POST['Component'];
$Title=$_POST['Title'];
$Description=$_POST['Description'];
$Email=$_POST['Email'];

$database="db/notes-db";
$db = new SQLite3($database);

$myquery="SELECT * FROM notes WHERE ";

$where=0;
$querystr="";

if(strcmp('', $Vendor))
{
		$myquery.=" Vendor = '$Vendor'";
		$querystr.="Vendor = '$Vendor'";
		$where=1;
}

if(strcmp('', $Component))
{
	if($where) {
		$myquery.=" AND Component = '$Component'";
		$querystr.="AND Component = '$Component'";
	}
	else {
		$myquery.=" Component = '$Component'";
		$querystr.="Component = '$Component'";
		$where=1;
	}
}

if(strcmp('', $Title))
{
	if($where) {
		$myquery.=" AND Title LIKE '%$Title%'";
		$querystr.=" AND Title Contains '$Title'";
	}
	else {
		$myquery.=" Title LIKE '%$Title%'";
		$querystr.=" Title contains '$Title'";
		$where=1;
	}
}

if(strcmp('', $Description))
{
	if($where) {
		$myquery.=" AND Description LIKE '%$Description%'";
		$querystr.=" AND Description contains '$Description'";
	}
	else {
		$myquery.=" Description LIKE '%$Description%'";
		$querystr.=" Description contains '$Description'";
		$where=1;
	}
}

if(strcmp('', $Email))
{
	if($where) {
		$myquery.=" AND Email LIKE '%$Email%'";
		$querystr.=" AND Email contains '$Email'";
	}
	else  {
		$myquery.=" Email LIKE '%$Email%'";
		$querystr.=" Email contains '$Email'";
		$where=1;
	}
}

print "<center><br><h2>Results on notes searched with criteria </h2><br>";
$myquery.=" COLLATE NOCASE";
print "<h4>$querystr</h4><br>";

//It works this way, otherwise I get an entry in error.log 
if(!$where)
{
	echo "'Query failed' <button onclick=goBack()>Go Back</button> and review your search criteria'";
}
else
{
	$result = $db->query($myquery)  or die('Query failed');

	$mytest=1;

	while ($row = $result->fetchArray())
	{
		if ($mytest)  {
			print "<table border=1> <tr><th>Note #</th><th>Vendor</th><th>Component</th><th>Title</th></tr>";
			$mytest=0;
		}
		echo "<tr><td><a target=_blank href=list_note_number.php?id={$row['id']}>{$row['id']}</a></td><td>{$row['Vendor']}</td><td>{$row['Component']}</td><td>{$row['Title']}</td></tr>";
	}

	if($mytest)
		print "<br><h3>Sorry no notes found matching the search criteria</h3>";
	else
	{
		print "</table><br><table><tr>";
		print "<td><button onclick=goBack()>Go Back</button></td>
		<form  action=index.php method=POST>
  		<td><input type=submit value=Home></form></td>
		</tr></table>";
	}
}

?>
</center>
</body>
</html>

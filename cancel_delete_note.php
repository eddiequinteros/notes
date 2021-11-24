<html>
<head>
<title>Delete Note</title>
<link rel='stylesheet' href="css/standard.css">
<link rel='stylesheet' href="css/tac.css">
<link rel='stylesheet' href="css/jquery-ui.css">
</head>
<body  bgcolor="lightblue">
<center>

<?php
$id=$_POST['id'];

print("<br><h3>Deletion of order <a href=list_note_number.php?id=$id>$id</a> cancelled</h3>");
?>

<input type="button" value="Close Window" onclick="self.close()">
</center>
</body>
</html>

<html>
<head>
<title>Admin Delete Note</title>
<link rel='stylesheet' href="../css/standard.css">
<link rel='stylesheet' href="../css/tac.css">
<link rel='stylesheet' href="../css/jquery-ui.css">
</head>
<center>

<?php
$id=$_POST['id'];

print("<h3>Deletion of order <a href=list_note_number.php?Table=deleted&id=$id>$id</a> cancelled</h3>");
?>

<input type="button" value="Close Window" onclick="self.close()">
</center>
</body>
</html>

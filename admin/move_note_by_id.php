<html>
<head>
<title>Restore note by ID</title>
<link rel='stylesheet' href="../css/standard.css">
<link rel='stylesheet' href="../css/tac.css">
<link rel='stylesheet' href="../css/jquery-ui.css">
</head>
<center>
<h2>Restore a note by ID from Table deleted back into notes</h2>
 <form action="restore_note.php" method="POST">
  Enter ID number:</td><td><input type=text size=50 name="id"/></td>
		<input type=hidden name=Table value=deleted>
<table>
  <tr>
	<td><input type="submit" value="Submit"></td>
   	<td><input type="button" value="Cancel" onclick="self.close()"></td>
  </tr>
</table>
</center>
</body>


<html>
<head>
<title>Notes Main Page</title>
<link rel='stylesheet' href="css/standard.css">
</head>
<body>
<center>
<br>
<br><h2><font color=red>Welcome Personal Notes Page</font></h2><br>
<hr>
<br>
<h2>Main menu</h2>
<br>
<br>
<table>
	<form action="search_notes.php" method="POST">
	<td><input type="submit" value="Search Notes"></td>
	</form>
	<form action="new_note.php" method="POST">
	<td><input type="submit" value="New Note"></td>
	</form>
	<form action="list_notes.php" method="POST">
	<td><input type="submit" value="List All Notes"></td>
	</form>
	<form action="admin/index.php" method="POST">
	<td><input type="submit" value="Manage Notes"></td>
	</form>
<!--
	<tr><td><a target=_blank href=display_note_by_id.php>Display a Note</a></td></tr>
	<tr><td><a target=_blank href=edit_note_by_id.php>Edit a Note</a></td></tr>
	<tr><td><a target=_blank href=clone_note_by_id.php>Clone a Note</a></td></tr>
	<tr><td><a target=_blank href=delete_note_by_id.php>Remove a Note</a></td></tr>
-->
</table>
</center>
</body>
</html>


<html>
<head>
<title>Clone note by ID</title>
<link rel='stylesheet' href="css/standard.css">
<link rel='stylesheet' href="css/tac.css">
<link rel='stylesheet' href="css/jquery-ui.css">

</head>
<body>
<center>
<h2>Clone a note by ID</h2>
 <form action="clone_note.php" method="POST">
  <tr><td>Enter ID number:</td><td><input type=text size=50 name="id"/></td></tr>
<table>
   <tr>
        <td><input type="submit" value="Submit"></td>
        <td><input type="button" value="Cancel" onclick="self.close()"></td>
   </tr>
</table>
</center>
</body>


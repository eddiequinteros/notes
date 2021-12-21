<html>
<head>
<title>Create a New Note</title>
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
<h2>New Note Creation</h2>
Fields with <font color="red"> * </font>must be filled
 <table>
 <form action="submit_new_note.php" method="POST">
  <tr><td><font color="red"> * </font>Your Email:</td><td><input type=text size=50 name="Email"></td></tr>
  <tr><td><font color="red"> * </font>Category:</td>
     <td><select name=Vendor size=1>
	<option> Technical
	<option> House
	<option> Car
	<option> Boat
	<option> Doctors 
	<option> Banks
	<option> Other
     </select></td>
  <tr><td><font color="red"> * </font>Component:</td>
  <td><input type=text name="Component"/></td>
  <tr><td><font color="red"> * </font>Title:</td><td>
  <input type=text size=50 name="Title"></td></tr>
  <tr><td><font color="red"> * </font>Description:</td>
	<td><textarea name=Description rows="30" cols="80"></textarea></td></tr>
 </table>
<br>
 <table>
        <tr><td><input type="submit" value="Submit"></td>
	<td><button onclick=goBack()>Go Back</button></td>
 </table>
</form>
</center>
</body>
</html>




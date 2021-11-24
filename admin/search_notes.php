<html>
<head>
<title>Admin Search Notes</title>
<link rel='stylesheet' href="../css/standard.css">
<link rel='stylesheet' href="../css/tac.css">
<link rel='stylesheet' href="../css/jquery-ui.css">
</head>
<center>
<br><h2>Search notes</h2>
 <form action="search_notes_criteria.php" method="POST">
 <table>
  <tr><td>Table:</td>
     <td><select name=Table size=1>
	<option>deleted</option>
	<option>notes</option>
     </select></td></tr>
  <tr><td>Vendor:</td>
     <td><select name=Category size=1>
        <option> House
        <option> Car
        <option> Boat
        <option> Doctors
        <option> Banks
        <option> Other
     </select></td></tr>
  <tr><td>Component:</td><td><input type=text name="Component"/></td></tr>
  <tr><td>Title contains:</td><td><input type=text size=50 name="Title"/></td></tr>
  <tr><td>Description contains:</td><td><input type=text size=50 name="Description"/></td></tr>
  <tr><td>Email:</td><td><input type=text size=50 name="Email"/></td></tr>
 </table>
<br>
<table>
   <tr>
        <td><input type="submit" value="Submit"></td>
        <td><input type="button" value="Cancel" onclick="self.close()"></td>
</table>
</form>
<hr>
<br><h3>or search by month</h3><br>
<hr>
 <form action="search_notes_dates.php" method="POST">
 <table>
  <tr><td>Table:</td>
     <td><select name=Table size=1>
        <option>deleted</option>
        <option>notes</option>
     </select></td></tr>
 <tr><td>For the month of:</td>
     <td><select name=From_Month size=1>
        <option>January</option>
        <option>February</option>
        <option>March</option>
        <option>April</option>
        <option>May</option>
        <option>June</option>
        <option>July</option>
        <option>August</option>
        <option>September</option>
        <option>October</option>
        <option>November</option>
        <option>December</option>
     </select></td>
     <td><select name=From_Year size=1>
        <option>2014</option>
        <option>2015</option>
     </select></td></tr>
</table>
<br>
<table>
   <tr>
        <td><input type="submit" value="Submit"></td>
        <td><input type="button" value="Cancel" onclick="self.close()"></td>
</table>
</form>
</center>
</body>
</html>



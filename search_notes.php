<html>
<head>
<title>Search Notes</title>
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
<br>
<center>
<h2>Search notes</h2>
 <form action="do_search_notes.php" method="POST">
 <table>
  <tr><td>Vendor:</td>
     <td><select name=Vendor size=1>
        <option> Technical 
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
	<td><button onclick=goBack()>Go Back</button></td>
   </tr>
</table>
</form>
<br><hr><br>
<b>or search by month</b><br>
<br><hr><br>
 <form action="search_notes_dates.php" method="POST">
 <table>
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
        <option>2016</option>
        <option>2017</option>
        <option>2018</option>
     </select></td></tr>
</table>
<br>
<table>
   <tr>
        <td><input type="submit" value="Submit"></td>
	<td><button onclick=goBack()>Go Back</button></td>
   </tr>
</table>
</form>
</center>
</body>
</html>



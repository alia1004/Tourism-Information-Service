<?php
$con=mysqli_connect("localhost","root"," ","addressbook");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM colleague");
?>
<html>
<head>
<title> address book </title>
</head>
<body>
<h1>Address Book</h1>
<table border="1" cellpadding="2" cellspacing="3">
<tr>
<th>ID</th>
<th> FIRST TIME</th>
<th> LAST NAME </th>
<th> TELEPHONE </th>
<th> EMAIL </th>
</tr>
<?php
while($row = mysqli_fetch_array($result)) {
echo "<tr>"; 
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['FIRSTNAME'] . "</td>";
echo "<td>" . $row['LASTNAME'] . "</td>";
echo "<td>" . $row['TELEPHONE'] . "</td>";
echo "<td>" . $row['EMAIL'] . "</td>";
echo "<\tr>";
}
//mysql_free_result($result);
mysqli_close($con);
?>
</table>
</body>
</html>
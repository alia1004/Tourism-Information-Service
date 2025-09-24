<?php
$con = mysqli_connect("localhost", "root", "", "addressbook");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT * FROM colleague");
?>
<html>
<head>
<title>Address Book</title>
</head>
<body>
<h1>Address Book</h1>
<table border="1" cellpadding="2" cellspacing="3"> <!-- cellpadding / cellspacing  
    specifies the amount of space between the border of a table cell and its contents.-->
<tr>
    <th>ID</th>
    <th>FIRST NAME</th>
    <th>LAST NAME</th>
    <th>TELEPHONE</th>
    <th>EMAIL</th>
</tr>
<?php
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>"; 
    echo "<td>" . $row['FIRSTNAME'] . "</td>";
    echo "<td>" . $row['LASTNAME'] . "</td>";
    echo "<td>" . $row['TELEPHONE'] . "</td>";
    echo "<td>" . $row['EMAIL'] . "</td>";
    echo "</tr>";
}
mysqli_close($con);
?>
</table>
</body>
</html>

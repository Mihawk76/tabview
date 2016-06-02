<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "satunol10";
$dbname = "testdb";
$id;
$type;
$description;

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$q = intval($_GET['q']);

// Getting Data from database
//$sql = "SELECT Data FROM System where Type_Data = 'Device IP'";
mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM Digital_Input WHERE Number = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Number'] . "</td>";
    echo "<td>" . $row['Digital_Input_Name'] . "</td>";
    echo "<td>" . $row['Input_Condition'] . "</td>";
    echo "<td>" . $row['Alarm_Condition'] . "</td>";
    echo "<td>" . $row['Alarm_Severity'] . "</td>";
    echo "</tr>";
}
echo "</table>";


mysqli_close($con);
?>
<?php
$servername = "localhost";
$username = "root";
$password = "satunol10";
$dbname = "testdb";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Getting Data from database
$sql = "SELECT Data FROM System_Temp where Type_Data = 'Device IP'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Device_IP = $row["Data"];
//define variables and set to empty values
$Device_IP_Temp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $Device_IP_Temp = test_input($_POST["Device_IP_Temp"]);
echo "Device Ip temp " . $Device_IP_Temp . "<br>";
echo "Gateway " . $Gateway_Temp . "<br>";
if ($Device_IP_Temp == "")
	{
	$Device_IP_Temp=$Device_IP;
	}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE System_Temp SET Data='$Device_IP_Temp' WHERE Type_Data='Device IP'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
header("location: takeData.php");
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


 
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<table>
	<tr>
		<td>Device IP</td>
		<td><input type="text" name="Device_IP_Temp" value="<?php echo $Device_IP; ?>"></td>
		<td>Enter this device IP</td>
	</tr>
	<tr>
		<td colspan="8">
			<center>
				<input type="submit" name="submit" value="Save">
				
			</center>
		</td>
	</tr>
</table>
</form>
</body>
</html>

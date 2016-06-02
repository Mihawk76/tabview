<?php

$servername = "localhost";
$username = "root";
$password = "satunol10";
$dbname = "testdb";
$id;
$type;
$description;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT Number, Digital_Input_Name, Input_Condition, Alarm_Condition FROM Digital_Input";
$result = $conn->query($sql);
$result = $conn->query($sql);
echo "<table border='1'>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
    	echo "<tr>
		<td>" . $row["Number"]. " - Name: " . $row["Digital_Input_Name"]. "</td>
		<td>
			<select name='Digital_Input_1_Option'>
			<option selected='selected'>"
			. $row["Input_Condition"] . 
			"</option> 
			<option value='Enable'>Enable</option>
			<option value='Disable'>Disable</option>
			</select>		
		</td>
		<td> Alarm if </td>
		<td>" . $row["Alarm_Condition"]. "</td>
		</tr>";
    }
} else {
    echo "0 results";
}
//echo "</table>";
$conn->close();
?>
</table>


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
// Getting data from Database
$sql = "SELECT Number, Device_Connected_Name , Type_Device FROM Device_Connected";
$result = $conn->query($sql);
$Element = 0; //Array elements start at ZERO. So this is to intialise it.
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result )) 
    {
	$Number_Device[$Element] = $row["Number"];
	$Device_Connected_Name[$Element] = $row["Device_Connected_Name"];
	$Type_Device[$Element] = $row["Type_Device"];
	$Element++;
    }
}
$Max_Device = $Element;
// Getting Type List

$sql = "SELECT Number, Device_Name FROM Device_List";
$result = $conn->query($sql);
$Element = 0; //Array elements start at ZERO. So this is to intialise it.
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result )) 
    {
	$Number_Device_List[$Element] = $row["Number"];
	$Device_List_Name[$Element] = $row["Device_Name"];
	$Element++;
    }
}
$Max_List = $Element;
echo "Max list " . $Max_List . " <br>";
$Element = 0;
// Emptying Variable Temp
while ( $Element < $Max_Device )
{
	$Type_Device_Temp[$Element] = "";
	$Element++;
}
// Getting data from Post
$Element = 0;
    while ($Element < $Max_Device)
    {
	$Device[$Element] = "Type_Device_" . $Element;
    	$Type_Device_Temp[$Element] = $_POST[$Device[$Element]];
	echo "Type Device is " . $Type_Device_Temp[$Element] . "<br>";
	$Element++;
    } 
// Making Sure Data is not loaded with empty variable
$Element = 0;
    while ($Element < $Max_Device)
    {
	if ($Type_Device_Temp[$Element] == "")
        {
		$Type_Device_Temp[$Element] = $Type_Device[$Element];
        }
	$Element++;
}
//Updating data database
$Element = 0;
while ($Element < $Max_Device)
{
	$sql = "UPDATE  Device_Connected SET Type_Device='$Type_Device_Temp[$Element]' WHERE Device_Connected_Name='$Device_Connected_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$Element++;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
<?php
$Element = 0;
while ( $Element < $Max_Device )
{
	
	echo "  
		<tr>
		<td>" . $Device_Connected_Name[$Element] . "</td>
		<td>
			<select name='" . $Device[$Element] . "'>
			<option selected='selected'>"
			. $Type_Device[$Element] . "</option>";
		// Restart Element List
		$Element_List = 0;
		while ($Element_List < $Max_List)
			{
			echo "<option value ='" . $Device_List_Name[$Element_List] . "'>" . $Device_List_Name[$Element_List] . "</option>";
 
			$Element_List++;
			}
			
			echo "
			</select>		
		</td>
		</tr>";
	$Element++;
}
?>
		<tr>
			<td colspan><center><input type="submit" value="Save" /></td>
			<td><input type="button" value="Cancel" /></center></td>
		</tr>
</table>
</form>
<?php
$Element = 0;
echo "bangke " . $Device_List_Name[$Element] .  $Device_List_Name[$Element] . $Max_List;

	while ($Element < $Max_List)
	{
		echo "Value 1 " . $Device_List_Name[$Element] . "Value 2" .  $Device_List_Name[$Element];
	$Element++;
	}

?>

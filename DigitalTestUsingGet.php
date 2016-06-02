<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

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
/*
$q = intval($_GET['q']);

// Getting Data from database
$sql = "SELECT * FROM CC1120_Main WHERE ID = '1234'";
//$sql = "SELECT * FROM CC1120_Main";
$result  = $conn->query($sql);
$Element = 0; //Array elements start at ZERO. So this is to intialise it.
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result )) 
    {
	$ID = $row["ID"];
	$Name = $row["Name"];
	$Type = $row["Type"];
	$Device_Stat = $row["Device_Stat"];
	$Parameter_Time = $row["Parameter_Time"];
	$RSSI = $row["RSSI"];
	
    }
}
*/
    //Data from the form to variable
    //$Max_Element = $_SESSION['Max_Element'];
    $Max_Element = 10;
    echo "Max Element is " . $Max_Element . "<br>";
    $Element = 0;
    while ( $Element < $Max_Element )
    {
	$Name_Node[$Element] = "Node_Name_" . $Element;
	$Availability_Node[$Element] = "Availability_Node_" . $Element;
	$Condition_CC1120[$Element] = "Condition_CC1120_" . $Element;
	$Condition_Alarm[$Element] = "Condition_Alarm_" . $Element;
	$Severity_Alarm[$Element] = "Severity_Alarm_" . $Element;
	$Description_Alarm[$Element] = "Description_Alarm_" . $Element;
	$Max_Alarm[$Element] = "Max_Alarm_" . $Element;
	$Min_Alarm[$Element] = "Min_Alarm_" . $Element;
	$Element++;
    }
    $Element = 0;
    while ( $Element < $Max_Element )
    {
	$Node_Name_Temp[$Element] = $_POST[$Name_Node[$Element]];
	$Node_Availability_Temp[$Element] = $_POST[$Availability_Node[$Element]];
	$CC1120_Condition_Temp[$Element] = $_POST[$Condition_CC1120[$Element]];
	$Alarm_Condition_Temp[$Element] = $_POST[$Condition_Alarm[$Element]];
	$Alarm_Severity_Temp[$Element] = $_POST[$Severity_Alarm[$Element]];
	$Alarm_Description_Temp[$Element] = $_POST[$Description_Alarm[$Element]];
	$Alarm_Max_Temp[$Element] = $_POST[$Max_Alarm[$Element]];
	$Alarm_Min_Temp[$Element] = $_POST[$Min_Alarm[$Element]];
	$Element++;
    }
    $Element = 0;
    while ( $Element < $Max_Element)
    {
        echo "Node " . $Name_Node[$Element] . " " .$Node_Name_Temp[$Element] . " NA " . $Node_Availability_Temp[$Element] . " " . $Availability_Node[$Element] . " " . 
	$CC1120_Condition_Temp[$Element] . " " . $Condition_CC1120[$Element] . " " . 
	$Alarm_Condition_Temp[$Element] . " " . $Condition_Alarm[$Element] . " " . 
	$Alarm_Severity_Temp[$Element] . " " . $Severity_Alarm[$Element] . " " . 
	$Alarm_Description_Temp[$Element] . " " . $Description_Alarm[$Element] . " " .
	$Alarm_Max_Temp[$Element] . " " . $Max_Alarm[$Element] . " " . 
	$Alarm_Min_Temp[$Element] . " " . $Min_Alarm[$Element] . "<br>";
	$Element++;
    }
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check if input is empty
    $Element = 0;
    while ( $Element < $Max_Element )
    {
	if ($Node_Availability_Temp[$Element] == "")
        {
		$Node_Availability_Temp[$Element] = $Node_Availability[$Element];
        }
	if ($CC1120_Condition_Temp[$Element] == "")
        {
		$CC1120_Condition_Temp[$Element] = $CC1120_Condition[$Element];
        }
	if ($Alarm_Condition_Temp[$Element] == "")
        {
		$Alarm_Condition_Temp[$Element] = $Alarm_Condition[$Element];
        }
	if ($Alarm_Severity_Temp[$Element] == "")
        {
		$Alarm_Severity_Temp[$Element] = $Alarm_Severity[$Element];
        }
	if ($Alarm_Description_Temp[$Element] == "")
        {
		$Alarm_Description_Temp[$Element] = $Alarm_Description[$Element];
        }
	if ($Alarm_Max_Temp[$Element] == "")
        {
		$Alarm_Max_Temp[$Element] = $Alarm_Max[$Element];
        }
	if ($Alarm_Min_Temp[$Element] == "")
        {
		$Alarm_Min_Temp[$Element] = $Alarm_Min[$Element];
        }
	$Element++;
    }
    //Create connection and update to database
    $Element = 0;

    while ($Element < $Max_Element)
    {
	$sql = "UPDATE CC1120_IO_442 SET Node_Availability='$Node_Availability_Temp[$Element]' WHERE Node_Name='$Node_Name_Temp[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
   $Element++;
   }
header("location: tabview.php");
/*
$Element = 0;
while ($Element < $Max_Element)
{
echo $Node_Name[$Element] . " Node temp " . $Node_Availability[$Element] . " " . $Availability_Node[$Element] . " " . $Alarm_Condition[$Element] . " " . $Alarm_Severity[$Element] . " " . $Alarm_Description[$Element] . " " . $Alarm_Max[$Element] . " " .$Alarm_Min[$Element] . "<br>";
$Element++;
}
*/
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
//header("location: takeData.php");
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


 
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php
if ($Type == "IO 442")
{
echo "
	<table>
		<tr>
			<td>
				CC1120 ID
			</td>
			<td>
				<input size='4' name='cc1120_id' value='" . $ID . "'/input>
			</td>
			<td>&nbsp;</td>
			<td>CC1120 Label</td>
			<td>
				<input size='20' name='CC1120_Label' value='" . $Name . "'>
			</td>
		</tr>
		<tr>
			<td>
				Device Type
			</td>
			<td>
				<input size='4' name='Device Type' value='" . $Type . "'>
			</td>
			<td>
				&nbsp;
			</td>
			<td>
				Device Status
			</td>
			<td>
				<select name='option'>
					<option selected='selected'>
					" . $Device_Stat . 
					"</option> 
					<option value='Normal'>Normal</option>
					<option value='Disconnected'>Disconnected</option>
					<option value='New'>New</option>
				</select>
			</td>
			<td>Normal, Disconnected, New
		</tr>
	</table>
	<table>
		<tr>
			<td>Remote CC1120 RSSI</td>
			<td><input size='1' name='Remote CC1120 RSSI' value='" . $RSSI . "'></td>
			<td>dbm</td>
			<td>&nbsp;</td>
			<td>Send parameter every</td>
			<td><input size='2' name='Send parameter every' value='" . $Parameter_Time . "'></td>
			<td>second</td>
		</tr>
	</table>
	<table>";
$Element = 0;
while ( $Element < $Max_Element )
{
 
	$Input_Type = str_split($Node_Name[$Element],10);

	if ($Input_Type[0] == "Digital In")
	{
		echo "  
		<tr>
			<td>" . $Node_Name[$Element] . "</td>
			<td>
				<select name='" . $Availability_Node[$Element] . "'>
				<option selected='selected'>"
				. $Node_Availability[$Element] . 
				"</option> 
				<option value='Enable'>Enable</option>
				<option value='Disable'>Disable</option>
				</select>		
			</td>
			<td> " . $CC1120_Condition[$Element] . "</td>
			<td> Alarm if </td>
			<td>
				<select name='" . $Condition_Alarm[$Element] . "'>
				<option selected='selected'>
				" . $Alarm_Condition[$Element]. 
				"</option> 
				<option value='Open'>Open</option>
				<option value='Close'>Close</option>
			</td>
			<td> Alarm Severity</td>
			<td>

				<select name='" . $Severity_Alarm[$Element] . "'>
				<option selected='selected'>
				" . $Alarm_Severity[$Element]. 
				"</option> 
				<option value='Critical'>Critical</option>
				<option value='Major'>Major</option>
				<option value='Normal'>Normal</option>
			</td>
			<td>Alarm Description</td>
			<td><input type='text' name='" . $Description_Alarm[$Element] . "' value='" . $Alarm_Description[$Element] . "'>
		</tr>";
	}
	$Element++;
}
$Element = 0;
while ( $Element < $Max_Element )
{
 
	$Input_Type = str_split($Node_Name[$Element],10);

	if ($Input_Type[0] == "Digital Ou")
	{
		echo "  
		<tr>
			<td>" . $Node_Name[$Element] . "</td>
			<td>
				<select name='" . $Availability_Node[$Element] . "'>
				<option selected='selected'>"
				. $Node_Availability[$Element] . 
				"</option> 
				<option value='Enable'>Enable</option>
				<option value='Disable'>Disable</option>
				</select>		
			</td>		
			<td> " . $CC1120_Condition[$Element] . "</td>
		</tr>";

	}
	$Element++;
}
$Element = 0;
while ( $Element < $Max_Element )
{
 
	$Input_Type = str_split($Node_Name[$Element],10);

	if ($Input_Type[0] == "Analog Inp")
	{
		echo "  
		<tr>
			<td>" . $Node_Name[$Element] . "</td>
			<td>
				<select name='" . $Availability_Node[$Element] . "'>
				<option selected='selected'>"
				. $Node_Availability[$Element] . 
				"</option> 
				<option value='Enable'>Enable</option>
				<option value='Disable'>Disable</option>
				</select>		
			</td>
			<td>Alarm Min</td>
			<td><input type='text' maxlength='10' name='" . $Min_Alarm[$Element] . "' value='" . $Alarm_Min[$Element] . "'></td>
			<td>Alarm Max</td>
			<td><input type='text' maxlength='10' name='" . $Max_Alarm[$Element] . "' value='" . $Alarm_Max[$Element] . "'>
			<td>Alarm Description</td>
			<td><input type='text' name='" . $Description_Alarm[$Element] . "' value='" . $Alarm_Description[$Element] . "'></td>		
		</tr>";

	}
	$Element++;
}		
echo		"
	<table>
		<tr>
			<td colspan=>
				<center>
					<input type='submit' name='submit' value='Save'>
					<input type='submit' name='submit' value='Cancel'>
					<input type='submit' name='submit' value='Add New'>
					<input type='submit' name='submit' value='Delete Node'>
					<input type='submit' name='submit' value='Query'>
				</center>
			</td>
		</tr>
	</table>
";
}
if ($Type == "KWH")
{
echo
"
	<table>
		<tr>
			<td>
				CC1120 ID
			</td>
			<td>
				<input size='4' name='cc1120_id' value='" . $ID . "'/input>
			</td>
			<td>&nbsp;</td>
			<td>CC1120 Label</td>
			<td>
				<input size='20' name='CC1120_Label' value='" . $Name . "'>
			</td>
		</tr>
		<tr>
			<td>
				Device Type
			</td>
			<td>
				<input size='4' name='Device Type' value='" . $Type . "'>
			</td>
			<td>
				&nbsp;
			</td>
			<td>
				Device Status
			</td>
			<td>
				<select name='option'>
					<option selected='selected'>
					" . $Device_Stat . 
					"</option> 
					<option value='Normal'>Normal</option>
					<option value='Disconnected'>Disconnected</option>
					<option value='New'>New</option>
				</select>
			</td>
			<td>Normal, Disconnected, New
		</tr>
	</table>
	<table>
		<tr>
			<td>Remote CC1120 RSSI</td>
			<td><input size='1' name='Remote CC1120 RSSI' value='" . $RSSI . "'></td>
			<td>dbm</td>
			<td>&nbsp;</td>
			<td>Send parameter every</td>
			<td><input size='2' name='Send parameter every' value='" . $Parameter_Time . "'></td>
			<td>second</td>
		</tr>
	</table>
		<table>
		<tr>
			<td>I_R1</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
			<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_R2</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_R3</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
			<td>
		</tr>
		<tr>
			<td>I_R4</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_R5</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
			<td>
		</tr>
		<br />
			<td>I_R6</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_S1</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
			<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_S2</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_S3</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_S4</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_S5</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_S6</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_T1</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_T2</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_T3</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
			<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_T4</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
			<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_T5</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
			<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_T6</td>
			<td>
				<select name='option'>
				<option value='More'>More than</option>
				<option value='Less'>Less than</option></select>
			</td>
			<td>
				<input size='1' value='40'>
			</td>
			<td>Amp</td>
			<td>
				<select name='option'>
				<option value='OR'>OR</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='option'>
				<option value='Less'>Less than</option>
				<option value='More'>More than</option></select>
			</td>
			<td>
				<input size='1' value='1'>
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td colspan='8'>
				<center>
					<input type='submit' name='submit' value='Save'>
					<input type='submit' name='submit' value='Cancel'>
					<input type='submit' name='submit' value='Add New'>
					<input type='submit' name='submit' value='Delete Node'>
				</center>
			</td>
		</tr>
	</table>
";


}
if ($Type == "TH")
{
echo "
<table>
		<tr>
			<td>
				CC1120 ID
			</td>
			<td>
				<input size='4' name='cc1120_id' value='" . $ID . "'/input>
			</td>
			<td>&nbsp;</td>
			<td>CC1120 Label</td>
			<td>
				<input size='20' name='CC1120_Label' value='" . $Name . "'>
			</td>
		</tr>
		<tr>
			<td>
				Device Type
			</td>
			<td>
				<input size='4' name='Device Type' value='" . $Type . "'>
			</td>
			<td>
				&nbsp;
			</td>
			<td>
				Device Status
			</td>
			<td>
				<select name='option'>
					<option selected='selected'>
					" . $Device_Stat . 
					"</option> 
					<option value='Normal'>Normal</option>
					<option value='Disconnected'>Disconnected</option>
					<option value='New'>New</option>
				</select>
			</td>
			<td>Normal, Disconnected, New
		</tr>
	</table>
	<table>
		<tr>
			<td>Remote CC1120 RSSI</td>
			<td><input size='1' name='Remote CC1120 RSSI' value='" . $RSSI . "'></td>
			<td>dbm</td>
			<td>&nbsp;</td>
			<td>Send parameter every</td>
			<td><input size='2' name='Send parameter every' value='" . $Parameter_Time . "'></td>
			<td>second</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Digital Input_1</td>
			<td>
				<select name='option'>
					<option value='Enable'>Enable</option>
					<option value='Disable'>Disable</option>
				</select>
			</td>
			<td>
				<input size='2' name='Digital_input_1' value='Close'>
			</td>
			<td>Alarm if</td>
			<td>
				<select name='option'>
					<option value='Open'>Open</option>
					<option value='Close'>Close</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Digital Input_2</td>
			<td>
				<select name='option'>
					<option value='Enable'>Enable</option>
					<option value='Disable'>Disable</option>
				</select>
			</td>
			<td>
				<input size='2' name='Digital_input_2' value='Close'>
			</td>
			<td>Alarm if</td>
			<td>
				<select name='option'>
					<option value='Open'>Open</option>
					<option value='Close'>Close</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Temperature_1</td>
			<td>
				<select name='option'>
					<option value='Enable'>Enable</option>
					<option value='Disable'>Disable</option>
				</select>
			</td>
			<td>
				<input size='1' name='Temperature_1' value='80'>
			</td>
			<td>Alarm If</td>
			<td>
				<select name='option'>
					<option value='More than'>More than</option>
					<option value='Less than'>Less than</option>
				</select>
			</td>
			<td>
				<input size='1' name='Temperature_1' value='35'>
			</td>
			<td>&nbsp;</td>
			<td>Alarm Description</td>
			<td>
				<input size='20' name='Temperature_1' value='High Temperature'>
			</td>
		</tr>
		<tr>
			<td>Temperarture_2</td>
			<td>
				<select name='option'>
					<option value='Enable'>Enable</option>
					<option value='Disable'>Disable</option>
				</select>
			</td>
			<td>
				<input size='1' name='Temperature_2' value='35'>
			</td>
			<td>Alarm If</td>
			<td>
				<select name='option'>
					<option value='Enable'>Betwen</option>
					<option value='Disable'>Out Off</option>
				</select>
			</td>
			<td>
				<input size='1' name='Temperarture_2' value='70'>
			</td>
			<td>
				<input size='1' name='Temperarture_2' value='80'>
			</td>
			<td>Alarm Description</td>
			<td>
				<input size='20' name='Temperarture_2' value='Temperature out of tolarance'>
			</td>
		</tr>
		<tr>
			<td>Humidity</td>
			<td>
				<select name='option'>
					<option value='Enable'>Enable</option>
					<option value='Disable'>Disable</option>
				</select>
			</td>
			<td>
				<input size='1' name='Humidity' value='70'>
			</td>
			<td>Alarm If</td>
			<td>
				<select name='option'>
					<option value='Enable'>Betwen</option>
					<option value='Disable'>Out Off</option>
				</select>
			</td>
			<td><input size='1' name='Humidity' value='70'></td>
			<td><input size='1' name='Humidity' value='80'></td>
			<td>Alarm Description</td>
			<td><input size='20' name='alarm_description' value='Humidiy out of tolarance'></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan=>
				<center>
					<input type='submit' name='submit' value='Save'>
					<input type='submit' name='submit' value='Cancel'>
					<input type='submit' name='submit' value='Add New'>
					<input type='submit' name='submit' value='Delete Node'>
				</center>
			</td>
		</tr>
	</table>
";
}
?>
</form>
</body>
</html>

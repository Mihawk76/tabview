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

$q = intval($_GET['q']);
if ($q == "")
{
   //$q = "1234";
   $sql = "SELECT Name FROM CC1120_Main where Type = 'Selected'";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
	$q = $row["Name"];
}
if ($q != "")
{
   $sql = "UPDATE CC1120_Main SET Name='$q' WHERE Type='Selected'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	} 
}
// Getting Data from database
$sql = "SELECT * FROM CC1120_Main WHERE ID = '".$q."'";
//$sql = "SELECT * FROM CC1120_Main WHERE ID = '1234'";
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
//Check choosen file
if ($Type == "IO 442")
{
    // Getting data from CC1120 child table
    $sql = "SELECT * FROM CC1120_IO_442 where ID_CC1120 = '$ID'";
    $result  = $conn->query($sql);
    $Element = 0; //Array elements start at ZERO. So this is to intialise it.
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result )) 
        {
	    $Node_Name[$Element] = $row["Node_Name"];
	    $Node_Availability[$Element] = $row["Node_Availability"];
	    $CC1120_Condition[$Element] = $row["CC1120_Condition"];
	    $Alarm_Condition[$Element] = $row["Alarm_Condition"];
            $Alarm_Severity[$Element] = $row["Alarm_Severity"];
            $Alarm_Description[$Element] = $row["Alarm_Description"];
            $Alarm_Max[$Element] = $row["Alarm_Max"];
            $Alarm_Min[$Element] = $row["Alarm_Min"];
	    $Element++;
        }
    }
    $Max_Element = $Element;
    $_SESSION['Max_Element'] = $Max_Element;
    echo "Max Element is " . $Max_Element . "<br>";
    //Define variables into empty values
    $Element = 0;
while ( $Element < $Max_Element )
    {
	$Node_Name_Temp[$Element] = $Node_Availability_Temp[$Element] = $CC1120_Condition_Temp[$Element] = "";
	$Alarm_Condition_Temp[$Element] = $Alarm_Severity_Temp[$Element] = $Alarm_Description_Temp[$Element] = "";
	$Alarm_Max_Temp[$Element] = $Alarm_Min_Temp[$Element] = "";
	$Element++;
    }
    //Data from the form to variable
    $Element = 0;
    while ( $Element < $Max_Element )
    {
	$Availability_Node[$Element] = "Availability_Node_" . $Element;
	$Condition_CC1120[$Element] = "Condition_CC1120_" . $Element;
	$Condition_Alarm[$Element] = "Condition_Alarm_" . $Element;
	$Severity_Alarm[$Element] = "Severity_Alarm_" . $Element;
	$Description_Alarm[$Element] = "Description_Alarm_" . $Element;
	$Max_Alarm[$Element] = "Max_Alarm_" . $Element;
	$Min_Alarm[$Element] = "Min_Alarm_" . $Element;
	$Node_Availability_Temp[$Element] = $_POST[$Availability_Node[$Element]];
	$CC1120_Condition_Temp[$Element] = $_POST[$Condition_CC1120[$Element]];
	$Alarm_Condition_Temp[$Element] = $_POST[$Condition_Alarm[$Element]];
	$Alarm_Severity_Temp[$Element] = $_POST[$Severity_Alarm[$Element]];
	$Alarm_Description_Temp[$Element] = $_POST[$Description_Alarm[$Element]];
	$Alarm_Max_Temp[$Element] = $_POST[$Max_Alarm[$Element]];
	$Alarm_Min_Temp[$Element] = $_POST[$Min_Alarm[$Element]];
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
	$sql = "UPDATE CC1120_IO_442 SET Node_Availability='$Node_Availability_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_IO_442 SET CC1120_Condition='$CC1120_Condition_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_IO_442 SET Alarm_Condition='$Alarm_Condition_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_IO_442 SET Alarm_Severity='$Alarm_Severity_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_IO_442 SET Alarm_Description='$Alarm_Description_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_IO_442 SET Alarm_Max='$Alarm_Max_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_IO_442 SET Alarm_Min='$Alarm_Min_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
   $Element++;
   }
}
//Check choosen file
if ($Type == "KWH")
{
    // Getting data from CC1120 child table
    $sql = "SELECT * FROM CC1120_KWH where ID_CC1120 = '$ID'";
    $result  = $conn->query($sql);
    $Element = 0; //Array elements start at ZERO. So this is to intialise it.
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result )) 
        {
	    $Node_Name[$Element] = $row["Node_Name"];
	    $Alarm_Cond_1[$Element] = $row["Alarm_Cond_1"];
	    $Alarm_Cond_2[$Element] = $row["Alarm_Cond_2"];
	    $Alarm_Logic[$Element] = $row["Alarm_Logic"];
	    $Alarm_Var_1[$Element] = $row["Alarm_Var_1"];
	    $Alarm_Var_2[$Element] = $row["Alarm_Var_2"];
            $Alarm_Severity[$Element] = $row["Alarm_Severity"];
            $Alarm_Description[$Element] = $row["Alarm_Description"];
	    $Element++;
        }
    }
    $Max_Element = $Element;
    while ( $Element < $Max_Element )
    {
	$Node_Name_Temp[$Element] = $Alarm_Cond_1_Temp[$Element] = $Alarm_Var_1_Temp[$Element] = "";
	$Alarm_Logic_Temp[$Element] = $Alarm_Cond_2_Temp[$Element] = $Alarm_Var_2_Temp[$Element] = "";
	$Alarm_Description_Temp[$Element] = $Alarm_Severity_Temp[$Element] = "";
	$Element++;
    }
    //Data from the form to variable
    $Element = 0;
    while ( $Element < $Max_Element )
    {
	$Cond_Alarm_1[$Element] = "Cond_Alarm_1_" . $Element;
	$Var_Alarm_1[$Element] = "Var_Alarm_1_" . $Element;
	$Logic_Alarm[$Element] = "Logic_Alarm_" . $Element;
	$Cond_Alarm_2[$Element] = "Cond_Alarm_2_" . $Element;
	$Var_Alarm_2[$Element] = "Var_Alarm_2_" . $Element;
	$Severity_Alarm[$Element] = "Severity_Alarm_" . $Element;
	$Description_Alarm[$Element] = "Description_Alarm_" . $Element;
	$Alarm_Cond_1_Temp[$Element] = $_POST[$Cond_Alarm_1[$Element]];
	$Alarm_Var_1_Temp[$Element] = $_POST[$Var_Alarm_1[$Element]];
	$Alarm_Logic_Temp[$Element] = $_POST[$Logic_Alarm[$Element]];
	$Alarm_Cond_2_Temp[$Element] = $_POST[$Cond_Alarm_2[$Element]];
	$Alarm_Var_2_Temp[$Element] = $_POST[$Var_Alarm_2[$Element]];
	$Alarm_Severity_Temp[$Element] = $_POST[$Severity_Alarm[$Element]];
	$Alarm_Description_Temp[$Element] = $_POST[$Description_Alarm[$Element]];
	$Element++;
    }
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check if input is empty
    $Element = 0;
    while ( $Element < $Max_Element )
    {
	if ($Alarm_Cond_1_Temp[$Element] == "")
        {
		$Alarm_Cond_1_Temp[$Element] = $Alarm_Cond_1[$Element];
        }
	if ($Alarm_Var_1_Temp[$Element] == "")
        {
		$Alarm_Var_1_Temp[$Element] = $Alarm_Var_1[$Element];
        }
	if ($Alarm_Cond_2_Temp[$Element] == "")
        {
		$Alarm_Cond_2_Temp[$Element] = $Alarm_Cond_2[$Element];
        }
	if ($Alarm_Logic_Temp[$Element] == "")
        {
		$Alarm_Logic_Temp[$Element] = $Alarm_Logic[$Element];
        }
	if ($Alarm_Var_1_Temp[$Element] == "")
        {
		$Alarm_Var_1_Temp[$Element] = $Alarm_Var_1[$Element];
        }
	if ($Alarm_Severity_Temp[$Element] == "")
        {
		$Alarm_Severity_Temp[$Element] = $Alarm_Severity[$Element];
        }
	if ($Alarm_Description_Temp[$Element] == "")
        {
		$Alarm_Description_Temp[$Element] = $Alarm_Description[$Element];
        }
	$Element++;
    }
    //Create connection and update to database
    $Element = 0;

    while ($Element < $Max_Element)
    {
	$sql = "UPDATE CC1120_KWH SET Alarm_Cond_1='$Alarm_Cond_1_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_KWH SET Alarm_Var_1='$Alarm_Var_1_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_KWH SET Alarm_Logic='$Alarm_Logic_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_KWH SET Alarm_Cond_2='$Alarm_Cond_2_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_KWH SET Alarm_Var_2='$Alarm_Var_2_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_KWH SET Alarm_Severity='$Alarm_Severity_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_KWH SET Alarm_Description='$Alarm_Description_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
   $Element++;
   }
}
if ($Type == "TH")
{
    // Getting data from CC1120 child table
    $sql = "SELECT * FROM CC1120_TH where ID_CC1120 = '$ID'";
    $result  = $conn->query($sql);
    $Element = 0; //Array elements start at ZERO. So this is to intialise it.
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result )) 
        {
	    $Node_Name[$Element] = $row["Node_Name"];
	    $Node_Availability[$Element] = $row["Node_Availability"];
	    $CC1120_Condition[$Element] = $row["CC1120_Condition"];
	    $Alarm_Condition[$Element] = $row["Alarm_Condition"];
            $Alarm_Severity[$Element] = $row["Alarm_Severity"];
            $Alarm_Description[$Element] = $row["Alarm_Description"];
            $Alarm_Max[$Element] = $row["Alarm_Max"];
            $Alarm_Min[$Element] = $row["Alarm_Min"];
	    $Element++;
        }
    }
    $Max_Element = $Element;
    $Element = 0;
while ( $Element < $Max_Element )
    {
	$Node_Name_Temp[$Element] = $Node_Availability_Temp[$Element] = $CC1120_Condition_Temp[$Element] = "";
	$Alarm_Condition_Temp[$Element] = $Alarm_Severity_Temp[$Element] = $Alarm_Description_Temp[$Element] = "";
	$Alarm_Max_Temp[$Element] = $Alarm_Min_Temp[$Element] = "";
	$Element++;
    }
    //Data from the form to variable
    $Element = 0;
    while ( $Element < $Max_Element )
    {
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
	$sql = "UPDATE CC1120_TH SET Node_Availability='$Node_Availability_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_TH SET CC1120_Condition='$CC1120_Condition_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_TH SET Alarm_Condition='$Alarm_Condition_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_TH SET Alarm_Severity='$Alarm_Severity_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_TH SET Alarm_Description='$Alarm_Description_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_TH SET Alarm_Max='$Alarm_Max_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE CC1120_TH SET Alarm_Min='$Alarm_Min_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
   $Element++;
   }
}
/*
$Element = 0;
while ($Element < $Max_Element)
{
echo $Node_Name[$Element] . " " . $CC1120_Condition[$Element] . " " . $Alarm_Cond_2[$Element] . " " .  $Alarm_Logic[$Element] . " " .  $Alarm_Min[$Element] . " " .  $Alarm_Max[$Element] . " " . $Alarm_Severity[$Element] . " " . $Alarm_Description[$Element] . "<br>";
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
//header("location: getDigitalTest.php");
header("location: tabview.php");
//header("location: takeData.php");
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


 
?>
<form method="post" action="DigitalTestUsingGet.php">
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
			<td><input size='4' type='text' name='" . $Description_Alarm[$Element] . "' value='" . $Alarm_Description[$Element] . "'>
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
			<td> " . $CC1120_Condition[$Element] . "</td>
			<td>Alarm Min</td>
			<td><input size='1' type='text' maxlength='10' name='" . $Min_Alarm[$Element] . "' value='" . $Alarm_Min[$Element] . "'></td>
			<td>Alarm Max</td>
			<td><input size='1' type='text' maxlength='10' name='" . $Max_Alarm[$Element] . "' value='" . $Alarm_Max[$Element] . "'></td>
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
			<td><input size='4' type='text' name='" . $Description_Alarm[$Element] . "' value='" . $Alarm_Description[$Element] . "'></td>		
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
	</table>";
$Element = 0;
while ( $Element < $Max_Element)
{
echo"
		<table>
			<tr>
			<td>" . $Node_Name[$Element] . "</td>
			<td>
				<select name='" . $Cond_Alarm_1[$Element] . "'>
				<option selected='selected'>"
				. $Alarm_Cond_1[$Element] . 
				"</option> 
				<option value='More than'>More than</option>
				<option value='Less than'>Less than</option></select>
			</td>
			<td><input size='1' type='text' name='" . $Var_Alarm_1[$Element] . "' value='" . $Alarm_Var_1[$Element] . "'>
			</td>
			<td>
				<select name='" . $Logic_Alarm[$Element] . "'>
				<option selected='selected'>"
				. $Alarm_Logic[$Element] . 
				"</option> 
				<option value='Or'>Or</option>
				<option value='And'>And</option></select>
			</td>
			<td>
				<select name='" . $Cond_Alarm_2[$Element] . "'>
				<option selected='selected'>"
				. $Alarm_Cond_2[$Element] . 
				"</option> 
				<option value='More than'>More than</option>
				<option value='Less than'>Less than</option></select>
			</td>
			<td><input size='1' type='text' name='" . $Var_Alarm_2[$Element] . "' value='" . $Alarm_Var_2[$Element] . "'>
			</td>
			<td><input size='1' type='text' name='" . $Description_Alarm[$Element] . "' value='" . $Alarm_Description[$Element] . "'>
			</td>
			<td>Alarm Severity</td>
			<td>

				<select name='" . $Severity_Alarm[$Element] . "'>
				<option selected='selected'>
				" . $Alarm_Severity[$Element]. 
				"</option> 
				<option value='Critical'>Critical</option>
				<option value='Major'>Major</option>
				<option value='Normal'>Normal</option>
			</td>
		</tr>
	</table>
";
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
			<td><input size='4' type='text' name='" . $Description_Alarm[$Element] . "' value='" . $Alarm_Description[$Element] . "'>
		</tr>";
	}
	$Element++;
}
$Element = 0;
while ( $Element < $Max_Element )
{
 
	$Input_Type = str_split($Node_Name[$Element],10);

	if ($Input_Type[0] != "Digital In")
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
			<td>Alarm Min</td>
			<td><input size='1' type='text' maxlength='10' name='" . $Min_Alarm[$Element] . "' value='" . $Alarm_Min[$Element] . "'></td>
			<td>Alarm Max</td>
			<td><input size='1' type='text' maxlength='10' name='" . $Max_Alarm[$Element] . "' value='" . $Alarm_Max[$Element] . "'></td>
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
			<td><input size='4' type='text' name='" . $Description_Alarm[$Element] . "' value='" . $Alarm_Description[$Element] . "'></td>		
		</tr>";

	}
	$Element++;
}		
echo"	
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

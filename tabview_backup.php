<?php
session_start();
//print_r($_SESSION);
//if ($_SESSION['login_user']===admin){
if(!isset($_SESSION['login_user'])){
//if(!session_is_registered('login_user')){
header("location: login.php");
//echo "<br>not detected as logged <br>";
//echo "Session login is " . $_SESSION['login_user'];
}
else
{
//echo "detected as logged";
//echo "Session login is " . $_SESSION['login_user'];
}
?>
<html>
<head>

<title>Tab-View Sample</title>

<link rel="stylesheet" type="text/css" href="tabview.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="tabview.js"></script>
<script src="//code.jquery.com/jquery-1.8.0.min.js"></script>
<script>
var runShellScript = function () {
    $.get('/var/www/html/tabview/ledBlink.php', function () {
        alert('Shell script done!');
    });
};
// Some stuff
runShellScript();
// A $( document ).ready() block.
$( document ).ready(function() {
    console.log( "ready!" );
$.get('ledBlink.php', function (data) {
        alert('Shell script done!');
	console.log(data);
    });
});
</script>
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
// Getting Data from database
$sql = "SELECT Data FROM System where Type_Data = 'Device IP'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Device_IP = $row["Data"];
//echo "Data: " . $Device_IP;

$sql = "SELECT Data FROM System where Type_Data = 'Gateway'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Gateway = $row["Data"];
//echo "<br>Gateway: " . $Gateway;

$sql = "SELECT Data FROM System where Type_Data = 'Server IP'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Server_IP = $row["Data"];
//echo "<br>Server IP: " . $Server_IP;

$sql = "SELECT Data FROM System where Type_Data = 'Storage'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Storage = $row["Data"];
//echo "<br>Server IP: " . $Storage;

$sql = "SELECT Data FROM System where Type_Data = 'Customer Name'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Customer_Name = $row["Data"];
//echo "<br>Customer Name: " . $Customer_Name;

$sql = "SELECT Data FROM System where Type_Data = 'Customer ID'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Customer_ID = $row["Data"];
//echo "<br>Customer ID: " . $Customer_ID;

$sql = "SELECT Data FROM System where Type_Data = 'Device ID'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Device_ID = $row["Data"];
//echo "<br>Device_ID: " . $Device_ID;

$sql = "SELECT Data FROM System where Type_Data = 'Username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Username = $row["Data"];
//echo "<br>Username: " . $Username;

$sql = "SELECT Data FROM System where Type_Data = 'Email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Email = $row["Data"];
//echo "<br>Email: " . $Email;

$sql = "SELECT Data FROM System where Type_Data = 'Phone Number'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Phone_Number = $row["Data"];
//echo "<br>Cell Number: " . $Cell_Number;
//Variable page 2
$sql = "SELECT Data FROM System where Type_Data = 'Wifi Option'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Wifi_Option = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Ethernet Option'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Ethernet_Option = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Cellular 1 Option'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Cellular_1_Option = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Brand 1 Option'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Brand_1_Option = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Cellular 2 Option'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Cellular_2_Option = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Brand 2 Option'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Brand_2_Option = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Bluetooth Option'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Bluetooth_Option = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Wireless CC1120 Option'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Wireless_CC1120_Option = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Carrier Frequency'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Carrier_Frequency = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Bit Rate'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Bit_Rate = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Rx Band Width Filter'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Rx_Band_Width_Filter = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Modulation Format Option'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Modulation_Format_Option = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Tx Power'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Tx_Power = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Performance Mode Option'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Performance_Mode_Option = $row["Data"];
//page 3
$sql = "SELECT Number, Digital_Input_Name, Input_Condition, Alarm_Condition , Alarm_Severity FROM Digital_Input";
$result  = $conn->query($sql);
$Element = 0; //Array elements start at ZERO. So this is to intialise it.
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result )) 
    {
	$Number[$Element] = $row["Number"];
	$Digital_Input_Name[$Element] = $row["Digital_Input_Name"];
	$Input_Condition[$Element] = $row["Input_Condition"];
	$Alarm_Condition[$Element] = $row["Alarm_Condition"];
        $Alarm_Severity[$Element] = $row["Alarm_Severity"];
	$Element++;
    }
}
$Max_Element = $Element;
//Device Output
//Alarm Local
$sql = "SELECT Number, Digital_Output_Name, Digital_Output_Description, Digital_Output_Alarm FROM Digital_Output";
$result  = $conn->query($sql);
$Element = 0; //Array elements start at ZERO. So this is to intialise it.
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result )) 
    {
	//$Number[$Element] = $row["Number"];
	$Digital_Output_Name[$Element] = $row["Digital_Output_Name"];
	$Digital_Output_Description[$Element] = $row["Digital_Output_Description"];
	$Digital_Output_Alarm[$Element] = $row["Digital_Output_Alarm"];
	$Element++;
    }
}
$Max_Digital_Output_Element = $Element;

//Analog Input
$sql = "SELECT No, Analog_Input_Name, Analog_Input_Description, Analog_Input_Min, Analog_Input_Max , Analog_Input_Alarm_Severity FROM Analog_Input";
$result  = $conn->query($sql);
$Element = 0; //Array elements start at ZERO. So this is to intialise it.
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result )) 
    {
	//$Number[$Element] = $row["Number"];
	$Analog_Input_Name[$Element] = $row["Analog_Input_Name"];
	$Analog_Input_Description[$Element] = $row["Analog_Input_Description"];
	$Analog_Input_Min[$Element] = $row["Analog_Input_Min"];
	$Analog_Input_Max[$Element] = $row["Analog_Input_Max"];
	$Analog_Input_Alarm_Severity[$Element] = $row["Analog_Input_Alarm_Severity"];
	$Element++;
    }
}
$Max_Analog_Input_Element = $Element;
//Page 4
$sql = "SELECT Number, Device_Connected_Name , Type_Device, Device_Brand, Device_Comm FROM Device_Connected";
$result = $conn->query($sql);
$Element = 0; //Array elements start at ZERO. So this is to intialise it.
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result )) 
    {
	$Number_Device[$Element] = $row["Number"];
	$Device_Connected_Name[$Element] = $row["Device_Connected_Name"];
	$Type_Device[$Element] = $row["Type_Device"];
	$Device_Brand[$Element] = $row["Device_Brand"];
	$Device_Comm[$Element] = $row["Device_Comm"];
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
//page 5
$sql = "SELECT Data FROM System where Type_Data = 'Alarm On Condition'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Alarm_On_Condition = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Alarm Repeat'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Alarm_Repeat = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Alarm Destination'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Alarm_Destination = $row["Data"];
$sql = "SELECT Data FROM System where Type_Data = 'Alarm Message'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
	$Alarm_Message = $row["Data"];
$conn->close();

?>
<?php
// define variables and set to empty values
$Device_IP_Temp = $Gateway_Temp = $Server_IP_Temp = $Storage_Temp = $Customer_Name_Temp = $Customer_ID_Temp = $Device_ID_Temp = $Username_Temp = $Email_Temp = $Phone_Number_Temp = "";
// define variable page 2
$Wifi_Option_Temp = $Ethernet_Option_Temp = $Cellular_1_Option_Temp = $Brand_1_Option_Temp = $Cellular_2_Option_Temp = $Brand_2_Option_Temp = $Bluetooth_Option_Temp = $Wireless_CC1120_Option_Temp = $Carrier_Frequency_Temp = $Bit_Rate_Temp = $Rx_Band_Width_Filter_Temp = $Modulation_Format_Option_Temp = $Tx_Power_Temp = $Performace_Mode_Option_Temp = "";
// define variable page 3
$Element = 0;
while ( $Element < $Max_Element )
{
	$Input_Condition_Temp[$Element] = $Alarm_Condition_Temp[$Element] = $Alarm_Severity_Temp[$Element] = "";
	$Element++;
}
//Device Output
$Element = 0;
while ( $Element < $Max_Digital_Output_Element )
{
	$Digital_Output_Name_Temp[$Element] = $Digital_Output_Description_Temp[$Element] = "";
	$Element++;
}
$Element = 0;
//Analog Input
while ( $Element < $Max_Analog_Input_Element )
{
	$Analog_Input_Name_Temp[$Element] = $Analog_Input_Description_Temp[$Element] = $Analog_Input_Min_Temp[$Element] = $Analog_Input_Max_Temp[$Element] = $Analog_Input_Alarm_Severity_Temp[$Element] = "";
	$Element++;
}
// Emptying Variable Temp
// Page 4
while ( $Element < $Max_Device )
{
	$Type_Device_Temp[$Element] = $Device_Brand_Temp[$Element] = $Device_Comm_Temp[$Element] = "";
	$Element++;
}
//Variable page 6
$Alarm_On_Condition_Temp = $Alarm_Repeat_Temp = $Alarm_Destination_Temp = $Alarm_Message_Temp = "";
//Lanjut Variable Page 3
//Digital Input
$Element = 0;
    while ($Element < $Max_Element)
    {
	$Alarm[$Element] = "Alarm_" . $Element;
	$Input[$Element] = "Input_" . $Element;
	$Severity[$Element] = "Severity_" . $Element;	
    	$Input_Condition_Temp[$Element] = $_POST[$Input[$Element]];
	$Alarm_Condition_Temp[$Element] = $_POST[$Alarm[$Element]];
	$Alarm_Severity_Temp[$Element] = $_POST[$Severity[$Element]];
	//echo "Digital Input is " . $Input_Condition_Temp[$Element] . "<br>";
	//echo "Alarm is " . $Alarm_Condition_Temp[$Element] . "<br>";
	$Element++;
    }
//Digital Output
//Alarm lokal
$Element = 0;
    while ($Element < $Max_Digital_Output_Element)
    {
	$Digital_Name_Output[$Element] = "Digital_Name_Output_" . $Element;
	$Digital_Description_Output[$Element] = "Digital_Description_Output_" . $Element;
	$Digital_Alarm_Output[$Element] = "Digital_Alarm_Output_" . $Element;
    	//$Device_Output_Name_Temp[$Element] = $_POST[$Device_Name_Output[$Element]];
	$Digital_Output_Description_Temp[$Element] = $_POST[$Digital_Description_Output[$Element]];
	$Digital_Output_Alarm_Temp[$Element] = $_POST[$Digital_Alarm_Output[$Element]];
	$Element++;
    }
$Element = 0;
    while ($Element < $Max_Analog_Input_Element)
    {
	$Analog_Name_Input[$Element] = "Analog_Name_Input_" . $Element;
	$Analog_Description_Input[$Element] = "Analog_Description_Input_" . $Element;
	$Analog_Min_Input[$Element] = "Analog_Min_Input_" . $Element;
	$Analog_Max_Input[$Element] = "Analog_Max_Input_" . $Element;
	$Analog_Alarm_Severity_Input[$Element] = "Analog_Alarm_Severity_Input_" . $Element;
	$Analog_Input_Description_Temp[$Element] = $_POST[$Analog_Description_Input[$Element]];
	$Analog_Input_Min_Temp[$Element] = $_POST[$Analog_Min_Input[$Element]];
	$Analog_Input_Max_Temp[$Element] = $_POST[$Analog_Max_Input[$Element]];
	$Analog_Input_Alarm_Severity_Temp[$Element] = $_POST[$Analog_Min_Alarm_Severity[$Element]];
	$Element++;
    }
//Loading Page 4 
$Element = 0;
    while ($Element < $Max_Device)
    {
	$Device[$Element] = "Type_Device_" . $Element;
	$Brand_Device[$Element] ="Device_Brand_" . $Element;
	$Comm_Device[$Element] ="Device_Comm_" . $Element;
    	$Type_Device_Temp[$Element] = $_POST[$Device[$Element]];
    	$Device_Brand_Temp[$Element] = $_POST[$Brand_Device[$Element]];
    	$Device_Comm_Temp[$Element] = $_POST[$Comm_Device[$Element]];
	//echo "Type Device is " . $Type_Device_Temp[$Element] . "<br>";
	$Element++;
    }   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $Device_IP_Temp = test_input($_POST["Device_IP_Temp"]);
   $Gateway_Temp = test_input($_POST["Gateway_Temp"]);
   $Server_IP_Temp = test_input($_POST["Server_IP_Temp"]);
   $Storage_Temp = test_input($_POST["Storage_Temp"]);
   $Customer_Name_Temp = test_input($_POST["Customer_Name_Temp"]);
   $Customer_ID_Temp = test_input($_POST["Customer_ID_Temp"]);
   $Device_ID_Temp = test_input($_POST["Device_ID_Temp"]);
   $Username_Temp = test_input($_POST["Username_Temp"]);
   $Email_Temp = test_input($_POST["Email_Temp"]);
   $Phone_Number_Temp = test_input($_POST["Phone_Number_Temp"]);
   //Lanjut Variable Page 2
   $Wifi_Option_Temp = test_input($_POST['Wifi_Option']);
   $Ethernet_Option_Temp = test_input($_POST['Ethernet_Option']);
   $Cellular_1_Option_Temp = test_input($_POST['Cellular_1_Option']);
   $Brand_1_Option_Temp = test_input($_POST['Brand_1_Option']);
   $Cellular_2_Option_Temp = test_input($_POST['Cellular_2_Option']);
   $Brand_2_Option_Temp = test_input($_POST['Brand_2_Option']);
   $Bluetooth_Option_Temp = test_input($_POST['Bluetooth_Option']);
   $Wireless_CC1120_Option_Temp = test_input($_POST['Wireless_CC1120_Option']);
   $Carrier_Frequency_Temp = test_input($_POST['Carrier_Frequency']);
   $Bit_Rate_Temp = test_input($_POST['Bit_Rate']);
   $Rx_Band_Width_Filter_Temp = test_input($_POST['Rx_Band_Width_Filter']);
   $Modulation_Format_Option_Temp = test_input($_POST['Modulation_Format_Option']);
   $Tx_Power_Temp = test_input($_POST['Tx_Power']);
   $Performance_Mode_Option_Temp = test_input($_POST['Performance_Mode_Option']);
   //Lnjut ke page 5
   $Alarm_On_Condition_Temp = test_input($_POST['Alarm_On_Condition']);
   $Alarm_Repeat_Temp = test_input($_POST['Alarm_Repeat']);
   $Alarm_Destination_Temp = test_input($_POST['Alarm_Destination']);
   $Alarm_Message_Temp = test_input($_POST['Alarm_Message']);
$servername = "localhost";
$username = "root";
$password = "satunol10";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check if input is empty
if ($Device_IP_Temp == "")
	{
	$Device_IP_Temp=$Device_IP;
	}
if ($Gateway_Temp == "")
        {
        $Gateway_Temp=$Gateway;
        }
if ($Server_IP_Temp == "")
        {
        $Server_IP_Temp=$Server_IP;
        }
if ($Storage_Temp == "")
        {
        $Storage_Temp=$Storage;
        }
if ($Customer_Name_Temp == "")
        {
        $Customer_Name_Temp=$Customer_Name;
        }
if ($Customer_ID_Temp == "")
        {
        $Customer_ID_Temp=$Customer_ID;
        }
if ($Device_ID_Temp == "")
        {
        $Device_ID_Temp=$Device_ID;
        }
if ($Username_Temp == "")
        {
        $Username_Temp=$Username;
        }
if ($Email_Temp == "")
        {
        $Email_Temp=$Email;
        }
if ($Phone_Number_Temp == "")
        {
        $Phone_Number_Temp=$Phone_Number;
        }
//Variable Page 2
if ($Wifi_Option_Temp == "")
        {
        $Wifi_Option_Temp=$Wifi_Option;
        }
if ($Ethernet_Option_Temp == "")
        {
        $Ethernet_Option_Temp=$Ethernet_Option;
        }
if ($Cellular_1_Option_Temp == "")
        {
        $Cellular_1_Option_Temp=$Cellular_1_Option;
        }
if ($Brand_1_Option_Temp == "")
        {
        $Brand_1_Option_Temp=$Brand_1_Option;
        }
if ($Cellular_2_Option_Temp == "")
        {
        $Cellular_2_Option_Temp=$Cellular_2_Option;
        }
if ($Brand_2_Option_Temp == "")
        {
        $Brand_2_Option_Temp=$Brand_2_Option;
        }
if ($Bluetooth_Option_Temp == "")
        {
        $Bluetooth_Option_Temp=$Bluetooth_Option;
        }
if ($Wireless_CC1120_Option_Temp == "")
        {
        $Wireless_CC1120_Option_Temp=$Wireless_CC1120_Option;
        }
if ($Carrier_Frequency_Temp == "")
        {
        $Carrier_Frequency_Temp=$Carrier_Frequency;
        }
if ($Bit_Rate_Temp == "")
        {
        $Bit_Rate_Temp=$Bit_Rate;
        }
if ($Rx_Band_Width_Filter_Temp == "")
        {
        $Rx_Band_Width_Filter_Temp=$Rx_Band_Width_Filter;
        }
if ($Modulation_Format_Option_Temp == "")
        {
        $Modulation_Format_Option_Temp=$Modulation_Format_Option;
        }
if ($Tx_Power_Temp == "")
        {
        $Tx_Power_Temp=$Tx_Power;
        }
if ($Performance_Mode_Option_Temp == "")
        {
        $Performance_Mode_Option_Temp=$Performance_Mode_Option;
        }
//Variable page 3
//Device Input
$Element = 0;
    while ($Element < $Max_Element)
    {
	if ($Input_Condition_Temp[$Element] == "")
        {
		$Input_Condition_Temp[$Element] = $Input_Condition[$Element];
        }
	if ($Alarm_Condition_Temp[$Element] == "")
        {
		$Alarm_Condition_Temp[$Element] = $Alarm_Condition[$Element];
        }
	if ($Alarm_Severity_Temp[$Element] == "")
        {
		$Alarm_Severity_Temp[$Element] = $Alarm_Severity[$Element];
        }
	$Element++;
     }
	
//Device Output
//Alarm Local
$Element = 0;
    while ($Element < $Max_Digital_Output_Element)
    {
	if ($Digital_Output_Name_Temp[$Element] == "")
        {
		$Digital_Output_Name_Temp[$Element] = $Digital_Output_Name[$Element];
        }
	if ($Digital_Output_Description_Temp[$Element] == "")
        {
		$Digital_Output_Description_Temp[$Element] = $Digital_Output_Description[$Element];
        }
	if ($Digital_Output_Alarm_Temp[$Element] == "")
        {
		$Digital_Output_Alarm_Temp[$Element] = $Digital_Output_Alarm[$Element];
        }
	$Element++;
    }
//Analog Input
$Element = 0;
    while ($Element < $Max_Analog_Input_Element)
    {
	if ($Analog_Input_Description_Temp[$Element] == "")
        {
		$Analog_Input_Description_Temp[$Element] = $Analog_Input_Descripton[$Element];
        }
	if ($Analog_Input_Min_Temp[$Element] == "")
        {
		$Analog_Input_Min_Temp[$Element] = $Analog_Input_Min[$Element];
        }
	if ($Analog_Input_Max_Temp[$Element] == "")
        {
		$Analog_Input_Max_Temp[$Element] = $Analog_Input_Max[$Element];
        }
	if ($Analog_Input_Alarm_Severity_Temp[$Element] == "")
        {
		$Analog_Input_Alarm_Severity_Temp[$Element] = $Analog_Input_Alarm_Severity[$Element];
        }
	$Element++;
    }
//Variable Page 4
$Element = 0;
    while ($Element < $Max_Device)
    {
	if ($Type_Device_Temp[$Element] == "")
        {
		$Type_Device_Temp[$Element] = $Type_Device[$Element];
        }
	if ($Device_Brand_Temp[$Element] == "")
        {
		$Device_Brand_Temp[$Element] = $Device_Brand[$Element];
        }
	if ($Device_Comm_Temp[$Element] == "")
        {
		$Device_Comm_Temp[$Element] = $Device_Comm[$Element];
        }
	$Element++;
     }
//Variable Page 5
if ($Alarm_On_Condition_Temp == "")
        {
        $Alarm_On_Condition_Temp=$Alarm_On_Condition;
        }
if ($Alarm_Repeat_Temp == "")
        {
        $Alarm_Repeat_Temp=$Alarm_Repeat;
        }
if ($Alarm_Destination_Temp == "")
        {
        $Alarm_Destination_Temp=$Alarm_Destination;
        }
if ($Alarm_Message_Temp == "")
        {
        $Alarm_Message_Temp=$Alarm_Message;
        }
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "UPDATE System SET Data='$Device_IP_Temp' WHERE Type_Data='Device IP'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
//close connection
$conn->close();

//Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "UPDATE System SET Data='$Gateway_Temp' WHERE Type_Data='Gateway'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "UPDATE System SET Data='$Server_IP_Temp' WHERE Type_Data='Server IP'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "UPDATE System SET Data='$Storage_Temp' WHERE Type_Data='Storage'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "UPDATE System SET Data='$Customer_ID_Temp' WHERE Type_Data='Customer ID'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "UPDATE System SET Data='$Device_ID_Temp' WHERE Type_Data='Device ID'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "UPDATE System SET Data='$Username_Temp' WHERE Type_Data='Username'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "UPDATE System SET Data='$Email_Temp' WHERE Type_Data='Email'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "UPDATE System SET Data='$Phone_Number_Temp' WHERE Type_Data='Phone Number'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "UPDATE System SET Data='$Customer_Name_Temp' WHERE Type_Data='Customer Name'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
//Update Variable page 2
$sql = "UPDATE System SET Data='$Wifi_Option_Temp' WHERE Type_Data='Wifi Option'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Ethernet_Option_Temp' WHERE Type_Data='Ethernet Option'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Cellular_1_Option_Temp' WHERE Type_Data='Cellular 1 Option'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Brand_1_Option_Temp' WHERE Type_Data='Brand 1 Option'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Cellular_2_Option_Temp' WHERE Type_Data='Cellular 2 Option'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Brand_2_Option_Temp' WHERE Type_Data='Brand 2 Option'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Bluetooth_Option_Temp' WHERE Type_Data='Bluetooth Option'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Wireless_CC1120_Option_Temp' WHERE Type_Data='Wireless CC1120 Option'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Carrier_Frequency_Temp' WHERE Type_Data='Carrier Frequency'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Bit_Rate_Temp' WHERE Type_Data='Bit Rate'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Rx_Band_Width_Filter_Temp' WHERE Type_Data='Rx Band Width Filter'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Modulation_Format_Option_Temp' WHERE Type_Data='Modulation Format Option'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Tx_Power_Temp' WHERE Type_Data='Tx Power'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Performance_Mode_Option_Temp' WHERE Type_Data='Performance Mode Option'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
//Variable page 3
//Digital Input
$Element = 0;
while ($Element < $Max_Element)
{
	$sql = "UPDATE  Digital_Input SET Input_Condition='$Input_Condition_Temp[$Element]' WHERE Digital_Input_Name='$Digital_Input_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE  Digital_Input SET Alarm_Condition='$Alarm_Condition_Temp[$Element]' WHERE Digital_Input_Name='$Digital_Input_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE  Digital_Input SET Alarm_Severity='$Alarm_Severity_Temp[$Element]' WHERE Digital_Input_Name='$Digital_Input_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$Element++;
}
//Digital Output
//Alarm Local
$Element = 0;
while ($Element < $Max_Digital_Output_Element)
{
	$sql = "UPDATE  Digital_Output SET Digital_Output_Description='$Digital_Output_Description_Temp[$Element]' WHERE Digital_Output_Name='$Digital_Output_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE  Digital_Output SET Digital_Output_Alarm='$Digital_Output_Alarm_Temp[$Element]' WHERE Digital_Output_Name='$Digital_Output_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$Element++;
}
//Analog Input
//Digital Output
$Element = 0;
while ($Element < $Max_Analog_Input_Element)
{
	$sql = "UPDATE  Analog_Input SET Analog_Input_Description='$Analog_Input_Description_Temp[$Element]' 
	WHERE Analog_Input_Name='$Analog_Input_Name[$Element]'"; 
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE  Analog_Input SET Analog_Input_Min='$Analog_Input_Min_Temp[$Element]' 
	WHERE Analog_Input_Name='$Analog_Input_Min[$Element]'"; 
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE  Analog_Input SET Analog_Input_Max='$Analog_Input_Max_Temp[$Element]' 
	WHERE Analog_Input_Name='$Analog_Input_Name[$Element]'"; 
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE  Analog_Input SET Analog_Input_Alarm_Severity='$Analog_Input_Alarm_Severity_Temp[$Element]' 
	WHERE Analog_Input_Name='$Analog_Input_Name[$Element]'"; 
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$Element++;
}
//Variable Page 4
$Element = 0;
while ($Element < $Max_Device)
{
	$sql = "UPDATE Device_Connected SET Type_Device='$Type_Device_Temp[$Element]' WHERE Device_Connected_Name='$Device_Connected_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE Device_Connected SET Device_Brand='$Device_Brand_Temp[$Element]' WHERE Device_Connected_Name='$Device_Connected_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$sql = "UPDATE Device_Connected SET Device_Comm='$Device_Comm_Temp[$Element]' WHERE Device_Connected_Name='$Device_Connected_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	$Element++;
}
//Variable Page 5
$sql = "UPDATE System SET Data='$Alarm_On_Condition_Temp' WHERE Type_Data='Alarm On Condition'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Alarm_Repeat_Temp' WHERE Type_Data='Alarm Repeat'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Alarm_Destination_Temp' WHERE Type_Data='Alarm Destination'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE System SET Data='$Alarm_Message_Temp' WHERE Type_Data='Alarm Message'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
header("location: tabview.php");
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<div class="TabView" id="TabView">

<!-- *** Tabs ************************************************************** -->

<div class="Tabs" style="width: 1200px;">
  <a>System</a>
  <a>Comm</a>
  <a>Internal IO</a>
  <a>Devices</a>
  <a>Alarm</a>
  <a>CC1120_442</a>
  <a>CC1120TH</a>
  <a>CC1120T</a>
  <a>CC1120kwh</a>
</div>

<!-- *** Pages ************************************************************* -->

<div class="Pages" style="width: 1000px; height: 500px;">

  <div class="Page">
  <div class="Pad">

  <!-- *** Page1 Start *** -->


<table>
	<tr>
		<td>Device IP</td>
		<td><input type="text" name="Device_IP_Temp" value="<?php echo $Device_IP; ?>"></td>
		<td>Enter this device IP</td>
	</tr>
	<tr>
		<td>Gateway</td>
		<td><input type="text" name="Gateway_Temp" value="<?php echo $Gateway; ?>"></td>
		<td>Enter this Gateway IP</td>
	</tr>
	<tr>
		<td>Server Ip</td>
		<td><input type="text" name="Server_IP_Temp" value="<?php echo $Server_IP; ?>"></td>
		<td>Enter server IP</td>
	</tr>
	<tr>
		<td>Storage</td>
		<td><input type="text" name="Storage_Temp" value="<?php echo $Storage; ?>"></td>
		<td>Read SD card spec if available</td>
	</tr>
	<tr>
		<td>Customer Name</td>
		<td><input type="text" name="Customer_Name_Temp" maxlength="60" value="<?php echo $Customer_Name; ?>"></td>
		<td>Number, letter and spesial letter, maximum 60 characters</td>
	</tr>
	<tr>
		<td>Customer ID</td>
		<td><input type="text" name= "Customer_ID_Temp" id="customer_id" maxlength="60" value="<?php echo $Customer_ID; ?>"></td>
		<td>Number and letters only, maximum 60 characters</td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name ="Device_ID_Temp" id="Device_ID_Temp" maxlength="60" value="<?php echo $Device_ID; ?>"></td>
		<td>Number and letters only, maximum 60 characters</td>
	</tr>
	<tr>
		<td>Username</td>
		<td><input type="text" name="Username_Temp" value="<?php echo $Username; ?>"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="email" name="Email_Temp" value="<?php echo $Email; ?>"></td>
	</tr>
	<tr>
		<td>Phone Number</td>
		<td><input type="number" name="Phone_Number_Temp" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo $Phone_Number; ?>"></input></td>
	</tr>
	<tr>
		<td colspan=>
			<center>
				<input type="submit" name="submit" value="Save" />
				<a href="tabview.php">
					<input type="button" name="submit" value="Cancel"> 
				</a>
				<a href="logout.php">
					<input type="button" name="logout" value="logout"> 
				</a>
			</center>
		</td>
	</tr>
</table>

  <!-- *** Page1 End ***** -->

  </div>
  </div>

  <!-- *** Page2 Start *** -->

  <div class="Page">
  <div class="Pad">
  <tr>
  <table>
		<tr>
			<td>WiFi</td>
			<td>
				<select name="Wifi_Option">
				<option selected="selected">
					<?php
						if ($Wifi_Option == "")
						{
							echo "Select a Mode";
						}
						else {
						echo $Wifi_Option;}
					?>
				</option>
				<option value="Enable">Enable</option>
				<option value="Disable">Disable</option>
				</select>
			</td>
		</tr>
	<tr>
		<td>Ethernet</td>
		<td>
			<select name="Ethernet_Option">
				<option selected="selected">
					<?php
						if ($Ethernet_Option == "")
						{
							echo "Select a Mode";
						}
						else {echo $Ethernet_Option;}
					?>
				</option>
				<option value="Enable">Enable</option>
				<option value="Disable">Disable</option>
			</select>
		</td>
	</tr>
  </table>
  <table>
	<hr>
	<tr>
		<td>Current cellular combiation: <?php echo $Cellular_1_Option ." ". $Brand_1_Option . " " . $Cellular_2_Option . " " . $Brand_2_Option; ?></td>
	</tr>
  </table>
  <table>
	<tr>
		<td>Cellular_1<td>
		<td>
			<select name="Cellular_1_Option">
				<option selected="selected">
					<?php
						if ($Cellular_1_Option == "")
						{
							echo "Select a Mode";
						}
						else {echo $Cellular_1_Option;}
					?>
				</option>
				<option value="N/A">N/A</option>
				<option value="GSM">GSM</option>
				<option value="CDMA">CDMA</option>
			</select>
		</td>
		<td>&nbsp;</td>
		<td>Brand<td>
		<td>
			<select name="Brand_1_Option">
				<option selected="selected">
					<?php
						if ($Brand_1_Option == "")
						{
							echo "Select a Mode";
						}
						else {echo $Brand_1_Option;}
					?>
				</option>
				<option value="N/A">N/A</option>
				<option value="Huawei EM300">Huawei EM300</option>
				<option value="ZTE G200">ZTE G200</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Cellular_2<td>
		<td>
			<select name="Cellular_2_Option">
				<option selected="selected">
					<?php
						if ($Cellular_2_Option == "")
						{
							echo "Select a Mode";
						}
						else {echo $Cellular_2_Option;}
					?>
				</option>
				<option value="N/A">N/A</option>
				<option value="CDMA">CDMA</option>
				<option value="GSM">GSM</option>
			</select>
		</td>
		<td>&nbsp;</td>
		<td>Brand<td>
		<td>
			<select name="Brand_2_Option">
				<option selected="selected">
					<?php
						if ($Brand_2_Option == "")
						{
							echo "Select a Mode";
						}
						else {echo $Brand_2_Option;}
					?>
				</option>
				<option value="N/A">N/A</option>
				<option value="ZTE G200">ZTE G200</option>
				<option value="Huawei EM300">Huawei EM300</option>
			</select>
		</td>
	</tr>
  </table>
  <table>
		<hr>
		<tr>
			<td>Bluetooth</td>
			<td>
				<select name="Bluetooth_Option">
					<option selected="selected">
					<?php
						if ($Bluetooth_Option == "")
						{
							echo "Select a Mode";
						}
						else {echo $Bluetooth_Option;}
					?>
				</option>
				<option value="N/A">N/A</option>
				<option value="Enable">Enable</option>
				<option value="Disable">Disable</option>
				</select>
			</td>
		</tr>
</table>
<table>
		<hr>
		<tr>
			<td>Wireless CC1120</td>
			<td>
				<select name="Wireless_CC1120_Option">
					<option selected="selected">
					<?php
						if ($Wireless_CC1120_Option == "")
						{
							echo "Select a Mode";
						}
						else {echo $Wireless_CC1120_Option;}
					?>
				</option>
				<option value="Enable">Enable</option>
				<option value="Disable">Disable</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Carrier Frequency</td>
			<td ><input type="number" name="Carrier_Frequency" value="<?php echo $Carrier_Frequency; ?>"></td>
			<td>khz</td>
			<td>(Input from 410.000 to 480.000 khz)</td>
		</tr>
		<tr>
			<td>Bit Rate</td>
			<td><input type="number" name="Bit_Rate" value="<?php echo $Bit_Rate; ?>"></td>
			<td>Bps</td>
			<td>(Input from 1.200 to 100.000 bps)</td>
		</tr>
		<tr>
			<td>Rx Band Width Filter</td>
			<td ><input type="number" name="Rx_Band_Width_Filter" value="<?php echo $Rx_Band_Width_Filter; ?>"></td>
			<td>hz</td>
			<td>(Input from 10.000 to 200.000 hz)</td>
		</tr>
		<tr>
			<td>Modulation Format</td>
			<td>
				<select name="Modulation_Format_Option">
					<option selected="selected">
					<?php
						if ($Modulation_Format_Option == "")
						{
							echo "Select a Mode";
						}
						else {echo $Modulation_Format_Option;}
					?>
				</option>
				<option value="2-FSK">2-FSK</option>
				<option value="4-FSK">4-FSK</option>
				<option value="2-GFSK">2-GFSK</option>
				<option value="MSK">MSK</option>
				<option value="OOK">OOK</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tx Power</td>
			<td ><input type="number" name="Tx_Power" value="<?php echo $Tx_Power; ?>"></td>
			<td>dBm</td>
			<td>(Input from -11 to +15 dBm)</td>
		</tr>
		<tr>
			<td>Performance Mode</td>
			<td>
				<select name="Performance_Mode_Option">
					<option selected="selected">
					<?php
						if ($Performance_Mode_Option == "")
						{
							echo "Select a Mode";
						}
						else {echo $Performance_Mode_Option;}
					?>
				</option>
				<option value="High Performance">High Performance</option>
				<option value="Low Power">Low Power</option>
				</select>
			</td>
		</tr>

  </table>
  <table>
		<tr>
			<td colspan=>
			<center>
				<input type="submit" name="submit" value="Save" />
				<a href="tabview.php">
					<input type="button" name="submit" value="Cancel"> 
				</a>
				<a href="logout.php">
					<input type="button" name="logout" value="logout"> 
				</a>
			</center>
		</td>
		</tr>
</table>
  
  <!-- *** Page2 End ***** -->

  </div>
  </div>

  <div class="Page">
  <div class="Pad">

  <!-- *** Page3 Start *** -->

 
  <table>
<?php
$Element = 0;
while ( $Element < $Max_Element )
{
	
	echo "  
		<tr>
		<td>" . $Digital_Input_Name[$Element] . "</td>
		<td>
			<select name='" . $Input[$Element] . "'>
			<option selected='selected'>"
			. $Input_Condition[$Element] . 
			"</option> 
			<option value='Enable'>Enable</option>
			<option value='Disable'>Disable</option>
			</select>		
		</td>
		<td> Alarm if </td>
		<td>
			<select name='" . $Alarm[$Element] . "'>
			<option selected='selected'>
			" . $Alarm_Condition[$Element]. 
			"</option> 
			<option value='Open'>Open</option>
			<option value='Close'>Close</option>
		</td>
		<td> Alarm Severity</td>
		<td>

			<select name='" . $Severity[$Element] . "'>
			<option selected='selected'>
			" . $Alarm_Severity[$Element]. 
			"</option> 
			<option value='Critical'>Critical</option>
			<option value='Major'>Major</option>
			<option value='Normal'>Normal</option>
		</td>
		</tr>";
	$Element++;
}
echo "</table>
<table>
<hr>";
$Element = 0;
while ( $Element < $Max_Digital_Output_Element)
{
	
	echo "  

		<tr>
		<td>" . $Digital_Output_Name[$Element] . "</td>
		<td><input type='text' name='" . $Digital_Description_Output[$Element] . "' value='" . $Digital_Output_Description[$Element] . "'></td>
		</tr>";
	$Element++;
}
echo "</table>
<table>
<hr>";
$Element = 0;
while ( $Element < $Max_Analog_Input_Element)
{
	
	echo "  
		<tr>
		<td>" . $Analog_Input_Name[$Element] . "</td>
		<td><input type='text' name='" . $Analog_Description_Input[$Element] . "' value='" . $Analog_Input_Description[$Element] . "'></td>
		<td>Min</td>
		<td><input type='text' name='" . $Analog_Min_Input[$Element] . "' value='" . $Analog_Input_Min[$Element] . "'></td>
		<td>Max</td>
		<td><input type='number' name='" . $Analog_Max_Input[$Element] . "' value='" . $Analog_Input_Max[$Element] . "'></td>
		<td> Alarm Severity</td>
		<td>

			<select name='" . $Analog_Alarm_Severity_Input[$Element] . "'>
			<option selected='selected'>
			" . $Analog_Input_Alarm_Severity[$Element]. 
			"</option> 
			<option value='Critical'>Critical</option>
			<option value='Major'>Major</option>
			<option value='Normal'>Normal</option>
		</td>
		</tr>";
	$Element++;
}
?>
	</table>
	<table>
		<tr>
			<td colspan=>
			<center>
				<input type="submit" name="submit" value="Save" />
				<a href="tabview.php">
					<input type="button" name="submit" value="Cancel"> 
				</a>
				<a href="logout.php">
					<input type="button" name="logout" value="logout"> 
				</a>
			</center>
		</td>
		</tr>
	</table>
  </table>

  <!-- *** Page3 End ***** -->

  </div>
  </div>
	<div class="Page">
	<div class="Pad">
	
	<!-- *** Page4 Start *** -->
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
		<td><input type='text' name='" . $Brand_Device[$Element] . "' value='" . $Device_Brand[$Element] . "'></td>
		<td>Communication Method</td>

		<td>

			<select name='" . $Comm_Device[$Element] . "'>

			<option selected='selected'>
			" . $Device_Comm[$Element]. 
			"</option> 

			<option value='SNMP'>SNMP</option>
			<option value='REST'>REST</option>

		</td>
		</tr>";
	$Element++;
}
?>
		<tr>
			<td colspan=>
			<center>
				<input type="submit" name="submit" value="Save" />
				<a href="tabview.php">
					<input type="button" name="submit" value="Cancel"> 
				</a>
				<a href="logout.php">
					<input type="button" name="logout" value="logout"> 
				</a>
			</center>
		</td>
		</tr>
	</table>
  <!-- *** Page4 End ***** -->

  </div>
  </div>
  
  <!-- *** Page 5 Start ***** -->
  
	<div class="Page">
	<div class="Pad">
	
	<table>
		<tr>
			<td>Alarm Notification</td>
			<td>
				<select name="Alarm_On_Condition">
					<option selected="selected">
					<?php
						if ($Alarm_On_Condition == "")
						{
							echo "Select a Mode";
						}
						else {
						echo $Alarm_On_Condition;}
					?>
					</option>
					<option value="Disable">Disable</option>
					<option value="Critical Only">Critical only</option>
					<option value="Critical & Major Only">Critical & Major only</option>
					<option value="All Alarm">All alarm</option>
				</select>
			</td>
			<td>Disable, Critical Only, Critical & Major Only, All Alarms</td>
		</tr>
		<tr>
			<td>Send alarm until</td>
			<td>
				<select name="Alarm_Repeat">
					<option selected="selected">
					<?php
						if ($Alarm_Repeat == "")
						{
							echo "Select a Mode";
						}
						else {
						echo $Alarm_Repeat;}
					?>
					</option>
					<option value="Send once">Send once</option>
					<option value="Send until acknwoledge">Send until acknwoledge</option>
				</select>
			</td>
			<td>Send once, send until acknowledge</td>
		</tr>
		<tr>
			<td>Send alarm to</td>
			<td>
				<select name="Alarm_Destination">
					<option selected="selected">
					<?php
						if ($Alarm_Destination == "")
						{
							echo "Select a Mode";
						}
						else {
						echo $Alarm_Destination;}
					?>
					</option>
					<option value="Email">Email</option>
					<option value="Voice call">Voice call</option>
					<option value="None">None</option>
					<option value="SMS">SMS</option>
					<option value="Email & SMS">Email & SMS</option>
				</select>
			</td>
			<td>Email, SMS, Voice Call, None, Email and SMS. Send to server is standard
		</tr>
	</table>
	<table>
		<tr>
			<td>Alarm Message</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>
				<style>textarea.foo{resize:none;}</style>
				<textarea input type="text" class="foo" name="Alarm_Message" cols="50" rows="2" /><?php echo $Alarm_Message;?></textarea>
			</td>
		</tr>
<?php
echo "</table>
<table>
<hr>";
$Element = 0;
while ( $Element < $Max_Digital_Output_Element )
{
$OneElement = $Element + 1;
	
	echo "  

		<tr>
		<td>Alarm Lokal " . $OneElement . " Direct </td>
		<td>

			<select name='" . $Digital_Alarm_Output[$Element] . "'>
			<option selected='selected'>
			" . $Digital_Output_Alarm[$Element] . 
			"</option> 
			<option value='None'>None</option>
			<option value='Critical'>Critical</option>
			<option value='Major'>Major</option>
			<option value='Normal'>Normal</option>
		</td>
		<td> to " . $Digital_Output_Name[$Element] . " " . $Digital_Output_Description[$Element] . "</td>
		</tr>";
	$Element++;
}
?>
	</table>
	<table>
		<tr>
			<td colspan=>
			<center>
				<input type="submit" name="submit" value="Save" />
				<a href="tabview.php">
					<input type="button" name="submit" value="Cancel"> 
				</a>
				<a href="logout.php">
					<input type="button" name="logout" value="logout"> 
				</a>
			</center>
		</td>
		</tr>
	</table>	
	
	</div>
	</div>
	
	<!-- *** Page 5 End ***** -->
	
	<div class="Page">
	<div class="Pad">
	
	<!-- *** Page 6 Start ***** -->
	
	<table>
		<tr>
			<td>List CC1120</td>
			<td>
				<select name="list_cc1120">
					<option value="1234, CC1120_room1, IO, Normal">1234, CC1120_room1, IO, Normal</option>
					<option value="1235, CC1120_room2, IO, Normal">1235, CC1120_room2, IO, Normal</option>
					<option value="1233, CC1120_room3, Sensor, Normal">1233, CC1120_room3, Sensor, Normal</option>
					<option value="1231, CC1120_room4, IO, Normal">1231, CC1120_room4, IO, Normal</option>
					<option value="1234, CC1120_room5, KWH, Normal">1234, CC1120_room5, KWH, Normal</option>
				</select>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>
				CC1120 ID
			</td>
			<td>
				<input size="4" name="cc1120_id" value="1236"/input>
			</td>
			<td>&nbsp;</td>
			<td>CC1120 Label</td>
			<td>
				<input size="15" name="CC1120_Label" value="CC1120_basement">
			</td>
		</tr>
		<tr>
			<td>
				Device Type
			</td>
			<td>
				<input size="15" name="Device Type" value="CC1120_IO_442">
			</td>
			<td>
				&nbsp;
			</td>
			<td>
				Device Status
			</td>
			<td>
				<select name="option">
					<option value="Normal">Normal</option>
					<option value="Disconnected">Disconnected</option>
					<option value="New">New</option>
				</select>
			</td>
			<td>Normal, Disconnected, New
		</tr>
	</table>
	<table>
		<tr>
			<td>Remote CC1120 RSSI</td>
			<td><input size="1" name="Remote CC1120 RSSI" value="-80"></td>
			<td>dbm</td>
			<td>&nbsp;</td>
			<td>Send parameter every</td>
			<td><input size="2" name="Send parameter every" value="xxx"></td>
			<td>second</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Digital Input_0</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td><input size="3" name="Digital Input_0" value="Close"></td>
			<td>Alarm if</td>
			<td>
				<select name="option">
					<option value="Open">Open</option>
					<option value="Close">Close</option>
				</select>
			</td>
			<td>Then</td>
			<td>
				<select name="option">
					<option value="On">On</option>
					<option value="Off">Off</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Digital Input_1</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td><input size="3" name="Digital Input_1" value="Close"></td>
			<td>Alarm if</td>
			<td>
				<select name="option">
					<option value="Open">Open</option>
					<option value="Close">Close</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Digital Input_2</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td><input size="3" name="Digital Input_2" value="Close"></td>
			<td>Alarm if</td>
			<td>
				<select name="option">
					<option value="Open">Open</option>
					<option value="Close">Close</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Digital Input_3</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td><input size="3" name="Digital Input_3" value="Close"></td>
			<td>Alarm if</td>
			<td>
				<select name="option">
					<option value="Open">Open</option>
					<option value="Close">Close</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Digital Ouput_0</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>	
			<td><input size="3" name="Digital Ounput_0" value="Close"></td>
		</tr>
		<tr>
			<td>Digital Ouput_1</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			<td><input size="3" name="Digital Ounput_1" value="Close"></td>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Analog Input_0</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td><input size="1" name="Analog Input_0" value="80"></td>
			<td>Alarm If</td>
			<td>
				<select name="option">
					<option value="More than">More than</option>
					<option value="Less than">Less than</option>
				</select>
			</td>
			<td>
				<input size="1" name="Analog Input_0" value="35">
			</td>
			<td>&nbsp;</td>
			<td>Alarm Description</td>
			<td><input size="20" name="Alarm_Description"value="High temperature"></td>
		</tr>
		<tr>
			<td>Analog Input_1</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td>
				<input size="1" name="Analog Input_1" value="80">
			</td>
			<td>Alarm If</td>
			<td>
				<select name="option">
					<option value="Enable">Betwen</option>
					<option value="Disable">Out Off</option>
				</select>
			</td>
			<td><input size="1" name="Analog Input_1" value="70"></td>
			<td><input size="1" name="Analog Input_1" value="80"></td>
			<td>Alarm Description</td>
			<td>
				<input size="20" name="Alarm Description"value="Humidity out of tolarance">
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan=>
				<center>
					<input type="submit" name="submit" value="Save">
					<input type="submit" name="submit" value="Cancel">
					<input type="submit" name="submit" value="Add New">
					<input type="submit" name="submit" value="Delete Node">
					<input type="submit" name="submit" value="Query">
				</center>
			</td>
		</tr>
	</table>
	
	<!-- *** Page 6 End ***** -->
	
	</div>
	</div>
	
	<!-- *** Page 7 Start ***** -->
	
	<div class="Page">
	<div class="Pad">
	
	<table>
		<tr>
			<td>List CC1120</td>
			<td>
				<select name="List CC1120">
					<option value="1234, CC1120_room1, IO, Normal">1234, CC1120_room1, IO, Normal</option>
					<option value="1235, CC1120_room2, IO, Normal">1235, CC1120_room2, IO, Normal</option>
					<option value="1233, CC1120_room3, Sensor, Normal">1233, CC1120_room3, Sensor, Normal</option>
					<option value="1231, CC1120_room4, IO, Normal">1231, CC1120_room4, IO, Normal</option>
					<option value="1234, CC1120_room5, KWH, Normal">1234, CC1120_room5, KWH, Normal</option>
				</select>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>CC1120 ID</td>
			<td>
				<input size="2" name="CC1120_ID"value="1236">
			</td>
			<td>CC1120 Label</td>
			<td>
				<input size="15" name="CC1120_Label" value="CC1120_basement">
			</td>
		</tr>
		<tr>
			<td>Device Type</td>
			<td>
				<input size="15" name="Device Type" value="CC1120_IO_442">
			</td>
			<td>Device Status</td>
			<td>
			<select name="option">
			<option value="Disable">Normal</option>
			<option value="Disable">Disconnected</option>
			<option value="Disable">New</option></select></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Remote CC1120 RSSI</td>
			<td>
				<input size="1" name="Remote_CC1120_RSSI" value="-80">
			</td>
			<td>dbm</td>
			<td>
				Send parameter every
			</td>
			<td>
				<input size="1" name="Send parameter every" value="xxx">
			</td>
			<td>
				second
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Digital Input_1</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td>
				<input size="2" name="Digital_input_1" value="Close">
			</td>
			<td>Alarm if</td>
			<td>
				<select name="option">
					<option value="Open">Open</option>
					<option value="Close">Close</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Digital Input_2</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td>
				<input size="2" name="Digital_input_2" value="Close">
			</td>
			<td>Alarm if</td>
			<td>
				<select name="option">
					<option value="Open">Open</option>
					<option value="Close">Close</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Temperature_1</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td>
				<input size="1" name="Temperature_1" value="80">
			</td>
			<td>Alarm If</td>
			<td>
				<select name="option">
					<option value="More than">More than</option>
					<option value="Less than">Less than</option>
				</select>
			</td>
			<td>
				<input size="1" name="Temperature_1" value="35">
			</td>
			<td>&nbsp;</td>
			<td>Alarm Description</td>
			<td>
				<input size="20" name="Temperature_1" value="High Temperature">
			</td>
		</tr>
		<tr>
			<td>Temperarture_2</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td>
				<input size="1" name="Temperature_2" value="35">
			</td>
			<td>Alarm If</td>
			<td>
				<select name="option">
					<option value="Enable">Betwen</option>
					<option value="Disable">Out Off</option>
				</select>
			</td>
			<td>
				<input size="1" name="Temperarture_2" value="70">
			</td>
			<td>
				<input size="1" name="Temperarture_2" value="80">
			</td>
			<td>Alarm Description</td>
			<td>
				<input size="20" name="Temperarture_2" value="Temperature out of tolarance">
			</td>
		</tr>
		<tr>
			<td>Humidity</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td>
				<input size="1" name="Humidity" value="70">
			</td>
			<td>Alarm If</td>
			<td>
				<select name="option">
					<option value="Enable">Betwen</option>
					<option value="Disable">Out Off</option>
				</select>
			</td>
			<td><input size="1" name="Humidity" value="70"></td>
			<td><input size="1" name="Humidity" value="80"></td>
			<td>Alarm Description</td>
			<td><input size="20" name="alarm_description" value="Humidiy out of tolarance"></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan=>
				<center>
					<input type="submit" name="submit" value="Save">
					<input type="submit" name="submit" value="Cancel">
					<input type="submit" name="submit" value="Add New">
					<input type="submit" name="submit" value="Delete Node">
				</center>
			</td>
		</tr>
	</table>
	
	<!-- *** Page 7 End ***** -->
	
	</div>
	</div>
	
	<!-- *** Page 8 Start ***** -->
	
	<div class="Page">
	<div class="Pad">
	
	<table>
		<tr>
			<td>List CC1120</td>
			<td>
				<select>
					<option value= "1234">1234, CC1120_room1, IO, Normal</option>
					<option value= "1235">1235, CC1120_room2, IO, Normal</option>
					<option value= "1233">1233, CC1120_room3, Sensor, Normal</option>
					<option value= "1231">1231, CC1120_room4, IO, Normal</option>
					<option value= "1236">1236, CC1120_room5, KWH, Normal</option>
				</select>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>CC1120 ID</td>
			<td><input size="1" value="1234"/></td>
			<td>CC1120 Label</td>
			<td><input size="15" value="CC1120_room1"/></td>
		</tr>
		<tr>
			<td>Device Type</td>
			<td><input value="CC1120_IO_442"/></td>
			<td>Device Status</td>
			<td>
				<select name="option">
					<option value="Normal">Normal</option>
					<option value="Disconnected">Disconnected</option>
					<option value="New">New</option>
				</select>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Remote CC1120 RSSI</td>
			<td><input size="1" value="-80"/></td>
			<td>dbm</td>
			<td>&nbsp;</td>
			<td>Send parameter every</td>
			<td><input size="1" value="xxx"/></td>
			<td>second</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Digital Input_1</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td><input size="1" value="Close"/></td>
			<td>Alarm if</td>
			<td>
				<select name="option">
					<option value="Open">Open</option>
					<option value="Close">Close</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Digital Input_2</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td><input size="2" value="Close"/></td>
			<td>Alarm if</td>
			<td>
				<select name="option">
					<option value="Open">Open</option>
					<option value="Close">Close</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Temperature_1</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			<td><input size="1" value="80"/></td>
			<td>Alarm If</td>
			<td>
				<select name="option">
					<option value="More than">More than</option>
					<option value="Less than">Less than</option>
				</select>
			</td>
			<td><input size="1" value="35"/></td>
			<td>&nbsp;</td>
			<td>Alarm Description</td>
			<td><input size="20" value="High temperature"/></td>
		</tr>
		<tr>
			<td>Temperarture_2</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td>&nbsp;</td>
			<td>Alarm If</td>
			<td>
				<select name="option">
					<option value="Enable">Betwen</option>
					<option value="Disable">Out Off</option>
				</select>
			</td>
			<td><input size="1" value="70"/></td>
			<td><input size="1" value="80"/></td>
			<td>Alarm Description</td>
			<td><input size="20" value="Temperature out of tolarance"/></td>
		</tr>
		<tr>
			<td>Temperature_3</td>
			<td>
				<select name="option">
					<option value="Enable">Enable</option>
					<option value="Disable">Disable</option>
				</select>
			</td>
			<td>&nbsp;</td>
			<td>Alarm If</td>
			<td>
				<select name="option">
					<option value="Enable">Betwen</option>
					<option value="Disable">Out Off</option>
				</select>
			</td>
			<td><input size="1" value="70"/></td>
			<td><input size="1" value="80"/></td>
			<td>Alarm Description</td>
			<td><input value="Humidiy out of tolarance"/></td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan=>
				<center>
					<input type="submit" name="submit" value="Save">
					<input type="submit" name="submit" value="Cancel">
					<input type="submit" name="submit" value="Add New">
					<input type="submit" name="submit" value="Delete Node">
				</center>
			</td>
		</tr>
	</table>
	
	<!-- *** Page 8 End ***** -->
	
	</div>
	</div>
	
	<!-- *** Page 9 Start ***** -->
	
	<div class="Page">
	<div class="Pad">
	
	<table>
		<tr>
			<td>List CC1120</td>
			<td>
				<select name="List_CC1120">
					<option value="1234, CC1120_room1, IO, Normal">1234, CC1120_room1, IO, Normal</option>
					<option value="1235, CC1120_room2, IO, Normal">1235, CC1120_room2, IO, Normal</option>
					<option value="1233, CC1120_room3, Sensor, Normal">1233, CC1120_room3, Sensor, Normal</option>
					<option value="1231, CC1120_room4, IO, Normal">1231, CC1120_room4, IO, Normal</option>
					<option value="1234, CC1120_room5, KWH, Normal">1234, CC1120_room5, KWH, Normal</option>
				</select>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>CC1120 ID</td>
			<td>
				<input size="1" name="cc1120_id" value="1236">
			</td>
			<td>&nbsp;</td>
			<td>CC1120 Label</td>
			<td>
				<input size="15" name="CC1120_basement" value="CC1120_basement">
			</td>
		</tr>
		<tr>
			<td>Device Type</td>
			<td>
				<input size="15" name="device_tipe" value="CC1120_IO_442">
			</td>
			<td>&nbsp;</td>
			<td>Device Status</td>
			<td>
				<select name="device_status">
					<option value="Disable">Normal</option>
					<option value="Disable">Disconnected</option>
					<option value="Disable">New</option>
				</select>
			</td>
		</tr>
		</table>
		<table>
		<tr>
			<td>Remote CC1120 RSSI</td>
			<td>
				<input size="1" rows="1" name="rcc1120rrsi" value="80">
			</td>
			<td>dbm</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>Send parameter every</td>
			<td>
				<input size="1" name="send_parameter_every" value="xxx">
			</td>
			<td>second</td>
		</tr>
		</table>
		<table>
		<tr>
			<td>I_R1</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
			<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_R2</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_R3</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
			<td>
		</tr>
		<tr>
			<td>I_R4</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_R5</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
			<td>
		</tr>
		<br />
			<td>I_R6</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_S1</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
			<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_S2</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_S3</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_S4</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_S5</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_S6</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_T1</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_T2</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_T3</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
			<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_T4</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
			<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_T5</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
			<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td>I_T6</td>
			<td>
				<select name="option">
				<option value="More">More than</option>
				<option value="Less">Less than</option></select>
			</td>
			<td>
				<input size="1" value="40">
			</td>
			<td>Amp</td>
			<td>
				<select name="option">
				<option value="OR">OR</option>
				<option value="And">And</option></select>
			</td>
			<td>
				<select name="option">
				<option value="Less">Less than</option>
				<option value="More">More than</option></select>
			</td>
			<td>
				<input size="1" value="1">
			</td>
			<td>Amp</td>
		</tr>
		<tr>
			<td colspan="8">
				<center>
					<input type="submit" name="submit" value="Save">
					<input type="submit" name="submit" value="Cancel">
					<input type="submit" name="submit" value="Add New">
					<input type="submit" name="submit" value="Delete Node">
				</center>
			</td>
		</tr>
	</table>
	
	</div>
	</div>	
	

</div>

</div>

</form>
	  
<?php
  
  //echo "Wifi Option is " . $Wifi_Option . "<br>";
  //echo "Testdb is " . $dbname;
?>

<scrIPt type="text/javascript">

tabview_initialize('TabView');

</script>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

<?php
session_start();
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
//Receiving data
$ID = $_SESSION['ID'];
$Name = $_SESSION['Name'];
$Type = $_SESSION['Type'];
$Device_Stat = $_SESSION['Device_Stat'];
echo $ID . " " . $Name . " " . $Type . " " . $Device_Stat . "<br>"; 
//Data from the form to variable
$Max_Element = $_SESSION['Max_Element'];
echo "Max Element is " . $Max_Element . "<br>";
//Get Node Name
$Element = 0;
while ( $Element < $Max_Element)
{
	$Name_Node = "Node_Name_" . $Element;
	$Node_Name[$Element] = $_SESSION[$Name_Node]; 
	echo $Node_Name[$Element] . "<br>";
	$Element++;
}
//Catch to delete
if ( isset( $_POST['Delete'] ) ) {
	echo "Delete " . $ID . "<br>";
   if ( $ID != 0 )
   {
	$sql = "DELETE FROM CC1120_Main WHERE ID = '$ID'";
	if ($conn->query($sql) === TRUE) {
	   	 		echo "Record updated successfully";
			} else {
    				echo "Error updating record: " . $conn->error;
			}
	if ($Type == "IO 442")
		{
			$sql = "DELETE FROM CC1120_IO_442 WHERE ID_CC1120 = '$ID'";
			if ($conn->query($sql) === TRUE) {
	   	 		echo "Record updated successfully";
			} else {
    				echo "Error updating record: " . $conn->error;
			}
		}
	if ($Type == "KWH")
		{
			$sql = "DELETE FROM CC1120_KWH WHERE ID_CC1120 = '$ID'";
			if ($conn->query($sql) === TRUE) {
	   	 		echo "Record updated successfully";
			} else {
    				echo "Error updating record: " . $conn->error;
			}
		}
	if ($Type == "TH")
		{
			$sql = "DELETE FROM CC1120_TH WHERE ID_CC1120 = '$ID'";
			if ($conn->query($sql) === TRUE) {
	   	 		echo "Record updated successfully";
			} else {
    				echo "Error updating record: " . $conn->error;
			}
		}
   }
}

//Catch the post form of changing CC1120 Main
$Id_Temp = $_POST["Id_CC1120"];
$Name_Temp = $_POST["Name_CC1120"];
$Type_Temp = $_POST["Type_Device"];
$Device_Stat_Temp = $_POST["Stat_Device"];
$RSSI_Temp = $_POST["RSSI_CC1120"];
$Parameter_Time_Temp = $_POST["Time_Parameter"];
//Catch the post form of new CC1120 Main
$Id_New = $_POST["Id_CC1120_New"];
$Name_New = $_POST["Name_CC1120_New"];
$Type_New = $_POST["Type_Device_New"];
$Device_Stat_New = $_POST["Stat_Device_New"];
$RSSI_New = $_POST["RSSI_CC1120_New"];
$Parameter_Time_New = $_POST["Time_Parameter_New"];
echo $Id_New . " " . $Name_New . " " . $Type_New . " " . $Device_Stat_New . " " . $RSSI_New . " " . $Parameter_Time_New . "<br>";
$sql = "SELECT * FROM CC1120_Main WHERE ID = '$Id_New'";
$result  = $conn->query($sql);
if ( $Id_New != "" )
{
   if (mysqli_num_rows($result) > 0) {
    // output data of each row
	$Prevent_Jump = 1;
	echo "Data already exist";
	echo '
        <script type="text/javascript">
            alert("The ID is already Used"); 
            window.location.href = "tabview.php";</script>';
   }
   else
   {
	echo "Starting adding ID";
	$sql = "INSERT INTO CC1120_Main VALUES ('$Id_New', '$Name_New', '$Type_New' , '$Device_Stat_New', '$RSSI_New', '$Parameter_Time_New')";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	if ($Type_New == "IO 442")
	{
		$Element = 0;
		while ( $Element < 4 )
		{
			$sql = "INSERT INTO CC1120_IO_442 VALUES ('$Id_New', 'Digital Input ".$Element."', '', '', '', '', '', '', '')";
			if ($conn->query($sql) === TRUE) {
	   	 		echo "Record updated successfully";
			} else {
    				echo "Error updating record: " . $conn->error;
			}
			$Element++;
		}
		$Element = 0;
		while ( $Element < 4 )
		{
			$sql = "INSERT INTO CC1120_IO_442 VALUES ('$Id_New', 'Digital Output ".$Element."', '', '', '', '', '', '', '')";
			if ($conn->query($sql) === TRUE) {
	   	 		echo "Record updated successfully";
			} else {
    				echo "Error updating record: " . $conn->error;
			}
			$Element++;
		}
		$Element = 0;
		while ( $Element < 2 )
		{
			$sql = "INSERT INTO CC1120_IO_442 VALUES ('$Id_New', 'Analog Input ".$Element."', '', '', '', '', '', '', '')";
			if ($conn->query($sql) === TRUE) {
	   	 		echo "Record updated successfully";
			} else {
    				echo "Error updating record: " . $conn->error;
			$Element++;
			}
			$Element++;
		}
	}
	if ($Type_New == "KWH")
	{
		$Element = 1;
		while ( $Element < 4 )
		{
			$sql = "INSERT INTO CC1120_KWH VALUES ('$Id_New', 'I_R".$Element."', '', '', '', '', '', '', '')";
			if ($conn->query($sql) === TRUE) {
	   	 		echo "Record updated successfully";
			} else {
    				echo "Error updating record: " . $conn->error;
			}
			$Element++;
		}
		$Element = 1;
		while ( $Element < 4 )
		{
			$sql = "INSERT INTO CC1120_KWH VALUES ('$Id_New', 'I_S".$Element."', '', '', '', '', '', '', '')";
			if ($conn->query($sql) === TRUE) {
	   	 		echo "Record updated successfully";
			} else {
    				echo "Error updating record: " . $conn->error;
			}
			$Element++;
		}
		$Element = 1;
		while ( $Element < 4 )
		{
			$sql = "INSERT INTO CC1120_KWH VALUES ('$Id_New', 'I_T".$Element."', '', '', '', '', '', '', '')";
			if ($conn->query($sql) === TRUE) {
	   	 		echo "Record updated successfully";
			} else {
    				echo "Error updating record: " . $conn->error;
			$Element++;
			}
			$Element++;
		}
	}
	if ($Type_New == "TH")
	{
		$Element = 1;
		while ( $Element < 3 )
		{
			$sql = "INSERT INTO CC1120_TH VALUES ('$Id_New', 'Digital Input ".$Element."', '', '', '', '', '', '', '')";
			if ($conn->query($sql) === TRUE) {
	   	 		echo "Record updated successfully";
			} else {
    				echo "Error updating record: " . $conn->error;
			}
			$Element++;
		}
		$Element = 1;
		while ( $Element < 3 )
		{
			$sql = "INSERT INTO CC1120_TH VALUES ('$Id_New', 'Temperature ".$Element."', '', '', '', '', '', '', '')";
			if ($conn->query($sql) === TRUE) {
	   	 		echo "Record updated successfully";
			} else {
    				echo "Error updating record: " . $conn->error;
			}
			$Element++;
		}
		$Element = 1;
		while ( $Element < 2 )
		{
			$sql = "INSERT INTO CC1120_TH VALUES ('$Id_New', 'Humidity', '', '', '', '', '', '', '')";
			if ($conn->query($sql) === TRUE) {
	   	 		echo "Record updated successfully";
			} else {
    				echo "Error updating record: " . $conn->error;
			}
			$Element++;
		}
	}
   }
}
// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);

if ( $Name_Temp != "")
{
$sql = "UPDATE CC1120_Main SET Name='$Name_Temp' WHERE ID='$Id_Temp'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
}
if ( $Type_Temp != "")
{
$sql = "UPDATE CC1120_Main SET Type='$Type_Temp' WHERE ID='$Id_Temp'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
}
if ( $Device_Stat_Temp != "")
{
$sql = "UPDATE CC1120_Main SET Device_Stat='$Device_Stat_Temp' WHERE ID='$Id_Temp'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
}
if ( $RSSI_Temp != "")
{
$sql = "UPDATE CC1120_Main SET RSSI='$RSSI_Temp' WHERE ID='$Id_Temp'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
}
if  ($Parameter_Time_Temp != "")
{
$sql = "UPDATE CC1120_Main SET Parameter_Time='$Parameter_Time_Temp' WHERE ID='$Id_Temp'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
}

//Check choosen file IO
if ($Type == "IO 442")
{
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
    //Create connection and update to database
    $Element = 0;

    while ($Element < $Max_Element)
    {
    if ( $Node_Availability_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_IO_442 SET Node_Availability='$Node_Availability_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
     }
	/*
	$sql = "UPDATE CC1120_IO_442 SET CC1120_Condition='$CC1120_Condition_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	*/
    if ( $Alarm_Condition_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_IO_442 SET Alarm_Condition='$Alarm_Condition_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Severity_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_IO_442 SET Alarm_Severity='$Alarm_Severity_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Description_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_IO_442 SET Alarm_Description='$Alarm_Description_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Max_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_IO_442 SET Alarm_Max='$Alarm_Max_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Condition_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_IO_442 SET Alarm_Min='$Alarm_Min_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
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
    //Create connection and update to database
    $Element = 0;

    while ($Element < $Max_Element)
    {
    if ( $Alarm_Cond_1_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_KWH SET Alarm_Cond_1='$Alarm_Cond_1_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Var_1_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_KWH SET Alarm_Var_1='$Alarm_Var_1_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Logic_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_KWH SET Alarm_Logic='$Alarm_Logic_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Cond_2_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_KWH SET Alarm_Cond_2='$Alarm_Cond_2_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Var_2_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_KWH SET Alarm_Var_2='$Alarm_Var_2_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Severity_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_KWH SET Alarm_Severity='$Alarm_Severity_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Description_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_KWH SET Alarm_Description='$Alarm_Description_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
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
    //Create connection and update to database
    $Element = 0;

    while ($Element < $Max_Element)
    {
    if ( $Node_Availability_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_TH SET Node_Availability='$Node_Availability_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }	
	/*
	$sql = "UPDATE CC1120_TH SET CC1120_Condition='$CC1120_Condition_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
	*/
    if ( $Alarm_Condition_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_TH SET Alarm_Condition='$Alarm_Condition_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Severity_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_TH SET Alarm_Severity='$Alarm_Severity_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Description_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_TH SET Alarm_Description='$Alarm_Description_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Max_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_TH SET Alarm_Max='$Alarm_Max_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    if ( $Alarm_Min_Temp[$Element] != "" )
    {
	$sql = "UPDATE CC1120_TH SET Alarm_Min='$Alarm_Min_Temp[$Element]' WHERE Node_Name='$Node_Name[$Element]' AND ID_CC1120='$ID'";
	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}
    }
    $Element++;
    }
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
</body>
</html>

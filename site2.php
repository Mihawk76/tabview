 <html>
 <body>

 Hello <?php echo $_POST["name"]; ?>!<br>
 Your mail is <?php echo $_POST["email"]; ?>.
 <?php 
	session_start();
	$Element = 0;
	$Max_Element = 10;
	while ( $Element < $Max_Element )
	{
		$Item = "Item_" . $Element;
		echo $_SESSION[$Item] . "<br>";
		$Element++;
	}
	$Variable = $_SESSION['Max_Element'];
	echo "<br> Variable adalah " . $Variable . "<br>";
?>
 </body>
 </html> 

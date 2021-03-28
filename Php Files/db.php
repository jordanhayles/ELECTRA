     <?php
//make connection
    $dbh = mysqli_connect('localhost', 'root', ''); 
	//connect to MySQL server if (!$dbh)     
    if(!mysqli_connect('localhost', 'root', ''))
	die("Unable to connect to MySQL: " . mysqli_error()); 
	//if connection failed output error message 
    
	if (!mysqli_select_db($dbh,'inventorysys'))     
	die("Unable to select database: " . mysqli_error()); 
	//if selection fails output error message 
    ?>
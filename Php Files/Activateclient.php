<?php
include "db.php";  //database connection file
//Activating client account
$id2=$_GET['id2'];
 $sus="UPDATE client SET Active = 'yes' WHERE id2 = '$id2'";//sql command
 $result=mysqli_query($dbh,$sus); //Execute command
echo '<script type="text/javascript">';
echo 'alert ("User Account is activated!")'; //alert message
echo '</script>';
      $URL="Clientlist.php";
echo "<script>location.href='$URL'</script>";      

?>
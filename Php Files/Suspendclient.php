<?php
//Suspending clients
include "db.php";//database connection
$id2=$_GET['id2'];
 $sus="UPDATE client SET Active = 'no' WHERE id2 = '$id2'";
 $result=mysqli_query($dbh,$sus);
echo '<script type="text/javascript">';
echo 'alert ("User is suspended!")';
echo '</script>';
      $URL="Clientlist.php";
echo "<script>location.href='$URL'</script>";      

?>
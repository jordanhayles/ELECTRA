<?php
//delete client
include "db.php";//database connection
$id2=$_GET['id2'];
$del="DELETE FROM `client` WHERE id2='$id2'";
 $result=mysqli_query($dbh,$del);
echo '<script type="text/javascript">';
echo 'alert ("Record is deleted!")';
echo '</script>';
      $URL="Clientlist.php";
echo "<script>location.href='$URL'</script>";      

?>
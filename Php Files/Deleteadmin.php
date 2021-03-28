<?php

//Delete Admin 
include "db.php";//database connection
$id=$_GET['id'];
$del="DELETE FROM `admin` WHERE id='$id'";
 $result=mysqli_query($dbh,$del);
echo '<script type="text/javascript">';
echo 'alert ("Record is deleted!")';
echo '</script>';
      $URL="Adminlist.php"; 
echo "<script>location.href='$URL'</script>";      

?>
<?php 
//client login
//delete item
include "db.php";//database connection
$id=$_GET['id'];
$del="DELETE FROM `items` WHERE id='$id'";
 $result=mysqli_query($dbh,$del);
echo '<script type="text/javascript">';
echo 'alert ("Record is deleted!")';
echo '</script>';
      $URL="Itemlist2.php";
echo "<script>location.href='$URL'</script>";      

?>
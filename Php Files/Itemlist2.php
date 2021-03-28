<html>
    <!--Client login-->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    
    
    
    <?php
        include "db.php"; //database connection
     $output='';
    ?>
    <?php         
    if (isset($_POST['searchbtn']))//search item record
    {
        $value=$_POST['search']; 
        $sql="SELECT * FROM `items` WHERE CONCAT (`item_name`,`quantity`,`unitcost`,`description`) LIKE '%".$value."%'";
        
$result=filterTable($sql);
        
    }
    else
    {
        $sql="SELECT * FROM `items`";
        $result=filterTable($sql);
    }
    
    function filterTable($sql)
    {
        $connect=mysqli_connect("localhost","root","","inventorysys");
        $filter_Result=mysqli_query($connect, $sql);
        return $filter_Result;
    }
    
    ?>
    <?php
    
     if(isset($_POST['excel'])) //export data to excel file
    {
         
        $sql="select * from items";
        $result=mysqli_query($dbh,$sql);
        if(mysqli_num_rows($result)>0)
        {
          $output .=  '<table class="t-view">
          <caption>Item List</caption>
          <caption>Inventory Report - December 2018</caption>
          
          <tr>
          <th>Id</th>
    <th>Item Name</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>Unit Cost</th>
          </tr>
          ';
            while($row=mysqli_fetch_array($result)){
                $output .='
                <tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['item_name'].'</td>
                <td>'.$row['description'].'</td>
                <td>'.$row['quantity'].'</td>
                <td>'.$row['unitcost'].'</td>
                </tr>
                <br>
                <br>
                <br>
                <br>
                ';    
            }
            $output .='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition:attachment; filename=Report.xls");
            echo $output;
        }
     }
    ?>
    
<?php include "View.css"?>

<body >
<?php
 include "Session2.php";//display user information when logged in
?>

<!--Vertical Navigation Bar-->
<nav class="main-nav"> 
  <ul class="main-nav-ul">
      <li><a href="Userhome.php" ><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
    <li><a href="#" class="active"><i class="fa fa-cubes" aria-hidden="true"></i>Inventory Management</a>
      <ul class="ul2">
      <li><a href="Additems2.php">Add Item</a></li>
      <li ><a href="Itemlist2.php">View Items</a></li>
      </ul> 
      </li>
  <li><a href="Login.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a></li>
    </ul>
    <div class="side">
    
</div>
    </nav>


<div class="main">

<form action="Itemlist2.php" method="POST">
    <br>
 <table width="500px">
   
     <tr>
       <td><input type=text class="border" name="search" placeholder="Search Item"></td><td><input type=submit class="Submit"  name="searchbtn" value="Search"></td><td><input type=submit style="background:green; height:40px;width:120px;color:#fcfcfd;" name="excel" value="Export to Excel"></td>
         

         </tr>
     <tr><td ><a href="Itemlist2.php"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a></td></tr>
     </table>
  <table class="t-view">

    <caption ><h5>Item List</h5></caption>
   
<tr>
    <th>Id</th>
    <th>Item Name</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>Unit Cost</th>
</tr> 
    
    <?php while($row=mysqli_fetch_array($result)) { ?>
        <tr>
          <td class="td-view"><?php echo $row['id'];?></td>
        <td class="td-view"><?php echo $row['item_name'];?></td>
         <td class="td-view"><?php echo $row['description'];?></td>
             <td class="td-view"><?php echo $row['quantity'];?></td>
            <td class="td-view" ><?php echo $row['unitcost'];?></td>
           
            <td><a href="Updateitem2.php?id=<?php echo $row['id'];?>">Update</a></td>
           <td><a href="Deleteitem2.php?id=<?php echo $row['id']; ?>">Delete</a></td>
        
        </tr>
        <?php }?>
       
</table>
    </form>
</div>
    
    
</body>
       
    <footer >Copyright &copy;2018</footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
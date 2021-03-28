<html>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    <?php
        include "db.php"; //database connection file
    $sql="select * from client"; //show all client records
    $result = mysqli_query($dbh,$sql);//execute sql statement
    $sql2="select * from client";
    $result2 = mysqli_query($dbh,$sql2);
 ?>
   <?php         
    if (isset($_POST['searchbtn']))//search client data
    {
        $value=$_POST['search']; 
        $sql="SELECT * FROM `client` WHERE CONCAT (`Username`,`FirstName`,`LastName`,`Department`,`Title`) LIKE '%".$value."%'";
        
$result=filterTable($sql);
        
    }
    else
    {
        $sql="SELECT * FROM `client`";
        $result=filterTable($sql);
    }
    
    function filterTable($sql)//sort client records
    {
        $connect=mysqli_connect("localhost","root","","inventorysys");
        $filter_Result=mysqli_query($connect, $sql);
        return $filter_Result;
    }
    ?>
<?php include "View.css"?> <!--css file-->
<body >
<?php
 include "Session.php";//Displays the user's profile information when logged in
?>
<!-- Vertical Navigation Bar-->
<nav class="main-nav">
  <ul class="main-nav-ul">
      <li><a href="Homepage.php"  ><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
      <li><a href="#" class="active"><i class="fa fa-user-plus" aria-hidden="true"></i>User Management</a>
          <ul class="ul2">
      <li><a href="Adduser.php">Add User</a></li>
      <li><a href="Clientlist.php">View Users</a></li>
      </ul> 
      </li>
    <li><a href="#"><i class="fa fa-cubes" aria-hidden="true"></i>Inventory Management</a>
      <ul class="ul2">
      <li><a href="Additems.php">Add Item</a></li>
      <li ><a href="Itemlist.php">View Items</a></li>
      </ul>
      </li>
  <li><a href="Login.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a></li>
    </ul>
    <div class="side">
</div>
    </nav>
<div class="main">

<form action="Clientlist.php" method="POST">
<br>
    <table width="500px">
        
     <tr>
       <td><input type=text class="border" name="search" placeholder="Search Client"></td><td><input type=submit class="Submit" name="searchbtn" value="Search"></td>
         <td><a href="Adminlist.php">>>View Admin </a></td>
        </tr>
        <tr><td><a href="Clientlist.php"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a></td></tr>
     </table>
    <table class="t-view" >
 <caption ><h5>Client List</h5></caption>
<tr>
  <th>Username</th>
    <th>First Name</th>
    <th>Last Name</th>
  <th>Department</th>
    <th>Title</th>
    <th>Active</th>
</tr>                                     
        <?php while($row=mysqli_fetch_array($result)) {if ($row["Active"]=='yes') //show all clients with active accounts  
    { ?>
        <tr>
        <td class="td-view"><?php echo $row['Username'];?></td>
         <td class="td-view"><?php echo $row['FirstName'];?></td>
             <td class="td-view"><?php echo $row['LastName'];?></td>
            <td class="td-view"><?php echo $row['Department'];?></td>
             <td class="td-view"><?php echo $row['Title'];?></td>
            <td class="td-view"><?php echo $row['Active'];?></td>
             <td><a href="Resetclient.php?id2=<?php echo $row['id2'];?>">Reset Password</a></td>
            <td><a href="Updateclient.php?id2=<?php echo $row['id2'];?>">Update</a></td>
           <td><a href="Deleteclient.php?id2=<?php echo $row['id2']; ?>">Delete</a></td>
           <td><a href="Suspendclient.php?id2=<?php echo $row['id2']; ?>">Suspend</a></td> <!--deactivate user account-->
        </tr>
        <?php }}?>
    </table>
     <table class="t-view" >
         <!--Suspension list-->
 <caption ><h5>On Suspension</h5></caption> 
<tr>
  <th>Username</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Active</th>
</tr>                        
        <?php while($row=mysqli_fetch_array($result2)) {if ($row["Active"]=='no') //show all clients with in-active accounts
    { ?>
        <tr>
        <td class="td-view"><?php echo $row['Username'];?></td>
             <td class="td-view"><?php echo $row['FirstName'];?></td>
             <td class="td-view"><?php echo $row['LastName'];?></td>
             <td class="td-view"><?php echo $row['Active'];?></td>
             <td><a href="Activateclient.php?id2=<?php echo $row['id2'];?>">Activate</a></td>
           <td><a href="Deleteclient.php?id2=<?php echo $row['id2']; ?>">Delete</a></td>
        </tr>
        <?php }}?>
    </table>
    </form>
</div>   
</body>
    <footer >Copyright &copy;2018</footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
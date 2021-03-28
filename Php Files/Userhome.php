<html>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
   <!--This homepage is for clients only-->

   <?php include "Adduser.css"?>

<body>
<?php
 include "Session2.php";
?>
<nav class="main-nav">
  <ul class="main-nav-ul">
      <li><a href="Userhome.php"class="active"  ><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
       <li><a href="#"><i class="fa fa-cubes" aria-hidden="true"></i>Inventory Management</a> 
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
<p> <b>Welcome,</b> <?php
     
    //make connection
      mysql_connect('localhost','root','');
    //selectdb
    mysql_select_db('inventorysys');
        $sql="select * from client where Username='".$_SESSION['user']."'";
        $records=mysql_query($sql);
   while($info=mysql_fetch_assoc($records))
   {
    echo " ".$info['FirstName'];
    }
    ?><br>Thank you for using ELECTRA.<br>ELECTRA supervises the flow of goods from manufacturers to warehouses and from these facilities to point of sale.</p>
    
</div>
</body>
     
    <footer style="font-size:100%;text-align:center;background-color:black;color:#fcfcfd;width:1520px" >Copyright &copy;2018</footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
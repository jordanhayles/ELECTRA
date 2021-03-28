<html>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> <!--This code is used for activating bootstrap for better quality design layouts -->
   <?php include "Adduser.css"; 
    ?> 
    <?php
$describe=$itemname=$quantity=$cost="";//Variable used for storing form data 
 $insertxt= $itemerr=$amterr=$costerr=""; //Error variables
     include "db.php"; //Connects to mysql database
        if(isset($_POST['submit']))
    {
        $itemname=($_POST['itemname']);
        $quantity=($_POST['quantity']);
        $cost=($_POST['cost']);
        $describe=($_POST['describe']);  
        // Empty submission prints an error
        if(empty($_POST['itemname'])) 
        {
            $itemerr="Item Name is required";
        }
        
         if(empty($_POST['quantity']))
        {
            $amterr="Quantity is required";
        }
         if(empty($_POST['cost']))
        {
            $costerr="Cost is required";
        }
            //if the password entered is equal to the password to be confirmed along with all fields containing the required data
            //then data is sent to the database
     if (($_POST['itemname'])&&($_POST['quantity'])&&($_POST['cost']))
        {
                $sql="insert into items (item_name,quantity,unitcost,description)values('$itemname','$quantity','$cost','$describe')";
       $result = mysqli_query($dbh,$sql); //execute SQL statement 
          $insertxt="Item record inserted";  
     }  
      mysqli_close($dbh); //close the database connection      
    }    
    ?>
<body>
<?php
 include "Session.php";  //Output the user's profile information when logged in
?>
  <!--Vertical Navigation Bar-->
<nav class="main-nav"> 
  <ul class="main-nav-ul">
      <li><a href="Homepage.php" ><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
      <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>User Management</a>
          <ul class="ul2">
      <li><a href="Adduser.php">Add User</a></li>
      <li ><a href="Clientlist.php">View Users</a></li>
      </ul> 
      </li>
    <li><a href="#" class="active"><i class="fa fa-cubes" aria-hidden="true"></i>Inventory Management</a>
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
<table class="t-add"> 
   <form action="Additems.php" method="POST"> 
<caption ><h5>Add Item</h5></caption> <!--Add item form-->
       <tr>
       <td>Item Name</td>
           <td><input type="text" class="border" name="itemname" maxlength="50" placeholder="Enter Item Name"><br> <span class="error">* <?php echo $itemerr;?></span></td>
           <td>Unit Cost</td> <td><input type="number" class="border"  name="cost" maxlength="30" placeholder="Enter Unit Cost"><br> <span class="error">* <?php echo $costerr;?></span></td>
          <td>Quantity</td> <td><input type="number" class="border"  name="quantity" placeholder="Enter Quantity"><br> <span class="error">* <?php echo $amterr;?></span></td>
       </tr>
       <tr>
           <td>Description</td>
          <td  align="center" colspan="4.7">
    <textarea rows=8px cols=60px name="describe" placeholder="Enter Description"></textarea>
              </td>
       </tr>
       <tr>
       <td><input type="submit" class="submit" name="submit" value="Add Item"></td>
       </tr>
    </form>  
</table>
   <span class="error"> <?php echo $insertxt;?></span>
</div>
    </body>
    <footer >Copyright &copy;2018</footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
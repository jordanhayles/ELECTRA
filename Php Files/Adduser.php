<html>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> <!--This code is used for activating bootstrap for better quality design layouts -->
    
   <?php include "Adduser.css"; 
    ?> 
      
    <?php
 $title=$department=$select=$insertxt=$user=$fname=$lname=$pass=$conpass="";//Variable used for storing form data 
 $depoerr=$titleerr=$usererr=$fnameerr=$lnameerr=$passerr=$conpasserr=""; //Error variables
     include "db.php"; //Connects to mysql database
        if(isset($_POST['submit']))
    {
        $user=($_POST['user']);
        $fname=($_POST['fname']);
        $lname=($_POST['lname']);
        $pass=($_POST['pass']);
        $conpass= ($_POST['conpass']);
        $option=($_POST['acc']);
            $department=($_POST['depo']);
              $title=($_POST['title']);
            
            
        // Empty submission prints an error
        if(empty($_POST['fname'])) 
        {
            $fnameerr="First Name is required";
        }
        
         if(empty($_POST['lname']))
        {
            $lnameerr="Last Name is required";
        }
         if(empty($_POST['user']))
        {
            $usererr="User Name/ID is required";
        }
         if(empty($_POST['pass']))
        {
            $passerr="Password is required";
        }
            if(empty($_POST['depo']))
        {
            $depoerr="Department is required";
        }
            if(empty($_POST['title']))
        {
            $titleerr="Title is required";
        }
            //text only require letters only 
            if (!preg_match("/^[a-zA-Z ]*$/",$fname) or !preg_match("/^[a-zA-Z ]*$/",$lname)) {
  $fnameerr = "Only letters is allowed";
    $lnameerr = "Only letters is allowed";
}
     
            //if the password entered is equal to the password to be confirmed along with all fields containing the required data
            //then data is sent to the database
      else  if ($pass==$conpass &&($_POST['user'])&&($_POST['fname'])&&($_POST['lname'])&&($_POST['pass'])&&($_POST['conpass'])&&($_POST['depo'])&&($_POST['title']))
        {
             $conpasserr="Password is confirmed";
             if ($option=="op1")
                     {
                $sql="insert into client (Username,FirstName,LastName,Password,ConfirmPass,Department,Title,Active)values('$user','$fname','$lname','$pass','$conpass','$department','$title','yes')";
                     }
           if ($option=="op2")
            {
             $sql="insert into admin (Username,FirstName,LastName,Password,ConfirmPass,Department,Title)values('$user','$fname','$lname','$pass','$conpass','$department','$title')";
            }
            
       $result = mysqli_query($dbh,$sql); //execute SQL statement 
		
   $insertxt="User record inserted";  
 
   }
     
        else{
           $conpasserr="Password does not match";
            
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
      <li><a href="#" class="active"><i class="fa fa-user-plus" aria-hidden="true"></i>User Management</a>
          <ul class="ul2">
      <li><a href="Adduser.php">Add User</a></li>
      <li ><a href="Clientlist.php">View Users</a></li>
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
    
<table class="t-add"> 
   <form action="Adduser.php" method="POST"> 
<caption ><h5>Add User</h5></caption> <!--Add user form-->
       <tr>
       <td>First Name</td>
           <td><input type="text" class="border" name="fname" maxlength="30" placeholder="Enter First Name"><br> <span class="error">* <?php echo $fnameerr;?></span></td>
           <td>Last Name</td> <td><input type="text" class="border"  name="lname" maxlength="30" placeholder="Enter Last Name"><br> <span class="error">* <?php echo $lnameerr;?></span></td>
           <td>Account Type <select name='acc' class="border">
           <option value="op1">Client</option>
            <option value="op2">Administrator</option>
           </select></td><td></td>
       </tr>
       <tr>
           <td>User Name/ID</td>
           <td><input type="text" class="border" name="user" maxlength="30" placeholder="Enter User Name/ID"><br> <span class="error">* <?php echo $usererr;?></span></td>
       <td>Password</td><td><input type="password" name="pass" pattern=".{6,}" title="Six or more characters" class="border" placeholder="Enter Password"><br> <span class="error">* <?php echo $passerr;?></span></td>
           <td>Confirm Password <input type="password" class="border" maxlength="9" name="conpass" placeholder="Confirm Password"><br> <span class="error">* <?php echo $conpasserr;?></span></td>
    
       </tr>
       <tr>
<td>Department</td>  <td><select name='depo' class="border" placeholder="Department"  > 
           <option ></option>
            <option value="IT">IT</option>
            <option value="Accounts">Accounts</option>
           </select><br><span class="error">* <?php echo $depoerr;?></span></td>  

<td>Title</td>  <td><select name="title" class="border" placeholder="Title" >
           <option ></option>
            <option value="Computer Technician">Computer Technician</option>
      <option value="Accountant">Accountant</option>
      <option value="Cashier">Cashier</option>
            <option value="IT Manager">IT Manager</option>
           </select><br><span class="error">* <?php echo $titleerr;?></span></td>  
</tr>        
       <tr>
       <td><input type="submit" class="submit" name="submit" value="Add User"></td>
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
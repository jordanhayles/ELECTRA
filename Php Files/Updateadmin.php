<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    <?php
    $fnameerr=$lnameerr=$usererr='';
    $user=$fname=$lname=$depo=$title='';
    include "db.php";//database connection
     $id=$_GET['id'];
    
    $sql="select * from admin where id='$id'";//show admin record
     $result=mysqli_query($dbh,$sql);
    $check=mysqli_fetch_array($result);
    
    
    if(isset($_POST['update'])) //update admin record
    {
    $user=($_POST['user']);
    $fname=($_POST['fname']);
    $lname=($_POST['lname']);
    $depo=($_POST['depo']);
    $title=($_POST['title']);
        
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
            $usererr="Username is required";
        }
        
       //only letters are required
if (!preg_match("/^[a-zA-Z ]*$/",$fname) or !preg_match("/^[a-zA-Z ]*$/",$lname)) {
  $fnameerr = "Only letters is allowed";
    $lnameerr = "Only letters is allowed";
}   
   else if(($_POST['fname']) && ($_POST['lname']) && ($_POST['user']) )
   {//update sql command 
        $update=mysqli_query($dbh,"UPDATE `admin` SET `Username`='$user',`FirstName`='$fname',`LastName`='$lname',`Department`='$depo',`Title`='$title' WHERE id='$id'");
   
   
    
        echo '<script type="text/javascript">'; //sends the user back to viewuser.php after updating user
echo 'alert ("Record updated!")';
echo '</script>';
      $URL="Adminlist.php";
echo "<script>location.href='$URL'</script>";      
    }
    }
    
    
    mysqli_close($dbh);
    
    if (isset($_POST['cancel'])) //cancel operation
    {
        header("location:Adminlist.php");
    }
    
    ?>
    

    
    
    <style> caption{caption-side: top;}</style>
<form method="POST" > <!--Update User Form-->
<table>
    
    <caption>Update User</caption> 
 <tr>
<td>Username</td> <td><input type="text" name="user" placeholder="Username" value="<?php echo $check['Username']; ?>">
      <span style="color:red;" >* <?php echo $usererr;?></span>
     </td>  
</tr>   
 <tr>
<td>First Name</td>  <td><input type="text" name="fname" placeholder="First Name"   value="<?php echo $check['FirstName']; ?>">
   <span style="color:red;">* <?php echo $fnameerr;?></span>
     </td>  
</tr>      
  <tr>
<td>Last Name</td>  <td><input type="text" name="lname" placeholder="Last Name"  value="<?php echo $check['LastName']; ?>"> 
    <span style="color:red;">* <?php echo $lnameerr;?></span>  
      </td>  
</tr>     
  <tr>
<td>Department</td>  <td><select name='depo' placeholder="Department"  > 
           <option ><?php echo $check['Department']; ?></option>
            <option value="IT">IT</option>
            <option value="Accounts">Accounts</option>
           </select></td>  
</tr>     
  <tr>
<td>Title</td>  <td><select name="title" placeholder="Title" >
           <option ><?php echo $check['Title']; ?></option>
            <option value="Computer Technician">Computer Technician</option>
      <option value="Accountant">Accountant</option>
      <option value="Cashier">Cashier</option>
            <option value="IT Manager">IT Manager</option>
           </select></td>  
</tr>        
    <td><input type="submit" name="update" value="Update"></td>
    <td><input type=submit name="cancel" value="Cancel"></td>
    
    
    
</table>
</form>
     
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</html>
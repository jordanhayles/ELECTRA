<html>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    <?php
    include "db.php";//database connection
     $id=$_GET['id'];
    $pass='';
    $passerr="";
    $sql="select * from admin where id='$id'";
     $result=mysqli_query($dbh,$sql);
    $check=mysqli_fetch_array($result);
    if(isset($_POST['reset']))// Reset Admin Password
    {
    $pass=$_POST['pass'];
    $conpass=$_POST['conpass'];
        
    if(empty($_POST['pass'])) //if fields are empty
        {
            $passerr="Password is required";
        }
        else if($pass==$conpass)
        {
         
    $update=mysqli_query($dbh,"UPDATE `admin` SET `Password`='$pass',`Confirmpass`='$conpass' WHERE id='$id'"); //update password

echo '<script type="text/javascript">';
echo 'alert ("Password is saved!")';
echo '</script>';
      $URL="Adminlist.php";
echo "<script>location.href='$URL'</script>";      

        }
        else{
            $passerr="Password does not match";
        }
           
        
        
    }
    
    mysqli_close($dbh);
    
    if (isset($_POST['cancel']))//cancel operation 
    {
        header("location:Adminlist.php"); //file location 
    }
    
    ?>
    
    
    <style> caption{caption-side: top;}</style>
<form method="POST"> <!--Reset Password Form-->
<table>
    <caption>Reset Password</caption>
 <tr>
<td>Password</td>  <td><input type="text" name="pass" placeholder="Password" pattern=".{6,}" title="Six or more characters" value="<?php echo $check['Password']; ?>"> <span style="color:red;font-size:10px;"><?php echo $passerr; ?></span></td>  
</tr>   
 <tr>
<td>Confirm Password</td>  <td><input type="password" name="conpass" placeholder="Confirm Password" > 
     <span style="color:red;font-size:10px;"><?php echo $passerr; ?></span>
     </td>  
</tr> 
    <tr><td><input type=submit name="reset" value="Reset"></td>
    <td><input type=submit name="cancel" value="Cancel"></td>
        </tr>
    </table>
    </form>




 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</html>
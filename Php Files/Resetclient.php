<html>
    <!--Client Login-->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    <?php 
    include "db.php"; //database connection
     $id2=$_GET['id2'];
    $passerr="";
    $pass="";
    $sql="select * from client where id2='$id2'";
     $result=mysqli_query($dbh,$sql);
    $check=mysqli_fetch_array($result);
    if(isset($_POST['reset'])) //reset client password
    {
    $pass=$_POST['pass'];
    $conpass=$_POST['conpass'];
     if(empty($_POST['pass']))
        {
            $passerr="Password is required";
        }
      else  if($pass==$conpass)
        {
        //reset client password
    $update=mysqli_query($dbh,"UPDATE `client` SET `Password`='$pass',`Confirmpass`='$conpass' WHERE id2='$id2'"); //update password
echo '<script type="text/javascript">';
echo 'alert ("Password is saved!")';
echo '</script>';
      $URL="Clientlist.php";
echo "<script>location.href='$URL'</script>";      
        }
        else{
            $passerr="Password does not match";
        } 
    }
    mysqli_close($dbh);//close database connection
    
    if (isset($_POST['cancel'])) //cancel operaation
    {
        header("location:Clientlist.php");//file location
    }
    ?>
    <style> caption{caption-side: top;}</style>
<form method="POST">  <!--Reset Passwrd Form-->
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
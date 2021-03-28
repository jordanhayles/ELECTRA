<html>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <?php
    session_start(); //session carries user information to other webpages when logged in
    $usererr = $passerr = "";
    $pass=""; 
         $log="";
     $user="root";
   $host="localhost";
   $db="inventorysys";
    
    
    if ($_SERVER["REQUEST_METHOD"]=="POST") //Admin and Client Login 
    { 
    mysql_connect($host,$user,$pass);
    mysql_select_db($db);
    if(isset($_POST['user']))
    {
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $sql="select * from admin where Username='".$user."'AND ConfirmPass='".$pass."'"; //selects data entered in the form
            $sql2="select * from client where Username='".$user."'AND ConfirmPass='".$pass."'";
        $result=mysql_query($sql);
        $result2=mysql_query($sql2);
        $sql3="select * from client";

        //**Admin Login**
        if(mysql_num_rows($result)==1) //if correct data entered
        {
            $_SESSION['user']=$user;
            header('Location: Homepage.php'); //carries user to the location
        }
        else
        {
            $log="Username and Password is incorrect please check again"; //if incorrect data entered
        }
        
        //**Client Login**
         while($row=mysql_fetch_array($result2)) { 
    if ($row["Active"]=='yes') //if client account is active
    {
         
        if(mysql_num_rows($result2)==1)
        {
            $_SESSION['user']=$user;
            header('Location: Userhome.php');
        }
        else
        {
            $log="Username and Password is incorrect please check again";
        }
    }
             else if ($row["Active"]=='no')
             { //if client account is not active
                 echo '<script type="text/javascript">';
echo 'alert ("Your account is suspended. Please contact or visit admin personnel to re-activate account!")';
echo '</script>';
      $URL="Login.php";
echo "<script>location.href='$URL'</script>";  
             }
         }
        if(empty($_POST["user"])) //if fields are empty
        {
            $usererr="User Name is required";
        }
        if(empty($_POST["pass"]))
        {
            $passerr="Password is required";
        }
        
    }
    
    }
   
    ?>
    <!--login css-->
<style>
    table{
        height: 230px;
        width: 350px;
        color:darkslategray;
        background-color: #ededf3;
        border-radius: 7px;
    } 
    .i{
        border-radius: 7px;
            width:210px;
        height:40px;
         background-color:#E2E2E3;
        font-weight:bold;
        color:darkslategray;
    }
    .txt{
        border-radius: 7px;
        height:35px;
        background-color:#fcfcfd ;
        color:darkslategrey;
         background-color:#E2E2E3;
    }
    body{
       background: linear-gradient(132deg,#fcfcfd, darkcyan);
    }
        
    caption{caption-side: top;color:darkslategray;}
    table{
        
        font-size: 18px;
        font-family: sans-serif;
        
        
    }
    .error{
        font-size:11px;
        color:red;
    }
    div{
        height: 50px;
        width: 1367px;
        background-color: black;
        color:#fcfcfd;
    }
    footer{font-size:100%;text-align:center;background-color:black;color:#fcfcfd;width:1367px;}
</style>

<body>
   <div>
    <h5>ELECTRA<i class="fa fa-cubes" aria-hidden="true"></i></h5>
    </div>
    
    <br><br><br><br>   
    <table align="center">
        <!--Login Form-->
    <form acion="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <caption><h4 >Login</h4></caption>
        <tr>
        <td><i class="fa fa-user-circle" aria-hidden="true"></i> Username </td><td><input type="text" class="txt" placeholder="User Name" name="user"><br> <span class="error">* <?php echo $usererr;?></span></td>
           </tr>
        <tr>
        <td><i class="fa fa-unlock" aria-hidden="true"></i> Password</td> <td><input type="password" class="txt" placeholder="Password" name="pass"><br> <span class="error">* <?php echo $passerr;?></span></td>
        </tr>
        
    <tr>
       <td colspan="2" align="center" > <input type="submit" class="i" value="Log In" ></td>
    </tr>
        
    </form>
       
       <tr><td><span class="error">* <?php echo $log;?></span></td></tr>
      
        </table>
    </body>
    
    
    <br><br><br><br><br><br><br>
    <footer style="font-size:100%;text-align:center" >Copyright &copy;2018</footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
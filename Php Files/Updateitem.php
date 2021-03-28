<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    <?php
    $describe=$itemname=$quantity=$cost="";//Variable used for storing form data 
 $insertxt= $itemerr=$amterr=$costerr=""; //Error variables
    include "db.php";//database connection
     $id=$_GET['id'];
    $sql="select * from items where id='$id'"; //show item record
     $result=mysqli_query($dbh,$sql);
    $check=mysqli_fetch_array($result);
    if(isset($_POST['update'])) //update item
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
        else if(($_POST['itemname'])&&($_POST['quantity'])&&($_POST['cost']) )
   {//update sql command 
    $update=mysqli_query($dbh,"UPDATE `items` SET `item_name`='$itemname',`quantity`='$quantity',`unitcost`='$cost',`description`='$describe' WHERE id='$id'");
        echo '<script type="text/javascript">';
echo 'alert ("Record updated!")';
echo '</script>';
      $URL="Itemlist.php";
echo "<script>location.href='$URL'</script>";      
    }
    }
    mysqli_close($dbh);
    
    if (isset($_POST['cancel'])) //cancel operation
    {
        header("location:Itemlist.php");
    }
    
    ?>
    <style> caption{caption-side: top;}</style>
<form method="POST" >
    
<table>     <!--Update Items-->
    
    <caption>Update Item</caption>
 <tr>
<td>Item Name</td> <td><input type="text" name="itemname" placeholder="Item" value="<?php echo $check['item_name']; ?>">
     <span style="color:red;" >* <?php echo $itemerr;?></span>
     </td>  
</tr>   
 <tr>
<td>Unit Cost</td>  <td><input type="number" name="cost" placeholder="Unit Cost"   value="<?php echo $check['unitcost']; ?>">
     <span style="color:red;">* <?php echo $costerr;?></span>
     </td>  
</tr>      
  <tr>
<td>Quantity</td>  <td><input type="number" name="quantity" placeholder="Quantity"  value="<?php echo $check['quantity']; ?>"> 
        <span style="color:red;">* <?php echo $amterr;?></span>
      </td>  
</tr>     
  <tr>
 <td>Description</td>
          <td>
    <textarea name="describe" rows=8px cols=60px placeholder="Description"><?php echo $check['description']; ?></textarea>
              </td>
</tr>     
    <td><input type="submit" name="update" value="Update"></td>
    <td><input type=submit name="cancel" value="Cancel"></td>
</table>
</form> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
<html>
<div class="webtop"> <!--top of every webpage-->
<table style="width:1500px; color:#fcfcfd;">
    <tr>
                                <!--Name of System-->
<td><b style="font-size:15px;color:white;">ELECTRA</b><i class="fa fa-cubes" aria-hidden="true"></i></td>
    
     <td><i style="color:darkcyan;" class="fa fa-user-circle" aria-hidden="true"></i><?php 
    session_start();
    //make connection
      mysql_connect('localhost','root','');
    //selectdb
    mysql_select_db('inventorysys');
     $sql="select * from client where Username='".$_SESSION['user']."'";
        $records=mysql_query($sql);
   while($info=mysql_fetch_assoc($records))
   {
    echo " "."Current user:"." ".$_SESSION['user']."";
    }
    ?>
    </td>
        <td><i style="color:darkcyan;" class="fa fa-building" aria-hidden="true"></i> Company Name:</td>
       </tr> 
     </table>   
</div>
     <div class="profile"> <!--on top of vertical navigation bar-->
         <style>
             b{color:black};
         </style>
    <?php
         
    //make connection
      mysql_connect('localhost','root','');
    //selectdb
    mysql_select_db('inventorysys');
     $sql="select * from client where Username='".$_SESSION['user']."'";
        $records=mysql_query($sql);
    while($info=mysql_fetch_assoc($records))  //client information
   {
   echo " "."<b>Staff Name:</b>"." ".$info['FirstName']." ".$info['LastName']."";echo "<br>";
     echo " "."<b>Title:</b>"." ".$info['Title']."";echo "<br>";
     echo " "."<b>Department:</b>"." ".$info['Department']."";
    }
         ?>
    </div>
   </html> 
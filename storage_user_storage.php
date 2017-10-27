<?php


/*
 * Copyright (c) 2016-2017 Barchampas Gerasimos <http://makbox.co.nf/>
 * Makbox is a personal (staas) cloud.
 *
 * Makbox is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 *
 * Makbox is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */



 if(isset($_POST['submit_storage']))
   {

    require('class_cn.php');

      $obj = new in;
 
     $host = $obj->connect[0];
     $user = $obj->connect[1];
     $pass = $obj->connect[2];
     $db   = $obj->connect[3];

       
 

   $conn = new mysqli($host,$user,$pass,$db); 


    if($conn->connect_error)
     {
      die ("Cannot connect to server " .$conn->connect_error);
      exit;
      }

 
    else
      {
  
    require_once('function_data.php');


    $user = input($_POST['user']);
    $user = $conn->real_escape_string($user);

    $space_limit = input($_POST['space_limit']);
    $space_limit = $conn->real_escape_string($space_limit);


     
      $sql0="select user from hard_disk";
      $result0=$conn->query($sql0);



         while($row0=$result0->fetch_assoc())
            {
           
             if ($user != $row0['user'])
                 {
           echo '<script type="text/javascript">alert("This user dont exist!");
         </script>';
     echo ("<script>location.href='storage_user.php'</script>");
                  }
         
        
       
     else 
         {  

       $sql2="update hard_disk set space_limit = '$space_limit' where user='$user'";   
       $result2=$conn->query($sql2);
     echo ("<script>location.href='storage_user.php'</script>");
               }


          } // end of while


    } // kleisimo ths else gia ta dedomena


    $conn->close();

  } // kleisimo ths isset


?>

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


session_start();



if (isset($_POST['submit_delete_user']))
      {

   require('class_cn.php');

      $obj = new in;
 
     $host = $obj->connect[0];
     $user = $obj->connect[1];
     $pass = $obj->connect[2];
     $db   = $obj->connect[3];

     

$conn = new mysqli ($host,$user,$pass,$db);

if($conn->connect_error)
  {
  die("Database connection failed: " .$conn->connect_error);
   }



    else
      {

        require_once('function_data.php');

        $delete_user = input($_POST['delete_user']);
        $delete_user = $conn->real_escape_string($delete_user);


           $sql0="select username from login";
           $result0=$conn->query($sql0);



         while($row0=$result0->fetch_assoc())
            {
           
             if ($delete_user != $row0['username'])
                 {
           echo '<script type="text/javascript">alert("This user dont exist!");
         </script>';
     echo ("<script>location.href='delete_user.php'</script>");
                  }


          else 
            {


         $sql1="delete from folder_uploads where _to = '$delete_user'";
         $result1 = $conn->query($sql1);


         $sql2="delete from login where username = '$delete_user'";
         $result2 = $conn->query($sql2);


         $sql3="delete from backup_login where username = '$delete_user'";
         $result3 = $conn->query($sql3);


         $sql4="delete from profile where username = '$delete_user'";
         $result4 = $conn->query($sql4);
  

         $sql5="delete from hard_disk where user = '$delete_user'";
         $result5 = $conn->query($sql5);

         $sql6="delete from modules_details where user_login = '$delete_user'";
         $result6 = $conn->query($sql6);



 header("Location: delete_user.php");

          } // end of else for username

  
        } // end of while

   
   // $_SESSION['success_msg'] = 'File have been deleted successfully.';


     } // kleisimo ths else gia ta dedomena


 $conn->close();

 
  }//telos ths if gia ton elenxo me thn issset


?>           

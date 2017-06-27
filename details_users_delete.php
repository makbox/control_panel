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


if(isset($_POST['delete_details']))
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
    $idarr = $_POST['checked_id'];
    foreach($idarr as $id)
     {
        $sql="delete from all_users_details where id='$id'";
        $result=$conn->query($sql);

         }
    $_SESSION['success_msg'] = 'File have been deleted successfully.';
    header("Location: details_users.php");


     } // kleisimo ths else gia ta dedomena

 $conn->close();
 
  }//telos ths if gia ton elenxo me thn issset

?>

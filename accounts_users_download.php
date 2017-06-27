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


if(isset($_GET['id']))
   {

    $id = intval($_GET['id']);
    
   
    if($id <= 0) 
   {
        die('The ID is invalid!');
    }


    else 
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
       }

 else
   {

        $sql= "select created,username,password,email from login where id='$id'";
        $result = $conn->query($sql);
 
        if($result) 
         {

            $row = $result->fetch_assoc();
         
                header("Content-Type: text/plain");
                header('Content-Disposition:attachment;filename="' .$row['username'] .'"');
 
echo "Account for " .$row['username'] ." user " ."\n";
echo "____________________";
echo"
Created:  {$row['created']} 
Username: {$row['username']}
Password: {$row['password']} 
Email:    {$row['email']}
                 ";


            } // kleisimo ths if



            else 
            {
                echo 'Error! No data exists with that ID.';
            }
 
        }//kleisimo ths else gia ta dedoimena
        
       }// kleisimo ths megalhs else

        $conn->close();
    

 } // kleisimo ths if isset



?>




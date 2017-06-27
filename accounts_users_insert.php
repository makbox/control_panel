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

 if(isset($_POST['insert']))
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

 require_once('function_data.php');
 

$username=input($_POST['username']);
$password=input($_POST['password']);
$email=input($_POST['email']);


$username=$conn->real_escape_string($username);
$password=$conn->real_escape_string($password);
$email=$conn->real_escape_string($email);

$sql0="insert into login (username,password,email) values('$username','$email','$password')";
$result0=$conn->query($sql0);

$sql1="select created,id,username,password,email,forgot_text from login";
$result1=$conn->query($sql1);




  if($result1 == true)
  {
     echo '<script type="text/javascript">alert("Insert data sucessfuly");
         </script>';
     echo ("<script>location.href='accounts_users.php'</script>");
    }

else
  {
    echo '<script type="text/javascript">alert("Insert data failure: Try again");
         </script>';
     echo ("<script>location.href='accounts_users.php'</script>");
   }


 } // kleisimo ths else


} // kleisimo ths if isset

?>

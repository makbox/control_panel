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

?>


<html>


<head>

<meta charset="utf-8">

 <link rel="stylesheet" type="text/css" href="/control_panel/css/storage_user.css"> 



</head>

<body bgcolor=#b8b894>

 <a name="top"></a>


<body>


  <div align="center">
 <div id="header">
   <h3> Storage users </h3>
   </div>


  <div align="center">
 <a href="control_panel.php" id="a1"> Go back to control panel <a/>
  </div>

 




<table border=1 id=insert>
 <form action="storage_user_storage.php" method="post">
    <th> Choose storage for user </th>
    <th> User:<input type="text" name="user" required></th>
    <th> Space limit:
       <select name="space_limit" required>
         <option value="100000000">100 MB</option>
         <option value="200000000">200 MB</option>
         <option value="300000000">300 MB</option>
         <option value="400000000">400 MB</option>
         <option value="500000000">500 MB</option>
         <option value="600000000">600 MB</option>
         <option value="700000000">700 MB</option>
         <option value="800000000">800 MB</option>
         <option value="900000000">900 MB</option>
         <option value="1000000000">1 GB</option>
         <option value="1000000000000">Unlimited</option>
       </select>
         </th>
    <th><input type="submit" name="submit_storage" value="Choose storage"></th>
 </form>
  </table>               





</body>
</html>


<?php
 

 if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }

     else
       {
      
      require('class_cn.php');

      $obj = new in;
 
     $host = $obj->connect[0];
     $user = $obj->connect[1];
     $pass = $obj->connect[2];
     $db   = $obj->connect[3];

     


       $conn= new mysqli($host,$user,$pass,$db);
       
      
 
        if($conn->connect_error)
          {
           die("Cannot connect to server " .$conn->connect_error);
           }


        else
         {
   
          $conn->set_charset("utf8");



         $sql="select user,space_used,space_limit from hard_disk";
         $result=$conn->query($sql);
       
        echo "<table id=table1>
           <form action='storage_user_delete.php' method='post' onSubmit='return delete_confirm();'/> 
                  <tr> 
                  <td id=hr1> User </td>
                  <td id=hr1> Space used </td>
                  <td id=hr1> Space limit </td>
                    </tr>";

         while($row=$result->fetch_assoc())
            {

              if ($row['space_limit'] == '1000000000000')
                {
                 $row['space_limit'] = 'unlimited';
                 }


             echo "<tr>
                   <td id=hr2> {$row['user']} </td>
                   <td id=hr2> {$row['space_used']} </td>
                  <td id=hr2> {$row['space_limit']} </td>
                    </tr>";
                          
                  }


        echo " 
                 <tr>
               <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> 
                  </tr>
                   <tr>
                     <td> </td>
               <td> <a href='#top' id='a2'> Back to Top </a> </td> 
                  </tr>";     
            echo "</table>";
	
       
         
          }// kleisimo ths else gia ta dedomena


      $conn->close();

    }// kleisimo ths else gia ton elenxo ths session


?>




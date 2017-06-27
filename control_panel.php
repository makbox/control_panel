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


 <link rel="stylesheet" type="text/css" href="/control_panel/css/control.css"> 




</head>

<body id="body">

 <a name="top"></a>

  
<div align="center">  <h2 id="header"> Control panel </h2> </div>
 

</body>
</html>


<?php


if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }


  else
   {
  

    echo '<div align="center">
          <table id="table2">   

        <div id="a2"> </div>


          <tr>
            <td id="th"> Database <br><img src="/control_panel/photos/database.ico" height="80" width="90"> </td>
            <td> <a href="accounts_users.php" id="a"> Accounts users <a/> </td>
            <td> <a href="server_messages.php" id="a"> Server messages </a></td>
            <td> <a href="contact_for_users.php" id="a"> Contact for users </a> </td>
            <td> <a href="details_users.php" id="a"> Details users </a> </td>
           </tr>

              <tr>
            <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> 
             </tr>


           <tr>
            <td id="th"> Users data <br><img src="/control_panel/photos/users.ico" height="80" width="70"> </td>
            <td> <a href="transfer_archives.php" id="a"> Transfer archives <a/> </td>
            <td> <a href="" id="a"> Cloud archives </a></td>
            <td> <a href="" id="a"> Chat and forum messages </a> </td>
            <td> <a href="" id="a"> Voice messages </a> </td>
           </tr>

 
               <tr>
            <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> 
             </tr>
          
           <tr>
            <td id="th"> Network <br><img src="/control_panel/photos/network.png" height="80" width="80"> </td>
            <td> <a href="block_ip_address.php" id="a"> Block ip address <a/> </td>
            <td> <a href="" id="a"> Block user  </a></td>
            <td> <a href="" id="a"> All cookies </a> </td>
            <td> <a href="" id="a"> All domains  </a> </td>
           </tr>
         

 
              <tr>
            <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> 
             </tr>
  
 
          <tr>
            <td id="th"> Settings <br><img src="/control_panel/photos/settings.png" height="80" width="80"> </td>
            <td> <a href="" id="a"> Add new user <a/> </td>
            <td> <a href="" id="a"> Delete user <a/> </td>
            <td> <a href="" id="a"> Choose password  <a/> </td>
            <td> <a href="logout.php" id="a"> Sign out  <a/> </td>
           </tr>
          
 

             <tr>
            <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> 
             </tr>


        <tr> 
           <td> </td>  <td> </td>  
         <td id="a3">  <h3> Administrator system managment </h3> </td>
          <td> </td>  <td> </td> 
         </tr>


        </table>
         </div>';  
          

       echo "<br>" ."<br>";
    }
 


/*         <tr>
            <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> 
             </tr>

*/

?>



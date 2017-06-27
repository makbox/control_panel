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

 <link rel="stylesheet" type="text/css" href="/control_panel/css/index.css"> 

</head>

<body id="body">





<?php
 

$allow= ip2long("127.0.0.1");

$ip = ip2long($_SERVER['REMOTE_ADDR']); // ip tou client

$location = '/error'; // edw stelnw ton spam xrhsth


if ($ip!=$allow)
 {
//stelnw se allo url
header ('HTTP/1.1 301 Moved Permanently');
header ('Location: '.$location);
}



else
  {


  if(isset($_POST['submit']))
  {

  $name="makbox";
  $pass="makbox";

  $username=$_POST['username'];
  $password=$_POST['password'];

   if($username==$name && $password==$pass)
      {
         $_SESSION['login']=$username;
        header('Location: control_panel.php');
        }

     else
      {
       echo '<script type="text/javascript">alert("Sign in control panel error");
         </script>';
       }


} // kleisimo ths isset
 

} //kleisimo ths megalhs else gia elenxo ths ip

?>




 <div align="center">
       <table id="table1">
        <tr>
   <form action="" method="post">


     <td>
  <input type="text" name="username" id="text" placeholder="Username" autofocus="autofocus" required>
     </td>

    <td>
   <input type="password" name="password" id="text" placeholder="Password" required>
   </td>


    <td>
<input type="submit" name="submit" id="button" value="Go to control panel" style="visibility: hidden;">
   </td>

   </tr>
 </form>
  </table> 
 </div>

 <br><br>




</body>
</html>

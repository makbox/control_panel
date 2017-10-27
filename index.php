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

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="/control_panel/css/index.css"> 


</head>

<body id="body">




 <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-12">

      <img src="/control_panel/photos/makbox.png" class="img-responsive" height="280px;" width="280px;">
      <div class="row">
        <h3 class="text-center" style="padding-right: 80px;"> Administrator </h3>
      </div>


      <div class="row">
           <form action="" method="post">
          <div class="input-group col-xs-9 col-sm-9 col-md-9">

            <input type="password" placeholder="Password" name="password" class="form-control">

          <div class="input-group-btn">
            <button class="btn btn-md btn-default btn-block" name="submit">
               <span class="glyphicon glyphicon-arrow-right"></span>
           </button>
          </div>

          </div>

      </div>
  </div>





</body>
</html>


<?php
 

$allow= ip2long("127.0.0.1"); // for mozilla browser

$allow2 = ip2long("::1"); // for chrome browser


$ip = ip2long($_SERVER['REMOTE_ADDR']); // ip tou client

$location = '/error'; // edw stelnw ton spam xrhsth


if ($ip!=$allow & $ip !=$allow2)
 {
//stelnw se allo url
header ('HTTP/1.1 301 Moved Permanently');
header ('Location: '.$location);
}



else
  {


  if(isset($_POST['submit']))
  {

  $pass="makbox";

  $password=$_POST['password'];

   if($password==$pass)
      {
         $_SESSION['login']="makbox";
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

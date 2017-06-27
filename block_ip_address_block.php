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



 if(isset($_POST['block_ip']))
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

    $ip_address=input($_POST['ip_address']);
    $ip_address=$conn->real_escape_string($ip_address);


     
      $sql0="select ip_address from block_ip";
      $result0=$conn->query($sql0);


          if(empty($ip_address))
             {
            echo '<script type="text/javascript">alert("This field is required");
         </script>';
     echo ("<script>location.href='block_ip_address.php'</script>");
              }

            else
              {
         
         while($row0=$result0->fetch_assoc())
            {
             $specie=$row0['ip_address'];
             if ($ip_address==$specie)
                 {
           echo '<script type="text/javascript">alert("This ip has blocked species");
         </script>';
     echo ("<script>location.href='block_ip_address.php'</script>");
                  }
                 }
         
        
       
      if (filter_var($ip_address, FILTER_VALIDATE_IP))
                {  

       $sql2="insert into block_ip (ip_address) values('$ip_address')";   
       $result2=$conn->query($sql2);
         echo '<script type="text/javascript">alert("Block ip address successfully");
         </script>';
     echo ("<script>location.href='block_ip_address.php'</script>");
               }


            else 
              {
          echo '<script type="text/javascript">alert("Ip adress not invalid");
             </script>';
           echo ("<script>location.href='block_ip_address.php'</script>");
                }

           

         } // kleisimo ths else gia upoxrewtiko pedio
        
  


    } // kleisimo ths else gia ta dedomena


    $conn->close();

  } // kleisimo ths isset


?>

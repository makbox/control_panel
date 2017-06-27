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

 <link rel="stylesheet" type="text/css" href="/control_panel/css/block_ip_address.css"> 





<script type="text/javascript">

function delete_confirm()
    {
	var result = confirm("Are you sure to delete?");
	if(result){
		return true;
	}else{
		return false;
	}
    }

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
	$('.checkbox').on('click',function(){
		if($('.checkbox:checked').length == $('.checkbox').length){
			$('#select_all').prop('checked',true);
		}else{
			$('#select_all').prop('checked',false);
		}
	});
});
</script>





<script type="text/javascript">

function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}

</script>





</head>

<body bgcolor=#b8b894>

 <a name="top"></a>


<body>


  <div align="center">
 <div id="header">
   <h3> Block ip address </h3>
   </div>


  <div align="center">
 <a href="control_panel.php" id="a1"> Go back to control panel <a/>
  </div>

 




<table border=1 id=insert>
 <form action="block_ip_address_block.php" method="post">
    <th>Insert ip address for block </th>
    <th>Ip address:<input type="text" name="ip_address"></th>
    <th><input type="submit" name="block_ip" value="Block ip address"></th>
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



         $sql="select id,instant,ip_address,user from block_ip";
         $result=$conn->query($sql);
       
        echo "<table id=table1>
           <form action='block_ip_address_delete.php' method='post' onSubmit='return delete_confirm();'/> 
                  <tr> 
                  <td id=hr1> Instant </td>
                  <td id=hr1> Ip address </td>
                  <td id=hr1>  
                  All<input type='checkbox'  onclick='toggle(this);'> 
                  <input type='submit'  id='del-submit' name='delete_ip' value='Delete'/>           
                </td>
                    </tr>";

         while($row=$result->fetch_assoc())
            {

             echo "<tr>
                   <td id=hr2> {$row['instant']} </td>
                   <td id=hr2> {$row['ip_address']} </td>
                  <td id=hr2> <input type='checkbox'  name='checked_id[]' value='{$row['id']}' </td>
                    </tr>";
                          
                  }


        echo " 
                 <tr>
               <td> <hr> </td> <td> <hr> </td> <td> <hr> </td> <td> <hr> </td>
                  </tr>
                   <tr>
               <td> <a href='#top' id='a2'> Back to Top </a> </td> 
                  <td> </td> 
                <td><a href='block_ip_address_export.php' id=a2>  Export as pdf </a>  </td> 
                  </tr>";     
            echo "</table>";
	
       
         
          }// kleisimo ths else gia ta dedomena


      $conn->close();

    }// kleisimo ths else gia ton elenxo ths session


?>




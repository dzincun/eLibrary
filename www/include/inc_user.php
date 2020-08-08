<?php
require ('../connections/connect.php');
//-query  the database table  
	  $sql="SELECT * FROM library_user" or die(mysql_error());  
	  //-run  the query against the mysql query function  
	  $result=mysql_query($sql)or die(mysql_error()); 
		echo'<select name="user">';
	  //-create  while loop and loop through result set  
	  while($row=mysql_fetch_array($result)){ ?>
              <option value="<?php echo $row['user_id']?>" > <?php echo $row['name']; }?></option>
              </select>



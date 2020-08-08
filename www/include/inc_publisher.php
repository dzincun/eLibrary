<?php
require ('../connections/connect.php');
//-query  the database table  
	  $sql="SELECT * FROM publisher order by publisher_name" or die(mysql_error());  
	  //-run  the query against the mysql query function  
	  $result=mysql_query($sql)or die(mysql_error()); 
		echo'<select name="publisher_id">';
	  //-create  while loop and loop through result set  
	  while($row=mysql_fetch_array($result)){ ?>
              <option value="<?php echo $row['publisher_id']?>" > <?php echo $row['publisher_name']; }?></option>
              </select>



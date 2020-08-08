<?php
require ('../connections/connect.php');
//-query  the database table  
	  $sql="SELECT * FROM subject order by subject_name" or die(mysql_error());  
	  //-run  the query against the mysql query function  
	  $result=mysql_query($sql)or die(mysql_error()); 
		echo'<select name="subject_id">';
	  //-create  while loop and loop through result set  
	  while($row=mysql_fetch_array($result)){ ?>
              <option value="<?php echo $row['subject_id']?>" > <?php echo $row['subject_name']; }?></option>
              </select>



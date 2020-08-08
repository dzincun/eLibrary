<?php
require ('../connections/connect.php');
//-query  the database table  
	  $sql="SELECT * FROM author order by author_name" or die(mysql_error());  
	  //-run  the query against the mysql query function  
	  $result=mysql_query($sql)or die(mysql_error()); 
		echo'<select name="author_id">';
	  //-create  while loop and loop through result set  
	  while($row=mysql_fetch_array($result)){ ?>
              <option value="<?php echo $row['author_id']?>" > <?php echo $row['author_name']; }?></option>
              </select>



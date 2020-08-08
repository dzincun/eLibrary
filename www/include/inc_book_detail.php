<?php
require ('../connections/connect.php');
//-query  the database table  ?>

		<select name="user" onchange="showdetail(this.value)">
		<?php
	  $sql="SELECT * FROM book_details " or die(mysql_error());  
	  //-run  the query against the mysql query function  
	  $result=mysql_query($sql)or die(mysql_error()); 
			echo '<option value="" > Select...</option>';
	  //-create  while loop and loop through result set  
	  while($row=mysql_fetch_array($result)){ ?>
              <option value="<?php echo $row['book_id']?>" > <?php echo $row['title']; }?></option>
              </select>



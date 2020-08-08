<?php
//sleep(5);
$value = $_GET["z"];
for ($k=1; $k<=$value; $k++ ){
require ('../connections/connect.php');
//-query  the database table  
	  $sql="SELECT * FROM book_details where availability = 1 order by title" or die(mysql_error());  
	  //-run  the query against the mysql query function  
	  $result=mysql_query($sql)or die(mysql_error()); 
		echo'<select name="book[]">';
			echo '<option value="" > Выберите</option>';
	  //-create  while loop and loop through result set  
	  while($row=mysql_fetch_array($result)){ ?>
              <option value="<?php echo $row['book_id']?>" > <?php echo $row['title']; }?></option>
              </select><br>

<?php };?>

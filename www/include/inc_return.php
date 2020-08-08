<?php
require ('../connections/connect.php');
//-query  the database table  
	  
	  $sql4="SELECT distinct user_id FROM borrow_details where status = 1" or die(mysql_error());
$result4= mysql_query($sql4)or die(mysql_error());?>

		<select name="user" onchange="showreturn(this.value)">
		<option value="null">Выберите</option>
<?php
/*while($row4=mysql_fetch_array($result4)){
$user_id2= $row4['user_id'];
 
	  /*$sql="SELECT * FROM library_user  where user_id=$user_id2 " or die(mysql_error());  
	  //-run  the query against the mysql query function  
	  $result=mysql_query($sql)or die(mysql_error()); 
	  //-create  while loop and loop through result set  
	  	   //echo "<option value='null'>select...</option>";

	  while($row=mysql_fetch_array($result)){ ?>
              <option value="<?php echo $row['user_id']?>" > <?php echo $row['name']; }}?></option>
              </select>*/



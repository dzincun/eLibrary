<script type="text/javascript">
 function readySubmit(){
if(confirm("Are you ready to delete this Author? ")){
return true;
}
else{
return false;
}
}

</script>


<?php

//sleep(5);
$value = $_GET["p"];
//for ($n=1; $n<=$value; $n++ ){

require ('../connections/connect.php');
//-query  the database table  
	  $sql4="SELECT * FROM borrow_details where user_id=$value and status='1' " or die(mysql_error());
$result4= mysql_query($sql4)or die(mysql_error());
$sn=1;
echo "<table border=0 cellpadding=10 >";
echo "<tr><td>SERIAL</td><td> BOOK TITLE</td><td>ACTION</td></tr>";

while($row4=mysql_fetch_array($result4)){
$book_id= $row4['book_id'];

	  $sql="SELECT * FROM book_details where book_id=$book_id " or die(mysql_error()); 
	   
	  //-run  the query against the mysql query function  
	  $result=mysql_query($sql)or die(mysql_error()); 
	  //-create  while loop and loop through result set  
	  
	  while($row=mysql_fetch_array($result)){
	  $book_id= $row['book_id'];		
	  $title= $row['title'];

 echo "<tr><td>$sn</td><td>$title</td><td><form  action=delete_returned.php onSubmit=return(readySubmit())><input type=hidden name=id value=$book_id><input type=submit value=Returned ></form></td></tr>";

 $sn++;
 }
}
echo "</table>";



	  
	   ?>
              


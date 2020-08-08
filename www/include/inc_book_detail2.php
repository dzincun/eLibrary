<script type="text/javascript">
 function getSubmit(){
if(confirm("Are you ready to delete this Book? ")){
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
require ('../connections/connect.php');

$sql="SELECT * FROM book_details where book_id=$value " or die(mysql_error());
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
// If result matched, table row must be greater than 1 row
$sn=1;
if($count>=1){
echo "<table border=0 width=700 >";
echo "<tr><td>SERIAL</td><td> TITLE </td><td> EDITION </td><td> ISBN </td><td>ACTION1</td></tr>";
while($row=mysql_fetch_array($result)){
$book_id= $row['book_id'];		
$title= $row['title'];
$edition= $row['edition'];
$isbn= $row['isbn'];


 echo "<tr><td>$sn</td><td>$title</td><td>$edition</td><td>$isbn</td><td><form  action=edit_book_detail_form.php onSubmit=return(getSubmit())><input type=hidden name=id value=$book_id><input type=submit value=Edit ></form></td></tr>";
 $sn++;
}


echo "</table>";
}


?>
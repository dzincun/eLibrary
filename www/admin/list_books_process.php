<script type="text/javascript">
 function readySubmit(){
if(confirm("Are you ready to delete this Book? ")){
return true;
}
else{
return false;
}
}
 function readySubmit2(){
if(confirm("Are you ready to edit this Book? ")){
return true;
}
else{
return false;
}
}
</script>

<?php 
echo '<a href="list_subject_process.php?lett=a&letter=A">A</a> <a href="list_subject_process.php?lett=b&letter=B">B</a> <a href="list_subject_process.php?lett=c&letter=C">C</a> <a href="list_subject_process.php?lett=d&letter=D">D</a> <a href="list_subject_process.php?lett=e&letter=E">E</a> <a href="list_subject_process.php?lett=f&letter=F">F</a> <a href="list_subject_process.php?lett=g&letter=G">G</a> <a href="list_subject_process.php?lett=h&letter=H">H</a> <a href="list_subject_process.php?lett=i&letter=I">I</a> <a href="list_subject_process.php?lett=j&letter=J">J</a> <a href="list_subject_process.php?lett=k&letter=K">K</a> <a href="list_subject_process.php?lett=l&letter=L">L</a> <a href="list_subject_process.php?lett=m&letter=M">M</a> <a href="list_subject_process.php?lett=n&letter=N">N</a> <a href="list_subject_process.php?lett=o&letter=O">O</a> <a href="list_subject_process.php?lett=p&letter=P">P</a> <a href="list_subject_process.php?lett=q&letter=Q">Q</a> <a href="list_subject_process.php?lett=r&letter=R">R</a> <a href="list_subject_process.php?lett=s&letter=S">S</a> <a href="list_subject_process.php?lett=t&letter=T">T</a> <a href="list_subject_process.php?lett=u&letter=U">U</a> <a href="list_subject_process.php?lett=v&letter=V">V</a> <a href="list_subject_process.php?lett=w&letter=W">W</a> <a href="list_subject_process.php?lett=x&letter=X">X</a> <a href="list_subject_process.php?lett=y&letter=Y">Y</a> <a href="list_subject_process.php?lett=z&letter=Z">Z</a>';
?>

<?php
require ('../connections/connect.php');
$test=$_GET["lett"];
$test2=$_GET["letter"];
$sql="SELECT * FROM subject " or die(mysql_error());
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
// If result matched, table row must be greater than 1 row
$sn=1;
if($count>=1){
echo "<table border=0 width=700 >";
echo "<tr><td>SERIAL</td><td> SUBJECT </td><td>ACTION1</td><td>ACTION2</td></tr>";
while($row=mysql_fetch_array($result)){
$subject_id= $row['subject_id'];		
$subject_name= $row['subject_name'];

if 	($subject_name[0]==$test || $subject_name[0] == $test2){
 echo "<tr><td>$sn</td><td>$subject_name</td><td><form  action=edit_subject.php onSubmit=return(readySubmit2())><input type=hidden name=id value=$subject_id><input type=submit value=Edit ></form></td><td><form  action=delete_subject.php onSubmit=return(readySubmit())><input type=hidden name=id value=$subject_id><input type=submit value=Delete ></form></td></tr>";
 $sn++;
}

}
echo "</table>";
}


?>
<p><a href="javascript:history.go(-1)">previous page</a> || <a href="admin.php">admin</a> </p>

<?php
//start session
session_start();

 $subject_id=$_REQUEST['id'];
 
 $_SESSION['subject_id'] = $subject_id;
 //connect to database
 
require ('../connections/connect.php');
$sql= "SELECT * FROM subject WHERE subject_id = '$subject_id' " or die(mysql_error());
$result= mysql_query($sql)or die(mysql_error());

//get result

while($row=mysql_fetch_array($result)){
//$author_id= $row['author_id'];		
$subject_name= $row['subject_name'];

//echo $author_id ;

?>
<form name="form1" method="post" action="update_subject_process.php">
  <table width="600">
    <tr>
      <td width="181">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>EDIT SUBJECT </td>
      <td width="242"><label>
       <input type="hidden" name="id" value="<?php echo $subject_id ; ?>"> <input name="subject_name" type="text" id="subject_name" value="<?php echo $subject_name; ?>">
      </label></td>
      <td width="161"><label>
        <input type="submit" name="Submit" value="Edit">
      </label></td>
    </tr>
  </table>
</form>
<?php };?>

<p><a href="javascript:history.go(-1)">previous page</a> || <a href="admin.php">admin</a> </p>

<?php
//start session
session_start();

 $book_id=$_REQUEST['id'];
 
 $_SESSION['book_id'] = $book_id;
 //connect to database
 
require ('../connections/connect.php');
$sql= "SELECT * FROM book_details WHERE book_id = '$book_id' " or die(mysql_error());
$result= mysql_query($sql)or die(mysql_error());

//get result

while($row=mysql_fetch_array($result)){
//$author_id= $row['author_id'];		
$title= $row['title'];
$edition= $row['edition'];
$isbn= $row['isbn'];

//echo $author_id ;

?>
<form name="form1" method="post" action="update_book_detail_process.php">
  <table width="600">
    <tr>
      <td width="181">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>EDIT TITLE </td>
      <td width="242"><label>
       <input type="hidden" name="id" value="<?php echo $book_id ; ?>"> <input name="title" type="text" id="subject_name" value="<?php echo $title; ?>">
      </label></td>
    </tr>
    <tr>
      <td>EDIT ISBN </td>
      <td><label>
        <input type="text" name="isbn" value="<?php echo $isbn; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>EDIT EDITION </td>
      <td><label>
        <input type="text" name="edition" value="<?php echo $edition; ?>"  />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Update" onclick="confirm(Are you sure you want to edit this title? )" />
      </label></td>
    </tr>
  </table>
</form>
<?php };?>

<p><a href="javascript:history.go(-1)">previous page</a> || <a href="admin.php">admin</a> </p>

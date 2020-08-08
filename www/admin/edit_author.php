<?php session_start();?>
<?php
session_start();
if (!isset($_SESSION['myusername'])) {
//echo 'no permission';
header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<script language="javascript" src="../connections/add.js"></script>
<script language="javascript" src="../connections/add_subject.js"></script>

<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="wrapper">
<?php include("top.php");?>  
  <!-- Main wrapper div starts here-->
  <div class="main_wrapper">
  
  <!-- Content wrapper div starts here-->
    <div class="content_wrapper">
   <p align="right"> <a href="javascript:history.go(-1)">Назад</a> || <a href="admin.php">Главная</a></p>
      <h1>Страница библиотекаря</h1>
<p>Проверьте правильность введенных данных.<?php
//start session
session_start();

 $author_id=$_REQUEST['id'];
 
 $_SESSION['author_id'] = $author_id;
 //connect to database
 
require ('../connections/connect.php');
$sql= "SELECT * FROM author WHERE author_id = '$author_id' " or die(mysql_error());
$result= mysql_query($sql)or die(mysql_error());

//get result

while($row=mysql_fetch_array($result)){
//$author_id= $row['author_id'];		
$author_name= $row['author_name'];

//echo $author_id ;

?>
</p>
<form name="form1" method="post" action="update_author_process.php">
  <table cellpadding="5" cellspacing="0">
    <tr>
      <td width="181">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>Изменить автора </td>
      <td width="242"><label>
       <input type="hidden" name="id" value="<?php echo $author_id ; ?>"> <input name="author_name" type="text" id="author_name" value="<?php echo $author_name; ?>">
      </label></td>
      <td width="161"><label>
        <input type="submit" name="Submit" value="Сохранить">
      </label></td>
    </tr>
  </table>
</form>
<?php };?>

          </p>    
          </div>
    <!-- Content wrapper div ends here-->
    
    <!-- Right wrapper div starts here-->
      <div id="side_bar">
	<?php include("admin2.php");?>      
    </div>
    <!-- Right wrapper div ends here-->
<div class="clr"></div>
        <div><img src="../images/edge_bottom.jpg" border="0" /></div>
  </div>
  <p>

  <!-- Main wrapper div ends here-->
</div>
</body>

</html>

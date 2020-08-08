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
<p>Проверьте правильность введенных данных.</p>
<p>
  <?php
//start session
//session_start();

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
</p>
<form action="update_subject_process.php" method="post" name="form1" id="form1">
  <table width="600" cellpadding="5" cellspacing="0">
    <tr>
      <td width="181">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>Измените категорию </td>
      <td width="242"><label>
        <input type="hidden" name="id" value="<?php echo $subject_id ; ?>" />
        <input name="subject_name" type="text" id="subject_name" value="<?php echo $subject_name; ?>" />
      </label></td>
      <td width="161"><label>
        <input type="submit" name="Submit" value="Сохранить" />
      </label></td>
    </tr>
  </table>
</form>
<?php };?> 
<p><!-- Content wrapper div ends here-->
  
  <!-- Right wrapper div starts here-->
</p>
    </div><div id="side_bar">
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

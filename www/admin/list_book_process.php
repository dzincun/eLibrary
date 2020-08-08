<?php session_start();
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
      <h1>Страница библиотекаря<br />
      </h1>
          <p>
<script type="text/javascript">
 function readySubmit(){
if(confirm("Вы действительно хотите удалить данного автора?")){
return true;
}
else{
return false;
}
}
 function readySubmit2(){
if(confirm("Вы действительно хотите начать редактирование данного автора?")){
return true;
}
else{
return false;
}
}
</script>
<!--
<?php 
echo '<a href="list_book_process.php?lett=а&letter=А">А</a>&nbsp;&nbsp; 
<a href="list_book_process.php?lett=б&letter=Б">Б</a> &nbsp;&nbsp;&nbsp; 
<a href="list_book_process.php?lett=в&letter=В">В</a>&nbsp;&nbsp;&nbsp; 
<a href="list_book_process.php?lett=г&letter=Г">Г</a>&nbsp;&nbsp;&nbsp; 
<a href="list_book_process.php?lett=д&letter=Д">Д</a>&nbsp;&nbsp;&nbsp;
 <a href="list_book_process.php?lett=е&letter=Е">F</a>&nbsp;&nbsp;&nbsp;
  <a href="list_book_process.php?lett=g&letter=G">G</a>&nbsp;&nbsp;&nbsp;
   <a href="list_book_process.php?lett=h&letter=H">H</a>&nbsp;&nbsp;&nbsp;
   <a href="list_book_process.php?lett=i&letter=I">I</a>&nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=j&letter=J">J</a>&nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=к&letter=К">K</a>&nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=l&letter=L">L</a> &nbsp;&nbsp;
<a href="list_book_process.php?lett=m&letter=M">M</a> &nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=n&letter=N">N</a> &nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=o&letter=O">O</a> &nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=p&letter=P">P</a> &nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=q&letter=Q">Q</a> &nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=r&letter=R">R</a> &nbsp;&nbsp;
<a href="list_book_process.php?lett=s&letter=S">S</a> &nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=t&letter=T">T</a> &nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=u&letter=U">U</a> &nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=v&letter=V">V</a> &nbsp;&nbsp;
<a href="list_book_process.php?lett=w&letter=W">W</a> &nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=x&letter=X">X</a> &nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=y&letter=Y">Y</a> &nbsp;&nbsp;&nbsp;
<a href="list_book_process.php?lett=z&letter=Z">Z</a>';
?>
-->
<?php
require ('../connections/connect.php');
//$test=$_GET["lett"];
//$test2=$_GET["letter"];
$sql="SELECT * FROM book_details " or die(mysql_error());
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
// If result matched, table row must be greater than 1 row
$sn=1;
if($count>=1){
echo "<table border=1 cellspacing=0 cellpadding=3 style='width:680px;'>";
echo "<tr><td width=20>№</td><td>Название</td><td width=70>ISBN</td><td width=80>Действие 1</td><td width=70>Действие 2</td></tr>";
while($row=mysql_fetch_array($result)){
$book_id= $row['book_id'];		
$isbn= $row['isbn'];
$publisher_id= $row['publisher_id'];
$title= $row['title'];
$edition= $row['edition'];

//if 	($title[0]==$test || $title[0] == $test2){
 echo "<tr><td>$sn</td><td>$title</td><td>$isbn</td><td><form  action=edit_book.php><input type=hidden name=id value=$book_id><input type=submit value=Редактировать></form></td><td><form  action=delete_book.php onSubmit=return(readySubmit())><input type=hidden name=id value=$book_id><input type=submit value=Удалить ></form></td></tr>";
 $sn++;
//}

}
echo "</table>";
}
//else echo "No result found"

?>
          </span></p>    
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

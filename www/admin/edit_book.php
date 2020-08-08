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
      <?php


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
          <form action="update_book_detail_process2.php" method="post" name="form1" id="form1" enctype="multipart/form-data">
            <table width="620" align="center" cellpadding="5" cellspacing="0" >
              <tr>
                <td width="111">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Название </td>
                <td width="312"><label>
                  <input type="hidden" name="id" value="<?php echo $book_id ; ?>" />
                  <input name="title" type="text" id="title" value="<?php echo $title; ?>" />
                </label></td>
              </tr>
              <tr>
                <td>ISBN </td>
                <td><label>
                  <input type="text" name="isbn" value="<?php echo $isbn; ?>" />
                </label></td>
              </tr>
              <tr>
                <td>Издание</td>
                <td><label>
                  <input type="text" name="edition" value="<?php echo $edition; ?>"  />
                </label></td>
              </tr>
              <tr>
                <td>Автор(ы)</td>
                <td><label>
                  <select name="author" id="author" onchange="showAuthor(this.value)">
                    <option>Выберите из списка</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><div id="txtAuthor"></div></td>
              </tr>
              <tr>
                <td>Категория</td>
                <td><select name="subject" id="subject" onchange="showSubject(this.value)">
                  <option>Выберите из списка</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><div id="txtSubject"></div></td>
              </tr>
              <tr>
                <td>Публикатор</td>
                <td><?php require ('../include/inc_publisher.php')?></td>
              </tr>
<tr>
                <td valign="top">Книга</td>
                <td><input type="file" name="file" id="file" />
                  <br />
                (PDFDocument только)</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" value="Сохранить" onclick="confirm(Вы действительно хотите отредактировать эту книгу? )" /></td>
              </tr>
            </table>
  </form>
          <p>
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

<?php session_start();
session_start();
if (!isset($_SESSION['myusername'])) {
header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
<script type="text/javascript" language="javascript" src="../include/add.js"></script>
<script type="text/javascript" language="javascript" src="../include/add_subject.js"></script>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
function showMe (box) {
    var chboxs = document.getElementsByName("checkbox");
    var vis = "none";
    for(var i=0;i<chboxs.length;i++) { 
        if(chboxs[i].checked){
         vis = "table-row";
            break;
        }
    }
    document.getElementById(box).style.display = vis;
}
</script>
</head>

<body>
<div class="wrapper">
<?php include("top.php");?>  
  <!-- Main wrapper div starts here-->
  <div class="main_wrapper">
  
  <!-- Content wrapper div starts here-->
    <div class="content_wrapper">
   <p align="right"> <a href="javascript:history.go(-1)">Назад</a> || <a href="admin.php">Главная</a></p>
      <h1>Раздел библиотекаря<br />
      </h1>
          <form action="add_books_details_process.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="MM_validateForm('title','','R');return document.MM_returnValue">
            <table id="table2" width="600" align="center" cellpadding="5" border="2px" cellspacing="0">
              <tr>
                <td colspan="2" align="center"><strong>Заполняйте все поля правильно </strong></td>
              </tr>
              <tr>
                <td width="117">Название</td>
                <td width="361"><label>
                  <input name="title" type="text" id="title" />
                </label></td>
              </tr>
              <tr>
                <td>Автор(ы)</td>
                <td><label>
                  <select name="author" id="author" onchange="showAuthor(this.value)">
                    <option>Выберите кол-во авторов</option>
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
                <td colspan="2"><select name="subject" id="subject" onchange="showSubject(this.value)">
                  <option>Выберите кол-во категорий книги</option>
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
                <td><label>
                  <?php require ('../include/inc_publisher.php')?>
                </label></td>
              </tr>
              <tr>
                <td>Издание</td>
                <td><label>
                  <input name="edition" type="text" id="edition" />
                </label></td>
              </tr>
              <tr>
                <td>ISBN</td>
                <td><label>
                  <input name="isbn" type="text" id="isbn" />
                </label></td>
              </tr>
			  
			  <tr>
                <td>Электронная версия</td>
                <td><label>
                  <input type="checkbox" id="checkbox" name="checkbox" value="checked" onclick="showMe('fileLoad')"/>
                </label></td>
              </tr>
			  
              <tr id="fileLoad" style="display:none;">
                <td valign="top">Файл книги</td>
                <td><label for="file"></label>
                <input type="file" name="file" id="file" /><br />
                (Только PDF Document)</td>
              </tr>

              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <input type="submit" name="Submit" value="Добавить книгу" />
                  <!--<input type="reset" name="Submit2" value="Сброс данных" />-->
                </label></td>
              </tr>
            </table>
          </form>
    <p>&nbsp;</p>    </div>
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

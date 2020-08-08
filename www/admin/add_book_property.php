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
<link rel="stylesheet" type="text/css" href="../style.css" />
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
          <form action="add_author_process.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('author_name','','R');return document.MM_returnValue">
            <table cellpadding="5" cellspacing="0">
              <tr>
                <td colspan="4" align="center"><strong>Добавить автора</strong></td>
              </tr>
              <tr>
                <td colspan="4"><?php  include "../include/inc_author2.php";?></td>
              </tr>
              <tr>
                <td width="182" nowrap="nowrap">Автор </td>
                <td width="303"><label>
                  <input name="author_name" type="text" id="author_name" size="30" />
                </label></td>
                <td width="105"><label>
                  <input type="submit" name="Submit" value="Добавить" />
                </label></td>
                <td width="290">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4" >&nbsp;</td>
              </tr>
            </table>
            <hr />
          </form>
          <form action="add_subject_process.php" method="post" name="form2" id="form2" onsubmit="MM_validateForm('subject_name','','R');return document.MM_returnValue">
            <table cellpadding="5" cellspacing="0">
              <tr>
                <td colspan="4" align="center"><strong>Добавить категорию </strong></td>
              </tr>
              <tr>
                <td colspan="4"><?php  include "../include/inc_subject2.php";?></td>
              </tr>
              <tr>
                <td width="196" nowrap="nowrap">Категория </td>
                <td width="295"><label>
                  <input name="subject_name" type="text" id="subject_name" size="30" />
                </label></td>
                <td width="102"><label>
                  <input type="submit" name="Submit2" value="Добавить" />
                </label></td>
                <td width="287">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4">&nbsp;</td>
              </tr>
            </table>
          </form>
          <!--<hr />
          <form action="add_publisher_process.php" method="post" name="form3" id="form3" onsubmit="MM_validateForm('publisher_name','','R');return document.MM_returnValue">
            <table cellpadding="5" cellspacing="0">
              <tr>
                <td colspan="4" align="center"><strong>Добавить публикатора </strong></td>
              </tr>
              <tr>
                <td colspan="4"><?php  include "../include/inc_publisher.php";?></td>
              </tr>
              <tr>
                <td width="200" nowrap="nowrap">Публикатор </td>
                <td width="291"><label>
                  <input name="publisher_name" type="text" id="publisher_name" size="30" />
                </label></td>
                <td width="115"><label>
                  <input type="submit" name="Submit22" value="Добавить" />
                </label></td>
                <td width="274">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4">&nbsp;</td>
              </tr>
            </table>
          </form>-->
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

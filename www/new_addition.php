<?php 
require ('connections/connect.php');

$sql = "SELECT * FROM book_details where title !='' ORDER BY RAND() LIMIT 0,10 "  or die(mysql_error());
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
// If result matched, table row must be greater than 1 row
//$sn=1;
if($count==0){
echo "<li> Нет послених добавленных книг.</li>";}
else{
echo "<table border=0 cellpadding=2 width ='680'>";
echo "<tr><td><b>Название</b></td><td><b>Публикатор</b></td><td><b>Автор(ы)</b></td></tr>";
while($row=mysql_fetch_array($result)){
$book_id= $row['book_id'];		
$isbn= $row['isbn'];
$publisher_id= $row['publisher_id'];
$title= $row['title'];

 echo "<tr valign='top'><td>$title &nbsp;";

	// test if a user is logged in or not
	if ($_SESSION['user_log']){
		if ($row['soft_copy'] != null){
			//$sql_2 = "INSERT INTO last_book_view VALUES((SELECT id FROM users WHERE name = $_SESSION[username]), $book_id)";
			//$saveToBDThatUserIsSeenThis = mysql_query($sql_2)or die(mysql_error());
			echo "<form name='submitForm' method='POST' action='loadBook.php'>";
			echo "<input type='hidden' name='book' value='$book_id'>";
			echo "<input type=submit value='Читать>'>";
			echo "</form>";
			//echo "<a href ='books/$book_id.pdf' target='_blank'>Читать></a>";
			//if(($_GET['action'] == 'didThat')){
			//	$sql_2 = "INSERT INTO last_book_view VALUES((SELECT id FROM users WHERE name = $_SESSION[username]), $book_id)";
			//	$saveToBDThatUserIsSeenThis = mysql_query($sql_2)or die(mysql_error());
			//}
		}
		else{
			//echo "<a href ='#'>Взять из библиотеки</a>";
			echo "<form name='submitForm2' method='POST' action='takeBookFromLibrary.php'>";
			echo "<input type='hidden' name='book' value='$book_id'>";
			echo "<input type=submit value='Взять из библиотеки'>";
			echo "</form>";
		}
	}
	else{
		echo "</td><td>";
	}

$sql4="SELECT * FROM publisher  where publisher_id=$publisher_id" or die(mysql_error());
$result4= mysql_query($sql4)or die(mysql_error());
while($row4=mysql_fetch_array($result4)){
$publisher_name= $row4['publisher_name'];
 echo "<td>$publisher_name</td>";
 echo"<td>";
$sql6="SELECT * FROM saved_author  where book_id = $book_id" or die(mysql_error());
$result6= mysql_query($sql6)or die(mysql_error());
while($row6=mysql_fetch_array($result6)){
$author_id= $row6['author_id'];

$sql5="SELECT * FROM author  where author_id=$author_id" or die(mysql_error());
$result5= mysql_query($sql5)or die(mysql_error());
while($row5=mysql_fetch_array($result5)){
$author_name= $row5['author_name'];
 echo "<img src='list.png'> $author_name<br>";
  }
}
echo "</td></tr>";

echo "<tr><td colspan=3 ><hr color='#021282'></td></tr>";
}

}

echo "</table>";
}
?>
<?php
$ip = $_SERVER["REMOTE_ADDR"];
if ($ip=="127.0.0.1") { 
if (isset($_POST['username'])) { $username = $_POST['username']; if ($username == '') { unset($username);} } //заносим введенный пользователем логин в переменную $username, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

if (empty($username) or empty($password))
{
exit ("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
}

$username = stripslashes($username);
$username = htmlspecialchars($username);

$password = stripslashes($password);
$password = htmlspecialchars($password);

$username = trim($username);
$password = trim($password);

include ("connections/connect.php");
$result = mysql_query("SELECT id FROM users WHERE name='$username'",$connecting);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}

$result2 = mysql_query ("INSERT INTO users (name,password, status) VALUES('$username','$password', 'Student')");

if ($result2=='TRUE')
{
echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='login.php'>Вход</a>";
}

else {
echo "Ошибка! Вы не зарегистрированы.";
     }
}	 
else {echo "Вы не можете зарегистрироватся с данного компьютера";}
?>
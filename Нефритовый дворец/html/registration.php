<?php 
session_start();
?>

<html>
<head>
<meta charset="utf-8">       
<link rel="icon" href="../img/logo.png"> 
<title>Нефритовый дворец</title>
<!--Подключение стилей-->
<link rel ="stylesheet" href="../style/mainstyle.css">
<link rel ="stylesheet" href="../style/styleslider.css">
<link rel ="stylesheet" href="../style/registratiastyle.css">
<link rel ="stylesheet" href="../style/mediastyle.css">
<!--Подключение шрифта-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>
    
<body>
<!--Шапка-->   
<header>
<div class="header">
<a href="../index.html" class="logo"><img src="../img/logo.svg" alt="нефритовый дворец"></a>
<div class="header-right">
<a href="authorization.php">Войти</a>
<a href="aboutUs.html">О нас</a>
<a href="apartments.html">Квартиры</a>
<a href="ipoteka.html">Ипотека</a>
</div></div>

<!--Форма регистрации-->  
<div class="footer">
<form action="registration.php" method="post">
<div class="authorizationReg"> 
    
<!--Логотип--> 
<div class="title"><img src="../img/logo.png"><h1>Нефритовый дворец</h1></div>

<input id = "reg_surname" name="reg_surname" type="text" 
placeholder="Введите фамилию пользователя" required pattern="[a-zA-Zа-яА-Я]+"><br>

<input id = "reg_name" name="reg_name" type="text" 
placeholder="Введите имя пользователя" required pattern="[a-zA-Zа-яА-Я]+"><br>

<input id = "reg_patronymic" name="reg_patronymic" type="text" 
placeholder="Введите отчество пользователя" required pattern="[a-zA-Zа-яА-Я]+"> <br>

<input id="user" name="reg_login" type="text"
placeholder="Придумайте логин" required pattern="[a-zA-Zа-яА-Я0-9-_@.]+"><br>

<input id="password" name = "reg_pass"  type="password" 
placeholder="Придумайте пароль" required pattern="[a-zA-Zа-яА-Я0-9]+"><br>

<input id = "password_replace" name = "reg_pass_replace" type="password" 
placeholder="Повторите пароль" required pattern="[a-zA-Zа-яА-Я0-9]+"><br>

<button onclick="message()" class="button">Зарегистрироваться</button> 
<a href="authorization.php"><p>Войти</p></a>

<?php
/*подключение к бд*/
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'database';
$link = mysqli_connect($host, $user, $pass, $name);

/*получаем данные, введенные пользователем*/
if (isset($_POST["reg_name"]) && isset($_POST["reg_surname"]) && isset($_POST["reg_patronymic"]) 
&& isset($_POST["reg_login"]) && isset($_POST["reg_pass"])) {

$regname = mysqli_real_escape_string($link, $_POST["reg_name"]);
$regsurname  = mysqli_real_escape_string($link, $_POST["reg_surname"]);
$regpatronymic = mysqli_real_escape_string($link, $_POST["reg_patronymic"]);
$reglogin = mysqli_real_escape_string($link, $_POST["reg_login"]);
$regpass = mysqli_real_escape_string($link, $_POST["reg_pass"]);
$regpassreplace = mysqli_real_escape_string($link, $_POST["reg_pass_replace"]);

/*запрос на получение данных из таблицы зарегистрированных пользователей*/
$sql_reg_user = "SELECT * FROM `registration` WHERE login = '$reglogin'";
if($rez = $link->query($sql_reg_user)) {
    
/*получаем логины из бд*/    
foreach($rez as $row) {
$login = $row['login']; }

/*проверка на логин*/
if ($reglogin == $login) {
echo "<script>alert(\"Пользователь с таким логином уже существует! Пройдите регистрацию заново\");</script>";}

/*проверка на одинаковые пароли*/
else if ($regpass != $regpassreplace) {
echo "<script>alert(\"Пароли не совпадают! Пройдите регистрацию заново\");</script>";}

/*регистрация пользователя*/
else {
$sql_reg = "INSERT INTO `registration` (surname, name, patronymic, login, password) 
VALUES ('$regsurname', '$regname', '$regpatronymic', '$reglogin', '$regpass')";

/*сообщение об успешной регистрации*/
if($link->query($sql_reg)) {
echo "<script>alert(\"Вы зарегистрировались. Войдите в свой профиль\");</script>"; }}}}?>
</div></form>

<!--Повал-->
<table class="footerTable">
<tr><td>
<p>Номер телефона: +7 (900) 088-79-85</p>
<p>Почта: nefritovi_dvorec@gmail.com</p>
<img src="../img/tg.svg">
<img src="../img/tw.svg">
<img src="../img/vk.svg"></td> 
<td><h2>Нефритовый дворец<h2>
<a href="../index.html"><img src="../img/logo.svg"></a>  
</td><td>
<p>О нас</p>
<p>Квартиры</p>
<p>Ипотека</p>
</td></tr></table></div>
</body>
</html>
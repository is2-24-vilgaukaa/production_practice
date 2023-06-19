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

<!--Форма авторизации-->   
<div class="footer">
<form action="authorization.php" method="post">
<div class="authorization">

<!--Логотип-->     
<div class="title"><img src="../img/logo.png"><h1>Нефритовый дворец</h1></div>

<!--Поля--> 
<input type="text" id="login" name = "login" placeholder="Введите логин" required
value = "<?php echo $_SESSION['login'];?>"> <br>
<input type="password" id="pass" name = "pass" class="input" type="password" placeholder="Введите пароль" 
required value = "<?php echo $_SESSION['pass'];?>"> <br>
<button class="button">Войти</button> 
<a href="registration.php"><p>Зарегистрироваться</p></a>

<?php
/*подключение к бд*/
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'database';
$link = mysqli_connect($host, $user, $pass, $name);

/*получем логин и пароль вводимые пользователем*/
if (isset($_POST["login"]) && isset($_POST["pass"])) {
$login = mysqli_real_escape_string($link, $_POST["login"]);
$pass = mysqli_real_escape_string($link, $_POST["pass"]);

/*пишем запрос на получение логина и пароля зарегистрированных пользователей в бд*/
$sql_logon = "SELECT * FROM `registration`";
if($result = $link->query($sql_logon)) {

/*проверка на соответствие (не совпали)*/
if($bd_login != $login || $bd_pass != $pass) {echo "Неверный логин или пароль ";}

/*получем логин и пароль зарегистрированных пользователей в бд*/
foreach($result as $row) {
$bd_login = $row['login'];
$bd_pass = $row['password'];

/*проверка на соответствие (совпали)*/
if($bd_login == $login && $bd_pass == $pass) {

$_SESSION['login'] = $login;
$_SESSION['pass'] = $pass;

/*переход на профиль пользователя*/    
$new_url = 'user_profile.php'; 
header('Location: '.$new_url);
}}}}?></form></div></form>

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
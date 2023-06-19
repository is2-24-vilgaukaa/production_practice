<html>
<head>
<meta charset="utf-8">       
<link rel="icon" href="../img/logo.png"> 
<title>Нефритовый дворец</title>
<!--Подключение стилей-->
<link rel ="stylesheet" href="../style/mainstyle.css">
<link rel ="stylesheet" href="../style/styleslider.css">
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

<!--Заголовок-->  
<h1>Профиль</h1><hr><br>

<!--Данные пользователя-->  
<table class="tableProfil">
<tr><td><img src="../img/gif.gif"></td>    
<td><p>Личные данные</p>
<?php 
/*подключение к бд*/
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'database';
$link = mysqli_connect($host, $user, $pass, $name);

/*получаем логин вошедшего пользователя с страницы Профиль*/
$users = $_SESSION['login'];

/*пишем запрос на получение данных зарегистрированного пользователя из бд*/
$sql_search_user = "SELECT * FROM `registration`";
if($result = $link->query($sql_search_user)) {
    
foreach($result as $row) {
$name = $row['name'];
$surname = $row['surname'];
$patronymic = $row['patronymic'];  
$login = $row['login']; 

/*выводим полученные данные*/
if ($users == $login) {
print("<p> ФИО: ".$surname." ".$name." ".$patronymic."</p>");}}}?>   
</td><td>
<a href="apartments.html"><p>Перейти к просмотру квартир</p></a>
<a href="ipoteka.html"><p>Узнать подробнее об ипотеке</p></a>
</td></tr></table><br><hr>

<!--Преимущества (анимированные иконки)-->
<div class="pluses">
<table class="plusesTable">
<tr><td><img src="../img/icon1.svg"></td>
<td><img src="../img/icon2.svg"></td>
<td><img src="../img/icon3.svg"></td>
<td><img src="../img/icon4.svg"></td>
</tr>
<tr><td><h3>Скорость</h3></td>
<td><h3>Качество</h3></td>
<td><h3>Надежность</h3></td>
<td><h3>Огромный выбор</h3></td>
</tr>
<tr><td class="description"><p>Ваш запрос будет рассмотрен в течении трех рабочих дней</p></td>
<td class="description"><p>Выбирая нас вы получаете качественное жилье</p></td>
<td class="description"><p>Мы контролируем весь процесс оформления документов</p></td>
<td class="description"><p>Вы можете выбрать жилье в любой точке города</p></td>
</tr></table></div><br>

<!--Выплывающий заголовок-->
<div class="box"><h1 class="aboutUsH1">Субсидии и льготы</h1></div>

<!--Информация об ипотеке-->
<div class="profileipotekainfo">
<h2> Ипотека с господдержкой </h2>
<p>Для оформления ипотечного кредита с господдержкой клиент 
должен соответствовать определенным требованиям и подобрать жилье, которое подходит под условия госпрограммы.</p>
<div class="center"><img class="profilIpoteka" src="../img/img11.jpg"></div><hr>
<h2>Семейная ипотека </h2>
<p>Участники этой программы могут взять ипотеку или рефинансировать уже
имеющийся кредит по льготной ставке — 6%. Разницу между обычной и льготной ставкой банку компенсирует государство.</p>
<div class="center"><img class="profilIpoteka" src="../img/img10.jpg"></div><hr>
<h2> Дальневосточная ипотека </h2>
<p>Проект господдержки, направленный на поддержку молодых семей с детьми и без. Этот вид кредита позволяет получить жилье 
под 2% на территории Дальневосточного федерального округа. Действует программа до 2024 года.</p>
<a href="ipoteka.html">Подробнее</a>
</div>
</body>
</html>
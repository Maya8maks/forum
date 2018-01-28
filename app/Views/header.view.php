<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="/style/css.css">
    <title>Forum</title>
</head>
<body>
<header class="nav clearfix">

    <div class="nav clearfix">
    <ul class='clearfix'>
        <li><a href="/">Головна</a></li>
         <?php

        if( isset( $_SESSION['user_id'] ) ) { 
          ?>
            
          <li > <a href="/logout">Вихід</a></li>
          <?php } 
          else  { ?>
          <li ><a href="/login">Вхід</a></li> 
          <?php } ?>
        
        <li><a href="/registration">реєстрація</a></li>
        <li><a href="/account">особистий кабінет</a></li>

    </ul>
    </div>
  <form action="/search" method="get" class='search'>
        <input type="search" name='search' placeholder="пошук"/>
        <button class='button_search' type="submit"><span>ok</span></button>
    </form>
</header>
<?php
if(isset($_SESSION['flash_msg'])){
  echo $_SESSION['flash_msg'];
  unset($_SESSION['flash_msg']);
}

?>
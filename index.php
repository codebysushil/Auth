<?php

require_once __DIR__."/vendor/autoload.php";
//require_once("./public/index.html");

session_start();

if(!isset($_SESSION['user_id'])){
  header('Location: ./public/login.html');
  die();
  print("<h2>Login please.</h2>");
  echo '<a href="/login">Login?</a>';
} else {
  header('Location: ./public/index.html');
  exit();
}

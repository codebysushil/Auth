<?php

require_once __DIR__."/vendor/autoload.php";
//require_once("./public/index.html");

session_start();

if(!isset($_SESSION['user_id'])){
  print("<h2>Login please.</h2>");
  echo '<a href="/login">Login?</a>';
}

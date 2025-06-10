<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$email = validInput($_POST['user_email']);
$password = validInput($_POST['user_password']);

$errEmail = $errPassword = '';

if(!empty($email)){
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  echo $errEmail = "Invalid email format.<br>";
  } else {

  }
} else {
   echo $errEmail = "Please provide your email.<br>";
}

if(empty($password)){
    echo $errPassword = "Please provide your password.<br>";
  } else {
      echo $errPassword = "password must be 8 charater";
  }
    
}
  
function validInput($input){
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}

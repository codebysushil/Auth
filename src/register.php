<?php 
$data = json_decode(file_get_contents("php://input"), true);
if($_SERVER['REQUEST_METHOD'] === "POST"){
     $name = validInput($data['name']);
     $email = validInput($data['email']);
     $password = validInput($data['password']);
     
     if(!empty($name)){
         if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
             echo "Only letters and white space allowed";
         }
     } else {
         echo 'Please provide your name.';
     }
     
     if(!empty($email)){
         if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
             echo 'Invalid email format';
         }
     } else {
         echo 'Please provide your email address';
     }
     
     if(!empty($password)){
         echo $password;
     } else {
         echo 'Please provide your password';
     }
}

function validInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    
    return $data; 
}
<?php
session_start();
require_once 'db.php';




$email = $_POST["email"];
$password = $_POST["password"];

$errors = array();

if ($email === '' && $password == "" ){
    $errors[] = 'Пустые поля!';


}elseif ($email === '') {
     $errors[] = 'Введите емайл!';
} elseif ($password == "") {
    $errors[] = 'Пустой пароль!';

}else{

$sql = "SELECT * FROM `learnphpREG`.`users` WHERE `email` = '".$email."';  ";
$query = mysql_query($sql);
if(mysql_num_rows($query) == 0){

    $errors[] = 'Данный емайл не зарегистрирован ';


}else{
    $result = mysql_fetch_array($query);

    if (password_verify($password, $result["password"])) {
        $_SESSION['auth'] = true;
         $_SESSION['id'] = $result['id'];
          $_SESSION['email'] = $result['email'];
      // header('location: /profile.php');

    }else{
        $errors[] = 'не верный пароль';

    }
}
}
if (empty($errors)){
    $answer = ['type' => 'success', 'message' => 'Вы зарегистрированы'];

}else{
    $answer = ['type' => 'error', 'message' => $errors];
    echo json_encode($answer);
    exit();

}
echo json_encode($answer);








































?>

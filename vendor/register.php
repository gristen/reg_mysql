<?php
session_start();
require_once 'db.php';




$email = trim(htmlspecialchars($_POST["email"]));
$password = trim(htmlspecialchars ($_POST["password"]));
$password_confirmation = trim(htmlspecialchars($_POST["password_confirmation"]));

 $hash = password_hash($password, PASSWORD_DEFAULT);

 $len = strlen($password);

 $_SESSION['email'] = $email;
 $_SESSION['hash'] = $hash;





$errors = array();


$sql = "SELECT * FROM `learnphpREG`.`users` WHERE `email` = '".$email."';  ";
		$query = mysql_query($sql);

	$result = mysql_fetch_array($query);
	// $_SESSION['ids'] = $result['id'];
	// $_SESSION['name'] = $result['email'];







 if ($email == "" || $password == "" || $password_confirmation == "") {
 	$errors[] = 'Пустые поля!';

 }elseif($password !== $password_confirmation){
	$errors[] = 'Пароли не совпадают!';
 }elseif($len <=3){
 	$errors[] = 'короткий пароль!';
 }elseif (mysql_num_rows($query) > 0) {
	$errors[] = 'эмайл занят!';
}





 if (empty($errors)){
	$answer = ['type' => 'success', 'message' => $success];

 }else{
 	$answer = ['type' => 'error', 'message' => $errors];
 	 echo json_encode($answer);
 	exit();
}
   echo json_encode($answer); // отправляем массив в json формате , чтобы ajax его мог понять

$sql = "INSERT INTO `learnphpREG`.`users` (`email`, `password`) VALUES ('".$email."', '".$hash."' )";
$query = mysql_query($sql);




















?>

<?php  
require 'includes/connect.php'; 
session_start();  


$showForm = true;
if (!empty($_POST['password']) and !empty($_POST['login'])) {
    $login = $_POST['login']; 
    $query = "SELECT * FROM users WHERE login='$login'";
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$user = mysqli_fetch_assoc($res);
		
	if (!empty($user)) {
		$hash = $user['password']; 
	
		if (password_verify($_POST['password'], $hash)) {
			$_SESSION['auth'] = true;
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user['id'];
            header("Location: index.php");
            die();
		} else {
            $_SESSION['auth'] = false;
		 echo "Неверный логин или пароль";
		}
	}
} 

$content = '';
$content .= ' 
    <form action="" method="POST">  
        <input name="login">  
        <input name="password" type="password">  
        <input type="submit" value="Вход">  
    </form>';

$page = [
    'title' => 'Вход',
    'content' => $content
];

return $page;


 
?>
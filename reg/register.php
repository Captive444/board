

<?php
require 'includes/connect.php'; 
session_start(); 


	if (!empty($_POST['login']) and !empty($_POST['password'])) {
		$login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
		
		$query = "INSERT INTO users SET login='$login', password='$password' , email='$email'";
		mysqli_query($link, $query) or die(mysqli_error($link));
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;
        $id = mysqli_insert_id($link);
        $_SESSION['id'] = $id;
        header('Location: index.php');
        die();
	}

    $content = '';
$content .= ' <form action="" method="POST">
        <label for="login">Логин:</label>
        <input type="text" name="login">
        <label for="password">Пароль:</label>
        <input type="password" name="password">
        <label for="email">Email:</label>
      <input type="text" name="email">
        <input type="submit" value="Зарегистрироваться">
    </form>
   ';

$page = [
    'title' => 'Регистрация',
    'content' => $content
];

return $page;

?>

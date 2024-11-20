<?php

$adminPanel = ''; 
if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
    $adminPanel = '<h2>Панель управления:</h2>';
    $adminPanel .= '<ul>';
    $adminPanel .= '<li><a href="create.php">Создать объявление</a></li>';
    $adminPanel .= '<li><a href="show.php">Мои объявления</a></li>';
    $adminPanel .= '<li><a href="logout.php">Выход</a></li>';
    $adminPanel .= '</ul>';
}
else {
    $adminPanel = '<h2>Вы не авторизованы:</h2>';

}


return $adminPanel; 

?>

<?php

require 'includes/connect.php';
session_start();
$user_id = $_SESSION['id'];

$query = "SELECT * FROM announcements WHERE user_id = '$user_id'";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
$data = [];
while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}

$content = '';
foreach ($data as $row) {
    $content .= '<h3>' . $row['title'] . '</h3>' . '<p>' . $row['content'] . '</p>' . '<hr>';
}

$page = [
    'title' => 'Мои объявления',
    'content' => $content
];

return $page;

?>
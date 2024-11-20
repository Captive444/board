  

<?php

require 'includes/connect.php';
session_start();

$url = $_SERVER['REQUEST_URI'];


if (preg_match('#^/$#', $url, $params)) {
  $page = include 'categoryAll.php';
}

if (preg_match('#^/(?<slug>[a-z0-9\-]+)$#', $url, $params)) {
  $slug = $params['slug'];
  $page = include 'category.php';
}

if (preg_match('#^/(create.php)$#', $url, $params)) {
  $slug = $params['slug'];
  $id = $params['id'];
  $page = include 'create.php';
}

if (preg_match('#^/(login.php)$#', $url, $params)) {
  $page = include 'reg/login.php';
}

if (preg_match('#^/(register.php)$#', $url, $params)) {
  $page = include 'reg/register.php';
}

if (preg_match('#^/(show.php)$#', $url, $params)) { 
  $page = include 'reg/show.php';
}
if (preg_match('#^/(logout.php)$#', $url, $params)) { 
  $page = include 'reg/logout.php';
}


$layout = file_get_contents('layout.php');
$layout = str_replace('{{ title }}', $page['title'], $layout);
$layout = str_replace('{{ content }}', $page['content'], $layout);

$layout = str_replace('{{ adminPanel }}', include 'admin_panel.php', $layout);

echo $layout;



?>




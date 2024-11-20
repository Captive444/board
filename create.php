<?php

require 'includes/connect.php';
session_start();
$page = [
  'title' => 'Создать объявление',
  'content' => '
    <form action="create.php" method="POST">
    <label for="title">Заголовок:</label>
    <input type="text" id="title" name="title" required>
      <br>
      <label for="category_id">Категория:</label>
     <select id="category_id" name="category_id" required>
  <option value="1">Недвижимость</option> 
  <option value="2">Бытовая техника и электроника</option> 
  <option value="3">Строительство и ремонт</option> 
  <option value="4">Животные</option> 
  <option value="5">Личные вещи</option> 
  <option value="6">Услуги</option> 
  <option value="7">Транспорт</option> 
  <option value="8">Красота и здоровье</option> 
  <option value="9">Транспорт</option> 
  <option value="10">Знакомства</option> 
</select>
      <br>
      <label for="content">Текст:</label>
      <textarea id="content" name="content" required></textarea>
      <br>
      
      <button type="submit">Создать</button>
    </form>
  '
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $category_id = $_POST['category_id'];
  $user_id = $_SESSION['id'];



  $query = "INSERT INTO announcements (title, content, category_id, user_id, created_at) 
  VALUES ('$title', '$content', '$category_id', '$user_id', NOW())";

  mysqli_query($link, $query) or die(mysqli_error($link));

  header('Location: /');
  exit;
}

return $page;
?>


<?php

require 'includes/connect.php';


  $query = "SELECT a.title, a.content, c.name, u.login AS login 
              FROM announcements a
           LEFT JOIN category c ON a.category_id = c.id LEFT JOIN users u ON a.user_id = u.id
              WHERE slug = '$slug'";

 	$res = mysqli_query($link, $query) or die(mysqli_error($link));
  for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

	$content = '';

  foreach ($data as $row) {
    $content .= '<h3>' . $row['title'] . '</h3>' . '<p>' . $row['content'] . '</p>' . '<hr>' . 'Автор: ' . $row['login'];
   }

   $page = [
     'title' => $row['category_name'],
     'content' => $content
   ];

   return $page;


	
?>
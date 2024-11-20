
<?php

require 'includes/connect.php';

$query = "SELECT * FROM category";
$res = mysqli_query($link, $query) or die(mysqli_error($link));


	for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

  	$content = '';
	foreach ($data as $page) {
		$content .= '
			<div>
				<a href="'  . $page['slug'] . '">' . $page['name'] . '</a>
			</div>
		';
	}
	
	$page = [
		'title' => 'Доска объявлений',
		'content' => $content
	];
	
	return $page;



?>
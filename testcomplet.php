<?php
require_once(__DIR__ . '/test_contents.php');
require_once(__DIR__ . '/config.php');

function echo_test_answer($index, $page) {
	global $TEST_ANSWERS;

	$idnumber = $page * QUESTIONS_PER_PAGE + $index;
	if ($index == 0) {
		echo '<td class="text-left firstcolumn">';
	} else {
		echo '<td class="text-left">';
	}
	echo $TEST_ANSWERS[$idnumber];
	echo '</td>';
	if ($index == 0) {
		echo '<td class="text-right firstcolumn">';
	} else {
		echo '<td class="text-right">';
	}
	echo '<select id="ans' . $idnumber . '" class="form-control select-ans">';
	echo '<option value ="' . NOT_ANSWERED . '">Alegeți</option>';
	for ($i = 1; $i <= 5; $i++) {
		echo '<option value ="' . $i . '">' . $i . '</option>';
	}
	echo '</select>';
	echo '</td>';
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="testpsihoinventica.css">
	<title>Test Completat</title>
</head>

<body>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-left">Test psihoinventică</h2>
			<hr>
			<p class="text-justify">Text completat cu sucess.</p>
			<?php
				var_dump($_POST);
			?>
		</div>
	</div>
</body>

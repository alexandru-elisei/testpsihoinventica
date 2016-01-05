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
	for ($i = 1; $i <= ANSWER_RANGE; $i++) {
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
	<link rel="stylesheet" type="text/css" href="index.css">
	<script src="index.js"></script>
	<title>Test Psihoinventica</title>
</head>

<body>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-left">Test psihoinventică</h2>
			<hr>
			<p class="text-justify">Vă rugăm să alegeți un număr de la 1 la 5 în dreptul
									fiecărei afirmații de mai jos. Numărul exprimă măsura
									în care sunteți de acord/dezacord cu afirmația astfel:
				<ol class="list">
					<li>Puternic dezacord</li>
					<li>Oarecum dezacord</li>
					<li>Nici acord, nici dezacord</li>
					<li>Oarecum de acord</li>
					<li>Puternic acord</li>
				</ol>
			</p>
			<br>
			<p class="text-justify"><strong>Mă văd ca pe cineva care:</strong></p>
			<br>
			<form id="submitform" role="form">
				<div class="form-group">
					<ul class="nav nav-tabs">
						<?php
							global $TEST_ANSWERS;

							$questioncount = count($TEST_ANSWERS);
							$pagescount = (int)($questioncount / QUESTIONS_PER_PAGE) + 1;
							for ($button = 0; $button < $pagescount; $button++) {
								if ($button == 0) {
									echo '<li class="active"><a data-toggle="pill" href="#pagina0">Pagina 1</a></li>';
								} else {
									echo '<li><a data-toggle="pill" href="#pagina' . $button . '">Pagina ' . ($button + 1) .'</a></li>';
								}
							}
						?>
					</ul>
					<div class="tab-content">
						<?php
							for ($page = 0; $page < $pagescount; $page++) {
								if ($page == 0) {
									echo '<div id="pagina' . $page . '" class="tab-pane fade in active">';
								} else {
									echo '<div id="pagina' . $page . '" class="tab-pane fade">';
								}
								echo '<table class="table table-condensed table-hover">';
								echo '<tbody>';
								for ($i = 0; $i < QUESTIONS_PER_PAGE; $i++) {
									if (($page * QUESTIONS_PER_PAGE + $i) < $questioncount) {
										echo '<tr>';
										echo_test_answer($i, $page);
										echo '</tr>';
									} else {
										// Adding empty rows.
										echo '<tr><td class="emptycolumn"> </td><td class="emptycolumn"> </td></tr>';
									}
								}
								echo '</tbody>';
								echo '</table>';
								echo '</div>';
							}
						?>
					</div>
					<input type="hidden" id="questioncount" name="questioncount" value="<?php echo $questioncount;?>">
				</div>
				<p id="msgplaceholder" class="text-justify"> </p>
				<div class="form-group">
					<input class="btn btn-primary" id="submitbutton" type="submit" value="Click to submit"/>
				</div>
			</form>
		</div>
	</div>
</body>

<?php
require_once(__DIR__ . '/test_contents.php');
require_once(__DIR__ . '/config.php');

$answers = array();
foreach ($_POST as $key => $value) {
	$questionnumber = substr($key, 4);
	$answers[$questionnumber] = intval($value);
}

$results = array();
foreach ($TEST_RESULTS as $category => $questions) {
	$score = 0;
	foreach ($questions as $question) {
		$rpos = strpos($question, 'r');
		if ($rpos === false) {
			// Question number starts at 1 in the test sheet.
			$question = intval($question) - 1;
		} else {
			// Question number starts at 1 in the test sheet.
			$question = substr($question, 0, $rpos) - 1;
		}
		if ($rpos === false) {
			$score += $answers[$question];
		} else {
			$score += ANSWER_RANGE + 1 - $answers[$question];
		}
	}
	$results[$category] = $score;
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
	<title>Test Completat</title>
</head>

<body>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-left">Test psihoinventică</h2>
			<hr>
			<p class="text-justify">Test completat cu sucess. Rezultatele dumneavoastră sunt:</p>
			<ul class="list">
			<?php
				foreach ($results as $category => $score) {
					echo '<li>' . $category . ': ' . $score . '</li>';
				}
			?>
			</ul>
			<form role="form" method="link" action="<?php echo RETURN_URL ?>">
				<br>
				<input class="btn btn-primary" id="returnbutton" type="submit" value="Back to test">
			</form>
		</div>
	</div>
</body>

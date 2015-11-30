<?php
require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/test_contents.php');

if (empty($_POST)) {
	echo 'emptypost';
	die;
}
if (!isset($_POST['postData'])) {
	echo 'nopostdata';
	die;
}
$_POST = $_POST['postData'];
if (!isset($_POST['isinternal'])) {
	echo 'notinternal';
	die;
}
$isinternal = filter_var(trim($_POST['isinternal']), FILTER_VALIDATE_BOOLEAN,
						 array('flags' => FILTER_NULL_ON_FAILURE));
if (empty($isinternal)) {
	echo 'emptyisinternal';
	die;
}

unset($_POST['isinternal']);
$filteredpost = array();
foreach ($_POST as $rawkey => $rawvalue) {
	$filteredkey = filter_var($rawkey, FILTER_SANITIZE_STRING,
							  array('flags' => FILTER_NULL_ON_FAILURE));
	if (is_null($filteredkey)) {
		echo 'nullfilteredkey';
		die;
	}
	$filteredvalue = filter_var($rawvalue, FILTER_SANITIZE_STRING,
								array('flags' => FILTER_NULL_ON_FAILURE));
	$filteredpost[$filteredkey] = $filteredvalue;
}

$totalquestions = count($TEST_ANSWERS);
for ($i = 0; $i < $totalquestions; $i++) {
	$expectedkey = '#ans' . $i;
	if (!isset($filteredpost[$expectedkey]) || $filteredpost[$expectedkey] === NOT_ANSWERED) {
		echo $expectedkey . ' notfound';
		die;
	}
}

echo 'success';

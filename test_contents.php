<?php
$TEST_ANSWERS = array(
	'este vorbăreț',
	'tinde să dea vina pe alții',
	'face o treabă temeinică',
	'este deprimat, trist',
	'este original, vine cu idei noi',
	'este rezervat',
	'este de ajutor și altruist cu alții',
	'poate fi oarecum lipsit de griji',
	'este relaxat, nu este stresat',
	'este curios despre multe lucruri diferite',
	'este plin de energie',
	'începe certuri cu alții',
	'este un lucrător de incredere',
	'poate fi tensionat',
	'este ingenios, un gânditor profund',
	'generează mult entuziasm',
	'are un caracter iertător',
	'tinde să fie dezorganizat',
	'își face multe griji',
	'are o imaginatie activa',
	'tinde sa fie liniștit',
	'este în general de încredere',
	'tinde să fie leneș',
	'este stabil emoțional, nu este ușor de supărat',
	'este inventiv',
	'are o personalitate asertivă',
	'poate fi rece și distant',
	'perseverează până când sarcina este terminată',
	'poate fi indispus',
	'prețuiește experiențele artistice, estetice',
	'este uneori timid, inhibat',
	'este atent și apropiat de toată lumea',
	'face lucrurile eficient',
	'rămâne calm în situații tensionate',
	'preferă munca de rutină',
	'este sociabil',
	'este uneori nepoliticos cu alții',
	'face planuri pe care apoi le urmeaza',
	'devine nervos cu ușurință',
	'îi place să reflecteze, să se joaca cu idei',
	'are puține interese artistice',
	'îi place să coopereze cu alții',
	'este ușor de distras',
	'este sofisticat în artă, muzică sau literatură'
);

$TEST_RESULTS = array(
	'extraversie'		=> array('1', '6r', '11', '16', '21r', '26', '31r', '36'),
	'agreabilitate'		=> array('2r', '7', '12r', '17', '22', '27r', '32', '37r', '42'),
	'conștiinciozitate'	=> array('3', '8r', '13', '18r', '23r', '28', '33', '38'),
	'neuroticism'		=> array('4', '8r', '13', '18r', '23r', '28', '33', '38'),
	'deschidere'		=> array('5', '10', '15', '20', '25', '30', '35r', '40', '41r', '44')
);

/*
$TEST_ANSWERS = array(
	'este vorbaret',
	'este sofisticat in arta, muzica sau literatura'
);

$TEST_RESULTS = array(
	'unu'	=> array('1', '2'),
	'doi'	=> array('1r', '2')
);
 */

define('ANSWER_RANGE', 5);

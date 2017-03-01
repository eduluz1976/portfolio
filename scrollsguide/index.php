<?php
require_once('inc/include.php');

\TestNucleus\ScrollsGuide::config('http://a.scrollsguide.com', 'ranking');

\TestNucleus\ScrollsGuide::setParm('fields', 'name,rating,rank,won');

$start = 0;
$target = 3000;
$step = 500;

$data = \TestNucleus\ScrollsGuide::execLoop($start,$target,$step);

header('Content-type: text/json');
echo json_encode($data, JSON_OBJECT_AS_ARRAY);
exit;

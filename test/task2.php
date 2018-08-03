<?php
function countCells(int $start, int $finish, int $distance) 
{
    if ($finish - $start < 2 * $distance) return 1;
    else return ($finish - $start) % $distance + 1;
}

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);
$cells = $data['cells'];
$distance = $data['distance'];
$count = 1;
for ($i = 1; $i < count($cells); $i++) {
    $count *= countCells($cells[$i-1], $cells[$i], $distance); 
}
$resuls = json_encode(['result' => $count]);
echo $resuls;

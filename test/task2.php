<?php
function countCells(int $start, int $finish, int $distance, int &$count) 
{
    $mod = ($finish - $start) % $distance;
    if ($finish - $start >= 2 * $distance) {
        if ($finish - $start >= 3 * $distance) {
            for ($i = 0; $i <= $mod; $i++) {
                countCells($start + $distance + $i, $finish, $distance, $count);
            }
        } else $count += $mod + 1;
    } else $count++;
    echo $count . "\t";
}

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);
$cells = $data['cells'];
$distance = $data['distance'];
$countAll = 1;
echo "\n";
for ($i = 1; $i < count($cells); $i++) {
    $countOne = 0;
    countCells($cells[$i-1], $cells[$i], $distance, $countOne); 
    $countAll *= $countOne;
}
$resuls = json_encode(['result' => $countAll]);
echo $resuls;

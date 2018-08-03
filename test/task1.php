<?php
class SocksMachine
{
    public function countUnpaired(array $socks) 
    {
        $result = array_count_values($socks);
        $result = array_filter($result, function($var) {
            return ($var & 1);
        });
        return count($result);
    }
    //перед использованием метода countUnpaired, рекомендуется проверить массив
    public function checkSocks(array $socks, int $min = 0, int $max = 1000) 
    {
    	$result = !empty($socks);
        foreach ($socks as $value) {
            if ($value < $min || $value > $max || !is_int($value)) $result = false;
        }
        return $result;
    }
}

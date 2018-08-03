<?php
function checkDishes(array $dishes, int $min = 0, int $max = 100) 
{
    $result = !empty($dishes);
    foreach ($dishes as $dish) {
        if ($dish < $min || $dish > $max || !is_numeric($dish)) $result = false;
    }
    return $result;
}

$flag = true;
while (true) {
    $line = trim(fgets(STDIN));
    if (empty($line)) {
        print_r("Пустая строка. Попробуйте еще раз:\n");
    } else {
        $dishes = preg_split("/[\s,.]+/", $line);
        if (checkDishes($dishes)) {
        	$dishes = array_count_values($dishes);
        	echo max($dishes);
            $flag = false;
        } else {
        	print_r("Строка должна содержать номера блюд от 1 до 100. Попробуйте еще раз:\n");
        }
    }
}

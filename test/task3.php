<?php
function checkDishes(array $dishes) 
{
    if (empty($dishes)) return false;
    foreach ($dishes as $dish) {
        if (preg_match('/^[\d]+$/', $dish) !== 1) return false;
        elseif ($dish < 0 || $dish > 100) return false;
    }
    return true;
}

while (true) {
    $line = trim(fgets(STDIN));
    if (strlen($line) === 0) {
        print_r("Пустая строка. Попробуйте еще раз:\n");
    } else {
        $dishes = preg_split("/[\s]+/", $line);
        if (checkDishes($dishes)) {
        	$dishes = array_count_values($dishes);
        	echo max($dishes)."\n";
            return;
        } else {
        	print_r("Строка должна содержать номера блюд от 1 до 100. Попробуйте еще раз:\n");
        }
    }
}

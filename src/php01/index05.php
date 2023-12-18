<?php
$Fizz = "Fizz";
$Buzz = "Buzz";
$FizzBuzz = "FizzBuzz";

for ($i = 1; $i <= 50; $i++){
    if ($i % 15 == 0){
        echo $FizzBuzz;
    }else if ($i % 3 == 0){
        echo $Fizz;
    }else if ($i % 5 == 0){
        echo $Buzz;
    }else{
        echo $i . '<br>';
    }
}

// echo "<br>"

for ($i = 1; $i < 6; $i++){
    for ($j = 1; $j < 6; $j++){
        echo "●";
    }
    echo "<br>";
}
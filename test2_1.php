<?php 
    $salary = 10000;

    if( $salary < 10000 ){
        $salary = $salary + 200;
    }elseif( $salary < 11000 ){
        $salary += 200;
    }elseif( $salary < 12000 ){
        $salary += 300;
    }
    
    // 10200 
    echo $salary;


?>
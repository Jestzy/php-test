<?php
    $data = array(
        10000 => 15000,
        15000 => 20000,
        "salary" => 30000
    );

    foreach ( $data as $salary ){
        if( $salary < 10000 ){
            $salary = $salary + 200;
        }elseif( $salary < 11000 ){
            $salary += 200;
        }elseif( $salary < 12000 ){
            $salary += 300;
        }
        echo $salary."\n";
    }

?>
<?php
    for( $x=1; $x<=5; $x++ ){
        for( $y=1; $y<= 5-$x; $y++ ){
            echo " &nbsp; ";
        }
        for( $y=1; $y<=2*$x-1; $y++ ){
            echo "*";
        }
        echo "<br>";
    }
?>
<?php
    for( $x=5; $x>=1; $x-- ){
        for( $y=1; $y<=5; $y++ ){
            if( $y >= $x ){
                echo "o";
            }else{
                echo " &nbsp; ";
            }
        }
        echo "<br>";
    }
?>
<?php

$integer = [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ];
$total = 0;
for ( $i = 0; $i<count( $integer );
$i++ ) {
    $total += $integer[ $i ];
}

echo 'Total:'.$total;
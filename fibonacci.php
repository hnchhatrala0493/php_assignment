<?php
$first = 0;
$second = 1;
for ( $i = 0; $i<10; $i++ ) {
    if ( $i <= 1 ) {
        $next = $i;
        // 0, 1
    } else {
        $next = $first+$second;
        //0 + 1 = 1
        $first = $second;
        // 1
        $second = $next;
        //1
    }

    echo  $next.' ';
    echo '<br>';
}

?>
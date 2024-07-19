<?php

function ArmstrongNumber( $num ) {
    $sum = 0;
    $a = $num;
    while( $a != 0 ) {
        $rem = $a%10;
        $sum = $sum + $rem*$rem*$rem;
        $a = intval( $a / 10 );
    }

    if ( $num == $sum ) {
        return 1;
    }

    // not an armstrong number
    return 0;

}

$num = 410;
if ( ArmstrongNumber( $num ) ) {
    echo "$num is an Armstrong number.";
} else {
    echo "$num is not an Armstrong number.";
}
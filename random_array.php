<?php

function getRandomValues( $array, $numValues ) {

    if ( $numValues > count( $array ) ) {
        $numValues = count( $array );
    }

    $randomKeys = array_rand( $array, $numValues );

    if ( $numValues == 1 ) {
        return [ $array[ $randomKeys ] ];
    }

    $randomValues = [];
    foreach ( $randomKeys as $key ) {
        $randomValues[] = $array[ $key ];
    }

    return $randomValues;
}

$array = [
    'Essence Mascara Lash Princess',
    "L'Oreal Paris Voluminous Mascara",
    'Maybelline Lash Sensational Mascara',
    'Covergirl Lash Blast Mascara',
    "Benefit They're Real! Mascara"
];

$randomValues = getRandomValues( $array, 2 );

print_r( $randomValues );
?>
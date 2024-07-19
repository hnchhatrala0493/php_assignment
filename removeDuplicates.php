<?php
echo '<h1>Remove Duplicate array</h1>';

$arrayWithDuplicates = [
    'Essence Mascara Lash Princess',
    "L'Oreal Paris Voluminous Mascara",
    'Maybelline Lash Sensational Mascara',
    'Essence Mascara Lash Princess', // Duplicate
    'Covergirl Lash Blast Mascara',
    "L'Oreal Paris Voluminous Mascara" // Duplicate
];

echo '<pre>';
print_r( $arrayWithDuplicates );
echo '<br>';

function removeDuplicates( $array ) {
    $uniqueArray = array_unique( $array );
    return $uniqueArray;
}

// Example array with duplicates
$arrayWithDuplicates = [
    'Essence Mascara Lash Princess',
    "L'Oreal Paris Voluminous Mascara",
    'Maybelline Lash Sensational Mascara',
    'Essence Mascara Lash Princess', // Duplicate
    'Covergirl Lash Blast Mascara',
    "L'Oreal Paris Voluminous Mascara" // Duplicate
];

$arrayWithoutDuplicates = removeDuplicates( $arrayWithDuplicates );
echo '<pre>';
print_r( $arrayWithoutDuplicates );
?>
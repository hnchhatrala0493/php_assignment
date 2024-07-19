<?php

echo '<h1>Indexed array</h1>';

print_r( array( 1, 2, 3, 4, 5, 6 ) );

echo '<br>';
echo '<h1>Associated array</h1>';

print_r( array( 1=>'A', 2=>'B', 3=>'C' ) );

echo '<br>';
echo '<h1>Multidimensional array</h1>';

$multid = [
    [ 'ram', 20, 25000 ],
    [ 'bharat', 45, 80000 ],
    [ 'yash', 85, 29000 ],
    [ 'vijay', 74, 35000 ],
];
print_r( $multid );

echo '<h1>Json to array</h1>';
$json = "{
    'id': 1,
    'title': 'Essence Mascara Lash Princess',
    'description': 'The Essence Mascara Lash Princess is a popular mascara known for its volumizing and lengthening effects. Achieve dramatic lashes with this long-lasting and cruelty-free formula.',
    'category': 'beauty',
    'price': 9.99,
    'discountPercentage': 7.17,
    'rating': 4.94,
    'stock': 5,
    'tags': [
      'beauty',
      'mascara'
    ]
  }";
$json = str_replace( "'", '"', $json );

// Decode the JSON string
$array = json_decode( $json, true );

echo '<br>';
echo '<pre>';
print_r( $array );
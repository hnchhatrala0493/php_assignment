<?php
// JSON string with single quotes converted to double quotes
$json = '[{
  "id": 1,
  "title": "Essence Mascara Lash Princess",
  "description": "The Essence Mascara Lash Princess is a popular mascara known for its volumizing and lengthening effects. Achieve dramatic lashes with this long-lasting and cruelty-free formula.",
  "category": "beauty",
  "price": 9.99,
  "discountPercentage": 7.17,
  "rating": 4.94,
  "stock": 5,
  "tags": [
    "beauty",
    "mascara"
  ]
}]';

// Decode the JSON string into an associative array
$array = json_decode( $json, true );

// Print the resulting array
print_r( $array );
?>
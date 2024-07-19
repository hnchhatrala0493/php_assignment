<?php

$conn = mysqli_connect( 'localhost', 'root', '', 'web_services_api' );

if ( $conn->connect_error ) {
    die( 'Connection failed: ' . $conn->connect_error );
} else {
    //echo 'Connected successfully';
}
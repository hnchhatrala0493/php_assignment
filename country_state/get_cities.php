<?php
require_once './vendor/autoload.php';
require_once 'vendor/guzzlehttp/guzzle/src/Client.php';

if ( isset( $_REQUEST[ 'stateId' ] ) && $_REQUEST[ 'stateId' ] ) {
    $client = new GuzzleHttp\Client( [
        'headers' => [
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJobmNoaGF0cmFsYUBnbWFpbC5jb20iLCJhcGlfdG9rZW4iOiI3SzZrcms3NnRHU3ZPQ3lWZTkzaE5ValZBeEN5WkRxOVkyNXBFc1Y4TE5pbXNzN21feW5SUmNDNFhqMUltbTFyaXRZIn0sImV4cCI6MTcyMTE5NjE4OX0.B4lcCdbPa30ZXzbMr5RigxGozqfIyeL98puVsPDHIpU',
            'Accept' => 'application/json'
        ]
    ] );

    try {
        $res = $client->request( 'GET', 'https://www.universal-tutorial.com/api/cities/'.$_REQUEST[ 'stateId' ] );
        $data = $res->getBody()->getContents();
        echo $data;
        die;
    } catch ( Exception $e ) {
        echo 'Error: ' . $e->getMessage();
    }
}

?>
<div class='container'>
    <form action='#'>
        <?php include_once './get_country.php';
include_once './get_state.php';
?>
        <div class='form-group'>
            <label for='cityList'>City:</label>
            <select class='form-select' id='cityList'>

            </select>
        </div>
    </form>
</div>
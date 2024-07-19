<?php
require_once './vendor/autoload.php';
require_once 'vendor/guzzlehttp/guzzle/src/Client.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="../js/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <script>
    function getCity(id) {
        let city = '';
        $.ajax({
            url: 'get_cities.php',
            type: "GET",
            dataType: "json",
            data: {
                stateId: id
            },
            success: function(response) {
                alert('Success:', response);
            },
            error: function(xhr, status, error) {
                alert('Error:', error);
            },
            complete: function(xhr, status) {
                alert('Request complete with status:', status);
            },
            // success: function(result) {
            //     alert(result);
            //     city += "<option>--Select--</option>";
            //     $.each(result, function(index, value) {
            //         city += "<option value='" + value.city_name + "'>" + value.city_name +
            //             "</option>";
            //     });
            //     $('#cityList').html(city);
            // }
        });
    }
    </script>
</head>

<body>
    <?php
if ( isset( $_REQUEST[ 'countryId' ] ) && $_REQUEST[ 'countryId' ] ) {
    try {
       // Initialize a cURL session
       $ch = curl_init();
       // Set the URL
       $countryId = $_REQUEST['countryId'];
       curl_setopt($ch, CURLOPT_URL, "https://www.universal-tutorial.com/api/states/{$countryId}");
       // Set the headers
       $headers = array(
           "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJobmNoaGF0cmFsYUBnbWFpbC5jb20iLCJhcGlfdG9rZW4iOiI3SzZrcms3NnRHU3ZPQ3lWZTkzaE5ValZBeEN5WkRxOVkyNXBFc1Y4TE5pbXNzN21feW5SUmNDNFhqMUltbTFyaXRZIn0sImV4cCI6MTcyMTI4MjgzMn0.gDNyHdRPL_wvp--rAxYxJnhqXXmfq_yDzvB3KOwX_8g",
           "Accept: application/json"
       );
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       // Return the response instead of printing it
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       // Execute the cURL session
       $response = curl_exec($ch);
       echo $response;die;
       curl_close($ch);
    } catch ( Exception $e ) {
        echo 'Error: ' . $e->getMessage();
    }
}

?>
    <div class='container'>
        <form action='#'>
            <div class='form-group'>
                <label for='stateList'>State:</label>
                <select class='form-select' onchange='getCity(this.value);' id='stateList'>

                </select>
            </div>
        </form>
    </div>
</body>

</html>
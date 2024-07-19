<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Country List</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        let country = $(this).val();
        countryList = '';
        $.ajax({
            url: 'https://www.universal-tutorial.com/api/countries/',
            type: "GET",
            dataType: "json",
            headers: {
                'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJobmNoaGF0cmFsYUBnbWFpbC5jb20iLCJhcGlfdG9rZW4iOiI3SzZrcms3NnRHU3ZPQ3lWZTkzaE5ValZBeEN5WkRxOVkyNXBFc1Y4TE5pbXNzN21feW5SUmNDNFhqMUltbTFyaXRZIn0sImV4cCI6MTcyMTQ3NjY0OH0.BJC2kOtd6ML9Qx8mUIVTQ6GAWyKD7skh45xg3fxc09U',
                'Accept': 'application/json'
            },
            success: function(response) {
                $.each(response, function(index, country) {
                    countryList += "<option value='" + country.country_name + "'>" +
                        country.country_name +
                        "</option>";
                });
                $('#country').html(countryList);
                $('#state').prop('disabled', false);
            },
        });
        $('#country').on('change', function() {
            let country = $(this).val();
            $.ajax({
                url: 'https://www.universal-tutorial.com/api/states/' + country,
                type: "GET",
                dataType: "json",
                headers: {
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJobmNoaGF0cmFsYUBnbWFpbC5jb20iLCJhcGlfdG9rZW4iOiI3SzZrcms3NnRHU3ZPQ3lWZTkzaE5ValZBeEN5WkRxOVkyNXBFc1Y4TE5pbXNzN21feW5SUmNDNFhqMUltbTFyaXRZIn0sImV4cCI6MTcyMTQ3NjY0OH0.BJC2kOtd6ML9Qx8mUIVTQ6GAWyKD7skh45xg3fxc09U',
                    'Accept': 'application/json'
                },
                success: function(response) {
                    $.each(response, function(index, value) {
                        state += "<option value='" + value.state_name + "'>" +
                            value.state_name +
                            "</option>";
                    });
                    $('#state').html(state);
                    $('#city').prop('disabled', false);
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                },
                complete: function(xhr, status) {
                    console.log('Request complete with status:', status);
                },
            });
        });
        $('#state').on('change', function() {
            let state = $(this).val();
            $.ajax({
                url: 'https://www.universal-tutorial.com/api/cities/' + state,
                type: "GET",
                dataType: "json",
                headers: {
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJobmNoaGF0cmFsYUBnbWFpbC5jb20iLCJhcGlfdG9rZW4iOiI3SzZrcms3NnRHU3ZPQ3lWZTkzaE5ValZBeEN5WkRxOVkyNXBFc1Y4TE5pbXNzN21feW5SUmNDNFhqMUltbTFyaXRZIn0sImV4cCI6MTcyMTQ3NjY0OH0.BJC2kOtd6ML9Qx8mUIVTQ6GAWyKD7skh45xg3fxc09U',
                    'Accept': 'application/json'
                },
                success: function(response) {
                    $.each(response, function(index, value) {
                        state += "<option value='" + value.city_name + "'>" +
                            value.city_name +
                            "</option>";
                    });
                    $('#city').html(state);
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                },
                complete: function(xhr, status) {
                    console.log('Request complete with status:', status);
                },
            });
        });
    });
    </script>
</head>

<body>
    <div class="container">
        <form action="#">
            <div class="form-group">
                <label for="countryList">Select Country:</label>
                <select id="country" class="form-select country">
                    <option value="">Select Country</option>
                </select>
            </div>
            <div class="form-group">
                <label for="state">Select State:</label>
                <select id="state" class="form-select state" disabled>
                    <option value="">Select State</option>
                    <!-- Populate options dynamically via AJAX -->
                </select>
            </div>
            <div class="form-group">
                <label for="city">Select City:</label>
                <select id="city" disabled>
                    <option value="">Select City</option>
                    <!-- Populate options dynamically via AJAX -->
                </select>
            </div>
        </form>
    </div>
</body>

</html>
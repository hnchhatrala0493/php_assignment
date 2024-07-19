<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Get State Data by Country Selection</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    function getState(id) {
        let state = '';
        $.ajax({
            url: 'get_state.php',
            type: "GET",
            dataType: "json",
            data: {
                countryId: id
            },
            // success: function(response) {
            //     alert('Success:', JSON.stringify(response));
            // },
            // error: function(xhr, status, error) {
            //     alert('Error:', error);
            // },
            // complete: function(xhr, status) {
            //     alert('Request complete with status:', status);
            // },
            success: function(result) {
                alert(result);
                state += "<option>--Select--</option>";
                $.each(result, function(index, value) {
                    state += "<option value='" + value.state_name + "'>" + value.state_name +
                        "</option>";
                });
                $('#state').html(state);
            }
        });
    }
    </script>
</head>

<body>
    <label for="country">Select Country:</label>
    <select id="country" onchange='getState(this.value);'>
        <option value="">Select Country</option>
        <!-- Populate options dynamically via AJAX -->
    </select>

    <br><br>

    <label for="state">Select State:</label>
    <select id="state" disabled>
        <option value="">Select State</option>
        <!-- Populate options dynamically via AJAX -->
    </select>

    <label for="city">Select City:</label>
    <select id="city" disabled>
        <option value="">Select City</option>
        <!-- Populate options dynamically via AJAX -->
    </select>
</body>

</html>
<script>
$(document).ready(function() {
    // Populate country dropdown dynamically
    $.ajax({
        url: 'https://www.universal-tutorial.com/api/countries/', // Replace with your API endpoint to fetch countries
        type: 'GET',
        headers: {
            'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJobmNoaGF0cmFsYUBnbWFpbC5jb20iLCJhcGlfdG9rZW4iOiI3SzZrcms3NnRHU3ZPQ3lWZTkzaE5ValZBeEN5WkRxOVkyNXBFc1Y4TE5pbXNzN21feW5SUmNDNFhqMUltbTFyaXRZIn0sImV4cCI6MTcyMTI4MjgzMn0.gDNyHdRPL_wvp--rAxYxJnhqXXmfq_yDzvB3KOwX_8g', // Replace with your actual access token
            'Accept': 'application/json'
        },
        dataType: 'json',
        success: function(data) {
            // Assuming data is an array of country objects like [{id: 1, name: 'Country 1'}, {id: 2, name: 'Country 2'}, ...]
            $.each(data, function(index, country) {
                $('#country').append('<option value="' + country.country_name + '">' +
                    country.country_name +
                    '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error('Error fetching countries:', error);
        }
    });

    // AJAX request to fetch states based on selected country
    $('#country').on('change', function() {
        var countryId = $(this).val();

        // Clear previous state options
        $('#state').empty().append('<option value="">Select State</option>').prop('disabled', true);

        if (countryId) {
            $.ajax({
                url: 'https://www.universal-tutorial.com/api/states/' +
                    countryId, // Replace with your API endpoint to fetch states by country
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJobmNoaGF0cmFsYUBnbWFpbC5jb20iLCJhcGlfdG9rZW4iOiI3SzZrcms3NnRHU3ZPQ3lWZTkzaE5ValZBeEN5WkRxOVkyNXBFc1Y4TE5pbXNzN21feW5SUmNDNFhqMUltbTFyaXRZIn0sImV4cCI6MTcyMTI4MjgzMn0.gDNyHdRPL_wvp--rAxYxJnhqXXmfq_yDzvB3KOwX_8g', // Replace with your actual access token
                    'Accept': 'application/json'
                },
                dataType: 'json',
                success: function(data) {
                    // Assuming data is an array of state objects like [{id: 1, name: 'State 1'}, {id: 2, name: 'State 2'}, ...]
                    $.each(data, function(index, state) {
                        $('#state').append('<option value="' + state.state_name +
                            '">' +
                            state.state_name + '</option>');
                    });

                    // Enable state dropdown once options are populated
                    $('#state').prop('disabled', false);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching states:', error);
                }
            });
        }
    });
});
</script>
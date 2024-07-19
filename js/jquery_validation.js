$(document).ready(function() {
    $("#frmBooking").validate({
        // Specify validation rules
        rules: {
            booking_name: "required",
            booking_phone: "required",
            booking_email: {
                required: true,
                email: true
            },
            booking_checkin: {
                required: true,
            },
            booking_checkout: {
                required: true,
            }
        },
        messages: {
            booking_name: "Please enter your name.",
            booking_phone: "Please enter your phone.",
            booking_email: "Please enter a email address.",
            booking_checkin: "Please enter a checkin date.",
            booking_checkout: "Please enter a checkout date."
        },
        submitHandler: function(form) {
            $('#frmBooking').on('submit', function(e) {
                e.preventDefault();
                let frm = $(this).serializeArray();
                $.ajax({
                    url: "create_booking.php",
                    type: "POST",
                    dataType: "text",
                    data: {
                        frmBooking: frm
                    },
                    success: function(result) {
                        location.href = "./index.php";
                    },
                    error(status) {
                        console.log(status);
                    }
                });
            });
        }
    });
    $('#custom').hide();
    $('#halfday').hide();
    $('.booking_type').click(function() {
        let radio = $(this).val();
        if (radio == 'fullday') {
            $('#custom').hide();
            $('#fullday').show();
            $('#halfday').hide();
        } else if (radio == 'halfday') {
            $('#custom').hide();
            $('#fullday').hide();
            $('#halfday').show();
        } else {
            $('#fullday').hide();
            $('#halfday').hide();
            $('#custom').show();
        }
    });

    $('#booking_checkin,#booking_checkout,#date').datepicker({
        format: 'yyyy-mm-dd',
        minDate: 0,
        autoclose: true,
        maxDate: new Date()
    });
    $('#customRange').daterangepicker({
        locale: {
            format: 'Y-MM-D',
            separator: " to "
        },
        minDate: 0,
        autoclose: true,
        maxDate: new Date()
    });
});
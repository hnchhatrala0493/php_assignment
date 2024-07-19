<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotel Booking System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../css/daterangepicker.css" />
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/datepickr/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="../js/moment.min.js"></script>
    <script src="../js/daterangepickr/daterangepicker.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/jquery_validation.js"></script>
    <style>
    .radio-row {
        display: flex;
        gap: 10px;
    }

    .error {
        color: red;
        font-family: Arial, Helvetica, sans-serif;
        font-size: small;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Create Booking</h2>
        <form action="#" id="frmBooking" method="post">
            <div class="booking">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="booking_name" placeholder="Enter name"
                        name="booking_name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="booking_email" placeholder="Enter email"
                        name="booking_email">
                </div>
                <div class="form-group">
                    <label for="email">Phone:</label>
                    <input type="text" class="form-control" id="booking_phone" placeholder="Enter phone"
                        name="booking_phone">
                </div>
                <label for="type">Booking Type:</label>
                <div class="radio-row">
                    <label><input type="radio" name="booking_type" class="form-check-input booking_type" value="fullday"
                            checked> Full Day</label>
                    <label><input type="radio" name="booking_type" class="form-check-input booking_type"
                            value="halfday"> Half Day</label>
                    <label><input type="radio" name="booking_type" class="form-check-input booking_type"
                            value="custom date"> Custom Date</label>
                </div>
                <div id="fullday">
                    <div class="form-group">
                        <label for="booking_checkin">Check In:</label>
                        <input type="text" class="form-control" id="booking_checkin" readonly
                            placeholder="Enter check in" name="booking_checkin">
                    </div>
                    <div class="form-group"><label for="booking_checkout">Check Out:</label>
                        <input type="checkout" class="form-control" id="booking_checkout" readonly
                            placeholder="Enter checkout" name="booking_checkout">
                    </div>
                </div>
                <div id="halfday">
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="text" class="form-control" id="date" readonly placeholder="Enter check in"
                            name="date">
                    </div>
                    <div class="form-group">
                        <label for="checkout">Select Slot:</label>
                        <select name="booking_slot" id="" class="form-control">
                            <option value=" ">Select Slot</option>
                            <option value="first">First half - Morning(8AM-6PM)</option>
                            <option value="second">Second half - Evening(7PM-7AM)</option>
                        </select>
                    </div>
                </div>
                <div id="custom">
                    <div class="form-group">
                        <label for="custom">Custom Range Date:</label>
                        <input type="text" class="form-control" id="customRange" readonly placeholder="Enter range"
                            name="custom">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="./index.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>

<?php
$conn=mysqli_connect("localhost","root","","hotel_booking_system");
if($conn->connect_error){
    echo "connection failed";
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $frmBooking = $_REQUEST['frmBooking'];
    foreach($frmBooking as $booking){
        $bookings[$booking['name']] = $booking['value'];
    }
    $bname = $bookings['booking_name'];
    $bemail = $bookings['booking_email'];
    $bphone = $bookings['booking_phone'];
    $btype = $bookings['booking_type'];
    $bcheckIn = $bookings['booking_checkin'];
    $bcheckOut = $bookings['booking_checkout'];
    $bdate = $bookings['date'];
    $bslot = $bookings['booking_slot'];
    $bcustom = $bookings['custom'];
    $brange=explode('to',$bcustom);
    $bId=rand(111111,999999);
    $bookingList="SELECT * FROM `booking` WHERE `booking_email` LIKE '".$bemail."'";
    $results= $conn->query($bookingList);
    $response = $results->num_rows;
    if($response>=1){
        echo json_encode(['status'=>200,'messages'=>'No Booking Avaiable. please try another date.']);die;
    }
    if($btype=='fullday'){    
        $sql="INSERT INTO `booking`(`booking_id`, `booking_name`, `booking_email`, `booking_phone`, `booking_checkin`, `booking_checkout`, `booking_type`, `booking_slot`) 
        VALUES (".$bId.",'".$bname."','".$bemail."','".$bphone."','".$bcheckIn."','".$bcheckOut."','".$btype."','".$bslot."')";
    } else if($btype=='halfday'){
        $sql="INSERT INTO `booking`(`booking_id`, `booking_name`, `booking_email`, `booking_phone`, `booking_checkin`, `booking_checkout`, `booking_type`, `booking_slot`) 
        VALUES (".$bId.",'".$bname."','".$bemail."','".$bphone."','".$bdate."',null,'".$btype."','".$bslot."')";   
    } else {
        $sql="INSERT INTO `booking`(`booking_id`, `booking_name`, `booking_email`, `booking_phone`, `booking_checkin`, `booking_checkout`, `booking_type`, `booking_slot`) 
        VALUES (".$bId.",'".$bname."','".$bemail."','".$bphone."','".$brange[0]."','".$brange[1]."','".$btype."',NULL)";      
    }
    $result= $conn->query($sql);
    echo json_encode(['status'=>200,'details'=>$result]);die;
}
?>
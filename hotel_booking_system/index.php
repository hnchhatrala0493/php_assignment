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
</head>

<body>
    <div class="container">
        <a href="./create_booking.php" class="btn btn-success">Create Booking</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Full Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Booking Check In</th>
                    <th class="text-center">Booking Check Out</th>
                    <th class="text-center">Booking Type</th>
                    <th class="text-center">Booking Slot</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn=mysqli_connect("localhost","root","","hotel_booking_system");
                $bookingList="SELECT * FROM `booking` ORDER BY `booking_id` DESC";
                $results= $conn->query($bookingList);
                $blist= $results->fetch_assoc();
                 foreach($results as $booking){ ?>
                <tr>
                    <td class="text-center"><?= $booking['booking_name'] ?></td>
                    <td class="text-center"><?= $booking['booking_email'] ?></td>
                    <td class="text-center"><?= $booking['booking_phone'] ?></td>
                    <td class="text-center"><?= $booking['booking_checkin'] ?></td>
                    <td class="text-center"><?= $booking['booking_checkout'] ?? '-' ?></td>
                    <td class="text-center"><?= $booking['booking_type'] ?></td>
                    <td class="text-center">
                        <?= $booking['booking_slot'] == 'first' && $booking['booking_slot'] !== NULL ? 'First half - Morning(8AM-6PM)' : 'Second half - Evening(7PM-7AM)';  ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="text" name="day">
    <input type="submit" name="submit" value="submit">
</form>

<?php
if(isset($_REQUEST['submit'])){
    $day=$_REQUEST['day'];
    switch($day){
        case '0':
            $dayName= "Sunday";
            break;
        case '1':
            $dayName= "Monday";
            break;
        case '2':
            $dayName= "Tuesday";
            break;
        case '3':
            $dayName= "Wednesday";
            break;
        case '4':
            $dayName= "Thursday";
            break;
        case '5':
            $dayName= "Friday";
            break;
        case '6':
            $dayName= "Saturday";
            break;
    }
    echo "Day Name:".$dayName;
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="fname">Physics:</label><br>
    <input type="text" id="fname" name="Physics"><br>
    <label for="lname">Chemistry:</label><br>
    <input type="text" id="lname" name="Chemistry"><br>
    <label for="fname">Biology:</label><br>
    <input type="text" id="fname" name="Biology"><br>
    <label for="lname">Mathematics:</label><br>
    <input type="text" id="lname" name="Mathematics"><br>
    <label for="fname">Computer:</label><br>
    <input type="text" id="Computer" name="Computer"><br>
    <input type="submit" name="Submit" value="Submit">
</form>

<?php
if(isset($_REQUEST['Submit'])){
    $physics=$_REQUEST['Physics'];
    $chemistry=$_REQUEST['Chemistry'];
    $biology=$_REQUEST['Biology'];
    $mathematics=$_REQUEST['Mathematics'];
    $computer=$_REQUEST['Computer'];
    if($physics && $chemistry && $biology && $mathematics && $computer != ''){
        
        $total=$physics+$chemistry+$biology+$mathematics+$computer;
        $percentage=$total/500*100;
        
        if($percentage >= 95){
            $grade='A+';
        }else if($percentage >= 90 && $percentage < 95){
            $grade='A';
        }else if($percentage >= 85 && $percentage < 90){
            $grade='B+';
        }else if($percentage >= 80 && $percentage < 85){
            $grade='B';
        }else if($percentage >= 75 && $percentage < 80){
            $grade='C+';
        }else if($percentage >= 70 && $percentage < 75){
            $grade='C';
        }else if($percentage >= 40 && $percentage < 70){
            $grade='Pass';
        }else if($percentage < 40){
            $grade='Fail';            
        }
        echo "Total Marks = ".$total;
        echo "<br>";
        echo "Total Percentage = ".$percentage."%";
        echo "<br>";
        echo "Grade = ".$grade;
    } else {
      echo "All Fields are required.";  
    }   
}

?>
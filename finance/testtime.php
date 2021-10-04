<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
   function timediff( $a ,  $b){
    $current_date_time_sec=strtotime($b);
    $future_date_time_sec=strtotime($a);

    $difference=$future_date_time_sec-$current_date_time_sec;
    $hours=($difference / 3600);

    $minutes=($difference / 60 % 60);

    return $hours;

  }

 $time1 = date("H.i", strtotime("19:13:00"));   
 $time11 = date("H.i", strtotime("20:13:00"));  

 $time2 = date("H.i", strtotime("20:00:00"));   
 $time22 = date("H.i", strtotime("22:00:00"));  


?>
<body>
     เวลาที่สอน 1 : <?php echo $time1 ?> <br>
     เวลาที่สอน 2 : <?php echo $time11 ?> <br>
     ระยะเวลาที่สอนทั้งหมด : <?php echo timediff($time11,$time1) ?> <br>
     <?php
 
      
            if($time2 > $time1 and $time2 < $time11){
                echo "เวลาที่สอนคาบเกี่ยวกัน 1 ";
            }else if ($time22 > $time1 and $time22 < $time11) {
                echo "เวลาที่สอนคาบเกี่ยวกัน 2 ";
            }else if ($time1 == $time2 and $time11 == $time22) {
                echo "เวลาที่สอนคาบเกี่ยวกัน 3 ";
            }
           
    
     
     ?>

</body>
</html>
<?php 
$line = $line + 25;
if($resultarray[1]["daten"]==null){
   $nametime1 = "time1";
   $nametime11 = "time11";
   $namedate = "date";
}else {
   $nametime1 = "timen1";
   $nametime11 = "timen11";
   $namedate = "daten";
}



if($resultarray[1]["$nametime1"]<="08:30:00" and $resultarray[1]["$nametime11"]<="08:30:00"){
   $time1 = date("H.i", strtotime($resultarray[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray[1]["$nametime11"]));
   $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltime($time11,$time1) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltime($time11,$time1);
}  
else if($resultarray[1]["$nametime1"]<"08:30:00" and $resultarray[1]["$nametime11"]>"16:00:00"){
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftdate.'px;width:300px;"><p> '. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
   $time1 = date("H.i", strtotime($resultarray[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray[1]["$nametime11"]));
   $time111 = date("H.i", strtotime("08:30:00"));            
   $time1111 = date("H.i", strtotime("12:00:00"));   
   $time11111 = date("H.i", strtotime("13:00:00"));    
   $time111111 = date("H.i", strtotime("16:00:00"));            
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p>'. $time111 .'-'. $time1111 .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p> '. number_format( caltime($time1111,$time111) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltime($time1111,$time111);
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltime($time111,$time1);
   $line = $line + 25;
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p> '. $time11111 .'-'. $time111111 .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p> '. number_format( caltime($time111111,$time11111) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltime($time111111,$time11111);
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p> '. $time1111 .'- '.$time11111.'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltime($time11111,$time1111) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltime($time11111,$time1111);
   $line = $line + 25;
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p> '. $time111111 .'- '.$time11.'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltime($time11,$time111111) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltime($time11,$time111111);
}
else if($resultarray[1]["$nametime1"]<"08:30:00" and $resultarray[1]["$nametime11"]>"12:30:00"){
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftdate.'px;width:300px;"><p> '. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
   $time1 = date("H.i", strtotime($resultarray[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray[1]["$nametime11"]));
   $time111 = date("H.i", strtotime("08:30:00"));            
   $time1111 = date("H.i", strtotime("12:00:00"));   
   $time11111 = date("H.i", strtotime("13:00:00"));    
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p> '. $time111 .'-'. $time1111 .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p> '. number_format( caltime($time1111,$time111) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltime($time1111,$time111);
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltime($time111,$time1);
   $line = $line + 25;

   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p> '. $time1111 .'- '.$time11.'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltime($time11,$time1111) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltime($time11,$time1111);
   
}

else if($resultarray[1]["$nametime1"]<"08:30:00" and $resultarray[1]["$nametime11"]>"08:30:00"){
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftdate.'px;width:300px;"><p> '. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
   $time1 = date("H.i", strtotime($resultarray[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray[1]["$nametime11"]));
   $time111 = date("H.i", strtotime("08:30:00"));            
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p> '. $time111 .'-'. $time11 .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p> '. number_format( caltime($time11,$time111) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltime($time11,$time111);
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltime($time111,$time1);
}
else if($resultarray[1]["$nametime1"]<"12:30:00" and $resultarray[1]["$nametime11"]>"16:00:00"){
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftdate.'px;width:300px;"><p> '. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
   $time1 = date("H.i", strtotime($resultarray[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray[1]["$nametime11"]));
   $time111 = date("H.i", strtotime("12:00:00"));   
   $time1111 = date("H.i", strtotime("13:00:00"));         
   $time11111 = date("H.i", strtotime("16:00:00"));            
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltime($time111,$time1);
   $html .= '<div style="position:absolute;top: '.$line.'px;left::'.$lefttime1out.'px;width:300px;"><p> '. $time111 .'- '.$time1111.'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltime($time1111,$time111) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltime($time1111,$time111);
   $line = $line + 25;
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p>'.$time1111.'-'. "$time11111" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltime($time11111,$time1111) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltime($time11111,$time1111);
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p> '. $time11111 .'- '.$time11.'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltime($time11,$time11111) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltime($time11,$time11111);
}
else if($resultarray[1]["$nametime1"]<"16:00:00" and $resultarray[1]["$nametime11"]>"16:00:00"){
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftdate.'px;width:300px;"><p> '. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
   $time1 = date("H.i", strtotime($resultarray[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray[1]["$nametime11"]));
   $time111 = date("H.i", strtotime("16:00:00"));            
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltime($time111,$time1);
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p> '. $time111 .'-'. $time11 .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltime($time11,$time111) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltime($time11,$time111);
}
else if($resultarray[1]["$nametime1"]>="16:00:00" and $resultarray[1]["$nametime11"]>="16:00:00"){
   $time1 = date("H.i", strtotime($resultarray[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray[1]["$nametime11"]));
   $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p>'. number_format( caltime($time11,$time1) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltime($time11,$time1);
}else if($resultarray[1]["$nametime1"]>="08:30:00" and $resultarray[1]["$nametime11"]<="12:00:00"){
   $time1 = date("H.i", strtotime($resultarray[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray[1]["$nametime11"]));
   $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltime($time11,$time1) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltime($time11,$time1);
}else if($resultarray[1]["$nametime1"]>="13:00:00" and $resultarray[1]["$nametime11"]<="16:00:00"){
   $time1 = date("H.i", strtotime($resultarray[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray[1]["$nametime11"]));
   $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p>'. number_format( caltime($time11,$time1) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltime($time11,$time1);
}

else{
   $time1 = date("H.i", strtotime($resultarray[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray[1]["$nametime11"]));
   $time111 = date("H.i", strtotime("12:00:00"));   
   $time1111 = date("H.i", strtotime("13:00:00"));         
   $totime = caltime($time11,$time1);
   $hour1 = 60;
   for($i=1;$i<=$totime;$i++){
       $timecal12 = date("H.i", strtotime($resultarray[1]["$nametime1"])+$hour1*60);
       //10.00-14.00
       if($timecal12 == "12.00" and $time11 > "12.30" ){
           $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
           $tohoursin = $tohoursin + caltime($time111,$time1);
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p> '. $time111 .'- '.$time1111.'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltime($time1111,$time111) , 2 ) .'</p></div>';
           $tohoursout = $tohoursout + caltime($time1111,$time111);
           $line = $line + 25;
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p>'.$time1111.'-'. "$time11" .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltime($time11,$time1111) , 2 ) .'</p></div>';
           $tohoursin = $tohoursin + caltime($time11,$time1111);
       //10.00-12.30
       }else if($timecal12 == "12.00" and $time11 == "12.30" ){
           $time11111 = date("H.i", strtotime("12:30:00"));  
           $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
           $tohoursin = $tohoursin + caltime($time111,$time1);
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p> '. $time111 .'- '.$time11111.'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltime($time11111,$time111) , 2 ) .'</p></div>';
           $tohoursout = $tohoursout + caltime($time11111,$time111);
           //12.30-14.00
       }else if($time1 == "12.30"){
           $time11111 = date("H.i", strtotime("12:30:00"));  
           $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p>'.$time1111 .'-'. "$time11" .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltime($time11,$time1111) , 2 ) .'</p></div>';
           $tohoursin = $tohoursin + caltime($time11,$time1111);
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p> '. $time11111 .'- '.$time1111.'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltime($time1111,$time11111) , 2 ) .'</p></div>';
           $tohoursout = $tohoursout + caltime($time1111,$time11111);
       }else{
         /*
           $html .= '<div style="position:absolute;top:'.$line.'px;left:275px;width:300px;"><p>'. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p>'. number_format( caltime($time11,$time1) , 2 ) .'</p></div>';*/

       }
       $hour1 = $hour1 + 60;
   }

 }

 if($resultarray1[1]["datenlab"]==null){
   $nametime1 = "timelab1";
   $nametime11 = "timelab11";
   $namedate = "datelab";
}else {
   $nametime1 = "timenlab1";
   $nametime11 = "timenlab11";
   $namedate = "datenlab";
}
$line = $line + 25;

if($resultarray1[1]["$nametime1"]<="08:30:00" and $resultarray1[1]["$nametime11"]<="08:30:00"){
   $time1 = date("H.i", strtotime($resultarray1[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray1[1]["$nametime11"]));
   $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray1[1]["$namedate"]) .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1inlab.'px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltimelab($time11,$time1) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltimelab($time11,$time1);
}  
else if($resultarray1[1]["$nametime1"]<"08:30:00" and $resultarray1[1]["$nametime11"]>"16:00:00"){
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftdate.'px;width:300px;"><p> '. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
   $time1 = date("H.i", strtotime($resultarray[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray[1]["$nametime11"]));
   $time111 = date("H.i", strtotime("08:30:00"));            
   $time1111 = date("H.i", strtotime("12:00:00"));   
   $time11111 = date("H.i", strtotime("13:00:00"));    
   $time111111 = date("H.i", strtotime("16:00:00"));            
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p>'. $time111 .'-'. $time1111 .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p> '. number_format( caltimelab($time1111,$time111) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltimelab($time1111,$time111);
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p>'. number_format( caltimelab($time111,$time1) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltimelab($time111,$time1);
   $line = $line + 25;
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1in.'px;width:300px;"><p> '. $time11111 .'-'. $time111111 .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p> '. number_format( caltimelab($time111111,$time11111) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltimelab($time111111,$time11111);
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p> '. $time1111 .'- '.$time11111.'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltimelab($time11111,$time1111) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltimelab($time11111,$time1111);
   $line = $line + 25;
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1out.'px;width:300px;"><p> '. $time111111 .'- '.$time11.'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltimelab($time11,$time111111) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltimelab($time11,$time111111);
}
else if($resultarray1[1]["$nametime1"]<"08:30:00" and $resultarray1[1]["$nametime11"]>"12:30:00"){
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftdate.'px;width:300px;"><p> '. DateThai($resultarray1[1]["$namedate"]) .'</p></div>';
   $time1 = date("H.i", strtotime($resultarray1[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray1[1]["$nametime11"]));
   $time111 = date("H.i", strtotime("08:30:00"));            
   $time1111 = date("H.i", strtotime("12:00:00"));   
   $time11111 = date("H.i", strtotime("13:00:00"));    
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1inlab.'px;width:300px;"><p> '. $time111 .'-'. $time1111 .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p> '. number_format( caltimelab($time1111,$time111) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltimelab($time1111,$time111);
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1outlab.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p>'. number_format( caltimelab($time111,$time1) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltimelab($time111,$time1);
   $line = $line + 25;
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1outlab.'px;width:300px;"><p> '. $time1111 .'- '.$time11.'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltimelab($time11,$time1111) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltimelab($time11,$time1111);
   
}

else if($resultarray1[1]["$nametime1"]<"08:30:00" and $resultarray1[1]["$nametime11"]>"08:30:00"){
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftdate.'px;width:300px;"><p> '. DateThai($resultarray1[1]["$namedate"]) .'</p></div>';
   $time1 = date("H.i", strtotime($resultarray1[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray1[1]["$nametime11"]));
   $time111 = date("H.i", strtotime("08:30:00"));            
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1inlab.'px;width:300px;"><p> '. $time111 .'-'. $time11 .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p> '. number_format( caltimelab($time11,$time111) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltimelab($time11,$time111);
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1outlab.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p>'. number_format( caltimelab($time111,$time1) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltimelab($time111,$time1);
}
else if($resultarray1[1]["$nametime1"]<"12:30:00" and $resultarray1[1]["$nametime11"]>"16:00:00"){
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray1[1]["$namedate"]) .'</p></div>';
   $time1 = date("H.i", strtotime($resultarray1[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray1[1]["$nametime11"]));
   $time111 = date("H.i", strtotime("12:00:00"));   
   $time1111 = date("H.i", strtotime("13:00:00"));         
   $time11111 = date("H.i", strtotime("16:00:00"));            
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1inlab.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltimelab($time111,$time1) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltimelab($time111,$time1);
   $html .= '<div style="position:absolute;top: '.$line.'px;left::'.$lefttime1outlab.'px;width:300px;"><p> '. $time111 .'- '.$time1111.'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltimelab($time1111,$time111) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltimelab($time1111,$time111);
   $line = $line + 25;
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1inlab.'px;width:300px;"><p>'.$time1111.'-'. "$time11111" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltimelab($time11111,$time1111) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltimelab($time11111,$time1111);
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1outlab.'px;width:300px;"><p> '. $time11111 .'- '.$time11.'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltimelab($time11,$time11111) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltimelab($time11,$time11111);
}
else if($resultarray1[1]["$nametime1"]<"16:00:00" and $resultarray1[1]["$nametime11"]>"16:00:00"){
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftdate.'px;width:300px;"><p> '. DateThai($resultarray1[1]["$namedate"]) .'</p></div>';
   $time1 = date("H.i", strtotime($resultarray1[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray1[1]["$nametime11"]));
   $time111 = date("H.i", strtotime("16:00:00"));            
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1inlab.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltimelab($time111,$time1) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltimelab($time111,$time1);
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1outlab.'px;width:300px;"><p> '. $time111 .'-'. $time11 .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltimelab($time11,$time111) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltimelab($time11,$time111);

}
else if($resultarray1[1]["$nametime1"]>="16:00:00" and $resultarray1[1]["$nametime11"]>="16:00:00"){
   $time1 = date("H.i", strtotime($resultarray1[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray1[1]["$nametime11"]));
   $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray1[1]["$namedate"]) .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1outlab.'px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p>'. number_format( caltimelab($time11,$time1) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltimelab($time11,$time1);
}else if($resultarray1[1]["$nametime1"]>="08:30:00" and $resultarray1[1]["$nametime11"]<="12:00:00"){
   $time1 = date("H.i", strtotime($resultarray1[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray1[1]["$nametime11"]));
   $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray1[1]["$namedate"]) .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1inlab.'px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltimelab($time11,$time1) , 2 ) .'</p></div>';
   $tohoursin = $tohoursin + caltimelab($time11,$time1);
}else if($resultarray1[1]["$nametime1"]>="13:00:00" and $resultarray1[1]["$nametime11"]<="16:00:00"){
   $time1 = date("H.i", strtotime($resultarray1[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray1[1]["$nametime11"]));
   $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray1[1]["$namedate"]) .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1outlab.'px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
   $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p>'. number_format( caltimelab($time11,$time1) , 2 ) .'</p></div>';
   $tohoursout = $tohoursout + caltimelab($time11,$time1);
}

else{
   $time1 = date("H.i", strtotime($resultarray1[1]["$nametime1"]));
   $time11 = date("H.i", strtotime($resultarray1[1]["$nametime11"]));
   $time111 = date("H.i", strtotime("12:00:00"));   
   $time1111 = date("H.i", strtotime("13:00:00"));         
   $totime = caltimelab($time11,$time1);
   $hour1 = 60;
   for($i=1;$i<=$totime;$i++){
       $timecal12 = date("H.i", strtotime($resultarray1[1]["$nametime1"])+$hour1*60);
       //10.00-14.00
       if($timecal12 == "12.00" and $time11 > "12.30" ){
           $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray1[1]["$namedate"]) .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1inlab.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltimelab($time111,$time1) , 2 ) .'</p></div>';
           $tohoursin = $tohoursin + caltimelab($time111,$time1);
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1outlab.'px;width:300px;"><p> '. $time111 .'- '.$time1111.'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltimelab($time1111,$time111) , 2 ) .'</p></div>';
           $tohoursout = $tohoursout + caltimelab($time1111,$time111);
           $line = $line + 25;
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1inlab.'px;width:300px;"><p>'.$time1111.'-'. "$time11" .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltimelab($time11,$time1111) , 2 ) .'</p></div>';
           $tohoursin = $tohoursin + caltimelab($time11,$time1111);
       //10.00-12.30
       }else if($timecal12 == "12.00" and $time11 == "12.30" ){
           $time11111 = date("H.i", strtotime("12:30:00"));  
           $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray1[1]["$namedate"]) .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1inlab.'px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltimelab($time111,$time1) , 2 ) .'</p></div>';
           $tohoursin = $tohoursin + caltimelab($time111,$time1);
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1outlab.'px;width:300px;"><p> '. $time111 .'- '.$time11111.'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltimelab($time11111,$time111) , 2 ) .'</p></div>';
           $tohoursout = $tohoursout + caltimelab($time11111,$time111);
       //12.30-14.00
       }else if($time1 == "12.30"){
           $time11111 = date("H.i", strtotime("12:30:00"));  
           $html .= '<div style="position:absolute;top:'.$line.'px;left:'.$leftdate.'px;width:300px;"><p>'. DateThai($resultarray1[1]["$namedate"]) .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1inlab.'px;width:300px;"><p>'.$time1111 .'-'. "$time11" .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1in.'px;width:300px;"><p>'. number_format( caltimelab($time11,$time1111) , 2 ) .'</p></div>';
           $tohoursin = $tohoursin + caltimelab($time11,$time1111);
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$lefttime1outlab.'px;width:300px;"><p> '. $time11111 .'- '.$time1111.'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:'.$leftcount1out.'px;width:300px;"><p> '. number_format( caltimelab($time1111,$time11111) , 2 ) .'</p></div>';
           $tohoursout = $tohoursout + caltimelab($time1111,$time11111);
       }else{
         /*
           $html .= '<div style="position:absolute;top:'.$line.'px;left:275px;width:300px;"><p>'. DateThai($resultarray[1]["$namedate"]) .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
           $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p>'. number_format( caltimelab($time11,$time1) , 2 ) .'</p></div>';*/

       }
       $hour1 = $hour1 + 60;
   }

 }
?>
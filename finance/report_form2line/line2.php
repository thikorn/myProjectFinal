<?php
   $html .= '<div style="text-align:center;position:absolute;top:212px;left:68px;"><p> '. 2 .'</p></div>';
   $html .= '<div style="position:absolute;top:212px;left:300;width:800px;"><p> '. $resultarray[1]["topic"] .'</p></div>';
   $html .= '<div style="text-align:center;position:absolute;top:212px;left:615px;"><p> '. $resultarray[1]["classroom"] .'</p></div>';
   $html .= '<div style="position:absolute;top:212px;left:800px;width:800px;"><p> '. $resultarray[1]["note"] .'</p></div>';

   if($resultarray[1]["daten"] == NULL){
      $date = date("d/m/Y", strtotime($resultarray[1]["date"]));
      $html .= '<div style="text-align:center;position:absolute;top:212px;left:106px;"><p> '. $date .'</p></div>';
      $time1 = date("H.i", strtotime($resultarray[1]["time1"]));
      $time11 = date("H.i", strtotime($resultarray[1]["time11"]));
      $html .= '<div style="text-align:center;position:absolute;top:212px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
 
   }else if ($resultarray[1]["daten"] != NULL){
      $date = date("d/m/Y", strtotime($resultarray[1]["daten"]));
      $html .= '<div style="text-align:center;position:absolute;top:212px;left:106px;"><p> '. $date .'</p></div>';
      $time1 = date("H.i", strtotime($resultarray[1]["timen1"]));
      $time11 = date("H.i", strtotime($resultarray[1]["timen11"]));
      $html .= '<div style="text-align:center;position:absolute;top:212px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';

}
   
?>
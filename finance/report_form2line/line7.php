<?php 
   $html .= '<div style="text-align:center;position:absolute;top:354px;left:68px;"><p> '. 7 .'</p></div>';
   $html .= '<div style="position:absolute;top:354px;left:300px;width:800px;"><p> '. $resultarray[6]["topic"] .'</p></div>';
   $html .= '<div style="text-align:center;position:absolute;top:354px;left:615px;"><p> '. $resultarray[6]["classroom"] .'</p></div>';
   $html .= '<div style="position:absolute;top:354px;left:800px;width:800px;"><p> '. $resultarray[6]["note"] .'</p></div>';

   if($resultarray[6]["daten"] == NULL){
            $date = date("d/m/Y", strtotime($resultarray[6]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:354px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[6]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[6]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:354px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
   }else if ($resultarray[6]["daten"] != NULL){
           $date = date("d/m/Y", strtotime($resultarray[6]["daten"]));
           $html .= '<div style="text-align:center;position:absolute;top:354px;left:106px;"><p> '. $date .'</p></div>';
           $time1 = date("H.i", strtotime($resultarray[6]["timen1"]));
           $time11 = date("H.i", strtotime($resultarray[6]["timen11"]));
           $html .= '<div style="text-align:center;position:absolute;top:354px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
   }
?>
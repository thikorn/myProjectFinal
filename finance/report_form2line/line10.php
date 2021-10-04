<?php 
     $html .= '<div style="text-align:center;position:absolute;top:440px;left:-30px;width:205px;"><p> '. 10 .'</p></div>';
     $html .= '<div style="position:absolute;top:440px;left:300px;width:800px;"><p> '. $resultarray[9]["topic"] .'</p></div>';
     $html .= '<div style="text-align:center;position:absolute;top:440px;left:615px;"><p> '. $resultarray[9]["classroom"] .'</p></div>';
     $html .= '<div style="position:absolute;top:440px;left:800px;width:800px;"><p> '. $resultarray[9]["note"] .'</p></div>';
            
     if($resultarray[9]["daten"] == NULL){
            $date = date("d/m/Y", strtotime($resultarray[9]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:440px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[9]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[9]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:440px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
     }else if ($resultarray[9]["daten"] != NULL){
            $date = date("d/m/Y", strtotime($resultarray[9]["daten"]));
            $html .= '<div style="text-align:center;position:absolute;top:440px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[9]["timen1"]));
            $time11 = date("H.i", strtotime($resultarray[9]["timen11"]));
            $html .= '<div style="text-align:center;position:absolute;top:440px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
     }
?>
<?php  
            $html .= '<div style="text-align:center;position:absolute;top:270px;left:68px;"><p> '. 4 .'</p></div>';
            $html .= '<div style="position:absolute;top:270px;left:300px;width:800px;"><p> '. $resultarray[3]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:270px;left:615px;"><p> '. $resultarray[3]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:270px;left:800px;width:800px;"><p> '. $resultarray[3]["note"] .'</p></div>';

        if($resultarray[3]["daten"] == NULL){
            $date = date("d/m/Y", strtotime($resultarray[3]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:270px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[3]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[3]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:270px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        }else if ($resultarray[3]["daten"] != NULL){
            $date = date("d/m/Y", strtotime($resultarray[3]["daten"]));
            $html .= '<div style="text-align:center;position:absolute;top:270px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[3]["timen1"]));
            $time11 = date("H.i", strtotime($resultarray[3]["timen11"]));
            $html .= '<div style="text-align:center;position:absolute;top:270px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
         }
        
            
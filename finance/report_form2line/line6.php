<?php 
    $html .= '<div style="text-align:center;position:absolute;top:326px;left:68px;"><p> '. 6 .'</p></div>';
    $html .= '<div style="position:absolute;top:326px;left:300px;width:800px;"><p> '. $resultarray[5]["topic"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:326px;left:615px;"><p> '. $resultarray[5]["classroom"] .'</p></div>';
    $html .= '<div style="position:absolute;top:326px;left:800px;width:800px;"><p> '. $resultarray[5]["note"] .'</p></div>';

    if($resultarray[5]["daten"] == NULL){
            $date = date("d/m/Y", strtotime($resultarray[5]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:326px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[5]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[5]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:326px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
    }else if ($resultarray[5]["daten"] != NULL){
            $date = date("d/m/Y", strtotime($resultarray[5]["daten"]));
            $html .= '<div style="text-align:center;position:absolute;top:326px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[5]["timen1"]));
            $time11 = date("H.i", strtotime($resultarray[5]["timen11"]));
            $html .= '<div style="text-align:center;position:absolute;top:326px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
    }
?>
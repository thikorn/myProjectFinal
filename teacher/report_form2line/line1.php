<?php 
    $html .= '<div style="text-align:center;position:absolute;top:184px;left:68px;"><p> '. 1 .'</p></div>';
    $html .= '<div style="position:absolute;top:184px;left:300;"><p> '. $resultarray[0]["topic"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:184px;left:615px;"><p> '. $resultarray[0]["classroom"] .'</p></div>';
    $html .= '<div style="position:absolute;top:184px;left:800px;"><p> '. $resultarray[0]["note"] .'</p></div>';

    if($resultarray[0]["daten"] == NULL){
        $date = date("d/m/Y", strtotime($resultarray[0]["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:184px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($resultarray[0]["time1"]));
        $time11 = date("H.i", strtotime($resultarray[0]["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:184px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
    }else if ($resultarray[0]["daten"] != NULL){
        $date = date("d/m/Y", strtotime($resultarray[0]["daten"]));
        $html .= '<div style="text-align:center;position:absolute;top:184px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($resultarray[0]["timen1"]));
        $time11 = date("H.i", strtotime($resultarray[0]["timen11"]));
        $html .= '<div style="text-align:center;position:absolute;top:184px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
    }
?>
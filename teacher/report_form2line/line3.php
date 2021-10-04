<?php

if($resultarray[2]["daten"] == NULL){
    $html .= '<div style="text-align:center;position:absolute;top:240px;left:68px;"><p> '. 3 .'</p></div>';
    $date = date("d/m/Y", strtotime($resultarray[2]["date"]));
    $html .= '<div style="text-align:center;position:absolute;top:240px;left:106px;"><p> '. $date .'</p></div>';
    $time1 = date("H.i", strtotime($resultarray[2]["time1"]));
    $time11 = date("H.i", strtotime($resultarray[2]["time11"]));
    $html .= '<div style="text-align:center;position:absolute;top:240px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
    $html .= '<div style="position:absolute;top:240px;left:300px;"><p> '. $resultarray[2]["topic"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:240px;left:615px;"><p> '. $resultarray[2]["classroom"] .'</p></div>';
    $html .= '<div style="position:absolute;top:240px;left:800px;"><p> '. $resultarray[2]["note"] .'</p></div>';
 }else if ($resultarray[2]["daten"] != NULL){
    $html .= '<div style="text-align:center;position:absolute;top:240px;left:68px;"><p> '. 3 .'</p></div>';
    $date = date("d/m/Y", strtotime($resultarray[2]["daten"]));
    $html .= '<div style="text-align:center;position:absolute;top:240px;left:106px;"><p> '. $date .'</p></div>';
    $time1 = date("H.i", strtotime($resultarray[2]["timen1"]));
    $time11 = date("H.i", strtotime($resultarray[2]["timen11"]));
    $html .= '<div style="text-align:center;position:absolute;top:240px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
    $html .= '<div style="position:absolute;top:240px;left:300px;"><p> '. $resultarray[2]["topic"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:240px;left:615px;"><p> '. $resultarray[2]["classroom"] .'</p></div>';
    $html .= '<div style="position:absolute;top:240px;left:800px;"><p> '. $resultarray[2]["note"] .'</p></div>';
 }

?>
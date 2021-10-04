<?php
 $html .= '<div style="text-align:center;position:absolute;top:299px;left:68px;"><p> '. 5 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[4]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:299px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[4]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[4]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:299px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:299px;left:300px;"><p> '. $resultarray[4]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:299px;left:615px;"><p> '. $resultarray[4]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:299px;left:800px;"><p> '. $resultarray[4]["note"] .'</p></div>';
?>
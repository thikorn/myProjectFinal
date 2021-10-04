<?php
        $html .= '<div style="text-align:center;position:absolute;top:582px;left:-30px;width:205px;"><p> '. 15 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[14]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:582px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[14]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[14]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:582px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:582px;left:300px;"><p> '. $resultarray[14]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:582px;left:615px;"><p> '. $resultarray[14]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:582px;left:800px;"><p> '. $resultarray[14]["note"] .'</p></div>';
?>
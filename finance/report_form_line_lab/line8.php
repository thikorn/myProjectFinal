<?php   $html .= '<div style="text-align:center;position:absolute;top:385px;left:68px;"><p> '. 8 .'</p></div>';
        $html .= '<div style="position:absolute;top:385px;left:300px;width:800px;"><p> '. $resultarray[7]["topiclab"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:385px;left:615px;"><p> '. $resultarray[7]["classroomlab"] .'</p></div>';
        $html .= '<div style="position:absolute;top:385px;left:800px;width:800px;"><p> '. $resultarray[7]["notelab"] .'</p></div>';
            
        if($resultarray[7]["datenlab"] == NULL){
            $date = date("d/m/Y", strtotime($resultarray[7]["datelab"]));
            $html .= '<div style="text-align:center;position:absolute;top:385px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[7]["timelab1"]));
            $time11 = date("H.i", strtotime($resultarray[7]["timelab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:385px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        }else if ($resultarray[7]["datenlab"] != NULL){
            $date = date("d/m/Y", strtotime($resultarray[7]["datenlab"]));
            $html .= '<div style="text-align:center;position:absolute;top:385px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[7]["timenlab1"]));
            $time11 = date("H.i", strtotime($resultarray[7]["timenlab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:385px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        }
?>
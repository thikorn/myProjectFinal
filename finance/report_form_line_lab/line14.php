<?php 
      $html .= '<div style="text-align:center;position:absolute;top:556px;left:-30px;width:205px;"><p> '. 14 .'</p></div>';
      $html .= '<div style="position:absolute;top:556px;left:300px;width:800px;"><p> '. $resultarray[13]["topiclab"] .'</p></div>';
      $html .= '<div style="text-align:center;position:absolute;top:556px;left:615px;"><p> '. $resultarray[13]["classroomlab"] .'</p></div>';
      $html .= '<div style="position:absolute;top:556px;left:800px;width:800px;"><p> '. $resultarray[13]["notelab"] .'</p></div>';

      if($resultarray[13]["datenlab"] == NULL){
            $date = date("d/m/Y", strtotime($resultarray[13]["datelab"]));
            $html .= '<div style="text-align:center;position:absolute;top:556px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[13]["timelab1"]));
            $time11 = date("H.i", strtotime($resultarray[13]["timelab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:556px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
      }else if ($resultarray[13]["datenlab"] != NULL){
            $date = date("d/m/Y", strtotime($resultarray[13]["datenlab"]));
            $html .= '<div style="text-align:center;position:absolute;top:556px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[13]["timenlab1"]));
            $time11 = date("H.i", strtotime($resultarray[13]["timenlab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:556px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
      }
?>
<?php 
  $html .= '<div style="text-align:center;position:absolute;top:414px;left:68px;"><p> '. 9 .'</p></div>';
  $html .= '<div style="position:absolute;top:414px;left:300px;width:800px;"><p> '. $resultarray[8]["topiclab"] .'</p></div>';
  $html .= '<div style="text-align:center;position:absolute;top:414px;left:615px;"><p> '. $resultarray[8]["classroomlab"] .'</p></div>';
  $html .= '<div style="position:absolute;top:414px;left:800px;width:800px;"><p> '. $resultarray[8]["notelab"] .'</p></div>';

         if($resultarray[8]["datenlab"] == NULL){
            $date = date("d/m/Y", strtotime($resultarray[8]["datelab"]));
            $html .= '<div style="text-align:center;position:absolute;top:414px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[8]["timelab1"]));
            $time11 = date("H.i", strtotime($resultarray[8]["timelab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:414px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
          }else if ($resultarray[8]["datenlab"] != NULL){
            $date = date("d/m/Y", strtotime($resultarray[8]["datenlab"]));
            $html .= '<div style="text-align:center;position:absolute;top:414px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[8]["timenlab1"]));
            $time11 = date("H.i", strtotime($resultarray[8]["timenlab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:414px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
          }
?>
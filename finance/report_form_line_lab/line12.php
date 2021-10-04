<?php 
  $html .= '<div style="text-align:center;position:absolute;top:499px;left:-30px;width:205px;"><p> '. 12 .'</p></div>';
  $html .= '<div style="position:absolute;top:499px;left:300px;width:800px;"><p> '. $resultarray[11]["topiclab"] .'</p></div>';
  $html .= '<div style="text-align:center;position:absolute;top:499px;left:615px;"><p> '. $resultarray[11]["classroomlab"] .'</p></div>';
  $html .= '<div style="position:absolute;top:499px;left:800px;width:800px;"><p> '. $resultarray[11]["notelab"] .'</p></div>';

  if($resultarray[11]["datenlab"] == NULL){
            $date = date("d/m/Y", strtotime($resultarray[11]["datelab"]));
            $html .= '<div style="text-align:center;position:absolute;top:499px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[11]["timelab1"]));
            $time11 = date("H.i", strtotime($resultarray[11]["timelab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:499px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
  }else if ($resultarray[11]["datenlab"] != NULL){
    $date = date("d/m/Y", strtotime($resultarray[11]["datenlab"]));
    $html .= '<div style="text-align:center;position:absolute;top:499px;left:106px;"><p> '. $date .'</p></div>';
    $time1 = date("H.i", strtotime($resultarray[11]["timenlab1"]));
    $time11 = date("H.i", strtotime($resultarray[11]["timenlab11"]));
    $html .= '<div style="text-align:center;position:absolute;top:499px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
  }
  
?>
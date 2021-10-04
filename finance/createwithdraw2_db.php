<?php
   
    require_once '../connection.php';
    session_start();
   
    
    if (isset($_POST['submit_createwithdraw'])) {
        
        $ids = $_SESSION['code']; 
        $dateOv =$_SESSION['dateOv'];
        $monthwithdraw = $_SESSION['selectmonth'];
        $amountwithdrawlec =$_SESSION['amountwithdrawlec']; 
        $amountwithdrawlab =$_SESSION['amountwithdrawlab']; 
        $balancelec = $_SESSION['balancelec'];
        $balancelab = $_SESSION['balancelab'];

        $select_stmt = $db->prepare("SELECT * from finance WHERE ids = :ids ");
        $select_stmt->bindParam(':ids', $ids);
        $select_stmt->execute();
       
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row["check51"] == 0){
                $sql = 'UPDATE finance SET check51 = :check5, datecheck51 = :dateOv ,amountlecreal = :amountlecreal,amountlabreal = :amountlabreal, monthwithdrawlec1 = :monthwithdraw ,monthwithdrawlab1 = :monthwithdraw ,amountwithdrawlec1 = :amountwithdrawlec ,amountwithdrawlab1 = :amountwithdrawlab WHERE ids = :id';
                $stmt = $db->prepare($sql);
                $params =[':check5'=>1,':id'=>$ids, ':dateOv'=>$dateOv,':amountlecreal'=>$balancelec,':amountlabreal'=>$balancelab ,':monthwithdraw' => $monthwithdraw, ':amountwithdrawlec'=> $amountwithdrawlec, ':amountwithdrawlab' => $amountwithdrawlab];
                $stmt->execute($params);
                
                $_SESSION['success'] = "สร้างบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
                unset($_SESSION['code']);
                header("location:createwithdraw3.php");

            }else if($row["check51"] != 0 AND $row["check52"]==0){
                $sql = 'UPDATE finance SET check52 = :check5, datecheck52 = :dateOv ,amountlecreal = :amountlecreal,amountlabreal = :amountlabreal, monthwithdrawlec2 = :monthwithdraw ,monthwithdrawlab2 = :monthwithdraw ,amountwithdrawlec2 = :amountwithdrawlec ,amountwithdrawlab2 = :amountwithdrawlab WHERE ids = :id';
                $stmt = $db->prepare($sql);
                $params =[':check5'=>1,':id'=>$ids, ':dateOv'=>$dateOv,':amountlecreal'=>$balancelec,':amountlabreal'=>$balancelab ,':monthwithdraw' => $monthwithdraw, ':amountwithdrawlec'=> $amountwithdrawlec, ':amountwithdrawlab' => $amountwithdrawlab];
                $stmt->execute($params);
                
                $_SESSION['success'] = "สร้างบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
                unset($_SESSION['code']);
                header("location:createwithdraw3.php");
            }else if($row["check51"] != 0 AND $row["check52"]!=0 AND $row["check53"]==0){
                $sql = 'UPDATE finance SET check53 = :check5, datecheck53 = :dateOv ,amountlecreal = :amountlecreal,amountlabreal = :amountlabreal, monthwithdrawlec3 = :monthwithdraw ,monthwithdrawlab3 = :monthwithdraw ,amountwithdrawlec3 = :amountwithdrawlec ,amountwithdrawlab3 = :amountwithdrawlab WHERE ids = :id';
                $stmt = $db->prepare($sql);
                $params =[':check5'=>1,':id'=>$ids, ':dateOv'=>$dateOv,':amountlecreal'=>$balancelec,':amountlabreal'=>$balancelab ,':monthwithdraw' => $monthwithdraw, ':amountwithdrawlec'=> $amountwithdrawlec, ':amountwithdrawlab' => $amountwithdrawlab];
                $stmt->execute($params);
                
                $_SESSION['success'] = "สร้างบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
                unset($_SESSION['code']);
                header("location:createwithdraw3.php");
            }else if($row["check51"] != 0 AND $row["check52"]!=0 AND $row["check53"]!=0 AND $row["check54"]==0){
                $sql = 'UPDATE finance SET check54 = :check5, datecheck54 = :dateOv ,amountlecreal = :amountlecreal,amountlabreal = :amountlabreal, monthwithdrawlec4 = :monthwithdraw ,monthwithdrawlab4 = :monthwithdraw ,amountwithdrawlec4 = :amountwithdrawlec ,amountwithdrawlab4 = :amountwithdrawlab WHERE ids = :id';
                $stmt = $db->prepare($sql);
                $params =[':check5'=>1,':id'=>$ids, ':dateOv'=>$dateOv,':amountlecreal'=>$balancelec,':amountlabreal'=>$balancelab ,':monthwithdraw' => $monthwithdraw, ':amountwithdrawlec'=> $amountwithdrawlec, ':amountwithdrawlab' => $amountwithdrawlab];
                $stmt->execute($params);
                
                $_SESSION['success'] = "สร้างบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
                unset($_SESSION['code']);
                header("location:createwithdraw3.php");
            }else if($row["check51"] != 0 AND $row["check52"]!=0 AND $row["check53"]!=0 AND $row["check54"]!=0 AND $row["check55"]==0){
                $sql = 'UPDATE finance SET check55 = :check5, datecheck55 = :dateOv ,amountlecreal = :amountlecreal,amountlabreal = :amountlabreal, monthwithdrawlec5 = :monthwithdraw ,monthwithdrawlab5 = :monthwithdraw ,amountwithdrawlec5 = :amountwithdrawlec ,amountwithdrawlab5 = :amountwithdrawlab WHERE ids = :id';
                $stmt = $db->prepare($sql);
                $params =[':check5'=>1,':id'=>$ids, ':dateOv'=>$dateOv,':amountlecreal'=>$balancelec,':amountlabreal'=>$balancelab ,':monthwithdraw' => $monthwithdraw, ':amountwithdrawlec'=> $amountwithdrawlec, ':amountwithdrawlab' => $amountwithdrawlab];
                $stmt->execute($params);
                
                
                $_SESSION['success'] = "สร้างบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
                unset($_SESSION['code']);
                header("location:createwithdraw3.php");
            }

        }     

   

          
 

                
        }

      
         

           

?>
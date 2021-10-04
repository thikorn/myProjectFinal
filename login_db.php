<?php
    require_once 'connection.php';
    session_start();

     //ถ้ามีการกดปุ่ม btn_login จากหน้า index ให้มาทำต่อในนี้
    //isset คือ ถ้ามีการ
    //$_POST คือ ใน form กำหนด method เป็น post
if(isset($_POST['btn_login'])) {
    //รับค่าจากหน้านั้น
        $email = $_POST['txt_email'];
        $password =$_POST['txt_password'];
     
        //เช็คว่าถ้าไม่มีการกรอกค่า... ให้แสดงผลว่า ไม่ได้กรอก...
        if (empty($email)) {
            $errorMsg[] = "Plase enter email";
        } else if (empty($password)) {
            $errorMsg[] = "Plase enter password";
       
        } else if ($email AND $password) {
            try{
                $password = md5($password);
                $select_stmt = $db->prepare("SELECT email, password FROM member WHERE email = :uemail AND password = :upassword");
                $select_stmt->bindParam(":uemail", $email);
                $select_stmt->bindParam(":upassword", $password);
                $select_stmt->execute();

                while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)){
                    $dbemail = $row['email'];
                    $dbpassword = $row['password'];
                }
                if($email != null AND $password != null) {
                    if($select_stmt->rowCount() > 0) {
                        $stmt = $db->prepare("SELECT * from member where email = :uemail ");
                        $stmt->bindParam(":uemail", $email);
                        //bindParam คือ การแทนที่ ค่าที่เรา รับ มา 
                        $stmt->execute();
                        $resultarray=$stmt->fetchAll();
                        for($i=0;$i<count($resultarray);$i++) {
                          $_SESSION['role']=$resultarray[$i]["role"];
                        }
                        if($email == $dbemail AND $password == $dbpassword) {
                            switch($_SESSION['role']){
                                case 'teacher' :
                                    $stmt = $db->prepare("SELECT * from member where email = :uemail ");
                                    $stmt->bindParam(":uemail", $email);
                                    $stmt->execute();
                                    $resultarray=$stmt->fetchAll();
                                    for($i=0;$i<count($resultarray);$i++) {
                                      $_SESSION['firstname']=$resultarray[$i]["firstname"];
                                      $_SESSION['lastname']=$resultarray[$i]["lastname"];
                                      $_SESSION['position']=$resultarray[$i]["position"];
                                      $_SESSION['affiliation']=$resultarray[$i]["affiliation"];
                                    }
                                    $_SESSION['email'] = $email;
                                    $_SESSION['teacher_login'] = $email;
                                    $_SESSION['success'] = "อาจารย์เข้าสู่ระบบสำเร็จ";
                                    header("location: teacher/teacher_home.php");
                                break;
                                case 'finance' :
                                    $stmt = $db->prepare("SELECT * from member where email = :uemail ");
                                    $stmt->bindParam(":uemail", $email);
                                    $stmt->execute();
                                    $resultarray=$stmt->fetchAll();
                                    for($i=0;$i<count($resultarray);$i++) {
                                      $_SESSION['firstname']=$resultarray[$i]["firstname"];
                                      $_SESSION['lastnameFi']=$resultarray[$i]["lastname"];
                                    }
                                    $_SESSION['email'] = $email;
                                    $_SESSION['finance_login'] = $email;
                                    $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
                                    header("location: finance/finance_home.php");
                                break;
                                case 'secretary' :
                                    $stmt = $db->prepare("SELECT * from member where email = :uemail ");
                                    $stmt->bindParam(":uemail", $email);
                                    $stmt->execute();
                                    $resultarray=$stmt->fetchAll();
                                    for($i=0;$i<count($resultarray);$i++) {
                                      $_SESSION['firstname']=$resultarray[$i]["firstname"];
                                    }
                                    $_SESSION['email'] = $email;
                                    $_SESSION['secretary_login'] = $email;
                                    $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
                                    header("location: secretary/secretary_home.php");
                                break;
                                case 'president' :
                                    $stmt = $db->prepare("SELECT * from member where email = :uemail ");
                                    $stmt->bindParam(":uemail", $email);
                                    $stmt->execute();
                                    $resultarray=$stmt->fetchAll();
                                    for($i=0;$i<count($resultarray);$i++) {
                                      $_SESSION['firstname']=$resultarray[$i]["firstname"];
                                    }
                                    $_SESSION['email'] = $email;
                                    $_SESSION['president_login'] = $email;
                                    $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
                                    header("location: president/president_home.php");
                                break;
                                case 'admin' :
                                    $stmt = $db->prepare("SELECT * from member where email = :uemail ");
                                    $stmt->bindParam(":uemail", $email);
                                    $stmt->execute();
                                    $resultarray=$stmt->fetchAll();
                                    for($i=0;$i<count($resultarray);$i++) {
                                      $_SESSION['firstname']=$resultarray[$i]["firstname"];
                                    }
                                    $_SESSION['email'] = $email;
                                    $_SESSION['admin_login'] = $email;
                                    $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
                                    header("location: admin/admin_home.php");
                                break;
                                case 'board' :
                                    $stmt = $db->prepare("SELECT * from member where email = :uemail ");
                                    $stmt->bindParam(":uemail", $email);
                                    $stmt->execute();
                                    $resultarray=$stmt->fetchAll();
                                    for($i=0;$i<count($resultarray);$i++) {
                                      $_SESSION['firstname']=$resultarray[$i]["firstname"];
                                    }
                                    $_SESSION['email'] = $email;
                                    $_SESSION['board_login'] = $email;
                                    $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
                                    header("location: board/board_home.php");
                                break;
                                default:
                                $_SESSION['error'] = "Wrong email or password or role";
                                header("location: index.php");
                            }
                        }
                } else {
                    $_SESSION['error'] = "อีเมล หรือ รหัสผ่านไม่ถูกต้อง";
                    header("location: index.php");
                    }
                }


            }catch(PDOException $e){
                $e->getMessage();
            }
    
        }   
}
    
?>
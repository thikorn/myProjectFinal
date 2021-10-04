<?php

require_once 'connection.php';
    session_start();


    if(isset($_POST['btn_logintest'])) {

        $email = $_POST['txt_email'];
        $password = $_POST['txt_password'];

        if (empty($email)) {
            $errorMsg[] = "Plase enter email";
        } else if (empty($password)) {
            $errorMsg[] = "Plase enter password";
        } else if ($email AND $password  ) {
            try {
            $stmt = $db->prepare("SELECT * from member where email = :uemail AND password = :upassword ");
            $stmt->bindParam(":uemail", $email);
            $stmt->bindParam(":upassword", $password);
            $stmt->execute();
            $resultarray=$stmt->fetchAll();
            for($i=0;$i<count($resultarray);$i++) {
              $role=$resultarray[$i]["role"];
              
            }

            while($row = $resultarray->fetchAll()){
                $dbemail = $row['email'];
                $dbpassword = $row['password'];
            }

            if($email != null AND $password != null) {
                if($resultarray->rowCount() > 0) {
                    if($email == $dbemail AND $password == $dbpassword ) {
                        switch($role){
                            case 'teacher' :
                                $stmt = $db->prepare("SELECT * from member where email = :uemail ");
                                $stmt->bindParam(":uemail", $email);
                                $stmt->execute();
                                $resultarray=$stmt->fetchAll();
                                for($i=0;$i<count($resultarray);$i++) {
                                  $_SESSION['firstname']=$resultarray[$i]["firstname"];
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
                            default:
                                $_SESSION['error'] = "Wrong email or password or role";
                                header("location: index.php");
                        }

                    }
            }else {
                $_SESSION['error'] = "Wrong email or password or role";
                header("location: index.php");
            }

            }
        }catch(PDOException $e){
            $e->getMessage();
        }

    }
}
?>
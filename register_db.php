<?php
    require_once "connection.php";
    session_start();
    if(isset($_POST['btn_register'])) {
        $username = $_POST['txt_username'];
        $email = $_POST['txt_email'];
        $password = $_POST['txt_password'];
	    $firstname = $_POST['txt_firstname'];
        $lastname = $_POST['txt_lastname'];
        $qualification = $_POST['txt_qualification'];
        $affiliation = $_POST['txt_affiliation'];
        $position = $_POST['txt_position'];
        $role = $_POST['txt_role'];
        $postname = $_POST['txt_postname'];

        if(empty($username)) {
            $errorMsg[] = "Please enter username";
        } else if(empty($email)) {
            $errorMsg[] = "Please enter email";
        } else if(empty($password)) {
            $errorMsg[] = "Please enter password";
        } else if(strlen($password)<6) {
            $_SESSION['error'] = "รหัสผ่านต่ำกว่า 6 ตัว กรอกใหม่อีกครั้ง";
            header("location:register.php");
        } else if(empty($firstname)) {
            $errorMsg[] = "Please enter firstname";
        } else if(empty($lastname)) {
            $errorMsg[] = "Please enter lastname";
        }else if(empty($qualification)) {
            $errorMsg[] = "Please select qualification";
        }else if(empty($affiliation)) {
            $errorMsg[] = "Please select affiliation";
        }else if(empty($position)) {
            $errorMsg[] = "Please select position";
        }else if(empty($role)) {
            $errorMsg[] = "Please select role";
        } else {
            try{
                $select_stmt = $db->prepare("SELECT username, email FROM member WHERE username = :uname OR email = :uemail");
                $select_stmt->bindParam(":uname", $username);
                $select_stmt->bindParam(":uemail", $email);
                $select_stmt->execute();
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['error'] = "อีเมลล์นั้นถูกใช้แล้ว";
                    header("location:register.php");
                } else if (!isset($errorMsg)) {
                    $password = md5($password);
                    $insert_stmt = $db->prepare("INSERT INTO member(username, email, password, postname, firstname, lastname, qualification, affiliation, position, role) VALUES (:uname, :uemail, :upassword, :upostname, :ufirstname, :ulastname, :uqualification, :uaffiliation, :uposition, :urole)");
                    $insert_stmt->bindParam(":uname", $username);
                    $insert_stmt->bindParam(":uemail", $email);
                    $insert_stmt->bindParam(":upassword", $password);
		            $insert_stmt->bindParam(":ufirstname", $firstname);
                    $insert_stmt->bindParam(":ulastname", $lastname);
                    $insert_stmt->bindParam(":uqualification", $qualification);
                    $insert_stmt->bindParam(":uaffiliation", $affiliation);
                    $insert_stmt->bindParam(":uposition", $position);
                    $insert_stmt->bindParam(":urole", $role);
                    $insert_stmt->bindParam(":upostname", $postname);


                    if ($insert_stmt->execute()) {
                        $_SESSION['success'] = "สมัครสมาชิกสำเร็จ";
                        header("location:index.php");
                    }
                }
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }

?>
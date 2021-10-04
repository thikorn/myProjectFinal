<?php
    session_start();
    require_once '../connection.php';
    if(!isset($_SESSION['finance_login'])) {
        header("location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าค้นหาจากรหัสวิชา</title>

    
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <?php include('../decorate_style.php') ?>
</head>
<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php') ?> 


    <div style="margin-left:30%;height:1000px;padding-top:2%">
   

   <div class="container">

   <h1>หน้าค้นหาจากรหัสวิชา</h1>
   <hr>
  
                <?php 
                    $connection = mysqli_connect('localhost','root','','personnel_db');
                    if(isset($_POST['search'])){
                        $searchKey = $_POST['search'];
                        $sql = "SELECT * FROM subject WHERE ids LIKE '%$searchKey%'";
                        $sql2 = "SELECT * FROM finance WHERE ids LIKE '%$searchKey%'";
                    }else{
                        $sql = "SELECT * FROM subject LEFT JOIN finance ON subject.ids = finance.ids";
                        $sql2 = "SELECT * FROM subject LEFT JOIN finance ON subject.ids = finance.ids";
                        $searchKey = "";
                    }
                   

                    $result = mysqli_query($connection,$sql);
                    $row_cnt = mysqli_num_rows($result);
                    $result2 = mysqli_query($connection,$sql2);
                    $row_cnt2 = mysqli_num_rows($result2);
                ?>
                <br>
			<div class="row">
            <form action="" method="POST"> 
					<div style="margin-left:16px">
                    <input type="text" name="search" class='form-control' placeholder="Search By code " maxlength = "11" value="<?php echo $searchKey; ?>" > 
                    <br>
                    
                    <button class="btn btn-primary">Search</button>
                    </div>
						
					
					
						
					
				</form>
            </div>
          
            <style>

td, th, tr {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    font-size: 15px;
}

th {
  width: 200px;
}

td {
  vertical-align: top;
}

</style>
            <br>
            <table style="width:156%" >

     <colgroup>
     <col width="100">
     <col width="1500">
     <col width="600">
     <col width="1700">
     <col width="2750">
     </colgroup>
            <tr>
                <th rowspan="2">รหัสวิชา</th>
                <th rowspan="2">รายชื่อวิชา</th>
                <th rowspan="2">ปีการศึกษา</th>
                <th rowspan="2" >ชื่อ/นามสกุลผู้สอน</th>
                <th rowspan="2">วันเวลาเรียน</th>
                <th rowspan="2">หน่วยกิต</th>
                <th rowspan="2">นิสิตที่ลงทะเบียน</th>
                <th rowspan="2">อัตรา/บรรยาย</th>
                <th rowspan="2">อัตรา/ปฏิบัติ</th>
                <th colspan="2">จำนวนชม.</th>
                <th colspan="2">ค่าตอบแทน</th>
                <th rowspan="2" class="text-center">รวม</th>
                <th colspan="5" class="text-center">โอนเงิน</th>
                <th rowspan="2">เหลือ</th>
                
            </tr>
            <tr>
                <td>บรรยาย</td>
                <td>ปฏิบัติ</td>
                <td>บรรยาย</td>
                <td>ปฏิบัติ</td>
                <td>เดือนที่ 1</td>
                <td>เดือนที่ 2</td>
                <td>เดือนที่ 3</td>
                <td>เดือนที่ 4</td>
                <td>เดือนที่ 5</td>
            </tr> 


                    <?php 
                    while($row = mysqli_fetch_object($result) AND $row2 = mysqli_fetch_object($result2)) {
                      
                        $c1 = ($row->hourLec*15)*$row->compensationlec; 
                        $c2 = ($row->hourLab*15)*$row->compensationlab; 
                        $c3 = $c1+$c2;  
                    ?>
                      <?php if($row->check1 == 4){ ?>
					<tr>
						<td><?php echo $row->ids ?></td>
						<td><?php echo $row->nameSubject ?></td>
						<td><?php echo $row->yearSubject ?></td>
                        <td><?php echo $row->nameTeacher ?></td>
                        <td><?php  if($row->date1 != ""){ ?>
                            <?php echo $row->date1?> <?=date("H:i", strtotime($row->time1));?>-<?=date("H:i", strtotime($row->time11));?><br>
                        <?php }else{
                        echo "";
                        } ?>
                        <?php  if($row->date2 != ""){ ?>
                            <?php echo $row->date2?> <?=date("H:i", strtotime($row->time2));?>-<?=date("H:i", strtotime($row->time22));?><br>
                        <?php }else{
                        echo "";
                        } ?>
                        <?php  if($row->date3 != ""){ ?>
                            <?php echo $row->date3?> <?=date("H:i", strtotime($row->time3));?>-<?=date("H:i", strtotime($row->time33));?><br>
                        <?php }else{
                        echo "";
                        } ?>
                        <?php  if($row->datelab1 != ""){ ?>
                            <?php echo $row->datelab1?> <?=date("H:i", strtotime($row->timelab1));?>-<?=date("H:i", strtotime($row->timelab11));?><br>
                        <?php }else{
                        echo "";
                        } ?>
                        <?php  if($row->datelab2 != ""){ ?>
                            <?php echo $row->datelab2?> <?=date("H:i", strtotime($row->timelab2));?>-<?=date("H:i", strtotime($row->timelab22));?><br>
                        <?php }else{
                        echo "";
                        } ?>
                        <?php  if($row->datelab3 != ""){ ?>
                            <?php echo $row->datelab3?> <?=date("H:i", strtotime($row->timelab3));?>-<?=date("H:i", strtotime($row->timelab33));?><br>
                        <?php }else{
                        echo "";
                        } ?>
                        </td>
                        <td><?php echo $row->credit ?></td>
                        <td><?php echo $row->Totalnisit ?></td>
                        <td><?php echo $row->compensationlec ?></td>
                        <td><?php echo $row->compensationlab ?></td>
                        <td><?php echo $row->hourLec ?></td>
                        <td><?php echo $row->hourLab ?></td>
                        <td> <?php echo number_format($c1) ?> </td> 
                        <td> <?php echo number_format($c2) ?> </td> 
                        <td> <?php echo number_format($c3) ?> </td> 
                       
                        
                        <?php 
                        $amountwithdrawlec1 = $row2->amountwithdrawlec1;
                        $amountwithdrawlab1 = $row2->amountwithdrawlab1;
                        $amountwithdrawTotal1 = $amountwithdrawlec1; + $amountwithdrawlab1;
                        ?>
                        <td class="text-center "> <?php echo number_format($amountwithdrawTotal1)?> </td>
                        <?php 
                        $amountwithdrawlec2 = $row2->amountwithdrawlec2;
                        $amountwithdrawlab2 = $row2->amountwithdrawlab2;
                        $amountwithdrawTotal2 = $amountwithdrawlec2 + $amountwithdrawlab2;
                        ?>
                        <td class="text-center "> <?php echo number_format($amountwithdrawTotal2)?> </td>
                        <?php 
                        $amountwithdrawlec3 = $row2->amountwithdrawlec3;
                        $amountwithdrawlab3 = $row2->amountwithdrawlab3;
                        $amountwithdrawTotal3 = $amountwithdrawlec3 + $amountwithdrawlab3;
                        ?>
                        <td class="text-center "> <?php echo number_format($amountwithdrawTotal3)?> </td>  
                        <?php 
                        $amountwithdrawlec4 = $row2->amountwithdrawlec4;
                        $amountwithdrawlab4 = $row2->amountwithdrawlab4;
                        $amountwithdrawTotal4 = $amountwithdrawlec4 + $amountwithdrawlab4;
                        ?>
                        <td class="text-center "> <?php echo number_format($amountwithdrawTotal4)?> </td>  
                        <?php 
                        $amountwithdrawlec5 = $row2->amountwithdrawlec5;
                        $amountwithdrawlab5 = $row2->amountwithdrawlab5;
                        $amountwithdrawTotal5 = $amountwithdrawlec5 + $amountwithdrawlab5;
                        ?>
                        <td class="text-center "> <?php echo number_format($amountwithdrawTotal5)?> </td>  
                        <?php 
                        $amountlecreal = $row2->amountlecreal;
                        $amountlabreal = $row2->amountlabreal;
                        $amountwithreal = $amountlecreal + $amountlabreal;
                        ?>
                        <td class="text-center "> <?php echo number_format($amountwithreal)?> </td> 
                        <?php  }?>
                                    </tr>
                    <?php  }?>
				</table>
                <?php 
              if($row_cnt == 0){ ?>
                
                  <p  class="alert alert-secondary width" role="alert">ไม่พบชื่อวิชานั้น</p>
            <?php
              }
              ?>
              <br>
            <a href="search.php" style="width:10%;margin-left:0px"class="btn btn-danger" >ย้อนกลับ</a>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>
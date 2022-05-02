<?php require $_SERVER['DOCUMENT_ROOT']."/teacher/vendor/autoload.php";?>
<?php 
    use App\Model\Register;
    $registerObj = new Register();
    $reg = $registerObj->getRegisterByIdCa($_REQUEST['id']);
    if(isset($reg)){
        $register = $reg;
        $d = 'NO';
    }else{
        $register = $registerObj->getRegisterById($_REQUEST['id']);
        $d = 'YES';
    }
    
    $r2 = $registerObj->getRegisterByNS($register['name'],$register['surname']);
    $r3 = $registerObj->getRegisterByTel($register['tel']);

    if(isset($r2)){
        $msg2 = "
            <div class='alert alert-success text-center mt-3'>
                <h4>ลงทะเบียนเข้าร่วมอบรม</h4>
            </div>
        ";
        $b="YES"; 
    }else{
        $msg2 = "
            <div class='alert alert-danger text-center mt-3'>
                <h4>ไม่ได้ลงทะเบียนเข้าร่วมอบรม</h4>
            </div>
        ";
        $b="NO";
    }
    if(isset($r3)){
        $msg3 = "
            <div class='alert alert-success text-center mt-3'>
                <h4>มีแบบประเมินแล้ว</h4>
            </div>
        ";
        $c="YES";
    }else{
        $msg3 = "
            <div class='alert alert-danger text-center mt-3'>
                <h4>ยังไม่มีแบบประเมิน</h4>
            </div>
        ";
        $c="NO";
    }
    // print_r($register);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบรายชื่อ</title>
    <link rel="stylesheet" href="theme/css/bootstrap-theme.css">
</head>
<body class="font-kanit">
    <nav class="navbar navbar-dark bg-warning text-white">
    <div class="container-fluid">
        <h3>โครงการอบรมครูแนะแนว เพื่อการแนะนำการศึกษาในศตวรรษที่ 21</h3>
    </div>
    </nav>
    <div class="container">
       
        <div class="row mt-5">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header bg-info text-white">ยืนยันข้อมูล</div>
                    <div class="card-body">
                        <form action="save.php" method="POST">
                            <div class="row">
                            <input type="hidden" name="t_id"  required value="<?php echo $_REQUEST['id'];?>">
                            <input type="hidden" name="a"  required value="<?php echo $_REQUEST['a'];?>">
                            <input type="hidden" name="b"  required value="<?php echo $b;?>">
                            <input type="hidden" name="c"  required value="<?php echo $c;?>">
                                <div class="col-sm-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="title" class="form-label">คำนำหน้า</label>
                                        <input type="text" id="title" class="form-control" name="title"  required value="<?php echo $register['title'];?>" autofocus>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="name" class="form-label">ชื่อ</label>
                                        <input type="text" id="name" class="form-control" name="name"  required value="<?php echo $register['name'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="surname" class="form-label">นามสกุล</label>
                                        <input type="text" id="surname" class="form-control" name="surname"  required value="<?php echo $register['surname'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="tel" class="form-label">เบอร์ ไม่ต้องมี '-'</label>
                                        <input type="text" id="tel" class="form-control" name="tel"  required value="<?php echo $register['tel'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="email" class="form-label">email</label>
                                        <input type="text" id="email" class="form-control" name="email"  required value="<?php echo $register['email'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg">
                                    <div class="form-group">
                                        <label for="school" class="form-label">โรงเรียน <b class = "text-danger">ใส่เฉพาะชื่อโรงเรียนเท่านั้น</b> เช่น <b class = "text-danger">"โรงเรียนกรุงเทพคริสเตียนวิทยาลัย"</b></label>
                                        <input type="text" id="school" class="form-control" name="school"  required value="<?php echo $register['school'];?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <p><b>หมายเหตุ : <br></b>1.ข้อมูลที่ยืนยันจำเป็นต้องเป็นข้อมูลที่ถูกต้องเพราะข้อมูลนี้จะนำใปใช้ออกใบประกาศ รบกวนตรวจสอบให้ถูกต้องก่อนกด ยืนยัน <br>
                            2.ถ้าท่านใดเคยยืนยันข้อมูลแล้ว จะไม่สามารถยืนยันข้อมูลได้อีก <br>
                            3.ท่านใดที่ไม่มีปุ่ม ยืนยัน ขึ้นแสดง</p>
                            <br>
                            <div class="text-center"><h3 class="mt-5 text-danger"><b>หมดเขตยืนยันข้อมูล วันพุธที่ 4 พฤษภาคม 2565 เวลา 23:59 น.</b></h3></div>
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                <?php if(($_REQUEST['a']=='YES')AND($b=='YES')AND($c=='YES')AND($d=='YES')){ ?>
                                <button type="submit" class="btn btn-success mr-auto text-white">ยืนยัน</button>
                                <?php } ?>
                                <a href="/teacher/" class="btn btn-warning text-white">ย้อนกลับ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <div class="card mb-3">
                    <div class="card-header bg-info text-white">เข้าร่วมอบรม</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <!-- <div class="col-sm-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="title" class="form-label">คำนำหน้า</label>
                                        <input type="text" id="title" class="form-control" name="title"  required value="<?php echo $register['title'];?>">
                                    </div>
                                </div> -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">ชื่อ</label>
                                        <input type="text" id="name" class="form-control" name="name"  required value="<?php echo $register['name'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="surname" class="form-label">นามสกุล</label>
                                        <input type="text" id="surname" class="form-control" name="surname"  required value="<?php echo $register['surname'];?>" readonly>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="tel" class="form-label">เบอร์</label>
                                        <input type="text" id="tel" class="form-control" name="tel"  required value="<?php echo $register['tel'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="email" class="form-label">email</label>
                                        <input type="text" id="email" class="form-control" name="email"  required value="<?php echo $register['email'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg">
                                    <div class="form-group">
                                        <label for="school" class="form-label">โรงเรียน</label>
                                        <input type="text" id="school" class="form-control" name="school"  required value="<?php echo $register['school'];?>">
                                    </div>
                                </div> -->
                            </div>
                            <!-- <button type="submit" class="btn btn-success mr-auto text-white" name="submit">ยืนยัน</button> -->
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <?php
                            echo $msg2;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card mb-3">
                    <div class="card-header bg-info text-white">ทำแบบประเมิน</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <!-- <div class="col-sm-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="title" class="form-label">คำนำหน้า</label>
                                        <input type="text" id="title" class="form-control" name="title"  required value="<?php echo $register['title'];?>">
                                    </div>
                                </div> -->
                                <!-- <div class="col-sm-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="name" class="form-label">ชื่อ</label>
                                        <input type="text" id="name" class="form-control" name="name"  required value="<?php echo $register['name'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="surname" class="form-label">นามสกุล</label>
                                        <input type="text" id="surname" class="form-control" name="surname"  required value="<?php echo $register['surname'];?>">
                                    </div>
                                </div> -->
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="tel" class="form-label">เบอร์</label>
                                        <input type="text" id="tel" class="form-control" name="tel"  required value="<?php echo $register['tel'];?>" readonly>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">email</label>
                                        <input type="text" id="email" class="form-control" name="email"  required value="<?php echo $register['email'];?>">
                                    </div>
                                </div> -->
                                <!-- <div class="col-sm-12 col-md-4 col-lg">
                                    <div class="form-group">
                                        <label for="school" class="form-label">โรงเรียน</label>
                                        <input type="text" id="school" class="form-control" name="school"  required value="<?php echo $register['school'];?>">
                                    </div>
                                </div> -->
                            </div>
                            
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <?php
                            echo $msg3;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
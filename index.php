<?php require $_SERVER['DOCUMENT_ROOT']."/teacher/vendor/autoload.php";?>
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
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header bg-warning text-white">กรอกข้อมูล</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="">ชื่อ *(เฉพาะชื่อเท่านั้น)</label>
                                <input type="text" class="form-control" name="fullname" autofocus>
                            </div>
                            <button type="submit" class="btn btn-success mt-2" name="submit">ค้นหา</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        use App\Model\Register;

        $registerObj = new Register();
        if(isset($_REQUEST['submit'])){ 
            
        ?>

        
        <div class="row mt-5">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">รายชื่อลงทะเบียนประสงค์ที่จะอบรม(ก่อนวันอบรม)</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อ</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                

                                $registers = $registerObj->getRegisterByName($_REQUEST['fullname'],'tb_register1');
                                 $n=0;
                                foreach($registers as $register) {
                                    $n++;
                                    echo "
                                        <tr>
                                            <td>{$n}</td>
                                            <td>{$register['fullname']}</td>
                                            
                                        </tr>
                                    ";
                                }
                            ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">รายชื่อลงทะเบียนเข้าอบรม(วันที่อบรม)</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อ</th>
                                    <!-- <th>email</th> -->
                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                 $Sregisters = $registerObj->getRegisterByName($_REQUEST['fullname'],'tb_register2');
                                 $n=0;
                                
                                foreach($Sregisters as $Sregister) {
                                    $n++;
                                    echo "
                                        <tr>
                                            <td>{$n}</td>
                                            <td>{$Sregister['fullname']}</td>
                                           
                                        </tr>
                                    ";
                                }
                            ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">รายชื่อทำแบบประเมิน</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อ</th>
                                   
                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($register['tel'])){
                                $Sregisters3 = $registerObj->getRegisterByTel($register['tel'],'tb_register3');
                                 $n=0;
                                
                                foreach($Sregisters3 as $Sregister3) {
                                    $n++;
                                    echo "
                                        <tr>
                                            <td>{$n}</td>
                                            <td>{$Sregister3['school']}</td>
                                           
                                        </tr>
                                    ";
                                }
                            }
                                 
                            ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    
</body>
</html>
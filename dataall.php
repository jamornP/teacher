<?php require $_SERVER['DOCUMENT_ROOT']."/teacher/vendor/autoload.php";?>
<?php 
    use App\Model\Register;
    $registerObj = new Register();
    $r1 = $registerObj->getAllRegister();
    // print_r($r1);
    $i=0;
    // $j=0;
    foreach($r1 as $t) {
      
        $r2 = $registerObj->getRegisterByNS($t['name'],$t['surname']);
        $r3 = $registerObj->getRegisterByTel($t['tel']);
        $r1[$i]['r1']='YES';
        if(isset($r2)) {
            $r1[$i]['r2']='YES';
        }else{
            $r1[$i]['r2']='NO';
        }
        if(isset($r3)) {
            $r1[$i]['r3']='YES';
        }else{
            $r1[$i]['r3']='NO';
        }
        $i++;
    }
    
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
<?php
// echo "<pre>";
// print_r($m);
// echo "</pre>";
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-md">
            <div class="card mb-3 h-100">
                <div class="card-header bg-primary text-white">ข้อมูลการลงทะเบียน</div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>คำนำหน้า</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>เบอร์</th>
                                <th>รอบ1</th>
                                <th>รอบ2</th>
                                <th>รอบ3</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            

                            // $registers = $registerObj->getRegisterByName($_REQUEST['fullname'],'tb_r1');
                                $n=0;
                                $j=1;
                                // echo "<pre>";
                                // print_r($r1);
                                // echo "</pre>";
                            foreach($r1 as $teachers) {
                                
                                echo "
                                    <tr>
                                        <td>{$j}</td>
                                        <td>{$teachers['title']}</td>
                                        <td>{$teachers['name']}</td>
                                        <td>{$teachers['surname']}</td>
                                        <td>{$teachers['tel']}</td>
                                        <td>{$teachers['r1']}</td>
                                        <td>{$teachers['r2']}</td>
                                        <td>{$teachers['r3']}</td>
                                        
                                        
                                    </tr>
                                ";
                                $n++;
                                $j++;
                            }
                        ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
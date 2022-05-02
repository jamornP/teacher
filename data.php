<?php require $_SERVER['DOCUMENT_ROOT']."/teacher/vendor/autoload.php";?>
<?php 
    use App\Model\Register;
    $registerObj = new Register();
    $r1 = $registerObj->getAllRegister();
    
    $i=0;
    $j=0;
    foreach($r1 as $t) {
        $i++;
        $r2 = $registerObj->getRegisterByNS($t['name'],$t['surname']);
        $r3 = $registerObj->getRegisterByTel($t['tel']);
       
        if((isset($r2)) AND (isset($r3)) ){
            $j++;
            $h[$i]['b']="YES";
            $m[$j]['id']=$t['id'];
            $m[$j]['title']=$t['title'];
            $m[$j]['name']=$t['name'];
            $m[$j]['surname']=$t['surname'];
            $m[$j]['tel']=$t['tel'];
            $m[$j]['email']=$t['email'];
           
        }else{
            $h[$i]['b']="NO";
        }
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
                                <th></th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            

                            // $registers = $registerObj->getRegisterByName($_REQUEST['fullname'],'tb_r1');
                                $n=0;
                            foreach($m as $teachers) {
                                $n++;
                                echo "
                                    <tr>
                                        <td>{$n}</td>
                                        <td>{$teachers['title']}</td>
                                        <td>{$teachers['name']}</td>
                                        <td>{$teachers['surname']}</td>
                                        <td>{$teachers['tel']}</td>
                                        <td></td>
                                        
                                        
                                    </tr>
                                ";
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
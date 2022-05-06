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
        $r4 = $registerObj->getRegisterByIdCa($t['id']);
        if((isset($r2)) AND (isset($r3)) ){
           
            if(isset($r4)){
                $n[$j]['id']=$t['id'];
                $n[$j]['title']=$r4['title'];
                $n[$j]['name']=$r4['name'];
                $n[$j]['surname']=$r4['surname'];
                $n[$j]['tel']=$r4['tel'];
                $n[$j]['email']=$r4['email'];
                $n[$j]['school']=$r4['school'];
                $n[$j]['r1']='Yes';
                $n[$j]['r2']='Yes';
                $n[$j]['r3']='Yes';
                $n[$j]['r4']='Yes';

            }else{
                
               
                $m[$j]['id']=$t['id'];
                $m[$j]['title']=$t['title'];
                $m[$j]['name']=$t['name'];
                $m[$j]['surname']=$t['surname'];
                $m[$j]['tel']=$t['tel'];
                $m[$j]['email']=$t['email'];
                $m[$j]['school']=$t['school'];
                $m[$j]['r1']='Yes';
                $m[$j]['r2']='Yes';
                $m[$j]['r3']='Yes';
                $m[$j]['r4']='NO';
            }
            $j++;
           
        }else{
           
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
                                <th>email</th>
                                <th>โรงเรียน</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            

                            // $registers = $registerObj->getRegisterByName($_REQUEST['fullname'],'tb_r1');
                            $k=0;
                            foreach($n as $ta) {
                                $k++;
                                echo "
                                    <tr>
                                        <td>{$k}</td>
                                        <td>{$ta['title']}</td>
                                        <td>{$ta['name']}</td>
                                        <td>{$ta['surname']}</td>
                                        <td>{$ta['tel']}</td>
                                        <td>{$ta['email']}</td>
                                        <td>{$ta['school']}</td>
                                        <td></td>
                                        
                                        
                                    </tr>
                                ";
                            }
                                $l=$k;
                            foreach($m as $teachers) {
                                $l++;
                                echo "
                                    <tr>
                                        <td>{$l}</td>
                                        <td>{$teachers['title']}</td>
                                        <td>{$teachers['name']}</td>
                                        <td>{$teachers['surname']}</td>
                                        <td>{$teachers['tel']}</td>
                                        <td>{$teachers['email']}</td>
                                        <td>{$teachers['school']}</td>
                                        
                                        
                                        
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
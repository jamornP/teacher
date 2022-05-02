<?php require $_SERVER['DOCUMENT_ROOT']."/teacher/vendor/autoload.php";?>
<?php 
    use App\Model\Register;
    $registerObj = new Register();
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
        if(isset($_REQUEST['aswer'])){
            echo "
                <svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
                <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
                    <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
                </symbol>
                <symbol id='info-fill' fill='currentColor' viewBox='0 0 16 16'>
                    <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
                </symbol>
                <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
                    <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
                </symbol>
                </svg>
                <div class='alert alert-success d-flex align-items-center mt-2' role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
                <div>
                    ยืนยันข้อมูลเรียบร้อย
                </div>
                </div>
            ";
        }
        ?>
    <div class="container">
       
        <div class="row mt-5">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header bg-info text-white">กรอกข้อมูล</div>
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
        <div class="row mt-5">
            <div class="col-md">
                <div class="card mb-3 h-100">
                    <div class="card-header bg-primary text-white">ข้อมูลการลงทะเบียน</div>
                    <div class="card-body">
                        <table class="table">
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
                                

                                $registers = $registerObj->getRegisterByName($_REQUEST['fullname'],'tb_r1');
                                 $n=0;
                                foreach($registers as $register) {
                                    $n++;
                                    echo "
                                        <tr>
                                            <td>{$n}</td>
                                            <td>{$register['title']}</td>
                                            <td>{$register['name']}</td>
                                            <td>{$register['surname']}</td>                                            
                                            <td>{$register['tel']}</td>
                                            <td>
                                                <a href='check.php?id={$register['id']}&a=YES'>ตรวจสอบ</a>                                            
                                            </td>                                          
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
        <div class="row mt-5">
            <div class="col-md">
                <div class="card mb-3 h-100">
                    <div class="card-header bg-success text-white">ข้อมูลที่ยืนยันแล้ว</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>คำนำหน้า</th>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>เบอร์</th>
                                    <th>email</th>
                                    <th></th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                

                                $registers = $registerObj->getAllCa();
                                 $n=0;
                                foreach($registers as $register) {
                                    $n++;
                                    echo "
                                        <tr>
                                            <td>{$n}</td>
                                            <td>{$register['title']}</td>
                                            <td>{$register['name']}</td>
                                            <td>{$register['surname']}</td>                                            
                                            <td>{$register['tel']}</td>
                                            <td>{$register['email']}</td>
                                            <td>
                                                <a href='check.php?id={$register['id']}&a=YES'>ตรวจสอบ</a>                                            
                                            </td>                                          
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
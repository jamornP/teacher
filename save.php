<?php print_r($_REQUEST);?>
<?php require $_SERVER['DOCUMENT_ROOT']."/teacher/vendor/autoload.php";?>
<?php 
    use App\Model\Register;
    $teacherObj = new Register;

    $teacherObj->addTeacher($_REQUEST);
    header('Location: index.php?aswer=yes');
?>
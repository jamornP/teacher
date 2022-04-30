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
            
            $m[$j]['name']=$t['name'];
            $m[$j]['surname']=$t['surname'];
            $m[$j]['tel']=$t['tel'];
            $m[$j]['email']=$t['email'];
           
        }else{
            $h[$i]['b']="NO";
        }
        if(isset($r3)){
            $h[$i]['c']="YES";
        }else{
            $h[$i]['c']="NO";
        }
        // if(($h[$i]['b']="YES") AND ($h[$i]['c']="YES")){
        //     $m[$i]['name']=$t['name'];
        //     $m[$i]['surname']=$t['surname'];
        //     $m[$i]['tel']=$t['tel'];
        //     $m[$i]['email']=$t['email'];
        // }
    }
    echo "<pre>";
    print_r($m);
    echo "</pre>";
?>
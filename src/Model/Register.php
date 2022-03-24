<?php
namespace App\Model;

use App\Database\Db;

class Register extends Db {
    public function getAllRegister() {
        $sql = "
            SELECT * 
            FROM tb_register1
            ORDER BY fullname
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }


    public function getRegisterByName($fullname,$tb) {
        $sql = "
            SELECT 
                * 
            FROM 
                ".$tb."
            WHERE 
                fullname LIKE'".$fullname."%'
            ORDER BY 
                fullname
        ";
        $stmt = $this->pdo->query($sql);
        $stmt->execute(); 
        $data = $stmt->fetchAll();
        return $data;
    }

    public function getRegisterByTel($tel,$tb) {
        $sql = "
            SELECT 
                * 
            FROM 
                ".$tb."
            WHERE 
                tel = '".$tel."'
             
        ";
        $stmt = $this->pdo->query($sql);
        $stmt->execute(); 
        $data = $stmt->fetchAll();
        return $data;
    }
}
?>
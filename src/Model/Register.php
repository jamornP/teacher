<?php
namespace App\Model;

use App\Database\Db;

class Register extends Db {
    public function getAllRegister() {
        $sql = "
            SELECT * 
            FROM tb_r1
            ORDER BY name
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getAllCa() {
        $sql = "
            SELECT * 
            FROM tb_ca
            ORDER BY name
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getRegisterById($id) {
        $sql = "
            SELECT 
                * 
            FROM 
                tb_r1
            WHERE 
                id =".$id."
        ";
        $stmt = $this->pdo->query($sql);
        $stmt->execute(); 
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function getRegisterByIdCa($id) {
        $sql = "
            SELECT 
                * 
            FROM 
                tb_ca
            WHERE 
                t_id =".$id."
        ";
        $stmt = $this->pdo->query($sql);
        $stmt->execute(); 
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function getRegisterByName($name,$tb) {
        $sql = "
            SELECT 
                * 
            FROM 
                ".$tb."
            WHERE 
                name ='".$name."'
        ";
        $stmt = $this->pdo->query($sql);
        $stmt->execute(); 
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getRegisterByNS($name,$surname) {
        $sql = "
            SELECT 
                * 
            FROM 
                tb_r2
            WHERE 
                name ='".$name."' AND surname ='".$surname."'
        ";
        $stmt = $this->pdo->query($sql);
        $stmt->execute(); 
        $data = $stmt->fetchAll();
        return $data[0];
    }

    public function getRegisterByTel($tel) {
        $sql = "
            SELECT 
                * 
            FROM 
                tb_r3
            WHERE 
                tel = '".$tel."'
             
        ";
        $stmt = $this->pdo->query($sql);
        $stmt->execute(); 
        $data = $stmt->fetchAll();
        return $data[0];
    }

    public function addTeacher($teacher) {
        $sql = "
            INSERT INTO `tb_ca` (
                id, 
                t_id, 
                a, 
                b, 
                c, 
                title, 
                name, 
                surname, 
                tel, 
                email, 
                school
            ) VALUES (
                NULL, 
                :t_id, 
                :a, 
                :b, 
                :c, 
                :title, 
                :name, 
                :surname, 
                :tel, 
                :email, 
                :school
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($teacher);
        return $this->pdo->lastInsertId();

    }
}
?>
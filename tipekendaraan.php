<?php

require_once 'db.php';

class tipekendaraan extends db {

    function show(){
        $data = $this->db->prepare("SELECT * FROM tipe_kendaraan");

        try {
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

        return $result;
    }

}
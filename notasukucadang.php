<?php

require_once 'db.php';

class notasukucadang extends db {

    function show(){
        $data = $this->db->prepare("SELECT * FROM nota_suku_cadang");

        try {
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

        return $result;
    }

}
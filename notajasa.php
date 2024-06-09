<?php

require_once 'db.php';

class notajasa extends db {

    function show(){
        $data = $this->db->prepare("SELECT * FROM nota_jasa");

        try {
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

        return $result;
    }

    function store($id_nota_jasa, $tgl_nota_jasa){
        $data = $this->db->prepare("INSERT INTO nota_jasa (id_nota_jasa, tgl_nota_jasa) VALUES (?, ?)");
        
        $data->bindParam(1, $id_nota_jasa);
        $data->bindParam(2, $tgl_nota_jasa);
        
        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
        
        return $result;
    }
    
    function update($id_nota_jasa, $tgl_nota_jasa){
        $data = $this->db->prepare("UPDATE nota_jasa 
                                    SET tgl_nota_jasa = '$tgl_nota_jasa'
                                    WHERE id_nota_jasa = '$id_nota_jasa'");
        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
            
        return $result;
    }
    
    function delete($id_nota_jasa){
        $data = $this->db->prepare("DELETE FROM nota_jasa
                                    WHERE id_nota_jasa = '$id_nota_jasa'");

        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
            
        return $result;
    }
}

?>
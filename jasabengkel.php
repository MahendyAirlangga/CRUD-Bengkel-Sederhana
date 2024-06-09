<?php

require_once 'db.php';

class jasabengkel extends db {

    function show(){
        $data = $this->db->prepare("SELECT * FROM jasa_bengkel");

        try {
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

        return $result;
    }

    function store($id_jasa, $nama_jasa, $biaya_jasa){

        $data = $this->db->prepare("INSERT INTO jasa_bengkel (id_jasa, nama_jasa, biaya_jasa) VALUES (?, ?, ?)");
        
        $data->bindParam(1, $id_jasa);
        $data->bindParam(2, $nama_jasa);
        $data->bindParam(3, $biaya_jasa);
        
        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
        
        return $result;
    }
    
    function update($id_jasa, $nama_jasa, $biaya_jasa){
        $data = $this->db->prepare("UPDATE jasa_bengkel 
                                    SET nama_jasa = '$nama_jasa', 
                                        biaya_jasa = '$biaya_jasa'
                                    WHERE id_jasa = $id_jasa");
            
        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
            
        return $result;
    }
    
    function delete($id_jasa){
        $data = $this->db->prepare("DELETE FROM jasa_bengkel
                                    WHERE id_jasa = $id_jasa");

        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
            
        return $result;
    }
    
}

?>
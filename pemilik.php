<?php

require_once 'db.php';

class pemilik extends db {

    function show(){
        $data = $this->db->prepare("SELECT * FROM pemilik");

        try {
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

        return $result;
    }

    function store($id_pemilik, $nama_pemilik, $alamat_pemilik, $telp_pemilik){
        $data = $this->db->prepare("INSERT INTO pemilik (id_pemilik,nama_pemilik,alamat_pemilik,telp_pemilik) VALUES (?, ?, ?, ?)");
        
        $data->bindParam(1, $id_pemilik);
        $data->bindParam(2, $nama_pemilik);
        $data->bindParam(3, $alamat_pemilik);
        $data->bindParam(4, $telp_pemilik);
        
        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
        
        return $result;
    }
    
    function update($id_pemilik, $nama_pemilik, $alamat_pemilik, $telp_pemilik){
        $data = $this->db->prepare("UPDATE pemilik 
                                    SET nama_pemilik = '$nama_pemilik', 
                                        alamat_pemilik = '$alamat_pemilik', 
                                        telp_pemilik = '$telp_pemilik'
                                    WHERE id_pemilik = '$id_pemilik'");
        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
            
        return $result;
    }
    
    function delete($id_pemilik){
        $data = $this->db->prepare("DELETE FROM pemilik
                                    WHERE id_pemilik = '$id_pemilik'");

        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
            
        return $result;
    }
}

?>
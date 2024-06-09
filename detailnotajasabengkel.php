<?php

require_once 'db.php';

class detailnotajasabengkel extends db {

    function show(){
        $data = $this->db->prepare("SELECT * FROM detail_nota_jasa_bengkel dnjb
                                    JOIN jasa_bengkel jb ON dnjb.id_jasa = jb.id_jasa
                                    JOIN nota_jasa nj ON dnjb.id_nota_jasa = nj.id_nota_jasa");

        try {
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

        return $result;
    }

    function store($id_nota_jasa, $id_jasa){
        $data = $this->db->prepare("INSERT INTO detail_nota_jasa_bengkel (id_nota_jasa, id_jasa) VALUES (?, ?)");
        
        $data->bindParam(1, $id_nota_jasa);
        $data->bindParam(2, $id_jasa);
        
        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
        
        return $result;
    }
    
    function delete($id_nota_jasa, $id_jasa){
        $data = $this->db->prepare("DELETE FROM detail_nota_jasa_bengkel
                                    WHERE id_nota_jasa = '$id_nota_jasa' AND id_jasa = '$id_jasa'");

        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
            
        return $result;
    }
}

?>
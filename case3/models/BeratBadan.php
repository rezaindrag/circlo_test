<?php

namespace models;

use PDO;
use PDOException;

/**
 * BeratBadan
 */
class BeratBadan
{
    private $db;

    public function __construct()
    {
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=beratbadan", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db = $conn;
        } catch(PDOException $e) {
            echo 'Koneksi db gagal: '.$e->getMessage();
        }
    }

    /**
     * all returns list of weight
     *
     * @return array
     */
    public function all()
    {
        $stmt = $this->db->prepare("SELECT * FROM berat ORDER BY tanggal DESC");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    /**
     * findById returns weight by id
     *
     * @param int $id
     * @return array
     */
    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM berat WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);

        if (!$row) {
            die('Data berat badan tidak ditemukan. <a href="#" onclick="window.history.back()">&larr; Kembali</a>');
        }

        return $row;
    }

    /**
     * store store data to database
     *
     * @param array $data
     * @return bool
     */
    public function store($data = [])
    {
        $stmt = $this->db->prepare("INSERT INTO berat(_max, _min, tanggal) VALUES(:_max, :_min, :tanggal)");
        $stmt->execute($data);

        return $stmt;
    }

    /**
     * update
     *
     * @return bool
     */
    public function update($data)
    {
        $stmt = $this->db->prepare("UPDATE berat SET _max = :_max, _min = :_min WHERE id = :id");
        $stmt->execute($data);

        return $stmt;
    }


    /**
     * delete by id
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM berat WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt;
    }
}
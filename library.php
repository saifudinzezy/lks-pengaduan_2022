<?php
class Library
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "pengaduan";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);        
    }

    public function add_data($no_aduan, $nik, $nama, $hp, $jns_aduan, $alamat, $ket, $response)
    {
        $data = $this->db->prepare('INSERT INTO aduan (no_aduan, nik, nama, hp, jns_aduan, alamat, ket, response) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        
        $data->bindParam(1, $no_aduan);
        $data->bindParam(2, $nik);
        $data->bindParam(3, $nama);
        $data->bindParam(4, $hp);
        $data->bindParam(5, $jns_aduan);
        $data->bindParam(6, $alamat);
        $data->bindParam(7, $ket);
        $data->bindParam(8, $response);

        $data->execute();
        //1 / 0
        return $data->rowCount();
    }
    
    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM aduan");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($id){
        $query = $this->db->prepare("SELECT * FROM aduan where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function get_by_no($no_aduan){
        $query = $this->db->prepare("SELECT * FROM aduan where no_aduan=?");
        $query->bindParam(1, $no_aduan);
        $query->execute();
        return $query->fetchAll();
    }

    public function update($id, $response){
        $query = $this->db->prepare('UPDATE aduan set response=? where id=?');
        
        $query->bindParam(1, $response);
        $query->bindParam(2, $id);

        $query->execute();
        return $query->rowCount();
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM aduan where id=?");

        $query->bindParam(1, $id);

        $query->execute();
        return $query->rowCount();
    }

    public function login($email, $password)
    {
        $password = md5($password);
        $query = $this->db->prepare("select * from akun where email=? AND password=?");
        $query->bindParam(1, $email);        
        $query->bindParam(2, $password);
        $query->execute();        
        return $query->rowCount();     
    }

}
?>
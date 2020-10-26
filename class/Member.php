<?php
// Require Crud interface
require $_SERVER['DOCUMENT_ROOT'] . '/lat-sertifikasi2/interface/Crud.php';

// Require Database
require 'Database.php';

class Member extends Database implements Crud
{
    // Property
    private $id;
    private $nama;
    private $alamat;
    private $jenis_kelamin;
    private $telepon;

    // Method
    public function cetak_nama()
    {
        echo $this->nama;
    }

    // Panggil construct database agar terkoneksi dengan database
    public function __construct()
    {
        parent::__construct();
    }

    // Query semua data member
    public function get_all()
    {
        // Array untuk data member
        $member = array();
        // Siapkan SQL
        $sql = "SELECT *
                FROM member
                ORDER BY id DESC";
        // Query data member
        $res = mysqli_query($this->db, $sql);
        // Ambil data satu persatu
        while ($r = mysqli_fetch_assoc($res)) {
            $member[] = $r;
        }
        // Return data member
        return $member;
    }

    // Query satu data member
    public function get()
    {
        // Siapkan sintak untuk query satu member
        $sql = "SELECT * FROM member WHERE id = $this->id";
        // Jalankan query
        $res = mysqli_query($this->db, $sql);
        // Return data yang sudah di fetch
        return mysqli_fetch_assoc($res);
    }

    // Tambah Member
    public function create()
    {
        // Ubah foto  berdasarkan jenis kelamin
        $foto = ($this->jenis_kelamin == 'l') ? "d-male.png" : "d-female.png";
        // Siapkan SQL
        $sql = "INSERT INTO member 
                VALUES(0, 
                        '$this->nama', 
                        '$this->alamat',
                        '$this->jenis_kelamin',
                        '$this->telepon',
                        '$foto'
                        )";
        return mysqli_query($this->db, $sql);
    }

    // Ubah satu data member
    public function update()
    {
        // Ubah foto  berdasarkan jenis kelamin
        $foto = ($this->jenis_kelamin == 'l') ? "d-male.png" : "d-female.png";
        // Siapkan SQL untuk update data member
        $sql = "UPDATE member SET
                nama = '$this->nama',
                alamat = '$this->alamat',
                jenis_kelamin = '$this->jenis_kelamin',
                telepon = '$this->telepon',
                foto = '$foto'
                WHERE id = '$this->id'
        ";
        // Eksekusi
        return mysqli_query($this->db, $sql);
    }

    // Hapus satu data member
    public function delete()
    {
        // Siapkan SQL untuk menghapus data member
        $sql = "DELETE FROM member WHERE id = $this->id";
        // Return hasil eksekusi
        return mysqli_query($this->db, $sql);
    }


    // Setter

    // Set ID
    public function set_id($id)
    {
        $this->id = $id;
    }

    // Set Nama
    public function set_nama($nama)
    {
        $this->nama = htmlspecialchars($nama);
    }

    // Set Alamat
    public function set_alamat($alamat)
    {
        $this->alamat = htmlspecialchars($alamat);
    }

    // Set Jenis Kelamin
    public function set_jenis_kelamin($jenis_kelamin)
    {
        $this->jenis_kelamin = $jenis_kelamin;
    }

    // Set Nomor Telepon
    public function set_telepon($telepon)
    {
        $this->telepon = htmlspecialchars($telepon);
    }
}

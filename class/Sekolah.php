<?php
// Require Crud Interface
require $_SERVER['DOCUMENT_ROOT'] . '/lat-sertifikasi3/interface/Crud.php';

// Require Database
require 'Database.php';

class Sekolah extends Database implements Crud
{
    // Property
    private $id;
    private $nama_sekolah;
    private $nama_kepala_sekolah;
    private $alamat_sekolah;
    private $jumlah_murid;
    private $jumlah_guru;
    private $tanggal_berdiri;

    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        // Array untuk data member
        $sekolah = array();
        // Siapkan SQL
        $sql = "SELECT *
                FROM sekolah
                ORDER BY id DESC";
        // Query data sekolah
        $res = mysqli_query($this->db, $sql);
        // Ambil data satu persatu
        while ($r = mysqli_fetch_assoc($res)) {
            $sekolah[] = $r;
        }
        // Return data sekolah
        return $sekolah;
    }

    public function get()
    {
        // Siapkan sintak untuk query satu sekolah
        $sql = "SELECT * FROM sekolah WHERE id = $this->id";
        // Jalankan query
        $res = mysqli_query($this->db, $sql);
        // Return data yang sudah di fetch
        return mysqli_fetch_assoc($res);
    }

    public function create()
    {
        // Siapkan SQL
        $sql = "INSERT INTO sekolah
                VALUES (
                    0,
                    '$this->nama_sekolah',
                    '$this->nama_kepala_sekolah',
                    '$this->alamat_sekolah',
                    '$this->jumlah_murid',
                    '$this->jumlah_guru',
                    '$this->tanggal_berdiri'
                )";
        // Eksekusi
        return mysqli_query($this->db, $sql);
    }

    public function update()
    {
        // Siapkan SQL
        $sql = "UPDATE sekolah SET 
                nama_sekolah = '$this->nama_sekolah',
                nama_kepala_sekolah = '$this->nama_kepala_sekolah',
                alamat_sekolah = '$this->alamat_sekolah',
                jumlah_murid = '$this->jumlah_murid',
                jumlah_guru = '$this->jumlah_guru',
                tanggal_berdiri = '$this->tanggal_berdiri'
                WHERE id = '$this->id'
        ";

        // Eksekusi
        return mysqli_query($this->db, $sql);
    }

    public function delete()
    {
        // Eksekusi
        return mysqli_query($this->db, "DELETE FROM sekolah WHERE id = $this->id");
    }

    // Setter

    // ID
    public function set_id($id)
    {
        $this->id = $id;
    }

    // Nama Sekolah
    public function set_nama_sekolah($nama)
    {
        $this->nama_sekolah = $nama;
    }

    // Kepala Sekolah
    public function set_nama_kepala_sekolah($nama)
    {
        $this->nama_kepala_sekolah = $nama;
    }

    // Alamat
    public function set_alamat($alamat)
    {
        $this->alamat_sekolah = $alamat;
    }

    // Jumlah Murid
    public function set_jumlah_murid($jumlah)
    {
        $this->jumlah_murid = $jumlah;
    }

    // Jumlah Guru
    public function set_jumlah_guru($jumlah)
    {
        $this->jumlah_guru = $jumlah;
    }

    // Tanggal Berdiri

    public function set_tanggal_berdiri($tanggal)
    {
        $this->tanggal_berdiri = $tanggal;
    }
}

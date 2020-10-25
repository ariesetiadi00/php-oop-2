<?php
class Database
{
    // Database Property
    protected $db;

    // Const untuk koneksi ke database
    const HOST = "localhost";
    const USER = "root";
    const PASS = "";
    const DB = "db_member";

    public function __construct()
    {
        // Connect ke database
        $this->db = new mysqli(Database::HOST, Database::USER,  Database::PASS, Database::DB);

        // Jika gagal, echo pesan error
        if (!$this->db) {
            echo "Koneksi Gagal : " . mysqli_connect_error();
        }

        // Start session
        session_start();

        // Return database
        return $this->db;
    }
}

<?php
interface Crud
{
    // Ambil semua data
    public function get_all();

    // Ambil satu data
    public function get();

    // Tambah data member
    public function create();

    // Ubah satu data
    public function update();

    // Hapus satu data
    public function delete();
}

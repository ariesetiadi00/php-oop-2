<?php
// Require class Member untuk query data
require '../class/Member.php';

// Instansiasi
$member = new Member();

// Set Member ID
$member->set_id($_POST['id']);

// Return satu member berdasarkan id dalam file JSON
echo json_encode(["member" => $member->get()]);

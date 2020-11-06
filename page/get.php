<?php
// Require class Member dan Sekolah untuk query data

if ($_POST['type'] == 'sekolah') {
    // Import Class Sekolah
    require '../class/Sekolah.php';
    $sekolah = new Sekolah();

    // Set ID
    $sekolah->set_id($_POST['id']);

    // Return Data Sekolah
    echo json_encode(['sekolah' => $sekolah->get()]);
} elseif ($_POST['type'] == 'member') {
    // Import Class Member
    require '../class/Member.php';
    $member = new Member();

    // Set ID
    $member->set_id($_POST['id']);

    // Return data member
    echo json_encode(['member' => $member->get()]);
}

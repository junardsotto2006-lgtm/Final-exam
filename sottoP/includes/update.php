<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $middlename = $_POST['middlename'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $stmt = $pdo->prepare("
        UPDATE students 
        SET surname=?, name=?, middlename=?, address=?, contact_number=? 
        WHERE id=?
    ");

    $stmt->execute([$surname, $name, $middlename, $address, $contact, $id]);

    header("Location: ../public/index.php");
}
?>
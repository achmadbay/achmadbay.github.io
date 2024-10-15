<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

     if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file = $_FILES['file'];
        $maxSize = 2 * 1024 * 1024; 
        $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];

        if ($file['size'] > $maxSize) {
            die("File terlalu besar. Maksimal 2MB.");
        }

        if (!in_array($file['type'], $allowedTypes)) {
            die("Tipe file tidak didukung. Hanya JPG, PNG, atau PDF.");
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = date('Y-m-d H.i.s') . '.' . $ext;
        $filePath = 'uploads/' . $fileName;

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            $stmt = $conn->prepare("INSERT INTO contacts (name, email, phone, message, file_name) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $email, $phone, $message, $fileName);

            if ($stmt->execute()) {
                echo "Data dan file berhasil disimpan.";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            die("Gagal mengunggah file.");
        }
    } else {
        die("Harap unggah file.");
    }
}

$conn->close();
header("Location: view_contacts.php");

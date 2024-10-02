<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ngambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Tampilkan inputan
    echo "<h2>Data yang Dikirim:</h2>";
    echo "<p>Nama: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Nomor Telepon: $phone</p>";
    echo "<p>Pesan: $message</p>";
} else {
    echo "Tidak ada data yang dikirim.";
}
?>
